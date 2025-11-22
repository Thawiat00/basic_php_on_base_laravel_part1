<?php
echo "// ========================================<br>";
echo "// ข้อ 3: การสร้างตาราง MySQL<br>";
echo "// ========================================<br><br>";

echo "\$servername = 'localhost';<br>";
echo "\$username = 'root';<br>";
echo "\$password = '';<br>";
echo "\$dbname = 'myDB';<br><br>";

echo "<h2>วิธีที่ 1: MySQLi OOP</h2>";
echo "\$conn1 = new mysqli(\$servername, \$username, \$password, \$dbname);<br><br>";

echo "// คำสั่งสร้างตาราง MyGuests<br>";
echo "CREATE TABLE IF NOT EXISTS MyGuests (<br>";
echo "&nbsp;&nbsp;id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,<br>";
echo "&nbsp;&nbsp;firstname VARCHAR(30) NOT NULL,<br>";
echo "&nbsp;&nbsp;lastname VARCHAR(30) NOT NULL,<br>";
echo "&nbsp;&nbsp;email VARCHAR(50),<br>";
echo "&nbsp;&nbsp;reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP<br>";
echo ");<br><br>";

echo "<h2>วิธีที่ 2: MySQLi Procedural</h2>";
echo "mysqli_connect(\$servername, \$username, \$password, \$dbname);<br><br>";

echo "// คำสั่งสร้างตาราง Products<br>";
echo "CREATE TABLE IF NOT EXISTS Products (<br>";
echo "&nbsp;&nbsp;product_id INT AUTO_INCREMENT PRIMARY KEY,<br>";
echo "&nbsp;&nbsp;product_name VARCHAR(100) NOT NULL,<br>";
echo "&nbsp;&nbsp;price DECIMAL(10,2) NOT NULL,<br>";
echo "&nbsp;&nbsp;stock INT DEFAULT 0,<br>";
echo "&nbsp;&nbsp;created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP<br>";
echo ");<br><br>";

echo "<h2>วิธีที่ 3: PDO</h2>";
echo "\$conn3 = new PDO(\"mysql:host=\$servername;dbname=myDBPDO\", \$username, \$password);<br><br>";

echo "// คำสั่งสร้างตาราง MyGuests แบบ PDO<br>";
echo "CREATE TABLE IF NOT EXISTS MyGuests (<br>";
echo "&nbsp;&nbsp;id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,<br>";
echo "&nbsp;&nbsp;firstname VARCHAR(30) NOT NULL,<br>";
echo "&nbsp;&nbsp;lastname VARCHAR(30) NOT NULL,<br>";
echo "&nbsp;&nbsp;email VARCHAR(50),<br>";
echo "&nbsp;&nbsp;reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP<br>";
echo ");<br><br>";

echo "<hr><h3>📌 อธิบาย Data Types:</h3>";

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ประเภท</th><th>ความหมาย</th></tr>";
echo "<tr><td>INT(6)</td><td>ตัวเลข 6 หลัก</td></tr>";
echo "<tr><td>VARCHAR(30)</td><td>ข้อความไม่เกิน 30 ตัวอักษร</td></tr>";
echo "<tr><td>DECIMAL(10,2)</td><td>ทศนิยม 10 หลัก, จุดทศนิยม 2 ตำแหน่ง</td></tr>";
echo "<tr><td>TIMESTAMP</td><td>บันทึกวันเวลา</td></tr>";
echo "<tr><td>AUTO_INCREMENT</td><td>เลขรันอัตโนมัติ</td></tr>";
echo "<tr><td>PRIMARY KEY</td><td>กุญแจหลัก (ไม่ซ้ำ)</td></tr>";
echo "<tr><td>NOT NULL</td><td>ห้ามเป็นค่าว่าง</td></tr>";
echo "<tr><td>DEFAULT</td><td>ค่าเริ่มต้น</td></tr>";
echo "</table>";
?>
