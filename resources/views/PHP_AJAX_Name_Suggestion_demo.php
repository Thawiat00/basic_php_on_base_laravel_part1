<?php
// -------------------------------
// 1) ประกาศตัวแปร Array ของชื่อ
// -------------------------------
$a = array(
    "Anna", "Brittany", "Cinderella", "Diana", "Eva", "Fiona",
    "Gunda", "Hege", "Inga", "Johanna", "Kitty", "Linda",
    "Nina", "Ophelia", "Petunia", "Amanda", "Raquel", "Cindy",
    "Doris", "Eve", "Evita", "Sunniva", "Tove", "Unni",
    "Violet", "Liza", "Elizabeth", "Ellen", "Wenche", "Vicky"
);

// -------------------------------
// 2) รับค่าจาก URL ?q=xxxx
// -------------------------------
$q = isset($_REQUEST["q"]) ? $_REQUEST["q"] : "";
$hint = "";   // คำแนะนำที่ค้นหาได้

// ❗ ไม่มีการค้นหาจริง — echo ตัวแปรทุกตัวออกมา
echo "<b>=== DEBUG MODE: แสดงค่าตัวแปรทั้งหมด ===</b><br><br>";

echo "<b>ตัวแปร \$a (Array รายชื่อ):</b><br>";
echo "<pre>";
print_r($a);
echo "</pre><br>";

echo "<b>ตัวแปร \$q ที่รับเข้ามา:</b> $q <br><br>";
echo "<b>ความยาว \$len ของ \$q:</b> " . strlen($q) . "<br><br>";

echo "<b>ตัวแปร \$hint ก่อนค้นหา:</b> '$hint' <br><br>";

echo "<b>สถานะ:</b> ไม่มีการค้นหา ไม่มีการเชื่อมต่อจริง — แสดงค่าตัวแปรเท่านั้น<br><br>";

// -------------------------------
// 3) ปิดท้ายด้วยผลลัพธ์จำลอง
// -------------------------------
echo "<b>ผลลัพธ์สุดท้าย (จำลอง):</b> ";
echo "echo mode only — ไม่มีคำแนะนำจริง";
?>
