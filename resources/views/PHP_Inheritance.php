<?php
// ===============================
// ข้อ 5: PHP OOP - Inheritance
// ===============================

// คลาสแม่: Vehicle (ยานพาหนะ)
class Vehicle {
    public $brand;
    public $model;
    public $year;
    protected $speed;
    private $engine_number; // private ไม่ถูกสืบทอด
    
    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->speed = 0;
        $this->engine_number = "ENG" . rand(10000, 99999);
    }
    
    // Method ที่จะถูกสืบทอด
    public function start() {
        echo "🔑 เปิดเครื่องยนต์ {$this->brand} {$this->model}<br>";
    }
    
    public function stop() {
        echo "🛑 ดับเครื่องยนต์<br>";
        $this->speed = 0;
    }
    
    public function accelerate($increase) {
        $this->speed += $increase;
        echo "⚡ เร่งความเร็ว +{$increase} km/h (ปัจจุบัน: {$this->speed} km/h)<br>";
    }
    
    // Method ที่คลาสลูกสามารถเรียกใช้ได้ (protected)
    protected function display_speed() {
        echo "📊 ความเร็วปัจจุบัน: {$this->speed} km/h<br>";
    }
    
    // Method ทั่วไปที่แสดงข้อมูล
    public function get_info() {
        echo "─────────────────────<br>";
        echo "ยี่ห้อ: {$this->brand}<br>";
        echo "รุ่น: {$this->model}<br>";
        echo "ปี: {$this->year}<br>";
        echo "─────────────────────<br>";
    }
}

// ==========================================
// คลาสลูก 1: Car (รถยนต์)
// ==========================================

class Car extends Vehicle {
    public $doors;
    public $fuel_type;
    
    // Constructor ของคลาสลูก
    public function __construct($brand, $model, $year, $doors, $fuel_type) {
        // เรียก constructor ของคลาสแม่
        parent::__construct($brand, $model, $year);
        $this->doors = $doors;
        $this->fuel_type = $fuel_type;
    }
    
    // เพิ่ม method ใหม่ที่เฉพาะรถยนต์
    public function honk() {
        echo "📣 บีบแตร! ปี๊บๆ<br>";
    }
    
    // เข้าถึง protected method จากคลาสแม่
    public function show_dashboard() {
        echo "🎛️ แดชบอร์ด:<br>";
        $this->display_speed(); // เรียก protected method
        echo "ประตู: {$this->doors} บาน<br>";
        echo "เชื้อเพลิง: {$this->fuel_type}<br>";
    }
    
    // Override method จากคลาสแม่
    public function get_info() {
        parent::get_info(); // เรียก method เดิมก่อน
        echo "ประตู: {$this->doors} บาน<br>";
        echo "เชื้อเพลิง: {$this->fuel_type}<br>";
        echo "─────────────────────<br>";
    }
}

// ==========================================
// คลาสลูก 2: Motorcycle (รถมอเตอร์ไซค์)
// ==========================================

class Motorcycle extends Vehicle {
    public $engine_cc;
    public $has_sidecar;
    
    public function __construct($brand, $model, $year, $engine_cc, $has_sidecar = false) {
        parent::__construct($brand, $model, $year);
        $this->engine_cc = $engine_cc;
        $this->has_sidecar = $has_sidecar;
    }
    
    // Method เฉพาะของมอเตอร์ไซค์
    public function wheelie() {
        echo "🏍️ ยกล้อหน้า! (Wheelie)<br>";
    }
    
    // Override method start
    public function start() {
        echo "🔑 คิกสตาร์ท {$this->brand} {$this->model}<br>";
        echo "🏍️ เครื่องยนต์ {$this->engine_cc}cc ทำงาน<br>";
    }
    
    // Override method get_info
    public function get_info() {
        parent::get_info();
        echo "ขนาดเครื่องยนต์: {$this->engine_cc} cc<br>";
        echo "ตะกร้าข้าง: " . ($this->has_sidecar ? "มี" : "ไม่มี") . "<br>";
        echo "─────────────────────<br>";
    }
}

// ==========================================
// คลาสลูก 3: Truck (รถบรรทุก) - ห่วงโซ่การสืบทอด
// ==========================================

class Truck extends Car {
    public $max_load;
    
    public function __construct($brand, $model, $year, $doors, $fuel_type, $max_load) {
        parent::__construct($brand, $model, $year, $doors, $fuel_type);
        $this->max_load = $max_load;
    }
    
    public function load_cargo($weight) {
        if ($weight <= $this->max_load) {
            echo "📦 บรรทุกสินค้า {$weight} ตัน (สูงสุด: {$this->max_load} ตัน)<br>";
        } else {
            echo "⚠️ น้ำหนักเกินกำหนด!<br>";
        }
    }
    
    // Override อีกครั้ง
    public function get_info() {
        parent::get_info();
        echo "น้ำหนักบรรทุกสูงสุด: {$this->max_load} ตัน<br>";
        echo "─────────────────────<br>";
    }
}

// ==========================================
// ตัวอย่างการป้องกันด้วย final
// ==========================================

class SportsCar extends Car {
    // ป้องกันไม่ให้ override method นี้
    final public function turbo_boost() {
        echo "💨 เทอร์โบเบิ้สท์! ความเร็วเพิ่ม 50 km/h<br>";
    }
}

// ไม่สามารถสืบทอดจาก final class ได้
// final class SuperCar extends Car {}

// ==========================================
// การใช้งานจริง
// ==========================================

echo "<h2>ตัวอย่างการสืบทอด (Inheritance)</h2>";

// 1. รถยนต์
echo "<strong>1. รถยนต์ (Car)</strong><br>";
$car = new Car("Toyota", "Camry", 2024, 4, "Hybrid");
$car->get_info();
$car->start();
$car->accelerate(60);
$car->honk();
$car->show_dashboard();
$car->stop();

// 2. มอเตอร์ไซค์
echo "<br><strong>2. มอเตอร์ไซค์ (Motorcycle)</strong><br>";
$bike = new Motorcycle("Honda", "CBR650R", 2024, 650);
$bike->get_info();
$bike->start(); // Override แล้ว
$bike->accelerate(100);
$bike->wheelie();
$bike->stop();

// 3. รถบรรทุก (สืบทอดจาก Car)
echo "<br><strong>3. รถบรรทุก (Truck)</strong><br>";
$truck = new Truck("Isuzu", "FRR", 2024, 2, "Diesel", 5);
$truck->get_info();
$truck->start();
$truck->load_cargo(4);
$truck->load_cargo(6); // เกินกำหนด
$truck->stop();

// 4. รถสปอร์ต
echo "<br><strong>4. รถสปอร์ต (SportsCar)</strong><br>";
$sports = new SportsCar("Ferrari", "F8 Tributo", 2024, 2, "Petrol");
$sports->start();
$sports->accelerate(120);
$sports->turbo_boost(); // final method
$sports->stop();

// ==========================================
// สรุป
// ==========================================

echo "<br><h2>📋 สรุปการสืบทอด</h2>";
echo "✅ <strong>สิ่งที่สืบทอดได้:</strong><br>";
echo "- Public properties และ methods<br>";
echo "- Protected properties และ methods<br>";
echo "- Constructor (เรียกด้วย parent::__construct())<br>";
echo "<br>";

echo "❌ <strong>สิ่งที่สืบทอดไม่ได้:</strong><br>";
echo "- Private properties และ methods<br>";
echo "<br>";

echo "🔧 <strong>การ Override:</strong><br>";
echo "- คลาสลูกสามารถเขียนทับ method ของคลาสแม่ได้<br>";
echo "- ใช้ parent::method() เพื่อเรียก method ต้นฉบับ<br>";
echo "<br>";

echo "🛡️ <strong>final Keyword:</strong><br>";
echo "- ป้องกันการสืบทอดคลาส<br>";
echo "- ป้องกันการ override method<br>";
?>