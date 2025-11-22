<?php
// ===============================
// ข้อ 4: PHP OOP - Access Modifiers
// ===============================

// คลาสหลัก: BankAccount
class BankAccount {
    // Properties ต่าง ๆ
    public $account_number;      // เข้าถึงได้ทุกที่
    protected $balance;          // เข้าถึงได้ใน class นี้และ class ลูก
    private $pin;                // เข้าถึงได้ใน class นี้เท่านั้น
    
    public function __construct($account_number, $initial_balance, $pin) {
        $this->account_number = $account_number;
        $this->balance = $initial_balance;
        $this->pin = $pin;
        echo "✓ สร้างบัญชี {$account_number} สำเร็จ<br>";
    }
    
    // PUBLIC METHOD - เข้าถึงได้จากทุกที่
    public function get_account_info() {
        echo "─────────────────────<br>";
        echo "เลขบัญชี: {$this->account_number}<br>";
        echo "ยอดเงิน: " . number_format($this->balance, 2) . " บาท<br>";
        echo "─────────────────────<br>";
    }
    
    // PUBLIC METHOD - ฝากเงิน
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "✓ ฝากเงิน " . number_format($amount, 2) . " บาท สำเร็จ<br>";
            $this->update_transaction_log("ฝาก", $amount);
        }
    }
    
    // PUBLIC METHOD - ถอนเงิน (ต้องใส่ PIN)
    public function withdraw($amount, $pin) {
        if ($this->verify_pin($pin)) {
            if ($amount <= $this->balance) {
                $this->balance -= $amount;
                echo "✓ ถอนเงิน " . number_format($amount, 2) . " บาท สำเร็จ<br>";
                $this->update_transaction_log("ถอน", $amount);
            } else {
                echo "✗ ยอดเงินไม่เพียงพอ<br>";
            }
        } else {
            echo "✗ PIN ไม่ถูกต้อง<br>";
        }
    }
    
    // PROTECTED METHOD - ใช้ได้ในคลาสนี้และคลาสลูก
    protected function update_transaction_log($type, $amount) {
        echo "📝 บันทึกธุรกรรม: {$type} " . number_format($amount, 2) . " บาท<br>";
    }
    
    // PRIVATE METHOD - ใช้ได้ในคลาสนี้เท่านั้น
    private function verify_pin($pin) {
        return $this->pin === $pin;
    }
    
    // PUBLIC METHOD - เปลี่ยน PIN
    public function change_pin($old_pin, $new_pin) {
        if ($this->verify_pin($old_pin)) {
            $this->pin = $new_pin;
            echo "✓ เปลี่ยน PIN สำเร็จ<br>";
        } else {
            echo "✗ PIN เดิมไม่ถูกต้อง<br>";
        }
    }
}

// คลาสลูก: SavingsAccount (บัญชีออมทรัพย์)
class SavingsAccount extends BankAccount {
    public $interest_rate;
    
    public function __construct($account_number, $initial_balance, $pin, $interest_rate) {
        parent::__construct($account_number, $initial_balance, $pin);
        $this->interest_rate = $interest_rate;
    }
    
    // เข้าถึง PROTECTED property และ method ได้
    public function add_interest() {
        $interest = $this->balance * ($this->interest_rate / 100);
        $this->balance += $interest;
        echo "✓ เพิ่มดอกเบี้ย " . number_format($interest, 2) . " บาท<br>";
        
        // เรียก protected method จาก parent class
        $this->update_transaction_log("ดอกเบี้ย", $interest);
    }
    
    // ไม่สามารถเข้าถึง PRIVATE property ($pin) ได้
    // public function show_pin() {
    //     echo $this->pin; // ❌ ERROR!
    // }
}

// ==========================================
// ทดสอบการใช้งาน
// ==========================================

echo "<h2>ตัวอย่างการใช้ Access Modifiers</h2>";

// สร้างบัญชีธรรมดา
echo "<strong>1. บัญชีธรรมดา</strong><br>";
$account1 = new BankAccount("001-234-5678", 5000, "1234");

// PUBLIC - เข้าถึงได้
echo "<br>เข้าถึง public property:<br>";
echo "เลขบัญชี: {$account1->account_number}<br>";

// PROTECTED - เข้าถึงไม่ได้จากภายนอก
echo "<br>พยายามเข้าถึง protected property:<br>";
// echo $account1->balance; // ❌ ERROR!
echo "ไม่สามารถเข้าถึง \$balance โดยตรง (protected)<br>";

// PRIVATE - เข้าถึงไม่ได้จากภายนอก
echo "<br>พยายามเข้าถึง private property:<br>";
// echo $account1->pin; // ❌ ERROR!
echo "ไม่สามารถเข้าถึง \$pin โดยตรง (private)<br>";

// ใช้ PUBLIC METHODS แทน
echo "<br>ใช้ public methods:<br>";
$account1->get_account_info();
$account1->deposit(1000);
$account1->withdraw(500, "1234");
$account1->get_account_info();

// เปลี่ยน PIN
echo "<br>เปลี่ยน PIN:<br>";
$account1->change_pin("1234", "5678");
$account1->withdraw(200, "5678"); // ใช้ PIN ใหม่

// ==========================================
// ทดสอบคลาสลูก
// ==========================================

echo "<br><h2>2. บัญชีออมทรัพย์ (คลาสลูก)</h2>";
$savings = new SavingsAccount("002-345-6789", 10000, "9999", 2.5);

$savings->get_account_info();
$savings->add_interest(); // เข้าถึง protected ได้เพราะเป็นคลาสลูก
$savings->get_account_info();

// ==========================================
// สรุป Access Modifiers
// ==========================================

echo "<br><h2>📋 สรุป Access Modifiers</h2>";
echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
echo "<tr style='background:#f0f0f0;'><th>Modifier</th><th>ในคลาส</th><th>คลาสลูก</th><th>ภายนอกคลาส</th></tr>";
echo "<tr><td><strong>public</strong></td><td>✓</td><td>✓</td><td>✓</td></tr>";
echo "<tr><td><strong>protected</strong></td><td>✓</td><td>✓</td><td>✗</td></tr>";
echo "<tr><td><strong>private</strong></td><td>✓</td><td>✗</td><td>✗</td></tr>";
echo "</table>";

echo "<br>💡 <strong>แนะนำ:</strong><br>";
echo "- ใช้ <strong>private</strong> สำหรับข้อมูลสำคัญ (PIN, Password)<br>";
echo "- ใช้ <strong>protected</strong> สำหรับข้อมูลที่คลาสลูกต้องใช้<br>";
echo "- ใช้ <strong>public</strong> สำหรับข้อมูลทั่วไปที่เข้าถึงได้";
?>