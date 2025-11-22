<?php
// ===============================
// ข้อ 6: PHP OOP - Class Constants
// ===============================

// ตัวอย่างที่ 1: Configuration Class
class Config {
    // ค่าคงที่สำหรับการตั้งค่าระบบ
    const APP_NAME = "ระบบจัดการร้านค้า";
    const APP_VERSION = "2.5.1";
    const MAX_LOGIN_ATTEMPTS = 3;
    const SESSION_TIMEOUT = 3600; // วินาที
    
    // ค่าคงที่สำหรับการคำนวณ
    const TAX_RATE = 7; // เปอร์เซ็นต์
    const SHIPPING_COST = 50; // บาท
    
    // แสดงข้อมูลการตั้งค่า
    public static function show_config() {
        echo "⚙️ <strong>การตั้งค่าระบบ</strong><br>";
        echo "ชื่อแอพ: " . self::APP_NAME . "<br>";
        echo "เวอร์ชัน: " . self::APP_VERSION . "<br>";
        echo "จำนวนครั้งล็อกอินสูงสุด: " . self::MAX_LOGIN_ATTEMPTS . "<br>";
        echo "หมดเวลาเซสชัน: " . self::SESSION_TIMEOUT . " วินาที<br>";
        echo "อัตราภาษี: " . self::TAX_RATE . "%<br>";
        echo "ค่าจัดส่ง: " . self::SHIPPING_COST . " บาท<br>";
    }
}

// ==========================================
// ตัวอย่างที่ 2: Math Helper
// ==========================================

class MathHelper {
    const PI = 3.14159265359;
    const E = 2.71828182846;
    const GOLDEN_RATIO = 1.61803398875;
    
    // คำนวณพื้นที่วงกลม
    public static function circle_area($radius) {
        return self::PI * $radius * $radius;
    }
    
    // คำนวณเส้นรอบวงกลม
    public static function circle_circumference($radius) {
        return 2 * self::PI * $radius;
    }
    
    // แสดงค่าคงที่ทางคณิตศาสตร์
    public static function show_constants() {
        echo "📐 <strong>ค่าคงที่ทางคณิตศาสตร์</strong><br>";
        echo "PI (π): " . self::PI . "<br>";
        echo "E (e): " . self::E . "<br>";
        echo "Golden Ratio (φ): " . self::GOLDEN_RATIO . "<br>";
    }
}

// ==========================================
// ตัวอย่างที่ 3: Status Codes
// ==========================================

class OrderStatus {
    const PENDING = 1;
    const CONFIRMED = 2;
    const PROCESSING = 3;
    const SHIPPED = 4;
    const DELIVERED = 5;
    const CANCELLED = 0;
    
    // แปลงรหัสเป็นข้อความ
    public static function get_status_text($status_code) {
        switch ($status_code) {
            case self::PENDING:
                return "รอดำเนินการ";
            case self::CONFIRMED:
                return "ยืนยันแล้ว";
            case self::PROCESSING:
                return "กำลังจัดเตรียม";
            case self::SHIPPED:
                return "จัดส่งแล้ว";
            case self::DELIVERED:
                return "ส่งถึงแล้ว";
            case self::CANCELLED:
                return "ยกเลิก";
            default:
                return "ไม่ทราบสถานะ";
        }
    }
    
    // แสดงสถานะทั้งหมด
    public static function show_all_status() {
        echo "📦 <strong>สถานะคำสั่งซื้อทั้งหมด</strong><br>";
        $statuses = [
            self::PENDING => "รอดำเนินการ",
            self::CONFIRMED => "ยืนยันแล้ว",
            self::PROCESSING => "กำลังจัดเตรียม",
            self::SHIPPED => "จัดส่งแล้ว",
            self::DELIVERED => "ส่งถึงแล้ว",
            self::CANCELLED => "ยกเลิก"
        ];
        
        foreach ($statuses as $code => $text) {
            echo "รหัส {$code}: {$text}<br>";
        }
    }
}

// ==========================================
// ตัวอย่างที่ 4: Order Class ที่ใช้ Constants
// ==========================================

class Order {
    public $order_id;
    public $status;
    public $subtotal;
    
    public function __construct($order_id, $subtotal) {
        $this->order_id = $order_id;
        $this->subtotal = $subtotal;
        $this->status = OrderStatus::PENDING; // ใช้ constant จากคลาสอื่น
    }
    
    // คำนวณราคารวม
    public function calculate_total() {
        $tax = $this->subtotal * (Config::TAX_RATE / 100);
        $total = $this->subtotal + $tax + Config::SHIPPING_COST;
        return $total;
    }
    
    // เปลี่ยนสถานะ
    public function change_status($new_status) {
        $this->status = $new_status;
        echo "✓ อัปเดตสถานะคำสั่งซื้อ #{$this->order_id} เป็น: ";
        echo OrderStatus::get_status_text($new_status) . "<br>";
    }
    
    // แสดงข้อมูลคำสั่งซื้อ
    public function display() {
        echo "─────────────────────<br>";
        echo "คำสั่งซื้อ: #{$this->order_id}<br>";
        echo "สถานะ: " . OrderStatus::get_status_text($this->status) . "<br>";
        echo "ยอดรวมสินค้า: " . number_format($this->subtotal, 2) . " บาท<br>";
        echo "ภาษี (" . Config::TAX_RATE . "%): " . number_format($this->subtotal * (Config::TAX_RATE / 100), 2) . " บาท<br>";
        echo "ค่าจัดส่ง: " . number_format(Config::SHIPPING_COST, 2) . " บาท<br>";
        echo "ยอดรวมทั้งหมด: " . number_format($this->calculate_total(), 2) . " บาท<br>";
        echo "─────────────────────<br>";
    }
}

// ==========================================
// ตัวอย่างที่ 5: Color Constants
// ==========================================

class Color {
    const RED = "#FF0000";
    const GREEN = "#00FF00";
    const BLUE = "#0000FF";
    const BLACK = "#000000";
    const WHITE = "#FFFFFF";
    const YELLOW = "#FFFF00";
    
    public static function get_rgb($hex) {
        $hex = str_replace("#", "", $hex);
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        return "RGB({$r}, {$g}, {$b})";
    }
}

// ==========================================
// การใช้งานจริง
// ==========================================

echo "<h2>ตัวอย่างการใช้ Class Constants</h2>";

// 1. เข้าถึง Constants จากภายนอกคลาส
echo "<strong>1. Configuration</strong><br>";
echo "ชื่อแอพ: " . Config::APP_NAME . "<br>";
echo "เวอร์ชัน: " . Config::APP_VERSION . "<br>";
echo "ภาษี: " . Config::TAX_RATE . "%<br>";
Config::show_config();

// 2. Math Constants
echo "<br><strong>2. คณิตศาสตร์</strong><br>";
echo "PI = " . MathHelper::PI . "<br>";
$radius = 5;
echo "พื้นที่วงกลมรัศมี {$radius} = " . number_format(MathHelper::circle_area($radius), 2) . " ตร.หน่วย<br>";
echo "เส้นรอบวง = " . number_format(MathHelper::circle_circumference($radius), 2) . " หน่วย<br>";
MathHelper::show_constants();

// 3. Status Codes
echo "<br><strong>3. รหัสสถานะ</strong><br>";
OrderStatus::show_all_status();

// 4. ใช้ Constants ในคลาสอื่น
echo "<br><strong>4. ตัวอย่างคำสั่งซื้อ</strong><br>";
$order = new Order("ORD-2024-001", 1000);
$order->display();

echo "<br>กระบวนการจัดส่ง:<br>";
$order->change_status(OrderStatus::CONFIRMED);
$order->change_status(OrderStatus::PROCESSING);
$order->change_status(OrderStatus::SHIPPED);
$order->change_status(OrderStatus::DELIVERED);

// 5. Color Constants
echo "<br><strong>5. สี</strong><br>";
echo "สีแดง: " . Color::RED . " = " . Color::get_rgb(Color::RED) . "<br>";
echo "สีเขียว: " . Color::GREEN . " = " . Color::get_rgb(Color::GREEN) . "<br>";
echo "สีน้ำเงิน: " . Color::BLUE . " = " . Color::get_rgb(Color::BLUE) . "<br>";

// ==========================================
// สรุป
// ==========================================

echo "<br><h2>📋 สรุป Class Constants</h2>";
echo "✅ <strong>ข้อดี:</strong><br>";
echo "- ไม่สามารถเปลี่ยนแปลงค่าได้ (ปลอดภัย)<br>";
echo "- เข้าถึงได้โดยไม่ต้องสร้างออบเจ็กต์<br>";
echo "- ใช้เป็นค่าอ้างอิงมาตรฐานในระบบ<br>";
echo "- ทำให้โค้ดอ่านง่ายและบำรุงรักษาง่าย<br>";
echo "<br>";

echo "📌 <strong>วิธีเข้าถึง:</strong><br>";
echo "- จากภายนอก: <code>ClassName::CONSTANT</code><br>";
echo "- จากภายใน: <code>self::CONSTANT</code><br>";
echo "- จากคลาสลูก: <code>parent::CONSTANT</code><br>";
echo "<br>";

echo "🎯 <strong>ใช้กับ:</strong><br>";
echo "- ค่าตั้งค่าที่ไม่เปลี่ยนแปลง<br>";
echo "- รหัสสถานะ (Status Code)<br>";
echo "- ค่าคงที่ทางคณิตศาสตร์<br>";
echo "- ข้อความข้อผิดพลาด (Error Messages)<br>";
?>


