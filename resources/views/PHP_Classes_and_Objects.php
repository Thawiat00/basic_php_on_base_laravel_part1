<?php
// ===============================
// ข้อ 1: PHP OOP - Classes and Objects
// ===============================

// การประกาศคลาส
class Fruit {
    // Properties (คุณสมบัติ)
    public $name;
    public $color;
    public $weight;
    
    // Methods (เมธอด)
    function set_name($name) {
        $this->name = $name;
    }
    
    function get_name() {
        return $this->name;
    }
    
    function set_color($color) {
        $this->color = $color;
    }
    
    function get_color() {
        return $this->color;
    }
    
    function set_weight($weight) {
        $this->weight = $weight;
    }
    
    function get_weight() {
        return $this->weight;
    }
    
    // แสดงข้อมูลทั้งหมด
    function display_info() {
        echo "ผลไม้: " . $this->name . "<br>";
        echo "สี: " . $this->color . "<br>";
        echo "น้ำหนัก: " . $this->weight . " กรัม<br>";
        echo "-------------------<br>";
    }
}

// สร้าง Objects (ออบเจ็กต์)
echo "<h2>สร้างออบเจ็กต์จากคลาส Fruit</h2>";

// ออบเจ็กต์ที่ 1: แอปเปิล
$apple = new Fruit();
$apple->set_name('แอปเปิล');
$apple->set_color('แดง');
$apple->set_weight(150);

echo "<strong>วิธีที่ 1: ใช้ Methods</strong><br>";
$apple->display_info();

// ออบเจ็กต์ที่ 2: กล้วย
$banana = new Fruit();
$banana->set_name('กล้วย');
$banana->set_color('เหลือง');
$banana->set_weight(120);

$banana->display_info();

// ออบเจ็กต์ที่ 3: มะม่วง (กำหนดค่าโดยตรง)
$mango = new Fruit();
$mango->name = 'มะม่วง';
$mango->color = 'เขียว';
$mango->weight = 200;

echo "<strong>วิธีที่ 2: กำหนดค่าโดยตรง</strong><br>";
$mango->display_info();

// ตรวจสอบว่าเป็น instance ของคลาสหรือไม่
echo "<h3>ตรวจสอบประเภทของออบเจ็กต์</h3>";
echo "แอปเปิลเป็น Fruit หรือไม่? ";
var_dump($apple instanceof Fruit);
echo "<br>";

echo "กล้วยเป็น Fruit หรือไม่? ";
var_dump($banana instanceof Fruit);
echo "<br>";

// แสดงข้อมูลทั้งหมด
echo "<h3>สรุปข้อมูลผลไม้ทั้งหมด</h3>";
$fruits = [$apple, $banana, $mango];

foreach ($fruits as $index => $fruit) {
    echo "ผลไม้ที่ " . ($index + 1) . ": ";
    echo $fruit->get_name() . " (" . $fruit->get_color() . ") - ";
    echo $fruit->get_weight() . " กรัม<br>";
}
?>