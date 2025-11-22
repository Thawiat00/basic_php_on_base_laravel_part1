<?php
// -------------------------------
// รับค่าจาก AJAX: ?q=1
// -------------------------------
$q = isset($_GET['q']) ? $_GET['q'] : "";  // ตัวแปร $q คือ id ผู้ใช้
echo "<b>ตัวแปรที่ได้รับจาก AJAX: \$q = " . htmlspecialchars($q) . "</b><br><br>";

// -------------------------------
// จำลองข้อมูลเหมือน MySQL (Array แทนฐานข้อมูล)
// -------------------------------
$database = [
    1 => [
        "FirstName" => "Peter",
        "LastName"  => "Griffin",
        "Age"       => 41,
        "Hometown"  => "Quahog",
        "Job"       => "Brewery"
    ],
    2 => [
        "FirstName" => "Lois",
        "LastName"  => "Griffin",
        "Age"       => 40,
        "Hometown"  => "Newport",
        "Job"       => "Piano Teacher"
    ],
    3 => [
        "FirstName" => "Joseph",
        "LastName"  => "Swanson",
        "Age"       => 39,
        "Hometown"  => "Quahog",
        "Job"       => "Police Officer"
    ],
    4 => [
        "FirstName" => "Glenn",
        "LastName"  => "Quagmire",
        "Age"       => 41,
        "Hometown"  => "Quahog",
        "Job"       => "Pilot"
    ],
];

// โชว์ตัวแปร $database ทั้งหมด
echo "<pre><b>ตัวแปร \$database:</b>\n";
print_r($database);
echo "</pre><br>";

// -------------------------------
// ตรวจสอบว่ามีข้อมูล ID ที่ส่งมาหรือไม่
// -------------------------------
if (!isset($database[$q])) {
    echo "<b style='color:red;'>❌ ไม่พบข้อมูลสำหรับ ID = $q</b>";
    exit;
}

// ตัวแปร $person คือข้อมูลผู้ใช้ที่เลือก
$person = $database[$q];

// โชว์ตัวแปร $person
echo "<pre><b>ตัวแปร \$person:</b>\n";
print_r($person);
echo "</pre><br>";

// -------------------------------
// แสดงผลเป็น HTML Table ด้วย echo
// -------------------------------
echo "<table border='1' cellpadding='10' style='border-collapse: collapse; width: 100%;'>";
echo "<tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>Hometown</th>
        <th>Job</th>
     </tr>";

echo "<tr>";
echo "<td>" . $person["FirstName"] . "</td>";
echo "<td>" . $person["LastName"] . "</td>";
echo "<td>" . $person["Age"] . "</td>";
echo "<td>" . $person["Hometown"] . "</td>";
echo "<td>" . $person["Job"] . "</td>";
echo "</tr>";

echo "</table>";
?>
