<?php
// ข้อมูลการเชื่อมต่อ
$servername = "localhost";
$username = "root";        // ใช้ username ของคุณ
$password = "";            // ใช้ password ของคุณ
$dbname = "myDB";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// คำสั่ง SQL: เลือกข้อมูลที่ lastname = 'Doe'
$sql = "SELECT id, firstname, lastname FROM MyGuests WHERE lastname='Doe'";
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result->num_rows > 0) {
    echo "<h2>ผลลัพธ์การค้นหา:</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>ชื่อ</th><th>นามสกุล</th></tr>";
    
    // แสดงข้อมูลแต่ละแถว
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "ไม่พบข้อมูล";
}

// ปิดการเชื่อมต่อ
$conn->close();
?>