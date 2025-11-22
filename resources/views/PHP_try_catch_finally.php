<?php


function divide($dividend, $divisor) {
    if($divisor == 0) {
        throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
}

try {
    echo "1. เริ่มคำนวณ...\n";
    $result = divide(10, 2);
    echo "2. ผลลัพธ์: $result\n";
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} finally {
    echo "3. Finally: กระบวนการเสร็จสิ้น\n";
    echo "4. ปิดการเชื่อมต่อฐานข้อมูล\n";
}
?>