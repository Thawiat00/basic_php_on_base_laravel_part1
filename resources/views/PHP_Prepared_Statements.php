<?php
// ========================================
// ข้อ 7: Prepared Statements (ป้องกัน SQL Injection)
// ========================================

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

echo "<h2>⚠️ วิธีที่ไม่ปลอดภัย (อันตราย!)</h2>";
echo "<pre>";
echo "// อันตราย! ถ้า \$email = \"'; DROP TABLE MyGuests; --\"";
echo "\n\$sql = \"INSERT INTO MyGuests (firstname, lastname, email)";
echo "\n        VALUES ('\$firstname', '\$lastname', '\$email')\";";
echo "</pre>";
echo "<p style='color:red;'>🚨 แฮกเกอร์สามารถลบตารางได้!</p>";

// ========================================

echo "<hr><h2>✅ วิธีที่ 1: MySQLi Prepared Statements</h2>";

$conn1 = new mysqli($servername, $username, $password, $dbname);

if ($conn1->connect_error) {
    die("เชื่อมต่อล้มเหลว: " . $conn1->connect_error);
}

// 1. เตรียม SQL (ใช้ ? แทนค่า)
$stmt = $conn1->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");

// 2. ผูกตัวแปร (bind parameters)
// "sss" = string, string, string
// s = string, i = integer, d = double, b = blob
$stmt->bind_param("sss", $firstname, $lastname, $email);

// 3. กำหนดค่าและ execute หลายครั้ง
$firstname = "สมชาย";
$lastname = "ใจดี";
$email = "somchai@secure.com";
$stmt->execute();

$firstname = "สมหญิง";
$lastname = "รักดี";
$email = "somying@secure.com";
$stmt->execute();

$firstname = "วิชัย";
$lastname = "ทรงธรรม";
$email = "wichai@secure.com";
$stmt->execute();

echo "✅ เพิ่ม 3 รายการปลอดภัย (MySQLi)<br>";

$stmt->close();
$conn1->close();

// ========================================

echo "<h2>✅ วิธีที่ 2: PDO Prepared Statements</h2>";

try {
    $conn2 = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password);
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 1. เตรียม SQL (ใช้ :ชื่อ แทนค่า)
    $stmt = $conn2->prepare("INSERT INTO MyGuests (firstname, lastname, email)
                             VALUES (:firstname, :lastname, :email)");
    
    // 2. ผูกตัวแปร
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    
    // 3. กำหนดค่าและ execute
    $firstname = "อนุชา";
    $lastname = "มีสุข";
    $email = "anucha@secure.com";
    $stmt->execute();
    
    $firstname = "สุภาพร";
    $lastname = "ดีงาม";
    $email = "supaporn@secure.com";
    $stmt->execute();
    
    echo "✅ เพิ่มข้อมูลปลอดภัย (PDO)<br>";
    
} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "<br>";
}

$conn2 = null;

// ========================================

echo "<hr><h2>📌 PDO แบบสั้น (ส่งค่าตอน execute)</h2>";

try {
    $conn3 = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password);
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn3->prepare("INSERT INTO MyGuests (firstname, lastname, email)
                             VALUES (:firstname, :lastname, :email)");
    
    // ส่งค่าเป็น array ใน execute
    $stmt->execute([
        ':firstname' => 'ธนพล',
        ':lastname' => 'รุ่งเรือง',
        ':email' => 'tanapol@secure.com'
    ]);
    
    echo "✅ เพิ่มข้อมูลปลอดภัย (PDO แบบสั้น)<br>";
    
} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "<br>";
}

$conn3 = null;

// ========================================

echo "<hr><h3>📌 สรุปความแตกต่าง:</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>วิธี</th><th>Placeholder</th><th>Bind</th></tr>";
echo "<tr><td>MySQLi</td><td><code>?</code></td><td><code>bind_param('sss', \$a, \$b, \$c)</code></td></tr>";
echo "<tr><td>PDO</td><td><code>:name</code></td><td><code>bindParam(':name', \$var)</code></td></tr>";
echo "</table>";

echo "<h3>📌 ประเภทข้อมูล MySQLi:</h3>";
echo "<ul>";
echo "<li><code>i</code> = integer (ตัวเลข)</li>";
echo "<li><code>d</code> = double (ทศนิยม)</li>";
echo "<li><code>s</code> = string (ข้อความ)</li>";
echo "<li><code>b</code> = blob (ไฟล์/รูปภาพ)</li>";
echo "</ul>";

?>