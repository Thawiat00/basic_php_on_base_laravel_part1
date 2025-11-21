<?php
$cars = array(
    array("Volvo", 22, 18),
    array("BMW", 15, 13),
    array("Saab", 5, 2)
);

// เข้าถึงข้อมูล
echo $cars[0][0];  // Volvo
echo $cars[1][1];  // 15

// วนลูป 2 ชั้น
for($row = 0; $row < 3; $row++) {
    echo "<ul>";
    for($col = 0; $col < 3; $col++) {
        echo "<li>" . $cars[$row][$col] . "</li>";
    }
    echo "</ul>";
}
?>