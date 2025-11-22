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

// ตั้งค่า Pagination
$records_per_page = 5;  // แสดง 5 รายการต่อหน้า
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

// นับจำนวนข้อมูลทั้งหมด
$count_sql = "SELECT COUNT(*) as total FROM MyGuests";
$count_result = $conn->query($count_sql);
$total_records = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_records / $records_per_page);

// คำสั่ง SQL: ใช้ LIMIT และ OFFSET
$sql = "SELECT id, firstname, lastname, email 
        FROM MyGuests 
        ORDER BY id ASC 
        LIMIT $records_per_page OFFSET $offset";

$result = $conn->query($sql);

echo "<div style='font-family: Arial; max-width: 800px; margin: 0 auto;'>";
echo "<h2>ระบบแบ่งหน้าข้อมูล (Pagination)</h2>";
echo "<p>แสดง $records_per_page รายการต่อหน้า | ทั้งหมด $total_records รายการ</p>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10' style='width: 100%; border-collapse: collapse;'>";
    echo "<tr style='background-color: #4CAF50; color: white;'>";
    echo "<th>ID</th><th>ชื่อ</th><th>นามสกุล</th><th>อีเมล</th>";
    echo "</tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    // ปุ่มเปลี่ยนหน้า
    echo "<div style='margin-top: 20px; text-align: center;'>";
    
    // ปุ่มหน้าก่อนหน้า
    if ($current_page > 1) {
        echo "<a href='?page=" . ($current_page - 1) . "' style='padding: 10px 15px; background-color: #008CBA; color: white; text-decoration: none; margin: 5px;'>« ก่อนหน้า</a>";
    }
    
    // ปุ่มหมายเลขหน้า
    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $current_page) ? "background-color: #4CAF50;" : "background-color: #ddd; color: black;";
        echo "<a href='?page=$i' style='padding: 10px 15px; $active color: white; text-decoration: none; margin: 5px;'>$i</a>";
    }
    
    // ปุ่มหน้าถัดไป
    if ($current_page < $total_pages) {
        echo "<a href='?page=" . ($current_page + 1) . "' style='padding: 10px 15px; background-color: #008CBA; color: white; text-decoration: none; margin: 5px;'>ถัดไป »</a>";
    }
    
    echo "</div>";
    echo "<p style='text-align: center; margin-top: 10px;'>หน้าที่ $current_page จาก $total_pages</p>";
    
} else {
    echo "ไม่มีข้อมูล";
}

echo "</div>";

$conn->close();
?>