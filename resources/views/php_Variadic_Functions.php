<?php
function sumMyNumbers(...$x) {
    $n = 0;
    foreach($x as $num) {
        $n += $num;
    }
    return $n;
}

$result = sumMyNumbers(5, 2, 6, 2, 7, 7);
echo "ผลรวม: $result<br>";

// ต้องเป็นพารามิเตอร์ตัวสุดท้าย
function myFamily($lastname, ...$firstname) {
    foreach($firstname as $name) {
        echo "Hi, $name $lastname.<br>";
    }
}

myFamily("Doe_mark2","Doe", "Jane", "John", "Joey");
?>