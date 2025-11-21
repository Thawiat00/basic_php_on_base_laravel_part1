<?php declare(strict_types=1);

// กำหนด Type สำหรับพารามิเตอร์
function addNumbers(int $a, int $b) {
    return $a + $b;
}

echo addNumbers(5, 5) . "<br> <br>";
// echo addNumbers(5, "5 days"); // จะ Error เพราะเปิด strict mode

// กำหนด Type สำหรับค่าที่ Return
function multiply(float $a, float $b): float {
    return $a * $b;
}

echo multiply(2.5, 4.0);
?>