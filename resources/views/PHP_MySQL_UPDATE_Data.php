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

// ข้อมูลที่ต้องการแก้ไข
$update_id = 2;
$new_lastname = "Doe";
$new_email = "mary.doe@example.com";

// คำสั่ง SQL: แก้ไขข้อมูล
$sql = "UPDATE MyGuests 
        SET lastname='$new_lastname', email='$new_email' 
        WHERE id=$update_id";

if ($conn->query($sql) === TRUE) {
    echo "<div style='background-color: #d4edda; padding: 15px; border-radius: 5px;'>";
    echo "<h3 style='color: #155724;'>✓ อัพเดทข้อมูลสำเร็จ!</h3>";
    echo "ID: $update_id ได้รับการอัพเดทเป็น<br>";
    echo "นามสกุลใหม่: <strong>$new_lastname</strong><br>";
    echo "อีเมลใหม่: <strong>$new_email</strong>";
    echo "</div>";
    
    // แสดงข้อมูลหลังอัพเดท
    echo "<h3>ข้อมูลปัจจุบัน:</h3>";
    $result = $conn->query("SELECT * FROM MyGuests WHERE id=$update_id");
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>ชื่อ</th><th>นามสกุล</th><th>อีเมล</th></tr>";
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
        echo "</table>";
    }
} else {
    echo "<div style='color: red;'>";
    echo "เกิดข้อผิดพลาด: " . $conn->error;
    echo "</div>";
}

$conn->close();
?>