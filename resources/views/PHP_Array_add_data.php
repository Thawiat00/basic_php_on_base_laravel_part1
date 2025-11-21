<?php
$fruits = ["Apple", "Banana"];

// เพิ่มตอนท้าย
$fruits[] = "Orange";

// เพิ่มหลายตัว
array_push($fruits, "Mango", "Grape");

// Associative array
$car = ["brand" => "Ford"];
$car["color"] = "Red";
$car += ["year" => 2024, "price" => 500000];

print_r($fruits);
print_r($car);
?>