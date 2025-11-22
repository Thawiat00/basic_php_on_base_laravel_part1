<?php
// ===============================
// ข้อ 2: PHP OOP - Constructor
// ===============================

// คลาสที่ใช้ Constructor
class Product {
    public $name;
    public $price;
    public $category;
    public $stock;
    
    // Constructor - รับพารามิเตอร์และกำหนดค่าอัตโนมัติ
    function __construct($name, $price, $category = "ทั่วไป", $stock = 0) {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->stock = $stock;
        
        echo "✓ สร้างสินค้า: {$name} เรียบร้อยแล้ว<br>";
    }
    
    // แสดงข้อมูลสินค้า
    function display() {
        echo "─────────────────────<br>";
        echo "สินค้า: {$this->name}<br>";
        echo "ราคา: " . number_format($this->price, 2) . " บาท<br>";
        echo "หมวดหมู่: {$this->category}<br>";
        echo "สต็อก: {$this->stock} ชิ้น<br>";
        echo "─────────────────────<br>";
    }
    
    // คำนวณราคารวม VAT 7%
    function price_with_vat() {
        return $this->price * 1.07;
    }
    
    // ตรวจสอบว่ามีสินค้าหรือไม่
    function is_available() {
        return $this->stock > 0;
    }
}

// ==========================================
// ตัวอย่างการใช้งาน Constructor
// ==========================================

echo "<h2>ตัวอย่าง Constructor</h2>";

// สร้างสินค้าด้วย Constructor (ไม่ต้องเรียก set methods)
echo "<strong>สร้างสินค้า 3 รายการ:</strong><br>";
$product1 = new Product("โทรศัพท์มือถือ", 15000, "อิเล็กทรอนิกส์", 50);
$product2 = new Product("เสื้อยืด", 299, "เสื้อผ้า", 100);
$product3 = new Product("หนังสือ", 350); // ใช้ค่า default

echo "<br><h3>รายละเอียดสินค้า</h3>";
$product1->display();
$product2->display();
$product3->display();

// คำนวณราคารวม VAT
echo "<h3>ราคารวม VAT 7%</h3>";
echo "โทรศัพท์: " . number_format($product1->price_with_vat(), 2) . " บาท<br>";
echo "เสื้อยืด: " . number_format($product2->price_with_vat(), 2) . " บาท<br>";
echo "หนังสือ: " . number_format($product3->price_with_vat(), 2) . " บาท<br>";

// ตรวจสอบความพร้อม
echo "<br><h3>สถานะสินค้า</h3>";
$products = [$product1, $product2, $product3];
foreach ($products as $p) {
    $status = $p->is_available() ? "✓ มีสินค้า" : "✗ สินค้าหมด";
    echo "{$p->name}: {$status}<br>";
}

// ==========================================
// ตัวอย่างเปรียบเทียบ: ไม่มี Constructor vs มี Constructor
// ==========================================

echo "<br><h2>เปรียบเทียบ: ไม่มี Constructor vs มี Constructor</h2>";

// คลาสแบบเก่า (ไม่มี Constructor)
class ProductOld {
    public $name;
    public $price;
    
    function set_name($name) {
        $this->name = $name;
    }
    
    function set_price($price) {
        $this->price = $price;
    }
}

echo "<strong>แบบเก่า (ไม่มี Constructor):</strong><br>";
$old = new ProductOld();
$old->set_name("สินค้าทดสอบ");
$old->set_price(500);
echo "ต้องเรียกหลาย methods → ใช้โค้ด 3 บรรทัด<br>";

echo "<br><strong>แบบใหม่ (มี Constructor):</strong><br>";
$new = new Product("สินค้าทดสอบ", 500);
echo "สร้างพร้อมกำหนดค่าเลย → ใช้โค้ด 1 บรรทัด<br>";

echo "<br>✨ <strong>ข้อดี Constructor:</strong> โค้ดสั้นลง อ่านง่าย ไม่ลืมกำหนดค่า";
?>