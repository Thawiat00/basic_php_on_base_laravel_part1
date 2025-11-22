<?php
echo "<h2>ข้อ 1: PHP SimpleXML Parser</h2>";
echo "<hr>";

// ============================================
// ส่วนที่ 1: อ่าน XML จาก String
// ============================================
echo "<h3>1.1 อ่าน XML จาก String</h3>";

$myXMLData = "<?xml version='1.0' encoding='UTF-8'?>
<note>
    <to>Tove</to>
    <from>Jani</from>
    <heading>Reminder</heading>
    <body>Don't forget me this weekend!</body>
</note>";

// ใช้ simplexml_load_string() เพื่ออ่าน XML จาก string
$xml = simplexml_load_string($myXMLData) or die("Error: Cannot create object");

echo "<strong>ผลลัพธ์:</strong><br>";
print_r($xml);
echo "<br><br>";

// เข้าถึงข้อมูลแบบ object
echo "<strong>เข้าถึงข้อมูลแต่ละ node:</strong><br>";
echo "To: " . $xml->to . "<br>";
echo "From: " . $xml->from . "<br>";
echo "Heading: " . $xml->heading . "<br>";
echo "Body: " . $xml->body . "<br>";

echo "<hr>";

// ============================================
// ส่วนที่ 2: จัดการ Error
// ============================================
echo "<h3>1.2 จัดการ Error เมื่อ XML ผิดพลาด</h3>";

libxml_use_internal_errors(true); // เปิดใช้การจัดการ error

$brokenXML = "<?xml version='1.0' encoding='UTF-8'?>
<document>
    <user>John Doe</wronguser>
    <email>john@example.com</wrongemail>
</document>";

$xml = simplexml_load_string($brokenXML);

if ($xml === false) {
    echo "<strong style='color: red;'>Failed loading XML:</strong><br>";
    foreach(libxml_get_errors() as $error) {
        echo "- " . $error->message . "<br>";
    }
} else {
    print_r($xml);
}

echo "<hr>";

// ============================================
// ส่วนที่ 3: อ่าน XML จากไฟล์
// ============================================
echo "<h3>1.3 อ่าน XML จากไฟล์</h3>";

// สร้างไฟล์ XML ตัวอย่าง
$noteXML = '<?xml version="1.0" encoding="UTF-8"?>
<note>
    <to>Tove</to>
    <from>Jani</from>
    <heading>Reminder</heading>
    <body>Don\'t forget me this weekend!</body>
</note>';

file_put_contents("note.xml", $noteXML);

// อ่านไฟล์ด้วย simplexml_load_file()
if (file_exists("note.xml")) {
    $xml = simplexml_load_file("note.xml") or die("Error: Cannot create object");
    
    echo "<strong>อ่านไฟล์ note.xml สำเร็จ:</strong><br>";
    print_r($xml);
    echo "<br><br>";
    
    echo "<strong>แสดงข้อมูลแต่ละ node:</strong><br>";
    echo "To: " . $xml->to . "<br>";
    echo "From: " . $xml->from . "<br>";
    echo "Heading: " . $xml->heading . "<br>";
    echo "Body: " . $xml->body . "<br>";
} else {
    echo "ไม่พบไฟล์ note.xml<br>";
}

echo "<hr>";

// ============================================
// สรุป SimpleXML
// ============================================
echo "<h3>สรุป SimpleXML Parser:</h3>";
echo "<ul>";
echo "<li><strong>simplexml_load_string()</strong> - อ่าน XML จาก string</li>";
echo "<li><strong>simplexml_load_file()</strong> - อ่าน XML จากไฟล์</li>";
echo "<li><strong>libxml_use_internal_errors()</strong> - เปิดใช้การจัดการ error</li>";
echo "<li><strong>libxml_get_errors()</strong> - ดึงรายการ error ที่เกิดขึ้น</li>";
echo "<li>เข้าถึงข้อมูลด้วย <strong>\$xml->nodeName</strong></li>";
echo "</ul>";

echo "<p><em>SimpleXML เหมาะสำหรับ XML ที่มีโครงสร้างไม่ซับซ้อน และต้องการเขียนโค้ดให้สั้นที่สุด</em></p>";
?>