<?php
// ฟังก์ชันรับ 1 พารามิเตอร์
function familyName($fname) {
    echo "$fname Refsnes.<br>";
}

familyName("Jani");
familyName("Hege");

echo "<hr>";

// ฟังก์ชันรับหลายพารามิเตอร์
function familyInfo($fname, $year) {
    echo "$fname Refsnes. Born in $year<br>";
}

familyInfo("Stale", "1978");
familyInfo("Kai Jim", "1983");
?>