<?php
// กำหนดตัวแปรสำหรับการเชื่อมต่อ (สมมุติ)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

echo "<h3>ตัวแปรการเชื่อมต่อ:</h3>";
echo "Servername: $servername<br>";
echo "Username: $username<br>";
echo "Password: $password<br>";
echo "Database: $dbname<br><br>";

// ข้อมูลที่ต้องการแก้ไข
$update_id = 2;
$new_lastname = "Doe";
$new_email = "mary.doe@example.com";

echo "<h3>ข้อมูลที่จะอัพเดท:</h3>";
echo "ID: $update_id<br>";
echo "นามสกุลใหม่: $new_lastname<br>";
echo "อีเมลใหม่: $new_email<br><br>";

// สร้าง SQL statement
$sql = "UPDATE MyGuests 
        SET lastname='$new_lastname', email='$new_email' 
        WHERE id=$update_id";

echo "<h3>SQL Statement ที่จะรัน:</h3>";
echo "<code>$sql</code><br><br>";

// สมมุติว่าการอัพเดทสำเร็จ
echo "<div style='background-color: #d4edda; padding: 15px; border-radius: 5px;'>";
echo "<h3 style='color: #155724;'>✓ อัพเดทข้อมูลสำเร็จ!</h3>";
echo "ID: $update_id ได้รับการอัพเดทเป็น<br>";
echo "นามสกุลใหม่: <strong>$new_lastname</strong><br>";
echo "อีเมลใหม่: <strong>$new_email</strong>";
echo "</div><br>";

// สมมุติข้อมูลหลังอัพเดท
$mock_row = [
    "id" => $update_id,
    "firstname" => "Mary",
    "lastname" => $new_lastname,
    "email" => $new_email
];

echo "<h3>ข้อมูลปัจจุบัน (จำลอง):</h3>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>ID</th><th>ชื่อ</th><th>นามสกุล</th><th>อีเมล</th></tr>";
echo "<tr>";
echo "<td>" . $mock_row["id"] . "</td>";
echo "<td>" . $mock_row["firstname"] . "</td>";
echo "<td>" . $mock_row["lastname"] . "</td>";
echo "<td>" . $mock_row["email"] . "</td>";
echo "</tr>";
echo "</table>";

echo "<br><div style='color: gray;'>Connection closed (จำลอง)</div>";
?>
