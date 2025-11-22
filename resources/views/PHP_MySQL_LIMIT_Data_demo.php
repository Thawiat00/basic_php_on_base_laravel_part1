<?php
// ================================================
// ตัวแปรสำหรับเชื่อมต่อฐานข้อมูล (จำลอง)
// ================================================
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

echo "<p>Servername: $servername</p>";
echo "<p>Username: $username</p>";
echo "<p>Password: $password</p>";
echo "<p>Database: $dbname</p>";

// ================================================
// ตัวแปร Pagination
// ================================================
$records_per_page = 5; // จำนวนรายการต่อหน้า
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; // หน้าแรก=1
$offset = ($current_page - 1) * $records_per_page; // offset สำหรับ SQL

echo "<p>Records per page: $records_per_page</p>";
echo "<p>Current page: $current_page</p>";
echo "<p>Offset: $offset</p>";

// ================================================
// ตัวแปรจำลองผลลัพธ์จากฐานข้อมูล
// ================================================
$total_records = 23; // จำนวนข้อมูลทั้งหมดในตาราง
$total_pages = ceil($total_records / $records_per_page); // จำนวนหน้าทั้งหมด

echo "<p>Total records: $total_records</p>";
echo "<p>Total pages: $total_pages</p>";

// ================================================
// จำลองข้อมูลที่ดึงมาจาก SQL
// ================================================
$mock_data = [
    ["id"=>1,"firstname"=>"Somchai","lastname"=>"Sukjai","email"=>"somchai@example.com"],
    ["id"=>2,"firstname"=>"Suda","lastname"=>"Yimyaem","email"=>"suda@example.com"],
    ["id"=>3,"firstname"=>"Niran","lastname"=>"Chaiya","email"=>"niran@example.com"],
    ["id"=>4,"firstname"=>"Malee","lastname"=>"Thong","email"=>"malee@example.com"],
    ["id"=>5,"firstname"=>"Anan","lastname"=>"Decha","email"=>"anan@example.com"],
    ["id"=>6,"firstname"=>"Pim","lastname"=>"Srisuk","email"=>"pim@example.com"],
    ["id"=>7,"firstname"=>"Krit","lastname"=>"Suwan","email"=>"krit@example.com"]
    // ... สามารถเพิ่มข้อมูลจำลองได้ตามต้องการ
];

// เลือกข้อมูลตามหน้า
$start = $offset;
$end = min($offset + $records_per_page, count($mock_data));
$current_data = array_slice($mock_data, $start, $records_per_page);

echo "<div style='font-family: Arial; max-width: 800px; margin: 0 auto;'>";
echo "<h2>ระบบแบ่งหน้าข้อมูล (Pagination)</h2>";
echo "<p>แสดง $records_per_page รายการต่อหน้า | ทั้งหมด $total_records รายการ</p>";

if (!empty($current_data)) {
    echo "<table border='1' cellpadding='10' style='width: 100%; border-collapse: collapse;'>";
    echo "<tr style='background-color: #4CAF50; color: white;'>";
    echo "<th>ID</th><th>ชื่อ</th><th>นามสกุล</th><th>อีเมล</th>";
    echo "</tr>";
    
    foreach ($current_data as $row) {
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
        $prev_page = $current_page - 1;
        echo "<a href='?page=$prev_page' style='padding: 10px 15px; background-color: #008CBA; color: white; text-decoration: none; margin: 5px;'>« ก่อนหน้า</a>";
        echo "<p>Prev page variable: $prev_page</p>";
    }
    
    // ปุ่มหมายเลขหน้า
    for ($i = 1; $i <= $total_pages; $i++) {
        $active_style = ($i == $current_page) ? "background-color: #4CAF50; color: white;" : "background-color: #ddd; color: black;";
        echo "<a href='?page=$i' style='padding: 10px 15px; $active_style text-decoration: none; margin: 5px;'>$i</a>";
        echo "<p>Page button variable: $i</p>";
    }
    
    // ปุ่มหน้าถัดไป
    if ($current_page < $total_pages) {
        $next_page = $current_page + 1;
        echo "<a href='?page=$next_page' style='padding: 10px 15px; background-color: #008CBA; color: white; text-decoration: none; margin: 5px;'>ถัดไป »</a>";
        echo "<p>Next page variable: $next_page</p>";
    }
    
    echo "</div>";
    echo "<p style='text-align: center; margin-top: 10px;'>หน้าที่ $current_page จาก $total_pages</p>";
    
} else {
    echo "<p>ไม่มีข้อมูล</p>";
}

echo "</div>";
?>
