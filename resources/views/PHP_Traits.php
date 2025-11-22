<?php
// ============================================
// ตัวอย่างที่ 1: Trait พื้นฐาน
// ============================================

// สร้าง Trait สำหรับแสดงข้อความ
trait MessageTrait {
    public function showMessage() {
        echo "สวัสดีจาก Trait!<br>";
    }
    
    public function showInfo() {
        echo "Traits ช่วยแชร์โค้ดได้ง่ายๆ<br>";
    }
}

// คลาสที่ 1 ใช้ Trait
class Website {
    use MessageTrait;
    
    public function display() {
        echo "=== Website Class ===<br>";
        $this->showMessage();
        $this->showInfo();
    }
}

// คลาสที่ 2 ใช้ Trait เดียวกัน
class Blog {
    use MessageTrait;
    
    public function publish() {
        echo "<br>=== Blog Class ===<br>";
        $this->showMessage();
        echo "เผยแพร่บทความแล้ว!<br>";
    }
}

// ============================================
// ตัวอย่างที่ 2: ใช้หลาย Traits พร้อมกัน
// ============================================

trait LoggerTrait {
    public function log($message) {
        echo "[LOG] $message<br>";
    }
}

trait TimestampTrait {
    public function getTimestamp() {
        return date('Y-m-d H:i:s');
    }
}

trait DatabaseTrait {
    public function connect() {
        echo "เชื่อมต่อฐานข้อมูลสำเร็จ!<br>";
    }
}

// คลาสที่ใช้หลาย Traits
class UserManager {
    use LoggerTrait, TimestampTrait, DatabaseTrait;
    
    public function createUser($username) {
        $this->connect();
        $time = $this->getTimestamp();
        $this->log("สร้างผู้ใช้ '$username' เมื่อ $time");
    }
}

// ============================================
// ตัวอย่างที่ 3: Trait กับ Property
// ============================================

trait CounterTrait {
    private $count = 0;
    
    public function increment() {
        $this->count++;
    }
    
    public function getCount() {
        return $this->count;
    }
}

class PageView {
    use CounterTrait;
    
    public function viewPage() {
        $this->increment();
        echo "เข้าชมหน้านี้แล้ว " . $this->getCount() . " ครั้ง<br>";
    }
}

// ============================================
// ทดสอบการทำงาน
// ============================================

echo "<h2>ตัวอย่างการใช้ PHP Traits</h2>";
echo "<hr>";

// ทดสอบ Trait พื้นฐาน
$website = new Website();
$website->display();

$blog = new Blog();
$blog->publish();

echo "<hr>";

// ทดสอบหลาย Traits
$userManager = new UserManager();
$userManager->createUser("นายสมชาย");
$userManager->createUser("นางสมหญิง");

echo "<hr>";

// ทดสอบ Trait กับ Property
$page = new PageView();
$page->viewPage();
$page->viewPage();
$page->viewPage();

echo "<hr>";
echo "<strong>สรุป:</strong> Traits ช่วยให้หลายคลาสใช้โค้ดเดียวกันได้โดยไม่ต้องสืบทอด!";
?>