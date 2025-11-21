<?php
$numbers = [4, 2, 8, 1, 9];

// เรียงจากน้อยไปมาก
sort($numbers);
echo "Sort (น้อย→มาก):\n";
print_r($numbers);
echo "\n";

// เรียงจากมากไปน้อย
rsort($numbers);
echo "Rsort (มาก→น้อย):\n";
print_r($numbers);
echo "\n";

// Associative array
$age = ["Peter" => 35, "Ben" => 37, "Joe" => 43];

// เรียงตาม value
asort($age);   // น้อย→มาก
echo "Asort (value น้อย→มาก):\n";
print_r($age);
echo "\n";

arsort($age);  // มาก→น้อย
echo "Arsort (value มาก→น้อย):\n";
print_r($age);
echo "\n";

// เรียงตาม key
ksort($age);   // A→Z
echo "Ksort (key A→Z):\n";
print_r($age);
echo "\n";

krsort($age);  // Z→A
echo "Krsort (key Z→A):\n";
print_r($age);
echo "\n";
?>
