<?php
echo "<h2>ข้อ 8: PHP Loops (การวนซ้ำ)</h2>";

// ==========================================
// 1. while Loop
// ==========================================
echo "<h3>8.1 while Loop</h3>";

$i = 1;
echo "นับ 1-5: ";
while ($i <= 5) {
    echo "$i ";
    $i++;
}
echo "<br><br>";

// ตัวอย่าง while แบบละเอียด
$count = 1;
echo "ตัวอย่าง while:<br>";
while ($count <= 3) {
    echo "รอบที่ $count<br>";
    $count++;
}
echo "<br>";

// ==========================================
// 2. while กับ break
// ==========================================
echo "<h3>8.2 while กับ break (หยุดทันที)</h3>";

$num = 1;
while ($num <= 10) {
    if ($num == 5) {
        echo "หยุดที่ $num<br>";
        break;
    }
    echo "$num ";
    $num++;
}
echo "<br><br>";

// ==========================================
// 3. while กับ continue
// ==========================================
echo "<h3>8.3 while กับ continue (ข้ามรอบ)</h3>";

$x = 0;
echo "แสดงเฉพาะเลขคู่ 1-10: ";
while ($x < 10) {
    $x++;
    if ($x % 2 != 0) continue; // ข้ามเลขคี่
    echo "$x ";
}
echo "<br><br>";

// ==========================================
// 4. do...while Loop
// ==========================================
echo "<h3>8.4 do...while Loop (ทำก่อน 1 ครั้ง)</h3>";

$j = 1;
echo "นับด้วย do-while: ";
do {
    echo "$j ";
    $j++;
} while ($j <= 5);
echo "<br><br>";

// แสดงความแตกต่าง: เงื่อนไขเป็นเท็จตั้งแต่ต้น
$k = 10;
echo "do-while แม้เงื่อนไขเป็นเท็จ:<br>";
do {
    echo "ทำงาน 1 ครั้ง (k = $k)<br>";
    $k++;
} while ($k < 5);
echo "<br>";

// ==========================================
// 5. for Loop
// ==========================================
echo "<h3>8.5 for Loop</h3>";

echo "นับ 0-10:<br>";
for ($n = 0; $n <= 10; $n++) {
    echo "ตัวเลข: $n<br>";
}
echo "<br>";

// นับถอยหลัง
echo "นับถอยหลัง 10-1:<br>";
for ($n = 10; $n >= 1; $n--) {
    echo "$n ";
}
echo "<br><br>";

// ==========================================
// 6. for กับ break และ continue
// ==========================================
echo "<h3>8.6 for กับ break และ continue</h3>";

echo "break เมื่อ = 5: ";
for ($n = 0; $n <= 10; $n++) {
    if ($n == 5) break;
    echo "$n ";
}
echo "<br>";

echo "continue เมื่อเป็นเลข 5: ";
for ($n = 0; $n <= 10; $n++) {
    if ($n == 5) continue;
    echo "$n ";
}
echo "<br><br>";

// ==========================================
// 7. for วนข้าม (Step)
// ==========================================
echo "<h3>8.7 for วนข้าม</h3>";

echo "นับข้าม 10 (0-100): ";
for ($n = 0; $n <= 100; $n += 10) {
    echo "$n ";
}
echo "<br>";

echo "เลขคู่ 0-20: ";
for ($n = 0; $n <= 20; $n += 2) {
    echo "$n ";
}
echo "<br><br>";

// ==========================================
// 8. foreach Loop กับ Array
// ==========================================
echo "<h3>8.8 foreach Loop กับ Array</h3>";

$colors = array("แดง", "เขียว", "น้ำเงิน", "เหลือง");

echo "วนรอบ array ธรรมดา:<br>";
foreach ($colors as $color) {
    echo "- $color<br>";
}
echo "<br>";

// Indexed array กับ index
echo "แสดงทั้ง index และค่า:<br>";
foreach ($colors as $index => $color) {
    echo "[$index] = $color<br>";
}
echo "<br>";

// ==========================================
// 9. foreach กับ Associative Array
// ==========================================
echo "<h3>8.9 foreach กับ Associative Array</h3>";

$student = array(
    "ชื่อ" => "สมชาย",
    "อายุ" => 20,
    "เกรด" => "A",
    "คะแนน" => 85
);

foreach ($student as $key => $value) {
    echo "$key: $value<br>";
}
echo "<br>";

// ==========================================
// 10. foreach กับ Object
// ==========================================
echo "<h3>8.10 foreach กับ Object</h3>";

class Product {
    public $name;
    public $price;
    public $stock;
    
    public function __construct($name, $price, $stock) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }
}

$product = new Product("โน้ตบุ๊ค", 25000, 10);

foreach ($product as $property => $value) {
    echo "$property: $value<br>";
}
echo "<br>";

// ==========================================
// 11. foreach Byref (แก้ไขค่าใน array)
// ==========================================
echo "<h3>8.11 foreach Byref (แก้ไขค่า)</h3>";

$numbers = array(10, 20, 30, 40);
echo "ก่อนแก้ไข: " . implode(", ", $numbers) . "<br>";

// ใช้ & เพื่ออ้างอิงตัวแปร
foreach ($numbers as &$num) {
    $num = $num * 2;
}
unset($num); // ควร unset หลังใช้งาน

echo "หลังแก้ไข (x2): " . implode(", ", $numbers) . "<br><br>";

// ==========================================
// 12. Nested Loops (Loop ซ้อน Loop)
// ==========================================
echo "<h3>8.12 Nested Loops (Loop ซ้อน)</h3>";

echo "ตารางสูตรคูณ 2-3:<br>";
for ($i = 2; $i <= 3; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        $result = $i * $j;
        echo "$i x $j = $result<br>";
    }
    echo "<br>";
}

// ==========================================
// 13. ตัวอย่างจริง - แสดงรายการสินค้า
// ==========================================
echo "<h3>8.13 ตัวอย่างจริง - รายการสินค้า</h3>";

$products = array(
    array("name" => "เสื้อยืด", "price" => 250, "qty" => 5),
    array("name" => "กางเกง", "price" => 450, "qty" => 3),
    array("name" => "รองเท้า", "price" => 890, "qty" => 2)
);

$totalAmount = 0;
$no = 1;

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ลำดับ</th><th>สินค้า</th><th>ราคา</th><th>จำนวน</th><th>รวม</th></tr>";

foreach ($products as $item) {
    $itemTotal = $item['price'] * $item['qty'];
    $totalAmount += $itemTotal;
    
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>{$item['name']}</td>";
    echo "<td>{$item['price']} บาท</td>";
    echo "<td>{$item['qty']} ชิ้น</td>";
    echo "<td>$itemTotal บาท</td>";
    echo "</tr>";
    
    $no++;
}

echo "<tr><td colspan='4'><strong>รวมทั้งหมด</strong></td><td><strong>$totalAmount บาท</strong></td></tr>";
echo "</table><br>";

// ==========================================
// 14. ตัวอย่างจริง - สร้าง Dropdown Select
// ==========================================
echo "<h3>8.14 ตัวอย่างจริง - Dropdown ปี พ.ศ.</h3>";

$currentYear = date("Y") + 543; // แปลง ค.ศ. เป็น พ.ศ.

echo "<select>";
echo "<option>-- เลือกปี --</option>";
for ($year = $currentYear; $year >= $currentYear - 10; $year--) {
    echo "<option value='$year'>$year</option>";
}
echo "</select><br><br>";

// ==========================================
// 15. ตัวอย่างจริง - Pagination
// ==========================================
echo "<h3>8.15 ตัวอย่างจริง - Pagination</h3>";

$totalItems = 48;
$itemsPerPage = 10;
$totalPages = ceil($totalItems / $itemsPerPage);
$currentPage = 2;

echo "หน้า: ";
for ($page = 1; $page <= $totalPages; $page++) {
    if ($page == $currentPage) {
        echo "<strong>[$page]</strong> ";
    } else {
        echo "<a href='?page=$page'>$page</a> ";
    }
}
echo "<br>แสดง " . (($currentPage - 1) * $itemsPerPage + 1) . "-";
echo min($currentPage * $itemsPerPage, $totalItems) . " จาก $totalItems รายการ<br>";

echo "<hr>";
?>