<?php
// ============================================
// ตัวอย่างที่ 1: Iterable พื้นฐานกับ Array
// ============================================

function printItems(iterable $items) {
    foreach ($items as $key => $item) {
        echo "[$key] => $item<br>";
    }
}

function getColors(): iterable {
    return ["แดง", "เขียว", "น้ำเงิน", "เหลือง"];
}

// ============================================
// ตัวอย่างที่ 2: สร้าง Iterator Class แบบง่าย
// ============================================

class NumberIterator implements Iterator {
    private $numbers = [];
    private $position = 0;
    
    public function __construct($start, $end) {
        for ($i = $start; $i <= $end; $i++) {
            $this->numbers[] = $i;
        }
    }
    
    // คืนค่าปัจจุบัน
    public function current(): mixed {
        return $this->numbers[$this->position];
    }
    
    // คืนตำแหน่งปัจจุบัน
    public function key(): mixed {
        return $this->position;
    }
    
    // เลื่อนไปตำแหน่งถัดไป
    public function next(): void {
        $this->position++;
    }
    
    // รีเซ็ตกลับไปตำแหน่งแรก
    public function rewind(): void {
        $this->position = 0;
    }
    
    // ตรวจสอบว่ายังมีข้อมูลหรือไม่
    public function valid(): bool {
        return isset($this->numbers[$this->position]);
    }
}

// ============================================
// ตัวอย่างที่ 3: Product Iterator (ตัวอย่างจริง)
// ============================================

class Product {
    public $name;
    public $price;
    
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class ProductCollection implements Iterator {
    private $products = [];
    private $position = 0;
    
    public function addProduct(Product $product) {
        $this->products[] = $product;
    }
    
    public function current(): mixed {
        return $this->products[$this->position];
    }
    
    public function key(): mixed {
        return $this->position;
    }
    
    public function next(): void {
        $this->position++;
    }
    
    public function rewind(): void {
        $this->position = 0;
    }
    
    public function valid(): bool {
        return isset($this->products[$this->position]);
    }
    
    public function getTotalPrice() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->price;
        }
        return $total;
    }
}

// ============================================
// ตัวอย่างที่ 4: Student Iterator
// ============================================

class Student {
    public $name;
    public $grade;
    
    public function __construct($name, $grade) {
        $this->name = $name;
        $this->grade = $grade;
    }
}

class Classroom implements Iterator {
    private $students = [];
    private $position = 0;
    
    public function addStudent(Student $student) {
        $this->students[] = $student;
    }
    
    public function current(): mixed {
        return $this->students[$this->position];
    }
    
    public function key(): mixed {
        return $this->position;
    }
    
    public function next(): void {
        $this->position++;
    }
    
    public function rewind(): void {
        $this->position = 0;
    }
    
    public function valid(): bool {
        return isset($this->students[$this->position]);
    }
    
    public function getAverageGrade() {
        if (count($this->students) === 0) return 0;
        
        $sum = 0;
        foreach ($this->students as $student) {
            $sum += $student->grade;
        }
        return $sum / count($this->students);
    }
}

// ============================================
// ตัวอย่างที่ 5: Custom Range Iterator
// ============================================

class RangeIterator implements Iterator {
    private $start;
    private $end;
    private $step;
    private $current;
    
    public function __construct($start, $end, $step = 1) {
        $this->start = $start;
        $this->end = $end;
        $this->step = $step;
        $this->current = $start;
    }
    
    public function current(): mixed {
        return $this->current;
    }
    
    public function key(): mixed {
        return ($this->current - $this->start) / $this->step;
    }
    
    public function next(): void {
        $this->current += $this->step;
    }
    
    public function rewind(): void {
        $this->current = $this->start;
    }
    
    public function valid(): bool {
        return $this->current <= $this->end;
    }
}

// ============================================
// ทดสอบการทำงาน
// ============================================

echo "<h2>ตัวอย่างการใช้ PHP Iterables</h2>";
echo "<hr>";

// ทดสอบ Array แบบ Iterable
echo "<strong>1. Array เป็น Iterable:</strong><br>";
$fruits = ["มะม่วง", "กล้วย", "ส้ม", "แตงโม"];
printItems($fruits);

echo "<br>";
echo "<strong>Return Iterable:</strong><br>";
$colors = getColors();
printItems($colors);

echo "<hr>";

// ทดสอบ NumberIterator
echo "<strong>2. NumberIterator (1-10):</strong><br>";
$numbers = new NumberIterator(1, 10);
foreach ($numbers as $key => $num) {
    echo "ลำดับ $key: $num<br>";
}

echo "<hr>";

// ทดสอบ ProductCollection
echo "<strong>3. ProductCollection:</strong><br>";
$products = new ProductCollection();
$products->addProduct(new Product("แล็ปท็อป", 25000));
$products->addProduct(new Product("เมาส์", 500));
$products->addProduct(new Product("คีย์บอร์ด", 1500));

foreach ($products as $index => $product) {
    echo ($index + 1) . ". {$product->name} - {$product->price} บาท<br>";
}
echo "ราคารวม: " . $products->getTotalPrice() . " บาท<br>";

echo "<hr>";

// ทดสอบ Classroom
echo "<strong>4. Classroom Iterator:</strong><br>";
$classroom = new Classroom();
$classroom->addStudent(new Student("สมชาย", 85));
$classroom->addStudent(new Student("สมหญิง", 92));
$classroom->addStudent(new Student("สมศักดิ์", 78));
$classroom->addStudent(new Student("สมหมาย", 88));

echo "รายชื่อนักเรียน:<br>";
foreach ($classroom as $num => $student) {
    echo ($num + 1) . ". {$student->name} - คะแนน: {$student->grade}<br>";
}
echo "คะแนนเฉลี่ย: " . round($classroom->getAverageGrade(), 2) . "<br>";

echo "<hr>";

// ทดสอบ RangeIterator
echo "<strong>5. RangeIterator (0-20 step 5):</strong><br>";
$range = new RangeIterator(0, 20, 5);
foreach ($range as $value) {
    echo "ค่า: $value<br>";
}

echo "<br>";
echo "<strong>เลขคี่ 1-15:</strong><br>";
$oddNumbers = new RangeIterator(1, 15, 2);
foreach ($oddNumbers as $value) {
    echo "$value ";
}

echo "<hr>";
echo "<strong>สรุป:</strong> Iterables ช่วยให้สร้างวัตถุที่วนลูปได้แบบ foreach พร้อมควบคุมการทำงานได้เอง!";
?>