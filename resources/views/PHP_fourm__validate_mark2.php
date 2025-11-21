<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อ 4: Validate Data Format</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); 
            padding: 30px; 
            min-height: 100vh; 
        }
        .container { 
            background: white; 
            padding: 40px; 
            border-radius: 20px; 
            max-width: 900px; 
            margin: 0 auto; 
            box-shadow: 0 20px 60px rgba(0,0,0,0.3); 
        }
        h2 { 
            color: #333; 
            border-bottom: 5px solid #f5576c; 
            padding-bottom: 15px; 
            margin-bottom: 30px; 
        }
        .form-group { 
            margin: 25px 0; 
            background: #f9f9f9; 
            padding: 20px; 
            border-radius: 10px; 
            border-left: 5px solid #f5576c; 
        }
        label { 
            display: block; 
            font-weight: bold; 
            color: #555; 
            margin-bottom: 10px; 
            font-size: 16px; 
        }
        .required { color: #f44336; font-size: 18px; }
        input[type="text"], input[type="email"], textarea { 
            width: 100%; 
            padding: 14px; 
            border: 3px solid #ddd; 
            border-radius: 10px; 
            font-size: 15px; 
            transition: all 0.3s; 
        }
        input:focus, textarea:focus { 
            border-color: #f5576c; 
            outline: none; 
            box-shadow: 0 0 10px rgba(245, 87, 108, 0.3); 
        }
        .error { 
            color: #f44336; 
            font-size: 14px; 
            margin-top: 8px; 
            display: block; 
            font-weight: bold; 
            background: #ffebee; 
            padding: 8px 12px; 
            border-radius: 5px; 
        }
        .valid { 
            color: #4caf50; 
            font-size: 14px; 
            margin-top: 8px; 
            display: block; 
            font-weight: bold; 
            background: #e8f5e9; 
            padding: 8px 12px; 
            border-radius: 5px; 
        }
        input[type="submit"] { 
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); 
            color: white; 
            padding: 18px 50px; 
            border: none; 
            border-radius: 12px; 
            cursor: pointer; 
            font-size: 18px; 
            margin-top: 30px; 
            width: 100%; 
            font-weight: bold; 
            transition: all 0.3s; 
        }
        input[type="submit"]:hover { 
            transform: translateY(-3px); 
            box-shadow: 0 10px 25px rgba(245, 87, 108, 0.4); 
        }
        .result { 
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%); 
            padding: 30px; 
            border-radius: 15px; 
            margin: 30px 0; 
            color: white; 
        }
        .result h3 { color: white; margin-bottom: 20px; }
        .result table { background: white; border-radius: 10px; overflow: hidden; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 15px; text-align: left; }
        th { background: #667eea; color: white; font-size: 16px; }
        td { color: #333; border-bottom: 1px solid #f0f0f0; }
        .validation-info { 
            background: #fff8e1; 
            padding: 25px; 
            border-radius: 12px; 
            margin: 25px 0; 
            border: 3px solid #ffd54f; 
        }
        .radio-group { display: flex; gap: 20px; margin-top: 12px; flex-wrap: wrap; }
        .radio-group label { 
            display: inline-flex; 
            align-items: center; 
            font-weight: normal; 
            background: white; 
            padding: 10px 20px; 
            border-radius: 25px; 
            cursor: pointer; 
            border: 2px solid #ddd; 
        }
        .radio-group input[type="radio"] { margin-right: 8px; }
        .validation-examples { 
            background: #e1f5fe; 
            padding: 20px; 
            border-radius: 10px; 
            margin: 15px 0; 
        }
        .example-box { 
            background: white; 
            padding: 15px; 
            margin: 10px 0; 
            border-radius: 8px; 
            border-left: 4px solid #2196f3; 
        }
        code { 
            background: #f5f5f5; 
            padding: 3px 8px; 
            border-radius: 4px; 
            font-family: 'Courier New', monospace; 
            color: #d32f2f; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ข้อ 4: ตรวจสอบรูปแบบข้อมูล (Data Validation) 🔍</h2>
        
        <?php
        // ฟังก์ชันทำความสะอาดข้อมูล
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        // กำหนดตัวแปร
        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        $name = $email = $gender = $comment = $website = "";
        $isValid = false;
        
        // ตรวจสอบเมื่อมีการ submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // 1. ตรวจสอบชื่อ (บังคับ + ตัวอักษรและช่องว่างเท่านั้น)
            if (empty($_POST["name"])) {
                $nameErr = "❌ กรุณากรอกชื่อ";
            } else {
                $name = test_input($_POST["name"]);
                // ตรวจสอบว่ามีแต่ตัวอักษร ช่องว่าง ขีด และ apostrophe
                if (!preg_match("/^[a-zA-Zก-๙-' ]*$/u", $name)) {
                    $nameErr = "❌ ชื่อต้องเป็นตัวอักษรและช่องว่างเท่านั้น";
                }
            }
            
            // 2. ตรวจสอบอีเมล (บังคับ + รูปแบบอีเมลถูกต้อง)
            if (empty($_POST["email"])) {
                $emailErr = "❌ กรุณากรอกอีเมล";
            } else {
                $email = test_input($_POST["email"]);
                // ตรวจสอบรูปแบบอีเมลด้วย filter_var()
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "❌ รูปแบบอีเมลไม่ถูกต้อง (ต้องมี @ และ .)";
                }
            }
            
            // 3. ตรวจสอบเว็บไซต์ (ไม่บังคับ แต่ถ้ามี ต้องเป็น URL ที่ถูกต้อง)
            if (empty($_POST["website"])) {
                $website = "";
            } else {
                $website = test_input($_POST["website"]);
                // ตรวจสอบรูปแบบ URL
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                    $websiteErr = "❌ รูปแบบ URL ไม่ถูกต้อง";
                }
            }
            
            // 4. ความคิดเห็น (ไม่บังคับ)
            if (empty($_POST["comment"])) {
                $comment = "";
            } else {
                $comment = test_input($_POST["comment"]);
            }
            
            // 5. ตรวจสอบเพศ (บังคับ)
            if (empty($_POST["gender"])) {
                $genderErr = "❌ กรุณาเลือกเพศ";
            } else {
                $gender = test_input($_POST["gender"]);
            }
            
            // ตรวจสอบว่าผ่านทุกข้อหรือไม่
            if (empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($websiteErr)) {
                $isValid = true;
            }
        }
        ?>
        
        <!-- แสดงผลลัพธ์เมื่อผ่านการตรวจสอบ -->
        <?php if ($isValid): ?>
        <div class="result">
            <h3>🎊 ส่งข้อมูลสำเร็จ! ผ่านการตรวจสอบทุกรูปแบบ</h3>
            <table>
                <tr>
                    <th>ฟิลด์</th>
                    <th>ค่าที่ได้รับ</th>
                    <th>สถานะ</th>
                </tr>
                <tr>
                    <td><strong>ชื่อ:</strong></td>
                    <td><?php echo $name; ?></td>
                    <td style="color: #4caf50;">✅ ถูกต้อง</td>
                </tr>
                <tr>
                    <td><strong>อีเมล:</strong></td>
                    <td><?php echo $email; ?></td>
                    <td style="color: #4caf50;">✅ รูปแบบถูกต้อง</td>
                </tr>
                <tr>
                    <td><strong>เว็บไซต์:</strong></td>
                    <td><?php echo $website ? $website : "-"; ?></td>
                    <td style="color: #4caf50;"><?php echo $website ? "✅ URL ถูกต้อง" : "-"; ?></td>
                </tr>
                <tr>
                    <td><strong>ความคิดเห็น:</strong></td>
                    <td><?php echo $comment ? $comment : "-"; ?></td>
                    <td>-</td>
                </tr>
                <tr>
                    <td><strong>เพศ:</strong></td>
                    <td><?php echo $gender; ?></td>
                    <td style="color: #4caf50;">✅ ถูกต้อง</td>
                </tr>
            </table>
        </div>
        <?php endif; ?>
        
        <!-- อธิบายการตรวจสอบ -->
        <div class="validation-info">
            <h3>🎯 ระบบตรวจสอบรูปแบบข้อมูล 3 แบบ:</h3>
            <div class="validation-examples">
                <div class="example-box">
                    <h4>1️⃣ ตรวจสอบชื่อด้วย <code>preg_match()</code></h4>
                    <p><strong>Pattern:</strong> <code>/^[a-zA-Zก-๙-' ]*$/u</code></p>
                    <p>✅ อนุญาต: ตัวอักษร ไทย-อังกฤษ, ช่องว่าง, ขีด, apostrophe</p>
                    <p>❌ ไม่อนุญาต: ตัวเลข, สัญลักษณ์พิเศษ</p>
                </div>
                
                <div class="example-box">
                    <h4>2️⃣ ตรวจสอบอีเมลด้วย <code>filter_var()</code></h4>
                    <p><strong>ฟังก์ชัน:</strong> <code>filter_var($email, FILTER_VALIDATE_EMAIL)</code></p>
                    <p>✅ ตัวอย่างที่ถูก: user@example.com, test.email@domain.co.th</p>
                    <p>❌ ตัวอย่างที่ผิด: user@, @example.com, user.example.com</p>
                </div>
                
                <div class="example-box">
                    <h4>3️⃣ ตรวจสอบ URL ด้วย <code>preg_match()</code></h4>
                    <p><strong>Pattern:</strong> รูปแบบ URL มาตรฐาน</p>
                    <p>✅ ตัวอย่างที่ถูก: https://www.example.com, http://test.com</p>
                    <p>❌ ตัวอย่างที่ผิด: example, www, ht://wrong</p>
                </div>
            </div>
        </div>
        
        <!-- ฟอร์ม -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            
            <div class="form-group">
                <label>ชื่อ: <span class="required">*</span></label>
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="เช่น: สมชาย ใจดี หรือ John Doe">
                <?php if(!empty($nameErr)): ?>
                    <span class="error"><?php echo $nameErr; ?></span>
                <?php elseif(!empty($name)): ?>
                    <span class="valid">✅ ชื่อถูกต้อง</span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label>อีเมล: <span class="required">*</span></label>
                <input type="text" name="email" value="<?php echo $email; ?>" placeholder="example@email.com">
                <?php if(!empty($emailErr)): ?>
                    <span class="error"><?php echo $emailErr; ?></span>
                <?php elseif(!empty($email)): ?>
                    <span class="valid">✅ รูปแบบอีเมลถูกต้อง</span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label>เว็บไซต์: <small>(ไม่บังคับ)</small></label>
                <input type="text" name="website" value="<?php echo $website; ?>" placeholder="https://www.example.com">
                <?php if(!empty($websiteErr)): ?>
                    <span class="error"><?php echo $websiteErr; ?></span>
                <?php elseif(!empty($website)): ?>
                    <span class="valid">✅ URL ถูกต้อง</span>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label>ความคิดเห็น: <small>(ไม่บังคับ)</small></label>
                <textarea name="comment" rows="4" placeholder="แสดงความคิดเห็น..."><?php echo $comment; ?></textarea>
            </div>
            
            <div class="form-group">
                <label>เพศ: <span class="required">*</span></label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender=="female") echo "checked"; ?>>
                        👩 หญิง
                    </label>
                    <label>
                        <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender=="male") echo "checked"; ?>>
                        👨 ชาย
                    </label>
                    <label>
                        <input type="radio" name="gender" value="other" <?php if(isset($gender) && $gender=="other") echo "checked"; ?>>
                        🧑 อื่นๆ
                    </label>
                </div>
                <?php if(!empty($genderErr)): ?>
                    <span class="error"><?php echo $genderErr; ?></span>
                <?php elseif(!empty($gender)): ?>
                    <span class="valid">✅ เลือกแล้ว</span>
                <?php endif; ?>
            </div>
            
            <input type="submit" value="🚀 ส่งข้อมูล">
        </form>
        
        <!-- สรุปการเรียนรู้ -->
        <div style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); padding: 30px; border-radius: 15px; margin-top: 30px;">
            <h3 style="color: #333; margin-bottom: 20px;">📚 สรุปการเรียนรู้ข้อ 4:</h3>
            <ol style="line-height: 2.5; color: #333; font-size: 15px;">
                <li><strong>preg_match()</strong> - ใช้ Regular Expression ตรวจสอบรูปแบบข้อมูล</li>
                <li><strong>filter_var()</strong> - ตรวจสอบอีเมลแบบมาตรฐาน (แนะนำ)</li>
                <li><strong>การแสดง Feedback</strong> - แจ้งผลทั้ง Error และ Success</li>
                <li><strong>เก็บค่าไว้</strong> - ข้อมูลที่ถูกต้องจะยังอยู่หลัง submit</li>
                <li><strong>ตรวจสอบแบบครบถ้วน</strong> - ทั้งว่าง + รูปแบบ</li>
            </ol>
        </div>
    </div>
</body>
</html>