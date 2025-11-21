<?php
$cars = ["Volvo", "BMW", "Toyota", "Ford"];

// ลบด้วย array_splice (reindex อัตโนมัติ)
array_splice($cars, 1, 1);  // ลบ index 1

// ลบด้วย unset (ไม่ reindex)
unset($cars[2]);

// ลบตัวแรก
array_shift($cars);

// ลบตัวสุดท้าย
array_pop($cars);

print_r($cars);
?>