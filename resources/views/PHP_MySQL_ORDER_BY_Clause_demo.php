<?php
// กำหนดตัวแปรการเชื่อมต่อ
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

echo "ตัวแปรการเชื่อมต่อ:<br>";
echo "Servername: $servername<br>";
echo "Username: $username<br>";
echo "Password: $password<br>";
echo "Database: $dbname<br><br>";

// แทนการสร้างการเชื่อมต่อจริง
echo "สร้างการเชื่อมต่อ: \$conn = new mysqli(\$servername, \$username, \$password, \$dbname);<br>";
echo "ตรวจสอบการเชื่อมต่อ:<br>";
echo "if (\$conn->connect_error) { die('การเชื่อมต่อล้มเหลว: ' . \$conn->connect_error); }<br><br>";

// คำสั่ง SQL
$sql = "SELECT id, firstname, lastname FROM MyGuests ORDER BY lastname ASC";
echo "คำสั่ง SQL: $sql<br><br>";

// แทนผลลัพธ์จากฐานข้อมูล
$mock_result = [
    ["id" => 1, "firstname" => "Somchai", "lastname" => "Suksan"],
    ["id" => 2, "firstname" => "Anong", "lastname" => "Chaiya"],
    ["id" => 3, "firstname" => "Pranee", "lastname" => "Yim"]
];

echo "<h2>รายชื่อเรียงตามนามสกุล (A-Z) - จำลองผลลัพธ์:</h2>";

if (count($mock_result) > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr style='background-color: #4CAF50; color: white;'>";
    echo "<th>ID</th><th>ชื่อ</th><th>นามสกุล</th>";
    echo "</tr>";
    
    foreach ($mock_result as $row) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "ไม่มีข้อมูล";
}

echo "<br>ปิดการเชื่อมต่อ: \$conn->close();<br>";
?>
