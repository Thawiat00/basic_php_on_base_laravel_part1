<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// รับค่า ID ที่ต้องการลบ (ตัวอย่างนี้ใช้ id=3)
$delete_id = 3;

// คำสั่ง SQL: ลบข้อมูลที่ id = 3
$sql = "DELETE FROM MyGuests WHERE id=$delete_id";

if ($conn->query($sql) === TRUE) {
    echo "<div style='color: green; font-size: 18px;'>";
    echo "✓ ลบข้อมูล ID: $delete_id สำเร็จ!";
    echo "</div>";
    
    // แสดงข้อมูลที่เหลือ
    echo "<h3>ข้อมูลที่เหลือในตาราง:</h3>";
    $result = $conn->query("SELECT * FROM MyGuests");
    
    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>ชื่อ</th><th>นามสกุล</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
} else {
    echo "<div style='color: red;'>";
    echo "เกิดข้อผิดพลาด: " . $conn->error;
    echo "</div>";
}

$conn->close();
?>