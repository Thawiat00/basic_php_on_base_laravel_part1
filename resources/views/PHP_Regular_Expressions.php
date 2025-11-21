<?php


// 1. preg_match() - ตรวจสอบว่าพบรูปแบบหรือไม่
$text = "Visit W3Schools";
$pattern = "/w3schools/i";  // i = case-insensitive

if(preg_match($pattern, $text)) {
    echo "เราใช้ regular ในการหา ข้อความ แล้วทำ อะไรสักอย่าง <br>";
    echo "พบคำว่า w3schools<br>";
}

// 2. preg_match_all() - นับจำนวนที่พบ
$text = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/ain/i";
$count = preg_match_all($pattern, $text);
echo "พบคำว่า 'ain' จำนวน $count ครั้ง<br>";

// 3. preg_replace() - แทนที่ข้อความ
$text = "Visit Microsoft!";
$pattern = "/microsoft/i";
$result = preg_replace($pattern, "W3Schools", $text);
echo $result . "<br>";


?>