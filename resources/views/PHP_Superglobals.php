<?php
// 1. $GLOBALS - เข้าถึงตัวแปร global
$x = 100;
function test1() {
    echo $GLOBALS['x'];  // 100
}

// 2. $_SERVER - ข้อมูลเซิร์ฟเวอร์
echo $_SERVER['PHP_SELF'] . "<br>";
echo $_SERVER['SERVER_NAME'] . "<br>";
echo $_SERVER['REQUEST_METHOD'] . "<br>";

// 3. $_GET - รับข้อมูลจาก URL
// example.php?name=John&age=25
$name = $_GET['name'] ?? 'Guest';
echo "Hello, $name";

// 4. $_POST - รับข้อมูลจาก Form
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    echo "Welcome, $username";
}

// 5. $_REQUEST - รวม GET, POST, COOKIE
$data = $_REQUEST['field_name'] ?? '';
?>