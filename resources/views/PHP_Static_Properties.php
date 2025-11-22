<?php
// ============================================
// ตัวอย่างที่ 1: Static Property พื้นฐาน
// ============================================

class Config {
    public static $appName = "My PHP App";
    public static $version = "1.0.0";
    public static $author = "Developer";
    
    public static function showInfo() {
        echo "ชื่อแอป: " . self::$appName . "<br>";
        echo "เวอร์ชัน: " . self::$version . "<br>";
        echo "ผู้พัฒนา: " . self::$author . "<br>";
    }
}

// ============================================
// ตัวอย่างที่ 2: นับจำนวน Object ที่สร้าง
// ============================================

class User {
    public static $userCount = 0;
    public $name;
    
    public function __construct($name) {
        $this->name = $name;
        self::$userCount++; // เพิ่มจำนวนทุกครั้งที่สร้าง object
    }
    
    public static function getTotalUsers() {
        return self::$userCount;
    }
    
    public function showInfo() {
        echo "ผู้ใช้: {$this->name} (รวม " . self::$userCount . " คน)<br>";
    }
}

// ============================================
// ตัวอย่างที่ 3: Static Property กับค่าคงที่
// ============================================

class MathConstants {
    public static $PI = 3.14159;
    public static $E = 2.71828;
    public static $GOLDEN_RATIO = 1.61803;
    
    public static function calculateCircleArea($radius) {
        return self::$PI * $radius * $radius;
    }
    
    public static function calculateCircleCircumference($radius) {
        return 2 * self::$PI * $radius;
    }
}

// ============================================
// ตัวอย่างที่ 4: Static Property กับการสืบทอด
// ============================================

class Vehicle {
    public static $totalVehicles = 0;
    
    public function __construct() {
        self::$totalVehicles++;
    }
    
    public static function getTotal() {
        return self::$totalVehicles;
    }
}

class Car extends Vehicle {
    public static $carCount = 0;
    
    public function __construct() {
        parent::__construct(); // เรียก constructor ของ parent
        self::$carCount++;
    }
    
    public static function showStats() {
        echo "รถยนต์ทั้งหมด: " . self::$carCount . "<br>";
        echo "ยานพาหนะทั้งหมด: " . parent::$totalVehicles . "<br>";
    }
}

// ============================================
// ตัวอย่างที่ 5: Database Connection Pool
// ============================================

class DatabaseConnection {
    public static $maxConnections = 10;
    public static $activeConnections = 0;
    private static $connections = [];
    
    public static function connect() {
        if (self::$activeConnections < self::$maxConnections) {
            self::$activeConnections++;
            $connId = "CONN_" . self::$activeConnections;
            self::$connections[] = $connId;
            return "เชื่อมต่อ $connId สำเร็จ!";
        } else {
            return "เต็มแล้ว! สูงสุด " . self::$maxConnections . " การเชื่อมต่อ";
        }
    }
    
    public static function getStatus() {
        echo "การเชื่อมต่อปัจจุบัน: " . self::$activeConnections . "/" . self::$maxConnections . "<br>";
        echo "รายการ: " . implode(", ", self::$connections) . "<br>";
    }
}

// ============================================
// ทดสอบการทำงาน
// ============================================

echo "<h2>ตัวอย่างการใช้ Static Properties</h2>";
echo "<hr>";

// ทดสอบ Config
echo "<strong>1. Config Class:</strong><br>";
echo "ชื่อแอป: " . Config::$appName . "<br>";
echo "เวอร์ชัน: " . Config::$version . "<br>";
Config::showInfo();

echo "<hr>";

// ทดสอบการนับ User
echo "<strong>2. นับจำนวน Users:</strong><br>";
$user1 = new User("สมชาย");
$user1->showInfo();

$user2 = new User("สมหญิง");
$user2->showInfo();

$user3 = new User("สมศักดิ์");
$user3->showInfo();

echo "จำนวนผู้ใช้ทั้งหมด: " . User::getTotalUsers() . " คน<br>";

echo "<hr>";

// ทดสอบ MathConstants
echo "<strong>3. MathConstants:</strong><br>";
$radius = 5;
echo "รัศมี = $radius<br>";
echo "พื้นที่วงกลม = " . MathConstants::calculateCircleArea($radius) . "<br>";
echo "เส้นรอบวง = " . MathConstants::calculateCircleCircumference($radius) . "<br>";
echo "ค่า PI = " . MathConstants::$PI . "<br>";

echo "<hr>";

// ทดสอบการสืบทอด
echo "<strong>4. การสืบทอด Static Properties:</strong><br>";
$car1 = new Car();
$car2 = new Car();
$car3 = new Car();
Car::showStats();

echo "<hr>";

// ทดสอบ Database Connection Pool
echo "<strong>5. Database Connection Pool:</strong><br>";
echo DatabaseConnection::connect() . "<br>";
echo DatabaseConnection::connect() . "<br>";
echo DatabaseConnection::connect() . "<br>";
DatabaseConnection::getStatus();

echo "<hr>";
echo "<strong>สรุป:</strong> Static Properties แชร์ค่าร่วมกันทั้งคลาส เหมาะสำหรับเก็บข้อมูลที่ใช้ร่วมกัน!";
?>