<?php
echo "<h2>ข้อ 5: PHP Operators (ตัวดำเนินการ)</h2>";

// ==========================================
// 1. Arithmetic Operators (ตัวดำเนินการคำนวณ)
// ==========================================
echo "<h3>5.1 Arithmetic Operators</h3>";
$x = 10;
$y = 3;

echo "$x + $y = " . ($x + $y) . " (บวก)<br>";
echo "$x - $y = " . ($x - $y) . " (ลบ)<br>";
echo "$x * $y = " . ($x * $y) . " (คูณ)<br>";
echo "$x / $y = " . ($x / $y) . " (หาร)<br>";
echo "$x % $y = " . ($x % $y) . " (หารเอาเศษ - Modulus)<br>";
echo "$x ** $y = " . ($x ** $y) . " (ยกกำลัง - 10³)<br><br>";

// ==========================================
// 2. Assignment Operators (ตัวดำเนินการกำหนดค่า)
// ==========================================
echo "<h3>5.2 Assignment Operators</h3>";

$a = 10;
echo "a = $a<br>";

$a += 5; // เหมือน $a = $a + 5
echo "a += 5 → a = $a<br>";

$a -= 3; // เหมือน $a = $a - 3
echo "a -= 3 → a = $a<br>";

$a *= 2; // เหมือน $a = $a * 2
echo "a *= 2 → a = $a<br>";

$a /= 4; // เหมือน $a = $a / 4
echo "a /= 4 → a = $a<br>";

$a %= 5; // เหมือน $a = $a % 5
echo "a %= 5 → a = $a<br><br>";

// ==========================================
// 3. Comparison Operators (ตัวเปรียบเทียบ)
// ==========================================
echo "<h3>5.3 Comparison Operators</h3>";

$num1 = 10;
$num2 = "10";
$num3 = 20;

echo "num1 = $num1 (integer), num2 = '$num2' (string), num3 = $num3<br><br>";

echo "num1 == num2: " . ($num1 == $num2 ? "true" : "false") . " (เท่ากันหรือไม่ - ไม่สนใจชนิดข้อมูล)<br>";
echo "num1 === num2: " . ($num1 === $num2 ? "true" : "false") . " (เหมือนกันทุกอย่างรวมชนิดข้อมูล)<br>";
echo "num1 != num3: " . ($num1 != $num3 ? "true" : "false") . " (ไม่เท่ากัน)<br>";
echo "num1 !== num2: " . ($num1 !== $num2 ? "true" : "false") . " (ไม่เหมือนกัน - ต่างชนิดข้อมูล)<br>";
echo "num1 > num3: " . ($num1 > $num3 ? "true" : "false") . " (มากกว่า)<br>";
echo "num1 < num3: " . ($num1 < $num3 ? "true" : "false") . " (น้อยกว่า)<br>";
echo "num1 >= 10: " . ($num1 >= 10 ? "true" : "false") . " (มากกว่าหรือเท่ากับ)<br>";
echo "num1 <= 9: " . ($num1 <= 9 ? "true" : "false") . " (น้อยกว่าหรือเท่ากับ)<br>";

// Spaceship Operator (PHP 7+)
echo "num1 <=> num3: " . ($num1 <=> $num3) . " (-1=น้อยกว่า, 0=เท่ากับ, 1=มากกว่า)<br><br>";

// ==========================================
// 4. Increment/Decrement Operators
// ==========================================
echo "<h3>5.4 Increment/Decrement Operators</h3>";

$i = 5;
echo "เริ่มต้น: i = $i<br>";

echo "++i (Pre-increment): " . (++$i) . " → i = $i<br>";

$i = 5;
echo "i++ (Post-increment): " . ($i++) . " → i = $i<br>";

$i = 5;
echo "--i (Pre-decrement): " . (--$i) . " → i = $i<br>";

$i = 5;
echo "i-- (Post-decrement): " . ($i--) . " → i = $i<br><br>";

// ==========================================
// 5. Logical Operators (ตัวดำเนินการตรรกะ)
// ==========================================
echo "<h3>5.5 Logical Operators</h3>";

$t = true;
$f = false;

echo "true && true: " . (($t && $t) ? "true" : "false") . " (และ - ต้องจริงทั้งสอง)<br>";
echo "true && false: " . (($t && $f) ? "true" : "false") . "<br>";
echo "true || false: " . (($t || $f) ? "true" : "false") . " (หรือ - จริงอย่างใดอย่างหนึ่ง)<br>";
echo "false || false: " . (($f || $f) ? "true" : "false") . "<br>";
echo "true xor false: " . (($t xor $f) ? "true" : "false") . " (จริงแค่อันเดียว)<br>";
echo "true xor true: " . (($t xor $t) ? "true" : "false") . "<br>";
echo "!true: " . ((!$t) ? "true" : "false") . " (ไม่ใช่)<br>";
echo "!false: " . ((!$f) ? "true" : "false") . "<br><br>";

// ตัวอย่างการใช้งานจริง
$age = 25;
$hasLicense = true;

if ($age >= 18 && $hasLicense) {
    echo "✓ สามารถขับรถได้<br>";
} else {
    echo "✗ ไม่สามารถขับรถได้<br>";
}
echo "<br>";

// ==========================================
// 6. String Operators (ตัวดำเนินการข้อความ)
// ==========================================
echo "<h3>5.6 String Operators</h3>";

$firstName = "John";
$lastName = "Doe";

// Concatenation (.)
$fullName = $firstName . " " . $lastName;
echo "ชื่อเต็ม: $fullName<br>";

// Concatenation Assignment (.=)
$text = "Hello";
$text .= " World";
$text .= "!";
echo "ข้อความ: $text<br><br>";

// ==========================================
// 7. Array Operators (ตัวดำเนินการอาร์เรย์)
// ==========================================
echo "<h3>5.7 Array Operators</h3>";

$arr1 = array("a" => "red", "b" => "green");
$arr2 = array("c" => "blue", "d" => "yellow");
$arr3 = array("a" => "red", "b" => "green");

// Union (+)
$union = $arr1 + $arr2;
echo "arr1 + arr2: ";
print_r($union);
echo "<br>";

// Equality (==)
echo "arr1 == arr3: " . ($arr1 == $arr3 ? "true" : "false") . "<br>";

// Identity (===)
echo "arr1 === arr3: " . ($arr1 === $arr3 ? "true" : "false") . "<br>";

// Inequality (!=)
echo "arr1 != arr2: " . ($arr1 != $arr2 ? "true" : "false") . "<br><br>";

// ==========================================
// 8. Conditional Assignment Operators
// ==========================================
echo "<h3>5.8 Conditional Assignment Operators</h3>";

// Ternary Operator (?:)
$score = 75;
$grade = ($score >= 50) ? "ผ่าน" : "ไม่ผ่าน";
echo "คะแนน: $score → ผลลัพธ์: $grade<br>";

$age2 = 20;
$status = ($age2 >= 18) ? "ผู้ใหญ่" : "เด็ก";
echo "อายุ: $age2 → สถานะ: $status<br><br>";

// Null Coalescing Operator (??) - PHP 7+
$username = null;
$displayName = $username ?? "Guest";
echo "ชื่อผู้ใช้: $displayName<br>";

$color = "red";
$selectedColor = $color ?? "blue";
echo "สีที่เลือก: $selectedColor<br><br>";

// ==========================================
// 9. ตัวอย่างการใช้งานจริง
// ==========================================
echo "<h3>5.9 ตัวอย่างการใช้งานรวม</h3>";

// คำนวณราคาสินค้า
$price = 1000;
$quantity = 3;
$discount = 10; // %

$total = $price * $quantity;
$discountAmount = $total * ($discount / 100);
$finalPrice = $total - $discountAmount;

echo "ราคาต่อชิ้น: $price บาท<br>";
echo "จำนวน: $quantity ชิ้น<br>";
echo "รวม: $total บาท<br>";
echo "ส่วนลด $discount%: $discountAmount บาท<br>";
echo "ยอดชำระ: $finalPrice บาท<br><br>";

// ตรวจสอบเงื่อนไข
$stock = 5;
$orderQty = 3;

if ($stock >= $orderQty && $orderQty > 0) {
    echo "✓ สามารถสั่งซื้อได้<br>";
    $remaining = $stock - $orderQty;
    echo "คงเหลือ: $remaining ชิ้น<br>";
} else {
    echo "✗ สินค้าไม่เพียงพอ<br>";
}

echo "<hr>";
?>