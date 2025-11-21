<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อ 2: PHP Form Validation</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { background: white; padding: 30px; border-radius: 10px; max-width: 800px; margin: 0 auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #333; border-bottom: 3px solid #2196F3; padding-bottom: 10px; }
        .form-group { margin: 20px 0; }
        label { display: block; font-weight: bold; color: #555; margin-bottom: 5px; }
        input[type="text"], input[type="email"], textarea { 
            width: 100%; padding: 10px; border: 2px solid #ddd; 
            border-radius: 5px; font-size: 14px; 
        }
        input[type="submit"] { 
            background: #2196F3; color: white; padding: 12px 30px; 
            border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 20px; 
        }
        input[type="submit"]:hover { background: #0b7dda; }
        .result { background: #e3f2fd; padding: 20px; border-left: 5px solid #2196F3; margin: 20px 0; border-radius: 5px; }
        .security-box { background: #fff3cd; padding: 15px; border-left: 5px solid #ffc107; margin: 20px 0; border-radius: 5px; }
        .code-example { background: #f4f4f4; padding: 15px; border-radius: 5px; font-family: monospace; margin: 10px 0; overflow-x: auto; }
        .warning { color: #d32f2f; font-weight: bold; }
        .success { color: #388e3c; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #2196F3; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h2>ข้อ 2: PHP Form Validation - ความปลอดภัยเป็นสิ่งสำคัญ! 🔒</h2>
        
        <?php
        // ฟังก์ชันตรวจสอบและทำความสะอาดข้อมูล
        function test_input($data) {
            $data = trim($data);              // ลบช่องว่างหน้า-หลัง
            $data = stripslashes($data);      // ลบ backslash
            $data = htmlspecialchars($data);  // แปลงอักขระพิเศษ (ป้องกัน XSS)
            return $data;
        }
        
        // กำหนดตัวแปรเริ่มต้น
        $name = $email = $website = $comment = $gender = "";
        $showResult = false;
        
        // ตรวจสอบว่ามีการส่งฟอร์มหรือไม่
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $website = test_input($_POST["website"]);
            $comment = test_input($_POST["comment"]);
            $gender = test_input($_POST["gender"]);
            $showResult = true;
        }
        ?>
        
        <!-- แสดงผลลัพธ์ -->
        <?php if ($showResult): ?>
        <div class="result">
            <h3>✅ ข้อมูลที่ได้รับ (ปลอดภัยแล้ว):</h3>
            <table>
                <tr>
                    <th>ฟิลด์</th>
                    <th>ค่าที่ได้รับ</th>
                </tr>
                <tr>
                    <td><strong>ชื่อ:</strong></td>
                    <td><?php echo $name; ?></td>
                </tr>
                <tr>
                    <td><strong>อีเมล:</strong></td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td><strong>เว็บไซต์:</strong></td>
                    <td><?php echo $website; ?></td>
                </tr>
                <tr>
                    <td><strong>ความคิดเห็น:</strong></td>
                    <td><?php echo $comment; ?></td>
                </tr>
                <tr>
                    <td><strong>เพศ:</strong></td>
                    <td><?php echo $gender; ?></td>
                </tr>
            </table>
            <p class="success">💚 ข้อมูลทั้งหมดผ่านการตรวจสอบความปลอดภัยแล้ว!</p>
        </div>
        <?php endif; ?>
        
        <!-- คำเตือนความปลอดภัย -->
        <div class="security-box">
            <h3>⚠️ ทำไมต้องใช้ htmlspecialchars()?</h3>
            <p><strong>ป้องกัน XSS Attack:</strong> ถ้าผู้ใช้ใส่ script ที่เป็นอันตราย เช่น:</p>
            <div class="code-example">&lt;script&gt;alert('hacked')&lt;/script&gt;</div>
            <p>ฟังก์ชัน htmlspecialchars() จะแปลงเป็น:</p>
            <div class="code-example">&amp;lt;script&amp;gt;alert('hacked')&amp;lt;/script&amp;gt;</div>
            <p class="success">✅ ทำให้ script ไม่ทำงาน แสดงเป็นข้อความธรรมดาแทน</p>
        </div>
        
        <!-- ฟอร์ม -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label>ชื่อ:</label>
                <input type="text" name="name" placeholder="ใส่ชื่อของคุณ" required>
            </div>
            
            <div class="form-group">
                <label>อีเมล:</label>
                <input type="email" name="email" placeholder="example@email.com" required>
            </div>
            
            <div class="form-group">
                <label>เว็บไซต์: <small>(ไม่บังคับ)</small></label>
                <input type="text" name="website" placeholder="https://www.example.com">
            </div>
            
            <div class="form-group">
                <label>ความคิดเห็น: <small>(ไม่บังคับ)</small></label>
                <textarea name="comment" rows="5" placeholder="แสดงความคิดเห็น..."></textarea>
            </div>
            
            <div class="form-group">
                <label>เพศ:</label>
                <input type="radio" name="gender" value="female" required> หญิง
                <input type="radio" name="gender" value="male"> ชาย
                <input type="radio" name="gender" value="other"> อื่นๆ
            </div>
            
            <input type="submit" value="ส่งข้อมูล">
        </form>
        
        <!-- อธิบายฟังก์ชัน test_input() -->
        <div class="security-box" style="background: #e8f5e9; border-left: 5px solid #4caf50;">
            <h3>🔧 ฟังก์ชัน test_input() ทำอะไรบ้าง?</h3>
            <div class="code-example">
function test_input($data) {
    $data = trim($data);              // 1. ตัดช่องว่างหน้า-หลัง
    $data = stripslashes($data);      // 2. ลบ backslash (\)
    $data = htmlspecialchars($data);  // 3. แปลงอักขระพิเศษ (< > " ')
    return $data;
}
            </div>
            
            <table>
                <tr>
                    <th>ฟังก์ชัน</th>
                    <th>หน้าที่</th>
                    <th>ตัวอย่าง</th>
                </tr>
                <tr>
                    <td><strong>trim()</strong></td>
                    <td>ตัดช่องว่างส่วนเกิน</td>
                    <td>"  Hello  " → "Hello"</td>
                </tr>
                <tr>
                    <td><strong>stripslashes()</strong></td>
                    <td>ลบ backslash</td>
                    <td>"O\'Reilly" → "O'Reilly"</td>
                </tr>
                <tr>
                    <td><strong>htmlspecialchars()</strong></td>
                    <td>ป้องกัน XSS</td>
                    <td>"&lt;script&gt;" → "&amp;lt;script&amp;gt;"</td>
                </tr>
            </table>
        </div>
        
        <!-- สรุปความปลอดภัย -->
        <div style="background: #ffebee; padding: 20px; border-radius: 5px; margin-top: 20px;">
            <h3 class="warning">🚨 กฎความปลอดภัย 3 ข้อ:</h3>
            <ol style="line-height: 2;">
                <li><strong>ใช้ htmlspecialchars() กับ $_SERVER["PHP_SELF"]</strong> เสมอ</li>
                <li><strong>ตรวจสอบและทำความสะอาดข้อมูล</strong> ทุกครั้งที่รับจากผู้ใช้</li>
                <li><strong>ไม่ใช้ GET สำหรับข้อมูลสำคัญ</strong> เช่น รหัสผ่าน</li>
            </ol>
        </div>
    </div>
</body>
</html>