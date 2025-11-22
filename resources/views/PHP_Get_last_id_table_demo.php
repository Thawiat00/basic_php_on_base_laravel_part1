<?php
echo "<h1>ข้อ 5: ดึง ID ล่าสุดที่เพิ่ม (Last Inserted ID)</h1>";

echo "<pre>";
echo htmlspecialchars('
<?php
// ========================================
// ข้อ 5: ดึง ID ล่าสุดที่เพิ่ม (Last Inserted ID)
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

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES (\'อารยา\', \'สวยงาม\', \'araya@example.com\')";

if ($conn1->query($sql) === TRUE) {
    $last_id = $conn1->insert_id;
    echo "✅ เพิ่มข้อมูลสำเร็จ<br>";
    echo "🔑 ID ล่าสุดที่เพิ่ม: <strong>$last_id</strong><br>";
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
        VALUES (\'ธนาคาร\', \'รวยมาก\', \'tanakarn@example.com\')";

if (mysqli_query($conn2, $sql)) {
    $last_id = mysqli_insert_id($conn2);
    echo "✅ เพิ่มข้อมูลสำเร็จ<br>";
    echo "🔑 ID ล่าสุดที่เพิ่ม: <strong>$last_id</strong><br>";
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
            VALUES (\'ภูมิใจ\', \'ชนะเลิศ\', \'poomjai@example.com\')";

    $conn3->exec($sql);
    $last_id = $conn3->lastInsertId();

    echo "✅ เพิ่มข้อมูลสำเร็จ (PDO)<br>";
    echo "🔑 ID ล่าสุดที่เพิ่ม: <strong>$last_id</strong><br>";

} catch(PDOException $e) {
    echo "❌ " . $e->getMessage() . "<br>";
}

$conn3 = null;

// ========================================

echo "<hr><h3>📌 การใช้งานจริง: เพิ่มข้อมูลหลายตาราง</h3>";

$conn4 = new mysqli($servername, $username, $password, $dbname);

// สมมติเพิ่มคำสั่งซื้อ
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES (\'ลูกค้า\', \'ใหม่\', \'customer@example.com\')";

if ($conn4->query($sql) === TRUE) {
    $customer_id = $conn4->insert_id;
    echo "✅ เพิ่มลูกค้าสำเร็จ (ID: $customer_id)<br>";

    // ใช้ customer_id ไปเพิ่มในตารางอื่น
    echo "💡 สามารถเอา ID นี้ไปใช้ในตาราง Orders หรือ Payments ได้<br>";
}

$conn4->close();

// ========================================

echo "<hr><h3>📌 สรุป:</h3>";
echo "<table border=\'1\' cellpadding=\'5\'>";
echo "<tr><th>วิธี</th><th>คำสั่ง</th></tr>";
echo "<tr><td>MySQLi OOP</td><td><code>$conn->insert_id</code></td></tr>";
echo "<tr><td>MySQLi Procedural</td><td><code>mysqli_insert_id($conn)</code></td></tr>";
echo "<tr><td>PDO</td><td><code>$conn->lastInsertId()</code></td></tr>";
echo "</table>";

?>
');
echo "</pre>";
?>
