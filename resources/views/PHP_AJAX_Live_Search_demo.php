<?php
// -----------------------------
// ตัวแปรทั้งหมดที่ใช้ในไฟล์นี้
// -----------------------------

$q = "";          // เก็บคำค้นหาที่ผู้ใช้ส่งมา
$response = "";   // เก็บผลลัพธ์สุดท้ายที่จะ echo ออกไป
$links = [];      // อาร์เรย์จำลองฐานข้อมูลลิงก์
$results = [];    // ผลลัพธ์ที่ค้นหาเจอ
$i = 0;           // ตัวนับ loop

// รับค่า q มาจาก URL เช่น livesearch.php?q=php
$q = isset($_GET["q"]) ? $_GET["q"] : "";

// สร้างฐานข้อมูลจำลอง (แทน XML หรือ Database จริง)
$links = [
    ["title" => "PHP Tutorial",        "url" => "https://www.w3schools.com/php/"],
    ["title" => "PHP Forms",           "url" => "https://www.w3schools.com/php/php_forms.asp"],
    ["title" => "HTML Tutorial",       "url" => "https://www.w3schools.com/html/"],
    ["title" => "HTML Forms",          "url" => "https://www.w3schools.com/html/html_forms.asp"],
    ["title" => "CSS Tutorial",        "url" => "https://www.w3schools.com/css/"],
    ["title" => "JavaScript Tutorial", "url" => "https://www.w3schools.com/js/"],
    ["title" => "AJAX Intro",          "url" => "https://www.w3schools.com/js/js_ajax_intro.asp"],
    ["title" => "MySQL Tutorial",      "url" => "https://www.w3schools.com/mysql/"]
];

// ถ้ายาว 0 แสดงว่าไม่ได้พิมพ์อะไร
if (strlen($q) == 0) {
    echo "";
    exit;
}

// ค้นหาคำที่ตรงกัน (ไม่สนตัวพิมพ์เล็ก-ใหญ่)
foreach ($links as $i => $item) {

    // แปลงเป็นตัวพิมพ์เล็กทั้งคู่เพื่อค้นหาแบบ case-insensitive
    $titleLower = strtolower($item["title"]);
    $queryLower = strtolower($q);

    // เช็คคำค้นหาใน title
    if (strpos($titleLower, $queryLower) !== false) {

        // เก็บผลลัพธ์ใส่ array
        $results[] = "<a href='" . $item["url"] . "' target='_blank'>" . $item["title"] . "</a>";
    }
}

// ถ้าไม่เจออะไร
if (count($results) == 0) {
    $response = "❌ ไม่พบผลลัพธ์สำหรับ: <strong>$q</strong>";
} 
else {
    // รวมผลลัพธ์เป็นข้อความเดียวคั่นด้วย <br>
    $response = implode("<br>", $results);
}

// ส่งออกไป
echo $response;
?>
