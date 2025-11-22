<?php
echo "<h1>ข้อ 7: Prepared Statements (ป้องกัน SQL Injection)</h1>";

// ตัวอย่างอันตราย
echo "<h2>⚠️ วิธีที่ไม่ปลอดภัย (อันตราย!)</h2>";
echo "<pre>";
echo "// อันตราย! ถ้า \$email = \"'; DROP TABLE MyGuests; --\"\n";
echo "\$sql = \"INSERT INTO MyGuests (firstname, lastname, email) ";
echo "VALUES ('\$firstname', '\$lastname', '\$email')\";";
echo "</pre>";
echo "<p style='color:red;'>🚨 แฮกเกอร์สามารถลบตารางได้!</p>";

// ========================================
// MySQLi Prepared Statements
echo "<hr><h2>✅ วิธีที่ 1: MySQLi Prepared Statements</h2>";
echo "<pre>";
echo "// 1. เตรียม SQL (ใช้ ? แทนค่า)\n";
echo "\$stmt = \$conn->prepare(\"INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)\");\n\n";

echo "// 2. ผูกตัวแปร\n";
echo "\$stmt->bind_param(\"sss\", \$firstname, \$lastname, \$email);\n\n";

echo "// 3. กำหนดค่าและ execute หลายครั้ง\n";
echo "\$firstname = 'สมชาย'; \$lastname = 'ใจดี'; \$email = 'somchai@secure.com'; \$stmt->execute();\n";
echo "\$firstname = 'สมหญิง'; \$lastname = 'รักดี'; \$email = 'somying@secure.com'; \$stmt->execute();\n";
echo "\$firstname = 'วิชัย'; \$lastname = 'ทรงธรรม'; \$email = 'wichai@secure.com'; \$stmt->execute();\n";
echo "</pre>";
echo "<p>✅ เพิ่ม 3 รายการปลอดภัย (MySQLi)</p>";

// ========================================
// PDO Prepared Statements
echo "<hr><h2>✅ วิธีที่ 2: PDO Prepared Statements</h2>";
echo "<pre>";
echo "// 1. เตรียม SQL (ใช้ :name แทนค่า)\n";
echo "\$stmt = \$conn->prepare(\"INSERT INTO MyGuests (firstname, lastname, email) ";
echo "VALUES (:firstname, :lastname, :email)\");\n\n";

echo "// 2. ผูกตัวแปร\n";
echo "\$stmt->bindParam(':firstname', \$firstname);\n";
echo "\$stmt->bindParam(':lastname', \$lastname);\n";
echo "\$stmt->bindParam(':email', \$email);\n\n";

echo "// 3. กำหนดค่าและ execute\n";
echo "\$firstname = 'อนุชา'; \$lastname = 'มีสุข'; \$email = 'anucha@secure.com'; \$stmt->execute();\n";
echo "\$firstname = 'สุภาพร'; \$lastname = 'ดีงาม'; \$email = 'supaporn@secure.com'; \$stmt->execute();\n";
echo "</pre>";
echo "<p>✅ เพิ่มข้อมูลปลอดภัย (PDO)</p>";

// ========================================
// PDO แบบสั้น
echo "<hr><h2>📌 PDO แบบสั้น (ส่งค่าตอน execute)</h2>";
echo "<pre>";
echo "\$stmt = \$conn->prepare(\"INSERT INTO MyGuests (firstname, lastname, email) ";
echo "VALUES (:firstname, :lastname, :email)\");\n";
echo "\$stmt->execute([\n";
echo "    ':firstname' => 'ธนพล',\n";
echo "    ':lastname' => 'รุ่งเรือง',\n";
echo "    ':email' => 'tanapol@secure.com'\n";
echo "]);\n";
echo "</pre>";
echo "<p>✅ เพิ่มข้อมูลปลอดภัย (PDO แบบสั้น)</p>";

// ========================================
// สรุป
echo "<hr><h3>📌 สรุปความแตกต่าง</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>วิธี</th><th>Placeholder</th><th>Bind</th></tr>";
echo "<tr><td>MySQLi</td><td><code>?</code></td><td><code>bind_param('sss', \$a, \$b, \$c)</code></td></tr>";
echo "<tr><td>PDO</td><td><code>:name</code></td><td><code>bindParam(':name', \$var)</code></td></tr>";
echo "</table>";

echo "<h3>📌 ประเภทข้อมูล MySQLi</h3>";
echo "<ul>";
echo "<li><code>i</code> = integer (ตัวเลข)</li>";
echo "<li><code>d</code> = double (ทศนิยม)</li>";
echo "<li><code>s</code> = string (ข้อความ)</li>";
echo "<li><code>b</code> = blob (ไฟล์/รูปภาพ)</li>";
echo "</ul>";
?>
