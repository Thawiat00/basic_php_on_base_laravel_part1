<?php
// สร้าง array
$cars = array("Volvo", "BMW", "Toyota");
// หรือ
$fruits = ["Apple", "Banana", "Orange"];

// เข้าถึงข้อมูล
echo $cars[0] . "<br>";  // Volvo

// แก้ไขข้อมูล
$cars[1] = "Ford";

// วนลูป
foreach($cars as $car) {
    echo "$car<br>";
}

// นับจำนวน
echo "มี " . count($cars) . " คัน";
?>


