<?php
// ===============================
// ข้อ 8: PHP OOP - Interfaces
// ===============================

// ตัวอย่างที่ 1: Animal Interface (เสียงของสัตว์)
interface Animal {
    public function make_sound();
    public function move();
}

class Dog implements Animal {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function make_sound() {
        echo "🐕 {$this->name}: โฮ่ง โฮ่ง! (Woof! Woof!)<br>";
    }
    
    public function move() {
        echo "🐾 {$this->name} วิ่งด้วย 4 ขา<br>";
    }
}

class Cat implements Animal {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function make_sound() {
        echo "🐱 {$this->name}: เหมียว! (Meow!)<br>";
    }
    
    public function move() {
        echo "🐾 {$this->name} เดินแบบคล่องแคล่ว<br>";
    }
}

class Bird implements Animal {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function make_sound() {
        echo "🐦 {$this->name}: จิ๊บ จิ๊บ! (Tweet! Tweet!)<br>";
    }
    
    public function move() {
        echo "🪶 {$this->name} บินไปในอากาศ<br>";
    }
}

// ==========================================
// ตัวอย่างที่ 2: Multiple Interfaces
// ==========================================

interface Readable {
    public function read();
}

interface Writable {
    public function write($data);
}

interface Deletable {
    public function delete();
}

// คลาสที่ implement หลาย interfaces
class File implements Readable, Writable, Deletable {
    private $filename;
    private $content;
    
    public function __construct($filename) {
        $this->filename = $filename;
        $this->content = "";
        echo "📄 สร้างไฟล์: {$filename}<br>";
    }
    
    public function read() {
        echo "📖 อ่านไฟล์ '{$this->filename}'<br>";
        echo "เนื้อหา: {$this->content}<br>";
    }
    
    public function write($data) {
        $this->content = $data;
        echo "✍️ เขียนข้อมูลลงไฟล์ '{$this->filename}'<br>";
    }
    
    public function delete() {
        echo "🗑️ ลบไฟล์ '{$this->filename}'<br>";
        $this->content = "";
    }
}

// ==========================================
// ตัวอย่างที่ 3: E-commerce (Polymorphism)
// ==========================================

interface Shippable {
    public function calculate_shipping() : float;
    public function get_weight() : float;
}

class PhysicalProduct implements Shippable {
    private $name;
    private $weight;
    private $dimensions;
    
    public function __construct($name, $weight, $dimensions) {
        $this->name = $name;
        $this->weight = $weight;
        $this->dimensions = $dimensions;
    }
    
    public function calculate_shipping() : float {
        // คำนวณจากน้ำหนักและขนาด
        $base_rate = 50;
        $weight_rate = $this->weight * 10;
        return $base_rate + $weight_rate;
    }
    
    public function get_weight() : float {
        return $this->weight;
    }
    
    public function get_info() {
        echo "📦 สินค้า: {$this->name}<br>";
        echo "น้ำหนัก: {$this->weight} kg<br>";
        echo "ขนาด: {$this->dimensions}<br>";
        echo "ค่าจัดส่ง: " . number_format($this->calculate_shipping(), 2) . " บาท<br>";
    }
}

class DigitalProduct {
    private $name;
    private $file_size;
    
    public function __construct($name, $file_size) {
        $this->name = $name;
        $this->file_size = $file_size;
    }
    
    public function download() {
        echo "💾 ดาวน์โหลด: {$this->name} ({$this->file_size} MB)<br>";
    }
    
    public function get_info() {
        echo "💿 สินค้าดิจิทัล: {$this->name}<br>";
        echo "ขนาดไฟล์: {$this->file_size} MB<br>";
        echo "ค่าจัดส่ง: ฟรี (ดาวน์โหลดออนไลน์)<br>";
    }
}

// ==========================================
// ตัวอย่างที่ 4: Payment Methods
// ==========================================

interface PaymentMethod {
    public function process_payment($amount) : bool;
    public function get_payment_name() : string;
}

class CreditCard implements PaymentMethod {
    private $card_number;
    
    public function __construct($card_number) {
        $this->card_number = $card_number;
    }
    
    public function process_payment($amount) : bool {
        echo "💳 ชำระด้วยบัตรเครดิต: " . number_format($amount, 2) . " บาท<br>";
        echo "บัตร: ****-****-****-" . substr($this->card_number, -4) . "<br>";
        return true;
    }
    
    public function get_payment_name() : string {
        return "บัตรเครดิต";
    }
}

class PayPal implements PaymentMethod {
    private $email;
    
    public function __construct($email) {
        $this->email = $email;
    }
    
    public function process_payment($amount) : bool {
        echo "🌐 ชำระผ่าน PayPal: " . number_format($amount, 2) . " บาท<br>";
        echo "บัญชี: {$this->email}<br>";
        return true;
    }
    
    public function get_payment_name() : string {
        return "PayPal";
    }
}

class Cash implements PaymentMethod {
    public function process_payment($amount) : bool {
        echo "💵 ชำระเงินสด: " . number_format($amount, 2) . " บาท<br>";
        echo "รับเงินสดปลายทาง<br>";
        return true;
    }
    
    public function get_payment_name() : string {
        return "เงินสด";
    }
}

// ==========================================
// Checkout System (ใช้ Interfaces)
// ==========================================

class CheckoutSystem {
    public function process_order($items, PaymentMethod $payment) {
        echo "━━━━━━━━━━━━━━━━━━━━━<br>";
        echo "🛒 <strong>ระบบชำระเงิน</strong><br>";
        echo "━━━━━━━━━━━━━━━━━━━━━<br>";
        
        $total = 0;
        echo "<strong>สินค้าในตะกร้า:</strong><br>";
        
        foreach ($items as $item) {
            $item->get_info();
            
            // คำนวณค่าจัดส่งเฉพาะสินค้าที่ส่งได้
            if ($item instanceof Shippable) {
                $total += $item->calculate_shipping();
            }
            echo "---<br>";
        }
        
        echo "<strong>วิธีการชำระเงิน:</strong><br>";
        echo "📌 {$payment->get_payment_name()}<br>";
        
        if ($payment->process_payment($total)) {
            echo "✅ <strong>ชำระเงินสำเร็จ!</strong><br>";
        } else {
            echo "❌ <strong>ชำระเงินล้มเหลว</strong><br>";
        }
        
        echo "━━━━━━━━━━━━━━━━━━━━━<br><br>";
    }
}

// ==========================================
// การใช้งานจริง
// ==========================================

echo "<h2>ตัวอย่างที่ 1: สัตว์ (Animal Interface)</h2>";

$animals = [
    new Dog("บัดดี้"),
    new Cat("วิสกัส"),
    new Bird("ทวิตตี้")
];

echo "<strong>สัตว์ทำเสียงและเคลื่อนไหว:</strong><br>";
foreach ($animals as $animal) {
    $animal->make_sound();
    $animal->move();
    echo "---<br>";
}

// ==========================================
echo "<h2>ตัวอย่างที่ 2: การจัดการไฟล์ (Multiple Interfaces)</h2>";

$file = new File("document.txt");
$file->write("สวัสดีครับ! นี่คือเนื้อหาในไฟล์");
$file->read();
$file->write("แก้ไขเนื้อหาใหม่");
$file->read();
$file->delete();

// ==========================================
echo "<br><h2>ตัวอย่างที่ 3: ระบบ E-commerce (Polymorphism)</h2>";

$product1 = new PhysicalProduct("โทรศัพท์มือถือ", 0.5, "15x8x1 cm");
$product2 = new PhysicalProduct("หนังสือ", 0.8, "20x15x3 cm");
$product3 = new DigitalProduct("E-book PHP Programming", 5.2);

$checkout = new CheckoutSystem();

// ชำระด้วยบัตรเครดิต
$checkout->process_order(
    [$product1, $product2, $product3],
    new CreditCard("1234567890123456")
);

// ชำระด้วย PayPal
$checkout->process_order(
    [$product1],
    new PayPal("user@example.com")
);

// ชำระด้วยเงินสด
$checkout->process_order(
    [$product2, $product3],
    new Cash()
);

// ==========================================
// สรุป
// ==========================================

echo "<h2>📋 สรุป Interfaces</h2>";

echo "<strong>✅ Interface คืออะไร:</strong><br>";
echo "- สัญญาที่กำหนดว่าคลาสต้องมี methods อะไรบ้าง<br>";
echo "- ไม่มี properties<br>";
echo "- ไม่มีการ implement โค้ด (เฉพาะ signature)<br>";
echo "- Methods ทั้งหมดต้องเป็น public<br>";
echo "<br>";

echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
echo "<tr style='background:#f0f0f0;'><th>หัวข้อ</th><th>Abstract Class</th><th>Interface</th></tr>";
echo "<tr><td><strong>Properties</strong></td><td>มีได้</td><td>❌ ไม่มี</td></tr>";
echo "<tr><td><strong>Methods</strong></td><td>ทั้ง abstract และปกติ</td><td>ทุกตัวเป็น abstract</td></tr>";
echo "<tr><td><strong>Access Modifier</strong></td><td>public, protected, private</td><td>public เท่านั้น</td></tr>";
echo "<tr><td><strong>สืบทอด/Implement</strong></td><td>1 class</td><td>หลาย interfaces</td></tr>";
echo "<tr><td><strong>Constructor</strong></td><td>มีได้</td><td>❌ ไม่มี</td></tr>";
echo "</table>";

echo "<br><strong>🎯 ใช้ Interface เมื่อไร:</strong><br>";
echo "- ต้องการกำหนด \"สัญญา\" ให้คลาสต่าง ๆ<br>";
echo "- คลาสหลายตัวมีพฤติกรรมเหมือนกันแต่ไม่เกี่ยวข้องกัน<br>";
echo "- ต้องการ Polymorphism (ใช้ตัวแปรเดียวรองรับหลายคลาส)<br>";
echo "- คลาสต้อง implement หลายรูปแบบพร้อมกัน<br>";
echo "<br>";

echo "💡 <strong>ตัวอย่างการใช้งานจริง:</strong><br>";
echo "- Payment Gateway (Visa, Mastercard, PayPal)<br>";
echo "- Logger (FileLogger, DatabaseLogger, EmailLogger)<br>";
echo "- Cache (RedisCache, MemcachedCache, FileCache)<br>";
echo "- Notification (Email, SMS, Push Notification)<br>";
?>