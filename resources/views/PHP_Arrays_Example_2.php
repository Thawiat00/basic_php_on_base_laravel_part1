<?php
echo "<h2>PHP Arrays - ตัวอย่างครบถ้วน</h2>";

// 1. Indexed Array
echo "<h3>1. Indexed Array</h3>";
$fruits = ["มะม่วง", "กล้วย", "ส้ม"];
$fruits[] = "แอปเปิ้ล";
array_push($fruits, "องุ่น", "สตรอเบอรี่");

echo "ผลไม้ทั้งหมด (" . count($fruits) . " ชนิด):<br>";
foreach($fruits as $index => $fruit) {
    echo "[$index] $fruit<br>";
}

// 2. Associative Array
echo "<h3>2. Associative Array</h3>";
$student = [
    "name" => "สมชาย ใจดี",
    "age" => 20,
    "grade" => "A",
    "score" => 95
];

$student["major"] = "วิทยาการคอมพิวเตอร์";

foreach($student as $key => $value) {
    echo ucfirst($key) . ": $value<br>";
}

// 3. การจัดการ Array
echo "<h3>3. การจัดการ Array</h3>";
$numbers = [15, 3, 27, 8, 42, 5, 19];
echo "ก่อนเรียง: " . implode(", ", $numbers) . "<br>";

sort($numbers);
echo "เรียงน้อย→มาก: " . implode(", ", $numbers) . "<br>";

rsort($numbers);
echo "เรียงมาก→น้อย: " . implode(", ", $numbers) . "<br>";

// 4. Array Functions
echo "<h3>4. Array Functions</h3>";
$colors = ["red", "green", "blue", "red", "yellow"];

echo "สีที่ซ้ำ:<br>";
$count_values = array_count_values($colors);
foreach($count_values as $color => $count) {
    if($count > 1) {
        echo "$color ปรากฏ $count ครั้ง<br>";
    }
}

// ลบค่าซ้ำ
$unique_colors = array_unique($colors);
echo "สีที่ไม่ซ้ำ: " . implode(", ", $unique_colors) . "<br>";

// 5. Multidimensional Array
echo "<h3>5. Multidimensional Array</h3>";
$products = [
    ["name" => "Laptop", "price" => 25000, "stock" => 10],
    ["name" => "Mouse", "price" => 500, "stock" => 50],
    ["name" => "Keyboard", "price" => 1500, "stock" => 30]
];

echo "<table border='1'>";
echo "<tr><th>สินค้า</th><th>ราคา</th><th>สต็อก</th></tr>";
foreach($products as $product) {
    echo "<tr>";
    echo "<td>{$product['name']}</td>";
    echo "<td>{$product['price']} บาท</td>";
    echo "<td>{$product['stock']} ชิ้น</td>";
    echo "</tr>";
}
echo "</table>";

// 6. Array Search & Filter
echo "<h3>6. Array Search & Filter</h3>";
$ages = ["Peter" => 35, "Ben" => 37, "Joe" => 43, "Harry" => 28];

// หาค่า
$key = array_search(37, $ages);
echo "อายุ 37 คือของ: $key<br>";

// กรองข้อมูล
$over_30 = array_filter($ages, function($age) {
    return $age > 30;
});
echo "คนอายุมากกว่า 30:<br>";
foreach($over_30 as $name => $age) {
    echo "$name: $age ปี<br>";
}
?>