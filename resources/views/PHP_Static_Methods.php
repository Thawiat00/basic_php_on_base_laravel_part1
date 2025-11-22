<?php
// ============================================
// ตัวอย่างที่ 1: Static Method พื้นฐาน
// ============================================

class MathHelper {
    // Static method บวกเลข
    public static function add($a, $b) {
        return $a + $b;
    }
    
    // Static method คูณเลข
    public static function multiply($a, $b) {
        return $a * $b;
    }
    
    // Static method หาค่าเฉลี่ย
    public static function average($numbers) {
        $sum = array_sum($numbers);
        $count = count($numbers);
        return $sum / $count;
    }
}

// ============================================
// ตัวอย่างที่ 2: เรียกใช้ Static Method ภายในคลาส
// ============================================

class Calculator {
    public static function square($num) {
        return $num * $num;
    }
    
    public static function cube($num) {
        // เรียกใช้ static method ด้วย self::
        $squared = self::square($num);
        return $squared * $num;
    }
    
    // Constructor เรียก static method
    public function __construct($num) {
        echo "กำลังสอง: " . self::square($num) . "<br>";
        echo "กำลังสาม: " . self::cube($num) . "<br>";
    }
}

// ============================================
// ตัวอย่างที่ 3: Static Method ระหว่างคลาส
// ============================================

class Database {
    public static function connect() {
        return "เชื่อมต่อฐานข้อมูลสำเร็จ!";
    }
}

class UserService {
    public function login($username) {
        // เรียก static method จากคลาสอื่น
        $connection = Database::connect();
        return "$connection<br>ผู้ใช้ '$username' เข้าสู่ระบบแล้ว<br>";
    }
}

// ============================================
// ตัวอย่างที่ 4: Static Method กับการสืบทอด
// ============================================

class Animal {
    protected static function getType() {
        return "สัตว์";
    }
    
    public static function showType() {
        return "ประเภท: " . self::getType();
    }
}

class Dog extends Animal {
    // Override static method
    protected static function getType() {
        return "สุนัข";
    }
    
    public function displayInfo() {
        // เรียก static method จาก parent class
        echo parent::showType() . " (จาก parent)<br>";
        echo "ประเภท: " . self::getType() . " (จาก child)<br>";
    }
}

// ============================================
// ตัวอย่างที่ 5: Static Method แบบ Utility
// ============================================

class StringHelper {
    public static function toUpperCase($text) {
        return strtoupper($text);
    }
    
    public static function toLowerCase($text) {
        return strtolower($text);
    }
    
    public static function reverseString($text) {
        return strrev($text);
    }
    
    public static function countWords($text) {
        return str_word_count($text);
    }
}

// ============================================
// ทดสอบการทำงาน
// ============================================

echo "<h2>ตัวอย่างการใช้ Static Methods</h2>";
echo "<hr>";

// ทดสอบ MathHelper
echo "<strong>1. MathHelper:</strong><br>";
echo "5 + 3 = " . MathHelper::add(5, 3) . "<br>";
echo "5 × 3 = " . MathHelper::multiply(5, 3) . "<br>";
echo "ค่าเฉลี่ย [10, 20, 30] = " . MathHelper::average([10, 20, 30]) . "<br>";

echo "<hr>";

// ทดสอบ Calculator
echo "<strong>2. Calculator:</strong><br>";
echo "คำนวณเลข 5:<br>";
new Calculator(5);

echo "<hr>";

// ทดสอบ UserService
echo "<strong>3. UserService:</strong><br>";
$userService = new UserService();
echo $userService->login("สมชาย");

echo "<hr>";

// ทดสอบการสืบทอด
echo "<strong>4. การสืบทอด Static Methods:</strong><br>";
echo Animal::showType() . "<br>";
$dog = new Dog("dog_s");
$dog->displayInfo();

echo "<hr>";

// ทดสอบ StringHelper
echo "<strong>5. StringHelper:</strong><br>";
$text = "Hello PHP World";
echo "ข้อความ: $text<br>";
echo "ตัวพิมพ์ใหญ่: " . StringHelper::toUpperCase($text) . "<br>";
echo "ตัวพิมพ์เล็ก: " . StringHelper::toLowerCase($text) . "<br>";
echo "กลับด้าน: " . StringHelper::reverseString($text) . "<br>";
echo "จำนวนคำ: " . StringHelper::countWords($text) . " คำ<br>";

echo "<hr>";
echo "<strong>สรุป:</strong> Static Methods เรียกใช้ได้โดยตรงจากชื่อคลาส ไม่ต้องสร้าง object!";
?>