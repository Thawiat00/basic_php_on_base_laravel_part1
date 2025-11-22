<?php
echo "<h2>ข้อ 3: PHP XML Expat Parser</h2>";
echo "<hr>";

// ============================================
// ส่วนที่ 1: สร้างไฟล์ XML ตัวอย่าง
// ============================================
$noteXML = '<?xml version="1.0" encoding="UTF-8"?>
<note>
    <to>Tove</to>
    <from>Jani</from>
    <heading>Reminder</heading>
    <body>Don\'t forget me this weekend!</body>
</note>';

file_put_contents("note.xml", $noteXML);

echo "<h3>3.1 ตัวอย่างพื้นฐาน Expat Parser</h3>";

// ============================================
// ส่วนที่ 2: กำหนด Handler Functions
// ============================================

// Function สำหรับจัดการเมื่อเริ่มต้น element
function start($parser, $element_name, $element_attrs) {
    switch($element_name) {
        case "NOTE":
            echo "<div style='border: 2px solid #333; padding: 10px; margin: 10px 0;'>";
            echo "<strong>-- Note Document --</strong><br>";
            break;
        case "TO":
            echo "<span style='color: blue;'>To: </span>";
            break;
        case "FROM":
            echo "<span style='color: green;'>From: </span>";
            break;
        case "HEADING":
            echo "<span style='color: red;'>Heading: </span>";
            break;
        case "BODY":
            echo "<span style='color: purple;'>Message: </span>";
            break;
    }
}

// Function สำหรับจัดการเมื่อจบ element
function stop($parser, $element_name) {
    if ($element_name == "NOTE") {
        echo "</div>";
    } else {
        echo "<br>";
    }
}

// Function สำหรับจัดการข้อความภายใน element
function char($parser, $data) {
    echo $data;
}

// ============================================
// ส่วนที่ 3: สร้างและตั้งค่า Parser
// ============================================

// สร้าง XML parser
$parser = xml_parser_create();

// ตั้งค่า handler สำหรับ element (เปิด/ปิด tag)
xml_set_element_handler($parser, "start", "stop");

// ตั้งค่า handler สำหรับข้อความ
xml_set_character_data_handler($parser, "char");

// ============================================
// ส่วนที่ 4: อ่านและ Parse XML
// ============================================

// เปิดไฟล์
$fp = fopen("note.xml", "r");

// อ่านและ parse ทีละส่วน
while ($data = fread($fp, 4096)) {
    xml_parse($parser, $data, feof($fp)) or 
    die(sprintf("XML Error: %s at line %d",
        xml_error_string(xml_get_error_code($parser)),
        xml_get_current_line_number($parser)));
}

// ปิดไฟล์
fclose($fp);

// ล้างหน่วยความจำ parser
xml_parser_free($parser);

echo "<hr>";

// ============================================
// ส่วนที่ 5: ตัวอย่างขั้นสูง - เก็บข้อมูลลง Array
// ============================================
echo "<h3>3.2 ตัวอย่างขั้นสูง - เก็บข้อมูลใน Array</h3>";

$currentElement = "";
$noteData = array();

function startAdvanced($parser, $element_name, $element_attrs) {
    global $currentElement;
    $currentElement = $element_name;
}

function stopAdvanced($parser, $element_name) {
    global $currentElement;
    $currentElement = "";
}

function charAdvanced($parser, $data) {
    global $currentElement, $noteData;
    $data = trim($data);
    
    if (!empty($data) && $currentElement != "NOTE") {
        $noteData[$currentElement] = $data;
    }
}

// สร้าง parser ใหม่
$parser2 = xml_parser_create();
xml_set_element_handler($parser2, "startAdvanced", "stopAdvanced");
xml_set_character_data_handler($parser2, "charAdvanced");

// อ่านไฟล์
$fp2 = fopen("note.xml", "r");
while ($data = fread($fp2, 4096)) {
    xml_parse($parser2, $data, feof($fp2));
}
fclose($fp2);
xml_parser_free($parser2);

// แสดงข้อมูลที่เก็บไว้
echo "<strong>ข้อมูลที่เก็บใน Array:</strong><br>";
echo "<pre>";
print_r($noteData);
echo "</pre>";

echo "<strong>เข้าถึงข้อมูลแต่ละส่วน:</strong><br>";
echo "To: " . (isset($noteData['TO']) ? $noteData['TO'] : 'N/A') . "<br>";
echo "From: " . (isset($noteData['FROM']) ? $noteData['FROM'] : 'N/A') . "<br>";
echo "Heading: " . (isset($noteData['HEADING']) ? $noteData['HEADING'] : 'N/A') . "<br>";
echo "Body: " . (isset($noteData['BODY']) ? $noteData['BODY'] : 'N/A') . "<br>";

echo "<hr>";

// ============================================
// ส่วนที่ 6: จัดการ Error
// ============================================
echo "<h3>3.3 จัดการ Error</h3>";

$brokenXML = '<?xml version="1.0" encoding="UTF-8"?>
<note>
    <to>Tove</to>
    <from>Jani
    <heading>Reminder</heading>
</note>';

file_put_contents("broken.xml", $brokenXML);

$parser3 = xml_parser_create();
xml_set_element_handler($parser3, "start", "stop");
xml_set_character_data_handler($parser3, "char");

$fp3 = fopen("broken.xml", "r");
$parseSuccess = true;

while ($data = fread($fp3, 4096)) {
    if (!xml_parse($parser3, $data, feof($fp3))) {
        echo "<div style='color: red; border: 1px solid red; padding: 10px;'>";
        echo "<strong>XML Error:</strong> ";
        echo xml_error_string(xml_get_error_code($parser3));
        echo " at line ";
        echo xml_get_current_line_number($parser3);
        echo "</div>";
        $parseSuccess = false;
        break;
    }
}

fclose($fp3);
xml_parser_free($parser3);

if ($parseSuccess) {
    echo "<div style='color: green;'>XML parsed successfully!</div>";
}

echo "<hr>";

// ============================================
// สรุป Expat Parser
// ============================================
echo "<h3>สรุป Expat Parser:</h3>";
echo "<ul>";
echo "<li><strong>xml_parser_create()</strong> - สร้าง parser</li>";
echo "<li><strong>xml_set_element_handler()</strong> - กำหนด function จัดการ element</li>";
echo "<li><strong>xml_set_character_data_handler()</strong> - กำหนด function จัดการข้อความ</li>";
echo "<li><strong>xml_parse()</strong> - ประมวลผล XML</li>";
echo "<li><strong>xml_error_string()</strong> - แปลง error code เป็นข้อความ</li>";
echo "<li><strong>xml_get_error_code()</strong> - ดึง error code</li>";
echo "<li><strong>xml_get_current_line_number()</strong> - ดึงเลขบรรทัดที่เกิด error</li>";
echo "<li><strong>xml_parser_free()</strong> - ล้างหน่วยความจำ</li>";
echo "</ul>";

echo "<div style='background: #ffffcc; padding: 10px; border-left: 4px solid #ffcc00;'>";
echo "<strong>ข้อดี:</strong> ประหยัด memory, เหมาะกับไฟล์ใหญ่, ควบคุมได้ละเอียด<br>";
echo "<strong>ข้อเสีย:</strong> เขียนโค้ดยาว, ซับซ้อนกว่า SimpleXML";
echo "</div>";
?>