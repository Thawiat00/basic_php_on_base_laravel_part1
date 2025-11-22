<?php
// ===============================
// ข้อ 7: PHP OOP - Abstract Classes
// ===============================

// ตัวอย่างที่ 1: Payment Gateway (ระบบชำระเงิน)
abstract class PaymentGateway {
    protected $amount;
    protected $currency;
    protected $transaction_id;
    
    public function __construct($amount, $currency = "THB") {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->transaction_id = "TXN" . time() . rand(1000, 9999);
    }
    
    // Abstract Methods - คลาสลูกต้องเขียนเอง
    abstract protected function validate_payment();
    abstract protected function process_payment();
    abstract public function get_gateway_name() : string;
    
    // Method ปกติ - คลาสลูกใช้ได้เลย
    public function execute_payment() {
        echo "━━━━━━━━━━━━━━━━━━━━━<br>";
        echo "🏦 <strong>เริ่มการชำระเงินผ่าน: " . $this->get_gateway_name() . "</strong><br>";
        echo "จำนวนเงิน: " . number_format($this->amount, 2) . " {$this->currency}<br>";
        echo "Transaction ID: {$this->transaction_id}<br>";
        
        if ($this->validate_payment()) {
            echo "✓ ตรวจสอบข้อมูลสำเร็จ<br>";
            $this->process_payment();
            $this->send_receipt();
        } else {
            echo "✗ ตรวจสอบข้อมูลล้มเหลว<br>";
        }
        echo "━━━━━━━━━━━━━━━━━━━━━<br><br>";
    }
    
    protected function send_receipt() {
        echo "📧 ส่งใบเสร็จไปที่อีเมล<br>";
    }
}

// คลาสลูก 1: Credit Card Payment
class CreditCardPayment extends PaymentGateway {
    private $card_number;
    private $cvv;
    
    public function __construct($amount, $card_number, $cvv, $currency = "THB") {
        parent::__construct($amount, $currency);
        $this->card_number = $card_number;
        $this->cvv = $cvv;
    }
    
    // ต้องเขียน abstract methods
    protected function validate_payment() {
        echo "🔍 ตรวจสอบบัตรเครดิต...<br>";
        return strlen($this->card_number) == 16 && strlen($this->cvv) == 3;
    }
    
    protected function process_payment() {
        echo "💳 ประมวลผลชำระเงินผ่านบัตรเครดิต<br>";
        echo "เลขบัตร: ****-****-****-" . substr($this->card_number, -4) . "<br>";
        echo "✓ ชำระเงินสำเร็จ!<br>";
    }
    
    public function get_gateway_name() : string {
        return "Credit Card";
    }
}

// คลาสลูก 2: Bank Transfer Payment
class BankTransferPayment extends PaymentGateway {
    private $bank_code;
    private $account_number;
    
    public function __construct($amount, $bank_code, $account_number, $currency = "THB") {
        parent::__construct($amount, $currency);
        $this->bank_code = $bank_code;
        $this->account_number = $account_number;
    }
    
    protected function validate_payment() {
        echo "🔍 ตรวจสอบบัญชีธนาคาร...<br>";
        return !empty($this->bank_code) && !empty($this->account_number);
    }
    
    protected function process_payment() {
        echo "🏦 โอนเงินผ่านธนาคาร<br>";
        echo "ธนาคาร: {$this->bank_code}<br>";
        echo "บัญชี: ****" . substr($this->account_number, -4) . "<br>";
        echo "✓ โอนเงินสำเร็จ!<br>";
    }
    
    public function get_gateway_name() : string {
        return "Bank Transfer";
    }
}

// คลาสลูก 3: E-Wallet Payment
class EWalletPayment extends PaymentGateway {
    private $wallet_id;
    private $pin;
    
    public function __construct($amount, $wallet_id, $pin, $currency = "THB") {
        parent::__construct($amount, $currency);
        $this->wallet_id = $wallet_id;
        $this->pin = $pin;
    }
    
    protected function validate_payment() {
        echo "🔍 ตรวจสอบ E-Wallet...<br>";
        return strlen($this->wallet_id) > 0 && strlen($this->pin) == 6;
    }
    
    protected function process_payment() {
        echo "📱 ชำระเงินผ่าน E-Wallet<br>";
        echo "Wallet ID: {$this->wallet_id}<br>";
        echo "✓ ชำระเงินสำเร็จ!<br>";
    }
    
    public function get_gateway_name() : string {
        return "E-Wallet (TrueMoney/PromptPay)";
    }
}

// ==========================================
// ตัวอย่างที่ 2: Shape (รูปทรงเรขาคณิต)
// ==========================================

abstract class Shape {
    protected $color;
    
    public function __construct($color) {
        $this->color = $color;
    }
    
    // Abstract methods
    abstract public function calculate_area() : float;
    abstract public function calculate_perimeter() : float;
    abstract public function get_shape_name() : string;
    
    // Method ปกติ
    public function display_info() {
        echo "━━━━━━━━━━━━━━━━━━━━━<br>";
        echo "รูปทรง: " . $this->get_shape_name() . "<br>";
        echo "สี: {$this->color}<br>";
        echo "พื้นที่: " . number_format($this->calculate_area(), 2) . " ตร.หน่วย<br>";
        echo "เส้นรอบรูป: " . number_format($this->calculate_perimeter(), 2) . " หน่วย<br>";
        echo "━━━━━━━━━━━━━━━━━━━━━<br>";
    }
}

class Circle extends Shape {
    private $radius;
    
    public function __construct($color, $radius) {
        parent::__construct($color);
        $this->radius = $radius;
    }
    
    public function calculate_area() : float {
        return pi() * $this->radius * $this->radius;
    }
    
    public function calculate_perimeter() : float {
        return 2 * pi() * $this->radius;
    }
    
    public function get_shape_name() : string {
        return "วงกลม (รัศมี: {$this->radius})";
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;
    
    public function __construct($color, $width, $height) {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }
    
    public function calculate_area() : float {
        return $this->width * $this->height;
    }
    
    public function calculate_perimeter() : float {
        return 2 * ($this->width + $this->height);
    }
    
    public function get_shape_name() : string {
        return "สี่เหลี่ยมผืนผ้า ({$this->width}x{$this->height})";
    }
}

class Triangle extends Shape {
    private $base;
    private $height;
    private $side_a;
    private $side_b;
    
    public function __construct($color, $base, $height, $side_a, $side_b) {
        parent::__construct($color);
        $this->base = $base;
        $this->height = $height;
        $this->side_a = $side_a;
        $this->side_b = $side_b;
    }
    
    public function calculate_area() : float {
        return 0.5 * $this->base * $this->height;
    }
    
    public function calculate_perimeter() : float {
        return $this->base + $this->side_a + $this->side_b;
    }
    
    public function get_shape_name() : string {
        return "สามเหลี่ยม (ฐาน: {$this->base})";
    }
}

// ==========================================
// การใช้งานจริง
// ==========================================

echo "<h2>ตัวอย่างที่ 1: Payment Gateway</h2>";

// สร้างการชำระเงินหลายรูปแบบ
$payment1 = new CreditCardPayment(5000, "1234567890123456", "123");
$payment1->execute_payment();

$payment2 = new BankTransferPayment(10000, "BBL", "1234567890");
$payment2->execute_payment();

$payment3 = new EWalletPayment(2500, "user@email.com", "123456");
$payment3->execute_payment();

// ==========================================
echo "<h2>ตัวอย่างที่ 2: รูปทรงเรขาคณิต</h2>";

$shapes = [
    new Circle("แดง", 5),
    new Rectangle("น้ำเงิน", 10, 5),
    new Triangle("เขียว", 6, 8, 5, 5)
];

foreach ($shapes as $shape) {
    $shape->display_info();
    echo "<br>";
}

// ==========================================
// สรุป
// ==========================================

echo "<h2>📋 สรุป Abstract Classes</h2>";
echo "✅ <strong>คุณสมบัติ:</strong><br>";
echo "- ไม่สามารถสร้างออบเจ็กต์โดยตรงได้<br>";
echo "- มี abstract methods ที่คลาสลูกต้องเขียน<br>";
echo "- มี methods ปกติที่คลาสลูกใช้ได้เลย<br>";
echo "- บังคับให้คลาสลูกมีโครงสร้างเหมือนกัน<br>";
echo "<br>";

echo "🎯 <strong>ใช้เมื่อไร:</strong><br>";
echo "- ต้องการสร้างแม่แบบสำหรับคลาสลูก<br>";
echo "- มีการทำงานร่วมกันแต่แตกต่างรายละเอียด<br>";
echo "- ต้องการบังคับให้คลาสลูกมี methods บางตัว<br>";
echo "<br>";

echo "⚠️ <strong>กฎ:</strong><br>";
echo "- คลาสลูกต้องเขียน abstract methods ทั้งหมด<br>";
echo "- Access modifier ต้องเท่ากันหรือเปิดกว้างกว่า<br>";
echo "- จำนวน parameters ต้องเท่ากัน (มี optional ได้)<br>";

// พยายามสร้าง abstract class โดยตรง (จะ error)
// $payment = new PaymentGateway(1000); // ❌ ERROR!
?>