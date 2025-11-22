<?php
// ========================================
// ข้อ 1: การเชื่อมต่อ PHP กับ MySQL
// ========================================

echo "<h2>วิธีที่ 1: MySQLi แบบ Object-Oriented</h2>";

$servername = "localhost";
$username = "root";  // เปลี่ยนตามของคุณ
$password = "";      // เปลี่ยนตามของคุณ
$dbname = "testdb";  // ⭐ ต้องมีฐานข้อมูลนี้ก่อน หรือใช้ CREATE DATABASE ด้านล่าง

// สร้างการเชื่อมต่อ
$conn1 = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn1->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn1->connect_error);
}
echo "✅ เชื่อมต่อสำเร็จ (MySQLi OOP)<br><br>";

$conn1->close();

// ========================================

echo "<h2>วิธีที่ 2: MySQLi แบบ Procedural</h2>";

$conn2 = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn2) {
    die("การเชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}
echo "✅ เชื่อมต่อสำเร็จ (MySQLi Procedural)<br><br>";

mysqli_close($conn2);

// ========================================

echo "<h2>วิธีที่ 3: PDO (แนะนำ)</h2>";

try {
    $conn3 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    // ตั้งค่า error mode
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ เชื่อมต่อสำเร็จ (PDO)<br>";
    echo "ข้อดี PDO: รองรับหลายฐานข้อมูล ปลอดภัยกว่า MySQLi<br>";

} catch(PDOException $e) {
    echo "❌ การเชื่อมต่อล้มเหลว: " . $e->getMessage();
}

$conn3 = null;

// ========================================

echo "<hr><h3>📌 สรุป:</h3>";
echo "<ul>";
echo "<li><strong>MySQLi OOP:</strong> ใช้ \$conn->method()</li>";
echo "<li><strong>MySQLi Procedural:</strong> ใช้ mysqli_function(\$conn)</li>";
echo "<li><strong>PDO:</strong> รองรับหลายฐานข้อมูล ใช้ try-catch</li>";
echo "</ul>";

?>
