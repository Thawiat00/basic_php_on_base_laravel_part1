<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อ 1: PHP Form พื้นฐาน</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f0f0f0; }
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 600px; margin: 0 auto; }
        h2 { color: #333; border-bottom: 3px solid #4CAF50; padding-bottom: 10px; }
        .form-section { margin: 30px 0; padding: 20px; background: #f9f9f9; border-radius: 5px; }
        input[type="text"], input[type="email"] { 
            width: 100%; padding: 10px; margin: 8px 0; 
            border: 2px solid #ddd; border-radius: 5px; 
        }
        input[type="submit"] { 
            background: #4CAF50; color: white; padding: 12px 30px; 
            border: none; border-radius: 5px; cursor: pointer; font-size: 16px; 
        }
        input[type="submit"]:hover { background: #45a049; }
        .result { background: #e7f3e7; padding: 15px; border-left: 4px solid #4CAF50; margin: 20px 0; }
        .method-badge { 
            display: inline-block; padding: 5px 15px; border-radius: 20px; 
            font-size: 12px; font-weight: bold; margin-left: 10px; 
        }
        .post { background: #2196F3; color: white; }
        .get { background: #FF9800; color: white; }
        label { font-weight: bold; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <h2>ข้อ 1: PHP Form พื้นฐาน - POST และ GET</h2>
        
        <?php
        // ตรวจสอบว่ามีการส่งข้อมูลหรือไม่
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo '<div class="result">';
            echo '<h3>📬 ผลลัพธ์จาก POST Method:</h3>';
            echo '<p><strong>ชื่อ:</strong> ' . $_POST["name"] . '</p>';
            echo '<p><strong>อีเมล:</strong> ' . $_POST["email"] . '</p>';
            echo '<p><small>💡 ข้อมูลถูกส่งแบบซ่อน ไม่แสดงใน URL</small></p>';
            echo '</div>';
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["name"])) {
            echo '<div class="result">';
            echo '<h3>📭 ผลลัพธ์จาก GET Method:</h3>';
            echo '<p><strong>ชื่อ:</strong> ' . $_GET["name"] . '</p>';
            echo '<p><strong>อีเมล:</strong> ' . $_GET["email"] . '</p>';
            echo '<p><small>💡 ดูที่ URL ด้านบน จะเห็นข้อมูลที่ส่งมา</small></p>';
            echo '</div>';
        }
        ?>
        
        <!-- ฟอร์มแบบ POST -->
        <div class="form-section">
            <h3>1️⃣ ฟอร์มแบบ POST <span class="method-badge post">POST</span></h3>
            <p>ใช้สำหรับ: รหัสผ่าน, ข้อมูลส่วนตัว, ข้อมูลสำคัญ</p>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>ชื่อ:</label>
                <input type="text" name="name" placeholder="ใส่ชื่อของคุณ" required>
                
                <label>อีเมล:</label>
                <input type="email" name="email" placeholder="example@email.com" required>
                
                <input type="submit" value="ส่งข้อมูล (POST)">
            </form>
        </div>
        
        <!-- ฟอร์มแบบ GET -->
        <div class="form-section">
            <h3>2️⃣ ฟอร์มแบบ GET <span class="method-badge get">GET</span></h3>
            <p>ใช้สำหรับ: ค้นหา, กรองข้อมูล, แชร์ลิงก์</p>
            
            <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>ชื่อ:</label>
                <input type="text" name="name" placeholder="ใส่ชื่อของคุณ" required>
                
                <label>อีเมล:</label>
                <input type="email" name="email" placeholder="example@email.com" required>
                
                <input type="submit" value="ส่งข้อมูล (GET)">
            </form>
        </div>
        
        <!-- สรุปความแตกต่าง -->
        <div class="form-section">
            <h3>📊 เปรียบเทียบ POST vs GET</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="background: #f0f0f0;">
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left;">คุณสมบัติ</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: center;">POST</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: center;">GET</th>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">แสดงใน URL</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">❌ ไม่</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">✅ ใช่</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">ความปลอดภัย</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">✅ สูง</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">❌ ต่ำ</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">ข้อจำกัดขนาด</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">ไม่จำกัด</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">~2000 ตัวอักษร</td>
                </tr>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">Bookmark ได้</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">❌ ไม่ได้</td>
                    <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">✅ ได้</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>