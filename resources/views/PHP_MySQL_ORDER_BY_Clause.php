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

// คำสั่ง SQL: เรียงตามนามสกุล
$sql = "SELECT id, firstname, lastname FROM MyGuests ORDER BY lastname ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>รายชื่อเรียงตามนามสกุล (A-Z):</h2>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr style='background-color: #4CAF50; color: white;'>";
    echo "<th>ID</th><th>ชื่อ</th><th>นามสกุล</th>";
    echo "</tr>";
    
    while($row = $result->fetch_assoc()) {
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

$conn->close();
?>