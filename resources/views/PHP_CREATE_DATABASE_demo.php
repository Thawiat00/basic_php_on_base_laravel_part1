<?php
echo "<h2>วิธีที่ 1: MySQLi แบบ OOP</h2>";
echo "\$servername = 'localhost';<br>";
echo "\$username = 'root';<br>";
echo "\$password = '';<br><br>";

echo "// สร้างการเชื่อมต่อ (ไม่ต้องระบุฐานข้อมูล)<br>";
echo "\$conn1 = new mysqli(\$servername, \$username, \$password);<br><br>";

echo "// สร้างฐานข้อมูล<br>";
echo "\$sql = \"CREATE DATABASE IF NOT EXISTS myDB\";<br>";
echo "\$conn1->query(\$sql);<br><br>";

echo "<h2>วิธีที่ 2: MySQLi แบบ Procedural</h2>";
echo "mysqli_connect(\$servername, \$username, \$password);<br>";
echo "\$sql = \"CREATE DATABASE IF NOT EXISTS myDB2\";<br>";
echo "mysqli_query(\$conn2, \$sql);<br><br>";

echo "<h2>วิธีที่ 3: PDO</h2>";
echo "\$conn3 = new PDO(\"mysql:host=\$servername\", \$username, \$password);<br>";
echo "\$sql = \"CREATE DATABASE IF NOT EXISTS myDBPDO\";<br>";
echo "\$conn3->exec(\$sql);<br><br>";

echo "<hr><h3>📌 สรุป:</h3>";
echo "<ul>";
echo "<li>ใช้ <code>CREATE DATABASE ชื่อฐานข้อมูล</code></li>";
echo "<li>เพิ่ม <code>IF NOT EXISTS</code> เพื่อป้องกัน error</li>";
echo "<li>MySQLi: ใช้ <code>query()</code></li>";
echo "<li>PDO: ใช้ <code>exec()</code></li>";
echo "</ul>";
?>
