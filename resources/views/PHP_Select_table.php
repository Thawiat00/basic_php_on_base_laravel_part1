<?php
// ========================================
// ข้อ 8: ดึงข้อมูลออกมา (SELECT)
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

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn1->query($sql);

if ($result->num_rows > 0) {
    echo "<strong>พบ " . $result->num_rows . " รายการ</strong><br><br>";
    
    // วนลูปแสดงข้อมูล
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - ชื่อ: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo "ไม่พบข้อมูล<br>";
}
$conn1->close();

// ========================================

echo "<hr><h2>วิธีที่ 2: MySQLi Procedural</h2>";

$conn2 = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn2) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

$sql = "SELECT id, firstname, lastname, email FROM MyGuests";
$result = mysqli_query($conn2, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<strong>พบ " . mysqli_num_rows($result) . " รายการ</strong><br><br>";
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"] . " - ชื่อ: " . $row["firstname"] . " " . $row["lastname"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "ไม่พบข้อมูล<br>";
}
mysqli_close($conn2);

// ========================================

echo "<hr><h2>วิธีที่ 3: แสดงในตาราง HTML (MySQLi)</h2>";

$conn3 = new mysqli($servername, $username, $password, $dbname);

if ($conn3->connect_error) {
    die("เชื่อมต่อล้มเหลว: " . $conn3->connect_error);
}

$sql = "SELECT id, firstname, lastname, email FROM MyGuests";
$result = $conn3->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr style='background-color: #4CAF50; color: white;'>";
    echo "<th>ID</th><th>ชื่อ</th><th>นามสกุล</th><th>Email</th></tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "ไม่พบข้อมูล";
}
$conn3->close();

// ========================================

echo "<hr><h2>วิธีที่ 4: PDO (Prepared Statements)</h2>";

try {
    $conn4 = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password);
    $conn4->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn4->prepare("SELECT id, firstname, lastname, email FROM MyGuests");
    $stmt->execute();
    
    // ดึงข้อมูลเป็น associative array
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($result) > 0) {
        echo "<strong>พบ " . count($result) . " รายการ (PDO)</strong><br><br>";
        
        foreach($result as $row) {
            echo "ID: " . $row["id"] . " - ชื่อ: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
        }
    } else {
        echo "ไม่พบข้อมูล";
    }
    
} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}

$conn4 = null;

// ========================================

echo "<hr><h2>📌 ดึงข้อมูลแบบมีเงื่อนไข (WHERE)</h2>";

$conn5 = new mysqli($servername, $username, $password, $dbname);

if ($conn5->connect_error) {
    die("เชื่อมต่อล้มเหลว: " . $conn5->connect_error);
}

// Prepared Statement ป้องกัน SQL Injection
$stmt = $conn5->prepare("SELECT id, firstname, lastname FROM MyGuests WHERE lastname = ?");
$stmt->bind_param("s", $search_lastname);

$search_lastname = "ใจดี";
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<strong>ค้นหา นามสกุล: $search_lastname</strong><br><br>";
    
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - ชื่อ: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo "ไม่พบข้อมูลนามสกุล: $search_lastname";
}

$stmt->close();
$conn5->close();

// ========================================

echo "<hr><h3>📌 สรุปคำสั่งดึงข้อมูล:</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>คำสั่ง</th><th>ความหมาย</th></tr>";
echo "<tr><td><code>SELECT *</code></td><td>เลือกทุกคอลัมน์</td></tr>";
echo "<tr><td><code>SELECT column1, column2</code></td><td>เลือกเฉพาะคอลัมน์ที่ระบุ</td></tr>";
echo "<tr><td><code>WHERE condition</code></td><td>กรองด้วยเงื่อนไข</td></tr>";
echo "<tr><td><code>ORDER BY column</code></td><td>เรียงลำดับ</td></tr>";
echo "<tr><td><code>LIMIT 10</code></td><td>จำกัดจำนวนผลลัพธ์</td></tr>";
echo "</table>";

echo "<h3>📌 Functions ดึงข้อมูล:</h3>";
echo "<ul>";
echo "<li><strong>MySQLi:</strong> <code>fetch_assoc()</code> = ดึงทีละแถว</li>";
echo "<li><strong>PDO:</strong> <code>fetchAll()</code> = ดึงทั้งหมด, <code>fetch()</code> = ดึงทีละแถว</li>";
echo "<li><strong>num_rows:</strong> นับจำนวนแถวที่ได้</li>";
echo "</ul>";

?>