<?php
// สร้าง array แบบ key => value
$car = array(
    "brand" => "Ford",
    "model" => "Mustang",
    "year" => 1964
);

// เข้าถึงด้วย key
echo $car["model"] . "<br>";

// วนลูปแสดง key และ value
foreach($car as $key => $value) {
    echo "$key: $value<br>";
}
?>