<?php
echo "<h2>ข้อ 3: PHP Constants (ค่าคงที่)</h2>";

// ==========================================
// 1. สร้างค่าคงที่ด้วย define()
// ==========================================
echo "<h3>3.1 สร้างค่าคงที่ด้วย define()</h3>";

// สร้างค่าคงที่แบบง่าย
define("SITE_NAME", "My Website");
define("VERSION", "1.0.0");
define("MAX_USERS", 100);

echo "ชื่อเว็บไซต์: " . SITE_NAME . "<br>";
echo "เวอร์ชั่น: " . VERSION . "<br>";
echo "จำนวนผู้ใช้สูงสุด: " . MAX_USERS . "<br><br>";

// ==========================================
// 2. สร้างค่าคงที่ด้วย const
// ==========================================
echo "<h3>3.2 สร้างค่าคงที่ด้วย const</h3>";

const DATABASE_HOST = "localhost";
const DATABASE_NAME = "mydb";
const DATABASE_USER = "root";

echo "Database Host: " . DATABASE_HOST . "<br>";
echo "Database Name: " . DATABASE_NAME . "<br>";
echo "Database User: " . DATABASE_USER . "<br><br>";

// ==========================================
// 3. ความแตกต่างระหว่าง const และ define()
// ==========================================
echo "<h3>3.3 ความแตกต่าง const vs define()</h3>";

// define() ใช้ได้ในทุกที่
if (true) {
    define("GREETING", "Hello World!");
}
echo "define ใน if: " . GREETING . "<br>";

// const ต้องอยู่ใน top-level scope
// const INSIDE_IF = "Test"; // จะ error ถ้าอยู่ใน if
echo "<br>";

// ==========================================
// 4. ค่าคงที่แบบ Array
// ==========================================
echo "<h3>3.4 ค่าคงที่แบบ Array (PHP 7+)</h3>";

define("COLORS", array("red", "green", "blue"));
define("PRICES", [100, 200, 300]);

echo "สีแรก: " . COLORS[0] . "<br>";
echo "สีที่สอง: " . COLORS[1] . "<br>";
echo "ราคาแรก: " . PRICES[0] . " บาท<br>";

// แสดงทั้ง array
echo "สีทั้งหมด: " . implode(", ", COLORS) . "<br><br>";

// ==========================================
// 5. Constants เป็น Global
// ==========================================
echo "<h3>3.5 Constants เป็น Global (ใช้ได้ทั่วทั้งสคริปต์)</h3>";

define("GLOBAL_MESSAGE", "This is a global constant");

function testConstant() {
    // ไม่ต้องใช้ global keyword
    echo "ใน function: " . GLOBAL_MESSAGE . "<br>";
}

testConstant();
echo "นอก function: " . GLOBAL_MESSAGE . "<br><br>";

// ==========================================
// 6. ตรวจสอบว่ามี constant หรือไม่
// ==========================================
echo "<h3>3.6 ตรวจสอบการมีอยู่ของ Constant</h3>";

if (defined("SITE_NAME")) {
    echo "SITE_NAME มีอยู่: " . SITE_NAME . "<br>";
} else {
    echo "SITE_NAME ไม่มี<br>";
}

if (defined("UNDEFINED_CONST")) {
    echo "UNDEFINED_CONST มีอยู่<br>";
} else {
    echo "UNDEFINED_CONST ไม่มีอยู่<br>";
}
echo "<br>";

// ==========================================
// 7. ค่าคงที่กับการคำนวณ
// ==========================================
echo "<h3>3.7 ตัวอย่างการใช้งาน Constants</h3>";

define("TAX_RATE", 0.07);
define("DISCOUNT", 50);

$price = 1000;
$tax = $price * TAX_RATE;
$finalPrice = $price + $tax - DISCOUNT;

echo "ราคาสินค้า: $price บาท<br>";
echo "ภาษี (" . (TAX_RATE * 100) . "%): $tax บาท<br>";
echo "ส่วนลด: " . DISCOUNT . " บาท<br>";
echo "ราคาสุทธิ: $finalPrice บาท<br><br>";

// ==========================================
// 8. ค่าคงที่แบบ Case-Sensitive
// ==========================================
echo "<h3>3.8 Case-Sensitive (แยกตัวพิมพ์เล็ก-ใหญ่)</h3>";

define("MYCONST", "Hello");
// define("myconst", "World"); // จะเป็น constant คนละตัว

echo "MYCONST = " . MYCONST . "<br>";
// echo "myconst = " . myconst . "<br>"; // จะ error ถ้าไม่ได้ define

// ใน PHP 7.3+ แนะนำให้ case-sensitive เสมอ
echo "<br>";

// ==========================================
// 9. ตัวอย่างการใช้งานจริง
// ==========================================
echo "<h3>3.9 ตัวอย่างการใช้งานจริง - Config System</h3>";

// Configuration Constants
define("APP_NAME", "Shopping Cart");
define("APP_VERSION", "2.1.0");
define("DEBUG_MODE", true);
define("UPLOAD_MAX_SIZE", 5242880); // 5MB in bytes
define("ALLOWED_TYPES", ["jpg", "png", "gif", "pdf"]);

echo "<strong>แสดงข้อมูล Configuration:</strong><br>";
echo "ชื่อแอพ: " . APP_NAME . "<br>";
echo "เวอร์ชัน: " . APP_VERSION . "<br>";
echo "โหมด Debug: " . (DEBUG_MODE ? "เปิด" : "ปิด") . "<br>";
echo "ขนาดไฟล์สูงสุด: " . (UPLOAD_MAX_SIZE / 1024 / 1024) . " MB<br>";
echo "ไฟล์ที่อนุญาต: " . implode(", ", ALLOWED_TYPES) . "<br>";

echo "<hr>";
?>