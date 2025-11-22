<?php
// ========================================
// ข้อ 4: การเพิ่มข้อมูล (INSERT)
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

// ไม่ต้องระบุ id (AUTO_INCREMENT) และ reg_date (TIMESTAMP)
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('สมชาย', 'ใจดี', 'somchai@example.com')";

if ($conn1->query($sql) === TRUE) {
    echo "✅ เพิ่มข้อมูลสำเร็จ<br>";
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

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('สมหญิง', 'รักดี', 'somying@example.com')";

if (mysqli_query($conn2, $sql)) {
    echo "✅ เพิ่มข้อมูลสำเร็จ<br>";
} else {
    echo "❌ Error: " . mysqli_error($conn2) . "<br>";
}
mysqli_close($conn2);

// ========================================

echo "<h2>วิธีที่ 3: PDO</h2>";

try {
    $conn3 = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password);
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
            VALUES ('วิชัย', 'ทรงธรรม', 'wichai@example.com')";
    
    $conn3->exec($sql);
    echo "✅ เพิ่มข้อมูลสำเร็จ (PDO)<br>";
    
} catch(PDOException $e) {
    echo "❌ " . $e->getMessage() . "<br>";
}

$conn3 = null;

// ========================================

echo "<hr><h3>📌 เพิ่มหลายข้อมูลพร้อมกัน</h3>";

$conn4 = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES 
        ('ประยุทธ์', 'มั่นคง', 'prayut@example.com'),
        ('สมศักดิ์', 'ชัยชนะ', 'somsak@example.com'),
        ('นันทา', 'สุขใจ', 'nanta@example.com')";

if ($conn4->query($sql) === TRUE) {
    echo "✅ เพิ่ม 3 รายการพร้อมกันสำเร็จ<br>";
} else {
    echo "❌ Error: " . $conn4->error . "<br>";
}
$conn4->close();

// ========================================

echo "<hr><h3>📌 กฎสำคัญ:</h3>";
echo "<ul>";
echo "<li>SQL query ต้องอยู่ใน quote ของ PHP</li>";
echo "<li>ข้อความใน SQL ต้องใส่ <code>'...'</code></li>";
echo "<li>ตัวเลขไม่ต้องใส่ quote</li>";
echo "<li>NULL ไม่ต้องใส่ quote</li>";
echo "<li>ไม่ต้องระบุคอลัมน์ AUTO_INCREMENT</li>";
echo "</ul>";

?>