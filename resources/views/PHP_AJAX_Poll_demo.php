<?php
// ============================
// 1) ตรวจสอบว่ามีการส่งค่า vote มาหรือไม่
// ============================
$vote = isset($_REQUEST['vote']) ? $_REQUEST['vote'] : null;

// ป้องกัน Warning Undefined array key "vote"
if ($vote === null) {
    echo "<h2 style='color:red;'>❌ ERROR: ไม่พบตัวแปร vote ใน URL</h2>";
    echo "คุณต้องใส่ค่าแบบนี้: <br>";
    echo "<code>poll_vote.php?vote=0</code> หรือ <br>";
    echo "<code>poll_vote.php?vote=1</code><br><br>";
}

// ============================
// 2) สร้างตัวแปรจำลองผลโหวต
// ============================
$yes = 10;
$no  = 5;

// ============================
// 3) อัปเดตคะแนน (ทำเฉพาะเมื่อมีค่า vote จริง)
// ============================
if ($vote === "0") {
    $yes++;
}
if ($vote === "1") {
    $no++;
}

// ============================
// 4) คำนวณผล
// ============================
$total = $yes + $no;
$yesPercent = $total > 0 ? round(($yes / $total) * 100) : 0;
$noPercent  = $total > 0 ? round(($no / $total) * 100) : 0;

// ============================
// 5) แสดงค่าตัวแปรทั้งหมด
// ============================
echo "<h2>📌 DEBUG ตัวแปรทั้งหมด</h2>";
echo "vote = "; var_dump($vote); echo "<br>";
echo "yes = $yes<br>";
echo "no = $no<br>";
echo "total = $total<br>";
echo "yesPercent = $yesPercent %<br>";
echo "noPercent = $noPercent %<br><br>";

// ============================
// 6) แสดงผลกราฟ
// ============================
echo "
<h2>📊 ผลโหวตแบบจำลอง</h2>

<table style='width:100%; border-collapse: collapse;'>

<tr>
    <td style='padding: 10px;'>👍 ชอบ:</td>
    <td>
        <div style='background: linear-gradient(90deg, #667eea, #764ba2);
                    width: {$yesPercent}%;
                    height: 30px;
                    border-radius: 15px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-weight: bold;'>
            {$yesPercent}%
        </div>
    </td>
</tr>

<tr>
    <td style='padding: 10px;'>👎 ไม่ชอบ:</td>
    <td>
        <div style='background: linear-gradient(90deg, #f093fb, #f5576c);
                    width: {$noPercent}%;
                    height: 30px;
                    border-radius: 15px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-weight: bold;'>
            {$noPercent}%
        </div>
    </td>
</tr>

</table>
";
?>
