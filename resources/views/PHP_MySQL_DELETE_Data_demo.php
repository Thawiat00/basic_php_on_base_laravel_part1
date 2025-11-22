<?php
echo "<h2>ตัวอย่างการลบข้อมูลแบบจำลอง</h2>";

// ตัวแปรเชื่อมต่อฐานข้อมูล (จำลอง)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

echo "Servername: $servername<br>";
echo "Username: $username<br>";
echo "Password: $password<br>";
echo "Database name: $dbname<br><br>";

// ตัวแปร ID ที่ต้องการลบ
$delete_id = 3;
echo "ID ที่ต้องการลบ: $delete_id<br>";

// ตัวแปร SQL (จำลอง)
$sql = "DELETE FROM MyGuests WHERE id=$delete_id";
echo "SQL Command: $sql<br><br>";

// จำลองผลลัพธ์การลบสำเร็จ
$delete_success = true; // เปลี่ยนเป็น false เพื่อจำลองล้มเหลว

if ($delete_success) {
    echo "<div style='color: green; font-size: 18px;'>";
    echo "✓ ลบข้อมูล ID: $delete_id สำเร็จ!";
    echo "</div><br>";

    // จำลองข้อมูลที่เหลือในตาราง
    echo "<h3>ข้อมูลที่เหลือในตาราง (จำลอง):</h3>";
    $mock_data = [
        ["id"=>1, "firstname"=>"John", "lastname"=>"Doe"],
        ["id"=>2, "firstname"=>"Jane", "lastname"=>"Smith"],
        ["id"=>4, "firstname"=>"Alice", "lastname"=>"Brown"]
    ];

    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>ชื่อ</th><th>นามสกุล</th></tr>";
    foreach ($mock_data as $row) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

} else {
    $error_message = "Connection failed or SQL error";
    echo "<div style='color: red;'>";
    echo "เกิดข้อผิดพลาด: $error_message";
    echo "</div>";
}
?>
