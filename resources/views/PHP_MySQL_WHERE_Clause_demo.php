<?php
// ข้อมูลการเชื่อมต่อ (จำลอง)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

echo "Servername: $servername<br>";
echo "Username: $username<br>";
echo "Password: $password<br>";
echo "Database: $dbname<br><br>";

// สมมติว่าการเชื่อมต่อสำเร็จ
$connect_error = false;

if ($connect_error) {
    echo "การเชื่อมต่อล้มเหลว: <i>เชื่อมต่อไม่สำเร็จ</i><br>";
} else {
    echo "เชื่อมต่อฐานข้อมูลสำเร็จ!<br><br>";

    // SQL ที่ใช้ (แค่แสดงข้อความ)
    $sql = "SELECT id, firstname, lastname FROM MyGuests WHERE lastname='Doe'";
    echo "SQL: $sql<br><br>";

    // สมมติผลลัพธ์จากฐานข้อมูล
    $result_rows = [
        ["id" => 1, "firstname" => "John", "lastname" => "Doe"],
        ["id" => 2, "firstname" => "Jane", "lastname" => "Doe"],
        ["id" => 3, "firstname" => "Jim", "lastname" => "Doe"]
    ];

    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if (count($result_rows) > 0) {
        echo "<h2>ผลลัพธ์การค้นหา:</h2>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>ชื่อ</th><th>นามสกุล</th></tr>";

        // แสดงข้อมูลแต่ละแถว
        foreach ($result_rows as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "ไม่พบข้อมูล<br>";
    }

    echo "<br>ปิดการเชื่อมต่อฐานข้อมูล (จำลอง)<br>";
}
?>
