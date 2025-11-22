<?php
// ========================================
// ข้อ 6: เพิ่มหลายข้อมูลพร้อมกัน (Multiple Insert)
// ========================================

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";



echo "<h2>วิธีที่ 1: MySQLi OOP (multi_query)</h2>";

$conn1 = new mysqli($servername, $username, $password, $dbname);

if ($conn1->connect_error) {
    die("เชื่อมต่อล้มเหลว: " . $conn1->connect_error);
}

// แต่ละคำสั่งต้องคั่นด้วย semicolon (;)
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('จอห์น', 'โด', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
         VALUES ('แมรี่', 'โม', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
         VALUES ('จูลี่', 'ดูลีย์', 'julie@example.com')";

if ($conn1->multi_query($sql) === TRUE) {
    echo "✅ เพิ่มหลายข้อมูลสำเร็จ (MySQLi)<br>";
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
        VALUES ('สมบูรณ์', 'พูลสุข', 'somboon@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
         VALUES ('วิไล', 'ศรีสุข', 'wilai@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
         VALUES ('ประสิทธิ์', 'ชาญชัย', 'prasit@example.com')";

if (mysqli_multi_query($conn2, $sql)) {
    echo "✅ เพิ่มหลายข้อมูลสำเร็จ (Procedural)<br>";
} else {
    echo "❌ Error: " . mysqli_error($conn2) . "<br>";
}
mysqli_close($conn2);

// ========================================

echo "<h2>วิธีที่ 3: PDO (Transaction - แนะนำ)</h2>";

try {
    $conn3 = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password);
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // เริ่ม Transaction
    $conn3->beginTransaction();
    
    // เพิ่มข้อมูลหลายรายการ
    $conn3->exec("INSERT INTO MyGuests (firstname, lastname, email)
                  VALUES ('อนุชา', 'มีสุข', 'anucha@example.com')");
    $conn3->exec("INSERT INTO MyGuests (firstname, lastname, email)
                  VALUES ('สุภาพร', 'ดีงาม', 'supaporn@example.com')");
    $conn3->exec("INSERT INTO MyGuests (firstname, lastname, email)
                  VALUES ('ธนพล', 'รุ่งเรือง', 'tanapol@example.com')");
    
    // ยืนยันการทำงาน (Commit)
    $conn3->commit();
    echo "✅ เพิ่มหลายข้อมูลสำเร็จ (PDO Transaction)<br>";
    
} catch(PDOException $e) {
    // ถ้ามีข้อผิดพลาด ยกเลิกทั้งหมด (Rollback)
    $conn3->rollback();
    echo "❌ Error: " . $e->getMessage() . "<br>";
}

$conn3 = null;

// ========================================

echo "<hr><h3>📌 Transaction คืออะไร?</h3>";
echo "<p>Transaction = ชุดคำสั่งที่ต้องทำสำเร็จทั้งหมด หรือไม่ทำเลย</p>";
echo "<ul>";
echo "<li><code>beginTransaction()</code> = เริ่มต้น</li>";
echo "<li><code>commit()</code> = ยืนยันการเปลี่ยนแปลง</li>";
echo "<li><code>rollback()</code> = ยกเลิกทั้งหมดถ้ามี error</li>";
echo "</ul>";
echo "<p><strong>ตัวอย่าง:</strong> โอนเงิน 500 บาท</p>";
echo "<ol>";
echo "<li>หักจากบัญชี A = 500 บาท</li>";
echo "<li>เพิ่มในบัญชี B = 500 บาท</li>";
echo "<li>ถ้าขั้นตอนใดผิดพลาด → rollback (ยกเลิกทั้งหมด)</li>";
echo "</ol>";

?>