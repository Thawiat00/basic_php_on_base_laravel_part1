<?php
// ========================================
// ข้อ 3: การสร้างตาราง MySQL
// ========================================

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

echo "<h2>วิธีที่ 1: MySQLi OOP</h2>";

$conn1 = new mysqli($servername, $username, $password, $dbname);

if ($conn1->connect_error) {
    die("เชื่อมต่อล้มเหลว: " . $conn1->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn1->query($sql) === TRUE) {
    echo "✅ สร้างตาราง MyGuests สำเร็จ<br>";
} else {
    echo "❌ Error: " . $conn1->error . "<br>";
}
$conn1->close();

// ========================================

echo "<h2>วิธีที่ 2: MySQLi Procedural</h2>";

$conn2 = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn2) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn2, $sql)) {
    echo "✅ สร้างตาราง Products สำเร็จ<br>";
} else {
    echo "❌ Error: " . mysqli_error($conn2) . "<br>";
}
mysqli_close($conn2);

// ========================================

echo "<h2>วิธีที่ 3: PDO</h2>";

try {
    $conn3 = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password);
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "CREATE TABLE IF NOT EXISTS MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    $conn3->exec($sql);
    echo "✅ สร้างตาราง MyGuests สำเร็จ (PDO)<br>";
    
} catch(PDOException $e) {
    echo "❌ " . $e->getMessage() . "<br>";
}

$conn3 = null;

// ========================================

echo "<hr><h3>📌 อธิบาย Data Types:</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ประเภท</th><th>ความหมาย</th></tr>";
echo "<tr><td>INT(6)</td><td>ตัวเลข 6 หลัก</td></tr>";
echo "<tr><td>VARCHAR(30)</td><td>ข้อความไม่เกิน 30 ตัวอักษร</td></tr>";
echo "<tr><td>DECIMAL(10,2)</td><td>ทศนิยม 10 หลัก, จุดทศนิยม 2 ตำแหน่ง</td></tr>";
echo "<tr><td>TIMESTAMP</td><td>บันทึกวันเวลา</td></tr>";
echo "<tr><td>AUTO_INCREMENT</td><td>เลขวิ่งอัตโนมัติ</td></tr>";
echo "<tr><td>PRIMARY KEY</td><td>กุญแจหลัก (ไม่ซ้ำ)</td></tr>";
echo "<tr><td>NOT NULL</td><td>ห้ามเป็นค่าว่าง</td></tr>";
echo "<tr><td>DEFAULT</td><td>ค่าเริ่มต้น</td></tr>";
echo "</table>";

?>