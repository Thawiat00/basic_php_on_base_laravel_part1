<?php
echo "<h2>PHP Superglobals & Regex - ตัวอย่างครบถ้วน</h2>";

// ========== PART 1: SUPERGLOBALS ==========
echo "<h3>PART 1: Superglobals</h3>";

// 1. $GLOBALS
$website = "MyWebsite.com";
$year = 2024;

function showInfo() {
    // ใช้ global หรือ $GLOBALS ก็ได้
    global $website, $year;
    echo "Welcome to $website (Est. $year)<br>";
}
showInfo();

// 2. $_SERVER
echo "<h4>Server Information:</h4>";
echo "Script Name: " . $_SERVER['PHP_SELF'] . "<br>";
echo "Server Name: " . $_SERVER['SERVER_NAME'] . "<br>";
echo "Request Method: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";

// 3. Form ตัวอย่าง (GET & POST)
?>
<h4>3. Form Example</h4>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>ชื่อ: <input type="text" name="fullname" required></label><br>
    <label>อีเมล: <input type="email" name="email" required></label><br>
    <label>เบอร์โทร: <input type="text" name="phone" required></label><br>
    <button type="submit">ส่งข้อมูล</button>
</form>

<?php
// ประมวลผล Form
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = htmlspecialchars($_POST['fullname'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    
    echo "<div style='background:#d4edda;padding:10px;margin:10px 0;'>";
    echo "<strong>ข้อมูลที่รับ:</strong><br>";
    echo "ชื่อ: $fullname<br>";
    echo "อีเมล: $email<br>";
    echo "เบอร์โทร: $phone<br>";
    echo "</div>";
}

// ========== PART 2: REGULAR EXPRESSIONS ==========
echo "<h3>PART 2: Regular Expressions</h3>";

// ฟังก์ชัน Validation
function validateData($data, $type) {
    $patterns = [
        'email' => "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",
        'phone' => "/^[0-9]{10}$/",
        'password' => "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/",
        'url' => "/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/",
        'thai_id' => "/^[0-9]{13}$/"
    ];
    
    return preg_match($patterns[$type], $data);
}

// ทดสอบ Validation
$test_data = [
    ['email', 'test@example.com'],
    ['email', 'invalid-email'],
    ['phone', '0812345678'],
    ['phone', '081234567'],  // ไม่ครบ 10 หลัก
    ['password', 'Pass123!@#'],
    ['password', '12345'],  // ไม่ผ่าน
    ['url', 'https://www.example.com'],
    ['thai_id', '1234567890123']
];

echo "<table border='1' style='border-collapse:collapse;'>";
echo "<tr><th>ประเภท</th><th>ข้อมูล</th><th>ผลลัพธ์</th></tr>";

foreach($test_data as $test) {
    $type = $test[0];
    $value = $test[1];
    $result = validateData($value, $type) ? 
        "<span style='color:green'>✓ ถูกต้อง</span>" : 
        "<span style='color:red'>✗ ไม่ถูกต้อง</span>";
    
    echo "<tr>";
    echo "<td>$type</td>";
    echo "<td>$value</td>";
    echo "<td>$result</td>";
    echo "</tr>";
}
echo "</table>";

// Regex Search & Replace
echo "<h4>Search & Replace Example:</h4>";
$text = "เบอร์โทรติดต่อ: 081-234-5678 หรือ 02-123-4567";
$pattern = "/(\d{2,3})-(\d{3})-(\d{4})/";
$replacement = "($1) $2-$3";
$formatted = preg_replace($pattern, $replacement, $text);
echo "ก่อน: $text<br>";
echo "หลัง: $formatted<br>";

// นับคำในข้อความ
echo "<h4>Word Count Example:</h4>";
$sentence = "PHP is powerful. PHP is flexible. PHP is easy to learn.";
$word = "PHP";
$pattern = "/$word/i";
$count = preg_match_all($pattern, $sentence);
echo "ประโยค: \"$sentence\"<br>";
echo "พบคำว่า '$word' จำนวน <strong>$count</strong> ครั้ง";
?>
