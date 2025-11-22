<?php
// ========================================
// ข้อ 2: การสร้างฐานข้อมูล MySQL
// ========================================

$servername = "localhost";
$username = "root";
$password = "";

echo "<h2>วิธีที่ 1: MySQLi แบบ OOP</h2>";

// สร้างการเชื่อมต่อ (ไม่ต้องระบุฐานข้อมูล)
$conn1 = new mysqli($servername, $username, $password);

if ($conn1->connect_error) {
    die("เชื่อมต่อล้มเหลว: " . $conn1->connect_error);
}

// สร้างฐานข้อมูล
$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn1->query($sql) === TRUE) {
    echo "✅ สร้างฐานข้อมูล myDB สำเร็จ<br>";
} else {
    echo "❌ Error: " . $conn1->error . "<br>";
}
$conn1->close();

// ========================================

echo "<h2>วิธีที่ 2: MySQLi แบบ Procedural</h2>";

$conn2 = mysqli_connect($servername, $username, $password);

if (!$conn2) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS myDB2";
if (mysqli_query($conn2, $sql)) {
    echo "✅ สร้างฐานข้อมูล myDB2 สำเร็จ<br>";
} else {
    echo "❌ Error: " . mysqli_error($conn2) . "<br>";
}
mysqli_close($conn2);

// ========================================

echo "<h2>วิธีที่ 3: PDO</h2>";

try {
    $conn3 = new PDO("mysql:host=$servername", $username, $password);
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "CREATE DATABASE IF NOT EXISTS myDBPDO";
    $conn3->exec($sql);  // ใช้ exec() เพราะไม่มี result ส่งกลับ
    
    echo "✅ สร้างฐานข้อมูล myDBPDO สำเร็จ<br>";
    
} catch(PDOException $e) {
    echo "❌ " . $e->getMessage() . "<br>";
}

$conn3 = null;

// ========================================

echo "<hr><h3>📌 สรุป:</h3>";
echo "<ul>";
echo "<li>ใช้ <code>CREATE DATABASE ชื่อฐานข้อมูล</code></li>";
echo "<li>เพิ่ม <code>IF NOT EXISTS</code> เพื่อไม่ให้ error ถ้ามีอยู่แล้ว</li>";
echo "<li>MySQLi: ใช้ <code>query()</code></li>";
echo "<li>PDO: ใช้ <code>exec()</code></li>";
echo "</ul>";

?>