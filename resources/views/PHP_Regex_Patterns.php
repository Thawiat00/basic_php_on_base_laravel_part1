<?php
// ตรวจสอบอีเมล
function validateEmail($email) {
    $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    return preg_match($pattern, $email);
}

// ตรวจสอบเบอร์โทร (10 หลัก)
function validatePhone($phone) {
    $pattern = "/^[0-9]{10}$/";
    return preg_match($pattern, $phone);
}

// ตรวจสอบรหัสผ่าน (8-20 ตัว, มีตัวเลขและตัวอักษร)
function validatePassword($password) {
    $pattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/";
    return preg_match($pattern, $password);
}

// ทดสอบ
echo validateEmail("test@example.com") ? "Email ถูกต้อง" : "Email ไม่ถูกต้อง";
echo "<br>";
echo validatePhone("0812345678") ? "เบอร์ถูกต้อง" : "เบอร์ไม่ถูกต้อง";


?>