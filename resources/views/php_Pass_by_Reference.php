<?php
// ส่งค่าแบบ reference (&) เพื่อแก้ไขตัวแปรต้นทาง
function add_five(&$value) {
    $value += 5;
}

$num = 2;
add_five($num);
echo "ค่าใหม่: $num";  // แสดง 7
?>
