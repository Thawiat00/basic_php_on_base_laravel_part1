<?php
// ===============================
// ข้อ 3: PHP OOP - Destructor
// ===============================

// ตัวอย่างที่ 1: Logger Class (บันทึกข้อมูล)
class Logger {
    public $name;
    public $log_count;
    private $start_time;
    
    // Constructor - เริ่มต้นการทำงาน
    function __construct($name) {
        $this->name = $name;
        $this->log_count = 0;
        $this->start_time = microtime(true);
        echo "📝 [START] เปิดใช้งาน Logger: {$name}<br>";
        echo "เวลาเริ่มต้น: " . date('H:i:s') . "<br><br>";
    }
    
    // บันทึกข้อความ
    function log($message) {
        $this->log_count++;
        echo "[LOG #{$this->log_count}] {$message}<br>";
    }
    
    // Destructor - สรุปผลและทำความสะอาด
    function __destruct() {
        $end_time = microtime(true);
        $duration = round(($end_time - $this->start_time) * 1000, 2);
        
        echo "<br>─────────────────────<br>";
        echo "🛑 [END] ปิด Logger: {$this->name}<br>";
        echo "จำนวนบันทึก: {$this->log_count} รายการ<br>";
        echo "ระยะเวลา: {$duration} มิลลิวินาที<br>";
        echo "─────────────────────<br>";
    }
}

// ==========================================
// ตัวอย่างที่ 2: Database Connection Simulator
// ==========================================

class DatabaseConnection {
    public $host;
    public $database;
    public $connected;
    
    function __construct($host, $database) {
        $this->host = $host;
        $this->database = $database;
        $this->connected = true;
        echo "🔌 [CONNECT] เชื่อมต่อฐานข้อมูล '{$database}' ที่ {$host}<br>";
    }
    
    function query($sql) {
        if ($this->connected) {
            echo "⚡ [QUERY] ดำเนินการ: {$sql}<br>";
        }
    }
    
    // Destructor - ปิดการเชื่อมต่ออัตโนมัติ
    function __destruct() {
        if ($this->connected) {
            echo "🔒 [DISCONNECT] ปิดการเชื่อมต่อฐานข้อมูล '{$this->database}'<br>";
            $this->connected = false;
        }
    }
}

// ==========================================
// ตัวอย่างที่ 3: File Handler
// ==========================================

class FileHandler {
    public $filename;
    private $operations;
    
    function __construct($filename) {
        $this->filename = $filename;
        $this->operations = [];
        echo "📁 [OPEN] เปิดไฟล์: {$filename}<br>";
    }
    
    function write($data) {
        $this->operations[] = "เขียน: {$data}";
        echo "✍️  เขียนข้อมูล: {$data}<br>";
    }
    
    function read() {
        $this->operations[] = "อ่านไฟล์";
        echo "👁️  อ่านข้อมูลจากไฟล์<br>";
    }
    
    // Destructor - ปิดไฟล์และสรุปการทำงาน
    function __destruct() {
        echo "💾 [CLOSE] ปิดไฟล์: {$this->filename}<br>";
        echo "จำนวนการทำงาน: " . count($this->operations) . " ครั้ง<br>";
    }
}

// ==========================================
// การใช้งานจริง
// ==========================================

echo "<h2>ตัวอย่างที่ 1: Logger</h2>";
$logger = new Logger("SystemLog");
$logger->log("ผู้ใช้เข้าสู่ระบบ");
$logger->log("ดาวน์โหลดไฟล์");
$logger->log("ออกจากระบบ");
// Destructor จะทำงานอัตโนมัติตอนจบสคริปต์

echo "<br><h2>ตัวอย่างที่ 2: Database Connection</h2>";
$db = new DatabaseConnection("localhost", "shop_database");
$db->query("SELECT * FROM products");
$db->query("INSERT INTO orders VALUES (1, 'John', 500)");
$db->query("UPDATE users SET status='active'");
// Destructor จะปิดการเชื่อมต่ออัตโนมัติ

echo "<br><h2>ตัวอย่างที่ 3: File Handler</h2>";
$file = new FileHandler("data.txt");
$file->write("บรรทัดที่ 1");
$file->write("บรรทัดที่ 2");
$file->read();
// Destructor จะปิดไฟล์อัตโนมัติ

echo "<br><br>✨ <strong>หมายเหตุ:</strong> Destructor ทำงานอัตโนมัติเมื่อ:<br>";
echo "1. สคริปต์จบการทำงาน<br>";
echo "2. ใช้ unset() กับออบเจ็กต์<br>";
echo "3. ออบเจ็กต์ถูกเขียนทับด้วยค่าอื่น<br>";
?>