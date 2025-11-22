<?php
// ============================================
// ตัวอย่างที่ 1: Namespace พื้นฐาน
// ============================================

namespace MyApp\Utils {
    class Logger {
        public function log($message) {
            echo "[LOG] $message<br>";
        }
    }
    
    class Validator {
        public function validateEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
    }
}

namespace MyApp\Models {
    class User {
        public $name;
        
        public function __construct($name) {
            $this->name = $name;
        }
        
        public function greet() {
            echo "สวัสดี! ฉันชื่อ {$this->name}<br>";
        }
    }
    
    class Product {
        public $name;
        public $price;
        
        public function __construct($name, $price) {
            $this->name = $name;
            $this->price = $price;
        }
        
        public function display() {
            echo "สินค้า: {$this->name} - ราคา: {$this->price} บาท<br>";
        }
    }
}

// ============================================
// ตัวอย่างที่ 2: ใช้คลาสจาก Namespace
// ============================================

namespace MyApp\Controllers {
    // ใช้ use เพื่อนำเข้าคลาส
    use MyApp\Models\User;
    use MyApp\Models\Product;
    use MyApp\Utils\Logger;
    
    class UserController {
        private $logger;
        
        public function __construct() {
            $this->logger = new Logger();
        }
        
        public function createUser($name) {
            $this->logger->log("กำลังสร้างผู้ใช้: $name");
            $user = new User($name);
            $user->greet();
            return $user;
        }
    }
    
    class ProductController {
        private $logger;
        
        public function __construct() {
            $this->logger = new Logger();
        }
        
        public function addProduct($name, $price) {
            $this->logger->log("กำลังเพิ่มสินค้า: $name");
            $product = new Product($name, $price);
            $product->display();
            return $product;
        }
    }
}

// ============================================
// ตัวอย่างที่ 3: Nested Namespace (ซ้อนกัน)
// ============================================

namespace Company\Department\HR {
    class Employee {
        public $name;
        public $position;
        
        public function __construct($name, $position) {
            $this->name = $name;
            $this->position = $position;
        }
        
        public function showInfo() {
            echo "พนักงาน: {$this->name} - ตำแหน่ง: {$this->position}<br>";
        }
    }
}

namespace Company\Department\IT {
    class Employee {
        public $name;
        public $skills;
        
        public function __construct($name, $skills) {
            $this->name = $name;
            $this->skills = $skills;
        }
        
        public function showInfo() {
            echo "พนักงาน IT: {$this->name} - ทักษะ: {$this->skills}<br>";
        }
    }
}

// ============================================
// ตัวอย่างที่ 4: Namespace Alias (ตั้งชื่อเล่น)
// ============================================

namespace Shop\Frontend {
    class Cart {
        private $items = [];
        
        public function addItem($item) {
            $this->items[] = $item;
            echo "เพิ่ม '$item' ลงตะกร้าแล้ว<br>";
        }
        
        public function showItems() {
            echo "สินค้าในตะกร้า: " . implode(", ", $this->items) . "<br>";
        }
    }
}

namespace Shop\Backend {
    class Inventory {
        private $stock = 100;
        
        public function checkStock() {
            return $this->stock;
        }
        
        public function updateStock($amount) {
            $this->stock += $amount;
            echo "อัพเดตสต็อก: $amount (คงเหลือ: {$this->stock})<br>";
        }
    }
}

// ============================================
// ตัวอย่างที่ 5: ใช้งานจริง (Main Application)
// ============================================

namespace {
    echo "<h2>ตัวอย่างการใช้ PHP Namespaces</h2>";
    echo "<hr>";
    
    // ทดสอบ Utils
    echo "<strong>1. Utils Namespace:</strong><br>";
    $logger = new MyApp\Utils\Logger();
    $logger->log("เริ่มต้นโปรแกรม");
    
    $validator = new MyApp\Utils\Validator();
    $email = "test@example.com";
    $isValid = $validator->validateEmail($email) ? "ถูกต้อง" : "ไม่ถูกต้อง";
    echo "Email: $email - $isValid<br>";
    
    echo "<hr>";
    
    // ทดสอบ Controllers
    echo "<strong>2. Controllers Namespace:</strong><br>";
    $userController = new MyApp\Controllers\UserController();
    $userController->createUser("สมชาย");
    
    $productController = new MyApp\Controllers\ProductController();
    $productController->addProduct("แล็ปท็อป", 25000);
    
    echo "<hr>";
    
    // ทดสอบ Nested Namespace
    echo "<strong>3. Nested Namespaces (HR vs IT):</strong><br>";
    $hrEmp = new Company\Department\HR\Employee("สมชาย", "ผู้จัดการ");
    $hrEmp->showInfo();
    
    $itEmp = new Company\Department\IT\Employee("สมศักดิ์", "PHP, JavaScript");
    $itEmp->showInfo();
    
    echo "<hr>";
    
    // ทดสอบ Alias
    echo "<strong>4. ใช้ Namespace Alias:</strong><br>";
    use Shop\Frontend\Cart as ShoppingCart;
    use Shop\Backend\Inventory as Stock;
    
    $cart = new ShoppingCart();
    $cart->addItem("เสื้อ");
    $cart->addItem("กางเกง");
    $cart->showItems();
    
    $inventory = new Stock();
    echo "สต็อกปัจจุบัน: " . $inventory->checkStock() . "<br>";
    $inventory->updateStock(-10);
    
    echo "<hr>";
    
    // ทดสอบใช้ full path
    echo "<strong>5. เรียกใช้แบบ Full Path:</strong><br>";
    $product = new \MyApp\Models\Product("โทรศัพท์", 15000);
    $product->display();
    
    echo "<hr>";
    echo "<strong>สรุป:</strong> Namespaces ช่วยจัดระเบียบโค้ดและป้องกันชื่อซ้ำกัน!";
}
?>