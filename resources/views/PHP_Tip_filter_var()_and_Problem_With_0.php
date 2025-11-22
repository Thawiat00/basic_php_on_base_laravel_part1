<?php
$int = 0;

if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
}

echo  '<br> <br>';

?>


<?php

echo <<<EOT

In the example above, if $int was set to 0, the function above will return "Integer is not valid". To solve this problem, use the code below:

EOT;

echo  '<br> <br>';


?>

<?php

echo <<<EOT


อ๋อ อันนี้เกี่ยวกับ ฟังก์ชัน filter_var() ใน PHP และปัญหาพิเศษของค่าที่เป็น 0 ค่ะ เรามาอธิบายทีละขั้นตอนเลย <br>

1️⃣ ปกติแล้ว filter_var() ใช้ยังไง? <br>
$int = 100; <br>

if (!filter_var($int, FILTER_VALIDATE_INT) === false) { <br>
    echo("Integer is valid"); <br>
} else { <br>
    echo("Integer is not valid"); <br>
}<br> 

<br>
filter_var($int, FILTER_VALIDATE_INT) จะตรวจสอบว่า $int เป็น จำนวนเต็ม (integer) หรือไม่ <br>

ถ้าเป็นจำนวนเต็ม จะคืนค่า จำนวนเต็มนั้น <br>
 
ถ้าไม่ใช่ จะคืนค่า false <br>

2️⃣ ปัญหากับค่า 0 <br>

ถ้า $int = 0 แล้วใช้เงื่อนไขนี้: <br>

if (!filter_var($int, FILTER_VALIDATE_INT) === false) { <br>


filter_var(0, FILTER_VALIDATE_INT) จะคืนค่า 0 <br>

แต่ 0 ใน PHP จะถูกตีความเป็น false เวลาใช้ในเงื่อนไข <br>

ทำให้เงื่อนไขนี้ผิดพลาด และแสดงผลว่า "Integer is not valid" ทั้งที่ 0 เป็นจำนวนเต็มที่ถูกต้อง <br>

นี่คือ ปัญหาที่เกิดกับค่า 0 <br>

3️⃣ วิธีแก้ปัญหา <br>

เราต้องตรวจสอบค่า 0 แยกออกมา หรือใช้การเปรียบเทียบแบบ strict (===): <br>

$int = 0; <br>

if (filter_var($int, FILTER_VALIDATE_INT) === 0 || filter_var($int, FILTER_VALIDATE_INT) !== false) { <br>
    echo("Integer is valid"); <br>
} else { <br>
    echo("Integer is not valid"); <br>
}


filter_var($int, FILTER_VALIDATE_INT) === 0 → ตรวจสอบตรง ๆ ว่าเป็น 0 <br>

filter_var($int, FILTER_VALIDATE_INT) !== false → ตรวจสอบจำนวนเต็มอื่น ๆ <br>

แบบนี้จะครอบคลุม ทุกจำนวนเต็ม รวมถึง 0 <br>

✅ สรุป <br>

filter_var() คืนค่า จำนวนเต็มจริง หรือ false <br>

ปัญหาคือ PHP มอง 0 เป็น false ใน boolean context <br>

แก้โดยใช้ การเปรียบเทียบแบบ strict (===) <br>

EOT;

echo  '<br> <br>';
?>