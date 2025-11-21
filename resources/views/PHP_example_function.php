<?php
declare(strict_types=1);

echo "<h2>PHP Functions - ตัวอย่างครบถ้วน</h2>";

// 1. ฟังก์ชันพื้นฐาน
function greet() {
    echo "สวัสดีครับ!<br>";
}
greet();

// 2. ฟังก์ชันรับพารามิเตอร์
function introduce($name, $age = 18) {
    echo "ชื่อ: $name, อายุ: $age ปี<br>";
}
introduce("สมชาย", 25);
introduce("สมหญิง");  // ใช้ default age

// 3. ฟังก์ชัน Return ค่า
function calculate($a, $b, $operation = "add") {
    switch($operation) {
        case "add": return $a + $b;
        case "multiply": return $a * $b;
        default: return 0;
    }
}
echo "5 + 3 = " . calculate(5, 3) . "<br>";
echo "5 × 3 = " . calculate(5, 3, "multiply") . "<br>";

// 4. Pass by Reference
function increment(&$number) {
    $number++;
}
$count = 10;
increment($count);
echo "Count หลัง increment: $count<br>";

// 5. Variadic Function
function findMax(...$numbers) {
    if(empty($numbers)) return null;
    $max = $numbers[0];
    foreach($numbers as $num) {
        if($num > $max) $max = $num;
    }
    return $max;
}
echo "ค่ามากสุด: " . findMax(3, 7, 2, 9, 1, 15, 4) . "<br>";

// 6. Type Declaration
function divide(float $a, float $b): float {
    if($b == 0) return 0;
    return $a / $b;
}

echo "10 ÷ 3 = " . divide(10, 3);
?>
