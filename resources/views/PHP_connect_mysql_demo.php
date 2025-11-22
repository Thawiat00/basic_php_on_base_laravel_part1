<?php
echo "<h2>วิธีที่ 1: MySQLi แบบ Object-Oriented</h2>";
echo "\$servername = 'localhost';<br>";
echo "\$username = 'root';<br>";
echo "\$password = '';<br>";
echo "\$dbname = 'testdb';<br>";
echo 'โค้ดตัวอย่าง: <br>';
echo 'new mysqli($servername, $username, $password, $dbname);<br><br>';

echo "<h2>วิธีที่ 2: MySQLi แบบ Procedural</h2>";
echo 'mysqli_connect($servername, $username, $password, $dbname);<br><br>';

echo "<h2>วิธีที่ 3: PDO (แนะนำ)</h2>";
echo 'new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);<br>';
echo "ข้อดี PDO: รองรับหลายฐานข้อมูล ปลอดภัยกว่า MySQLi<br><br>";

echo "<hr><h3>📌 สรุป:</h3>";
echo "<ul>";
echo "<li><strong>MySQLi OOP:</strong> ใช้ \$conn->method()</li>";
echo "<li><strong>MySQLi Procedural:</strong> ใช้ mysqli_function(\$conn)</li>";
echo "<li><strong>PDO:</strong> รองรับหลายฐานข้อมูล ใช้ try-catch</li>";
echo "</ul>";
?>
