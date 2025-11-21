<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>PHP Date Function Tutorial</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; padding: 20px; background: #f5f5f5; }
        .section { background: white; padding: 20px; margin: 15px 0; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; border-bottom: 3px solid #3498db; padding-bottom: 10px; }
        .result { background: #ecf0f1; padding: 10px; margin: 10px 0; border-left: 4px solid #3498db; }
        code { background: #34495e; color: #ecf0f1; padding: 2px 6px; border-radius: 3px; }
    </style>
</head>
<body>
    <h1 style="text-align:center; color:#2c3e50;">📅 PHP Date Function Tutorial</h1>

    <!-- ส่วนที่ 1: การแสดงวันที่รูปแบบต่างๆ -->
    <div class="section">
        <h2>1. การแสดงวันที่ในรูปแบบต่างๆ</h2>
        <?php
        echo "<div class='result'><strong>รูปแบบ Y/m/d:</strong> " . date("Y/m/d") . "</div>";
        echo "<div class='result'><strong>รูปแบบ Y.m.d:</strong> " . date("Y.m.d") . "</div>";
        echo "<div class='result'><strong>รูปแบบ Y-m-d:</strong> " . date("Y-m-d") . "</div>";
        echo "<div class='result'><strong>วันในสัปดาห์:</strong> " . date("l") . "</div>";
        echo "<div class='result'><strong>รูปแบบไทย:</strong> " . date("d/m/Y") . "</div>";
        ?>
    </div>

    <!-- ส่วนที่ 2: Copyright Year อัตโนมัติ -->
    <div class="section">
        <h2>2. Copyright Year แบบอัตโนมัติ</h2>
        <div class='result'>
            <?php echo "&copy; 2010-" . date("Y") . " Your Company Name"; ?>
        </div>
        <p>💡 ปีจะอัพเดทอัตโนมัติทุกปี!</p>
    </div>

    <!-- ส่วนที่ 3: การแสดงเวลา -->
    <div class="section">
        <h2>3. การแสดงเวลา</h2>
        <?php
        echo "<div class='result'><strong>เวลาแบบ 12 ชั่วโมง:</strong> " . date("h:i:s a") . "</div>";
        echo "<div class='result'><strong>เวลาแบบ 24 ชั่วโมง:</strong> " . date("H:i:s") . "</div>";
        echo "<div class='result'><strong>วันที่และเวลาเต็ม:</strong> " . date("l, d F Y H:i:s") . "</div>";
        ?>
    </div>

    <!-- ส่วนที่ 4: การตั้งค่า Timezone -->
    <div class="section">
        <h2>4. การตั้งค่า Timezone</h2>
        <?php
        // เวลาตาม Server เดิม
        echo "<div class='result'><strong>เวลาตาม Server:</strong> " . date("h:i:s a") . "</div>";
        
        // ตั้งค่าเป็นเวลาไทย
        date_default_timezone_set("Asia/Bangkok");
        echo "<div class='result'><strong>เวลาประเทศไทย:</strong> " . date("h:i:s a") . "</div>";
        
        // ตั้งค่าเป็นเวลานิวยอร์ก
        date_default_timezone_set("America/New_York");
        echo "<div class='result'><strong>เวลานิวยอร์ก:</strong> " . date("h:i:s a") . "</div>";
        ?>
    </div>

    <!-- ส่วนที่ 5: การใช้ mktime() -->
    <div class="section">
        <h2>5. สร้างวันที่ด้วย mktime()</h2>
        <?php
        // สร้างวันที่ 12 สิงหาคม 2014 เวลา 11:14:54
        $myDate = mktime(11, 14, 54, 8, 12, 2014);
        echo "<div class='result'><strong>วันที่ที่สร้าง:</strong> " . date("Y-m-d h:i:s a", $myDate) . "</div>";
        
        // สร้างวันเกิด
        $birthday = mktime(0, 0, 0, 5, 15, 1990);
        echo "<div class='result'><strong>วันเกิดตัวอย่าง:</strong> " . date("l, d F Y", $birthday) . "</div>";
        ?>
        <p><code>mktime(ชั่วโมง, นาที, วินาที, เดือน, วัน, ปี)</code></p>
    </div>

    <!-- ส่วนที่ 6: การใช้ strtotime() -->
    <div class="section">
        <h2>6. แปลงข้อความเป็นวันที่ด้วย strtotime()</h2>
        <?php
        // แปลงจากข้อความ
        $date1 = strtotime("10:30pm April 15 2014");
        echo "<div class='result'><strong>จากข้อความ:</strong> " . date("Y-m-d h:i:s a", $date1) . "</div>";
        
        // ใช้คำพิเศษ
        $tomorrow = strtotime("tomorrow");
        echo "<div class='result'><strong>วันพรุ่งนี้:</strong> " . date("Y-m-d", $tomorrow) . "</div>";
        
        $nextSaturday = strtotime("next Saturday");
        echo "<div class='result'><strong>วันเสาร์หน้า:</strong> " . date("Y-m-d (l)", $nextSaturday) . "</div>";
        
        $plus3months = strtotime("+3 Months");
        echo "<div class='result'><strong>อีก 3 เดือน:</strong> " . date("Y-m-d", $plus3months) . "</div>";
        ?>
    </div>

    <!-- ส่วนที่ 7: ตัวอย่างขั้นสูง - 6 วันเสาร์ถัดไป -->
    <div class="section">
        <h2>7. ตัวอย่างขั้นสูง: 6 วันเสาร์ถัดไป</h2>
        <?php
        $startdate = strtotime("Saturday");
        $enddate = strtotime("+6 weeks", $startdate);
        
        echo "<div class='result'>";
        $count = 1;
        while ($startdate < $enddate) {
            echo "<strong>เสาร์ที่ " . $count . ":</strong> " . date("d M Y", $startdate) . "<br>";
            $startdate = strtotime("+1 week", $startdate);
            $count++;
        }
        echo "</div>";
        ?>
    </div>

    <!-- ส่วนที่ 8: นับวันจนถึงวันสำคัญ -->
    <div class="section">
        <h2>8. นับวันจนถึงวันสำคัญ</h2>
        <?php
        // นับวันจนถึงวันปีใหม่
        $newYear = strtotime("January 1 next year");
        $daysUntil = ceil(($newYear - time()) / 60 / 60 / 24);
        echo "<div class='result'>🎉 <strong>เหลืออีก " . $daysUntil . " วัน</strong> จนถึงปีใหม่!</div>";
        
        // นับวันจนถึงวันคริสต์มาส
        $christmas = strtotime("December 25");
        if ($christmas < time()) {
            $christmas = strtotime("December 25 next year");
        }
        $daysToChristmas = ceil(($christmas - time()) / 60 / 60 / 24);
        echo "<div class='result'>🎄 <strong>เหลืออีก " . $daysToChristmas . " วัน</strong> จนถึงคริสต์มาส!</div>";
        ?>
    </div>

    <div style="text-align:center; margin-top:30px; color:#7f8c8d;">
        <p>⏰ เวลาปัจจุบันตาม Server: <strong><?php echo date("Y-m-d H:i:s"); ?></strong></p>
    </div>
</body>
</html>