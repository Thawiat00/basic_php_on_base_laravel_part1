<?php
// ======================================
// ตัวอย่างที่ 1: สร้างและอ่าน Cookie
// ======================================
$cookie_name = "user";
$cookie_value = "John Doe";

// สร้าง Cookie (หมดอายุใน 30 วัน)
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Cookies Tutorial</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f0f0f0; }
        .section { background: white; padding: 20px; margin: 20px 0; border-radius: 8px; }
        .success { color: green; }
        .error { color: red; }
        button { padding: 10px 20px; margin: 5px; cursor: pointer; }
    </style>
</head>
<body>

<h1>🍪 PHP Cookies Tutorial</h1>

<!-- Section 1: อ่าน Cookie -->
<div class="section">
    <h2>1. ตรวจสอบ Cookie</h2>
    <?php
    if(!isset($_COOKIE[$cookie_name])) {
        echo "<p class='error'>❌ Cookie ชื่อ '" . $cookie_name . "' ยังไม่ถูกสร้าง!</p>";
        echo "<p>กรุณา Refresh หน้านี้อีกครั้ง เพื่อให้ Cookie ทำงาน</p>";
    } else {
        echo "<p class='success'>✅ Cookie '" . $cookie_name . "' ถูกสร้างแล้ว!</p>";
        echo "<p><strong>ค่าที่เก็บ:</strong> " . $_COOKIE[$cookie_name] . "</p>";
    }
    ?>
</div>

<!-- Section 2: แก้ไข Cookie -->
<div class="section">
    <h2>2. แก้ไข Cookie</h2>
    <?php
    if(isset($_GET['modify'])) {
        $new_value = "Alex Porter";
        setcookie($cookie_name, $new_value, time() + (86400 * 30), "/");
        echo "<p class='success'>✅ Cookie ถูกแก้ไขเป็น: " . $new_value . "</p>";
        echo "<p><em>Refresh หน้านี้เพื่อเห็นการเปลี่ยนแปลง</em></p>";
    }
    ?>
    <form method="GET">
        <button type="submit" name="modify" value="1">🔄 แก้ไข Cookie</button>
    </form>
</div>

<!-- Section 3: ลบ Cookie -->
<div class="section">
    <h2>3. ลบ Cookie</h2>
    <?php
    if(isset($_GET['delete'])) {
        // ตั้งเวลาหมดอายุเป็น 1 ชั่วโมงที่แล้ว
        setcookie($cookie_name, "", time() - 3600, "/");
        echo "<p class='success'>✅ Cookie '" . $cookie_name . "' ถูกลบแล้ว!</p>";
        echo "<p><em>Refresh หน้านี้เพื่อเห็นการเปลี่ยนแปลง</em></p>";
    }
    ?>
    <form method="GET">
        <button type="submit" name="delete" value="1">🗑️ ลบ Cookie</button>
    </form>
</div>

<!-- Section 4: ตรวจสอบว่า Browser รองรับ Cookie หรือไม่ -->
<div class="section">
    <h2>4. ตรวจสอบการรองรับ Cookie</h2>
    <?php
    setcookie("test_cookie", "test", time() + 3600, '/');
    
    if(count($_COOKIE) > 0) {
        echo "<p class='success'>✅ Browser รองรับ Cookies</p>";
        echo "<p>จำนวน Cookies ที่มี: " . count($_COOKIE) . "</p>";
    } else {
        echo "<p class='error'>❌ Browser ไม่รองรับ Cookies หรือถูกปิดการใช้งาน</p>";
    }
    ?>
</div>

<!-- Section 5: แสดง Cookies ทั้งหมด -->
<div class="section">
    <h2>5. รายการ Cookies ทั้งหมด</h2>
    <?php
    if(count($_COOKIE) > 0) {
        echo "<ul>";
        foreach($_COOKIE as $key => $value) {
            echo "<li><strong>$key:</strong> $value</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>ไม่มี Cookie</p>";
    }
    ?>
</div>

<div class="section">
    <h3>📝 หมายเหตุสำคัญ:</h3>
    <ul>
        <li>setcookie() ต้องอยู่ก่อน tag &lt;html&gt; เสมอ</li>
        <li>Cookie จะถูกส่งไปยัง Browser และกลับมาในคำขอถัดไป</li>
        <li>ค่าของ Cookie จะถูก URL encode อัตโนมัติ</li>
        <li>Cookie มีข้อจำกัดประมาณ 4KB ต่อ Cookie</li>
        <li>หนึ่ง Domain สามารถมี Cookie ได้สูงสุด 20 ตัว</li>
    </ul>
</div>

</body>
</html>