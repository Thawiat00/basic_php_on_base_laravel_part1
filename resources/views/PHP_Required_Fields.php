<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อ 3: Required Fields</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .container { background: white; padding: 40px; border-radius: 15px; max-width: 700px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        h2 { color: #333; border-bottom: 4px solid #667eea; padding-bottom: 15px; }
        .form-group { margin: 25px 0; }
        label { display: block; font-weight: bold; color: #555; margin-bottom: 8px; }
        .required { color: #f44336; }
        input[type="text"], input[type="email"], textarea { 
            width: 100%; padding: 12px; border: 2px solid #ddd; 
            border-radius: 8px; font-size: 14px; transition: border 0.3s; 
        }
        input:focus, textarea:focus { border-color: #667eea; outline: none; }
        .error { color: #f44336; font-size: 13px; margin-top: 5px; display: block; font-weight: bold; }
        input[type="submit"] { 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            color: white; padding: 15px 40px; border: none; border-radius: 8px; 
            cursor: pointer; font-size: 16px; margin-top: 20px; width: 100%; font-weight: bold; 
        }
        input[type="submit"]:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4); }
        .result { background: #e8f5e9; padding: 20px; border-left: 5px solid #4caf50; margin: 20px 0; border-radius: 8px; }
        .validation-rules { background: #fff3e0; padding: 20px; border-radius: 8px; margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #667eea; color: white; }
        .radio-group { display: flex; gap: 15px; margin-top: 10px; }
        .radio-group label { display: inline; font-weight: normal; }
    </style>
</head>
<body>
    <div class="container">
        <h2>ข้อ 3: ตรวจสอบฟิลด์บังคับ (Required Fields) ✅</h2>
        
        <?php
        // ฟังก์ชันทำความสะอาดข้อมูล
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        // กำหนดตัวแปร error
        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        $name = $email = $gender = $comment = $website = "";
        $isValid = false;
        
        // ตรวจสอบเมื่อมีการ submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // ตรวจสอบชื่อ (บังคับ)
            if (empty($_POST["name"])) {
                $nameErr = "⚠️ กรุณากรอกชื่อ";
            } else {
                $name = test_input($_POST["name"]);
            }
            
            // ตรวจสอบอีเมล (บังคับ)
            if (empty($_POST["email"])) {
                $emailErr = "⚠️ กรุณากรอกอีเมล";
            } else {
                $email = test_input($_POST["email"]);
            }
            
            // เว็บไซต์ (ไม่บังคับ)
            if (empty($_POST["website"])) {
                $website = "";
            } else {
                $website = test_input($_POST["website"]);
            }
            
            // ความคิดเห็น (ไม่บังคับ)
            if (empty($_POST["comment"])) {
                $comment = "";
            } else {
                $comment = test_input($_POST["comment"]);
            }
            
            // ตรวจสอบเพศ (บังคับ)
            if (empty($_POST["gender"])) {
                $genderErr = "⚠️ กรุณาเลือกเพศ";
            } else {
                $gender = test_input($_POST["gender"]);
            }
            
            // ตรวจสอบว่าไม่มี error หรือไม่
            if (empty($nameErr) && empty($emailErr) && empty($genderErr)) {
                $isValid = true;
            }
        }
        ?>
        
        <!-- แสดงผลลัพธ์เมื่อ valid -->
        <?php if ($isValid): ?>
        <div class="result">
            <h3>🎉 ส่งข้อมูลสำเร็จ!</h3>
            <table>
                <tr><th>ฟิลด์</th><th>ค่า</th></tr>
                <tr><td><strong>ชื่อ:</strong></td><td><?php echo $name; ?></td></tr>
                <tr><td><strong>อีเมล:</strong></td><td><?php echo $email; ?></td></tr>
                <tr><td><strong>เว็บไซต์:</strong></td><td><?php echo $website ? $website : "-"; ?></td></tr>
                <tr><td><strong>ความคิดเห็น:</strong></td><td><?php echo $comment ? $comment : "-"; ?></td></tr>
                <tr><td><strong>เพศ:</strong></td><td><?php echo $gender; ?></td></tr>
            </table>
        </div>
        <?php endif; ?>
        
        <!-- กฎการตรวจสอบ -->
        <div class="validation-rules">
            <h3>📋 กฎการตรวจสอบ:</h3>
            <table>
                <tr>
                    <th>ฟิลด์</th>
                    <th>สถานะ</th>
                    <th>กฎ</th>
                </tr>
                <tr>
                    <td>ชื่อ</td>
                    <td><span class="required">* บังคับ</span></td>
                    <td>ต้องกรอก</td>
                </tr>
                <tr>
                    <td>อีเมล</td>
                    <td><span class="required">* บังคับ</span></td>
                    <td>ต้องกรอก</td>
                </tr>
                <tr>
                    <td>เว็บไซต์</td>
                    <td>ไม่บังคับ</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>ความคิดเห็น</td>
                    <td>ไม่บังคับ</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>เพศ</td>
                    <td><span class="required">* บังคับ</span></td>
                    <td>ต้องเลือก</td>
                </tr>
            </table>
        </div>
        
        <!-- ฟอร์ม -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            
            <div class="form-group">
                <label>ชื่อ: <span class="required">*</span></label>
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="ใส่ชื่อของคุณ">
                <span class="error"><?php echo $nameErr; ?></span>
            </div>
            
            <div class="form-group">
                <label>อีเมล: <span class="required">*</span></label>
                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="example@email.com">
                <span class="error"><?php echo $emailErr; ?></span>
            </div>
            
            <div class="form-group">
                <label>เว็บไซต์: <small>(ไม่บังคับ)</small></label>
                <input type="text" name="website" value="<?php echo $website; ?>" placeholder="https://www.example.com">
                <span class="error"><?php echo $websiteErr; ?></span>
            </div>
            
            <div class="form-group">
                <label>ความคิดเห็น: <small>(ไม่บังคับ)</small></label>
                <textarea name="comment" rows="5" placeholder="แสดงความคิดเห็น..."><?php echo $comment; ?></textarea>
            </div>
            
            <div class="form-group">
                <label>เพศ: <span class="required">*</span></label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender=="female") echo "checked"; ?>>
                        หญิง
                    </label>
                    <label>
                        <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender=="male") echo "checked"; ?>>
                        ชาย
                    </label>
                    <label>
                        <input type="radio" name="gender" value="other" <?php if(isset($gender) && $gender=="other") echo "checked"; ?>>
                        อื่นๆ
                    </label>
                </div>
                <span class="error"><?php echo $genderErr; ?></span>
            </div>
            
            <input type="submit" value="ส่งข้อมูล">
        </form>
        
        <!-- อธิบายการทำงาน -->
        <div style="background: #e3f2fd; padding: 20px; border-radius: 8px; margin-top: 30px;">
            <h3>💡 การทำงานของระบบตรวจสอบ:</h3>
            <ol style="line-height: 2.2;">
                <li><strong>ตรวจสอบด้วย empty()</strong> - เช็คว่าฟิลด์ว่างหรือไม่</li>
                <li><strong>แสดง Error Message</strong> - ถ้าว่าง จะแสดงข้อความแจ้งเตือน</li>
                <li><strong>เก็บค่าเดิมไว้</strong> - ค่าที่กรอกจะไม่หายแม้ submit ไม่ผ่าน</li>
                <li><strong>ส่งเมื่อถูกต้องเท่านั้น</strong> - ต้องไม่มี error ทั้งหมด</li>
            </ol>
        </div>
    </div>
</body>
</html>