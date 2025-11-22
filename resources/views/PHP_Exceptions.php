<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Exceptions Tutorial</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 25px 70px rgba(0,0,0,0.4);
        }
        h1 { 
            color: #f5576c; 
            text-align: center; 
            margin-bottom: 40px;
            font-size: 3em;
        }
        h2 { 
            color: #333; 
            margin: 30px 0 15px 0;
            border-bottom: 4px solid #f5576c;
            padding-bottom: 12px;
        }
        .section { 
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            padding: 30px; 
            margin: 25px 0; 
            border-radius: 15px;
            border-left: 8px solid #f5576c;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .error-box {
            background: #fee;
            border: 3px solid #f5576c;
            color: #c00;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            font-weight: bold;
        }
        .success-box {
            background: #d4edda;
            border: 3px solid #28a745;
            color: #155724;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
            font-weight: bold;
        }
        .warning-box {
            background: #fff3cd;
            border: 3px solid #ffc107;
            color: #856404;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
        }
        .info-box {
            background: #d1ecf1;
            border: 3px solid #0c5460;
            color: #0c5460;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
        }
        .code-output {
            background: #2d3748;
            color: #68d391;
            padding: 20px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            margin: 15px 0;
            overflow-x: auto;
            border: 3px solid #4a5568;
            line-height: 1.8;
        }
        pre {
            background: #1a202c;
            color: #e2e8f0;
            padding: 20px;
            border-radius: 10px;
            overflow-x: auto;
            font-size: 14px;
            line-height: 1.6;
        }
        code {
            background: #2d3748;
            color: #fbbf24;
            padding: 4px 8px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
        }
        .example-box {
            background: #e0f2fe;
            border-left: 6px solid #0284c7;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
        }
        input {
            width: 100%;
            padding: 15px;
            margin: 12px 0;
            border: 3px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        button {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 15px 35px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            margin: 10px 5px;
        }
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            background: white;
        }
        table th {
            background: #f5576c;
            color: white;
            padding: 15px;
            text-align: left;
        }
        table td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        table tr:nth-child(even) {
            background: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>⚠️ PHP Exceptions Tutorial</h1>

    <!-- Section 1: Without Exception Handling -->
    <div class="section">
        <h2>1. ❌ ปัญหา: ไม่ใช้ Exception Handling</h2>
        <div class="info-box">
            💡 เมื่อเกิด Error โปรแกรมจะหยุดทำงานทันที และแสดง Fatal Error
        </div>
        
        <div class="example-box">
            <strong>PHP Code (ไม่ดี):</strong>
            <pre>function divide($dividend, $divisor) {
    if($divisor == 0) {
        throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
}

echo divide(5, 0);  // Fatal Error!</pre>
        </div>

        <div class="error-box">
            ⚠️ <strong>Fatal error:</strong> Uncaught Exception: Division by zero<br>
            Stack trace: #0 {main} thrown in /path/to/file.php on line 4
        </div>
    </div>

    <!-- Section 2: With Try-Catch -->
    <div class="section">
        <h2>2. ✅ แก้ไข: ใช้ try-catch</h2>
        <div class="info-box">
            💡 ใช้ <code>try-catch</code> เพื่อจับ Exception และจัดการมันได้
        </div>
        
        <?php
        function divide($dividend, $divisor) {
            if($divisor == 0) {
                throw new Exception("Division by zero");
            }
            return $dividend / $divisor;
        }
        
        if(isset($_POST['calculate'])) {
            $num1 = $_POST['dividend'];
            $num2 = $_POST['divisor'];
            
            try {
                $result = divide($num1, $num2);
                echo "<div class='success-box'>";
                echo "✅ <strong>ผลลัพธ์:</strong> $num1 ÷ $num2 = $result";
                echo "</div>";
            } catch(Exception $e) {
                echo "<div class='error-box'>";
                echo "❌ <strong>Error:</strong> " . $e->getMessage();
                echo "</div>";
            }
        }
        ?>
        
        <div class="example-box">
            <strong>PHP Code (ดี):</strong>
            <pre>try {
    $result = divide(5, 0);
    echo "Result: $result";
} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}</pre>
        </div>

        <form method="POST">
            <label><strong>🔢 เลขตั้ง (Dividend):</strong></label>
            <input type="number" name="dividend" value="10" required>
            
            <label><strong>➗ เลขหาร (Divisor):</strong></label>
            <input type="number" name="divisor" value="2" required>
            
            <button type="submit" name="calculate">🧮 คำนวณ</button>
        </form>

        <div class="warning-box">
            💡 <strong>ทดลอง:</strong> ลองใส่ตัวหาร = 0 เพื่อดู Exception
        </div>
    </div>

    <!-- Section 3: Try-Catch-Finally -->
    <div class="section">
        <h2>3. try-catch-finally</h2>
        <div class="info-box">
            💡 <code>finally</code> block จะทำงานเสมอ ไม่ว่าจะเกิด Exception หรือไม่
        </div>
        
        <?php
        if(isset($_POST['test_finally'])) {
            $test_num1 = $_POST['test_dividend'];
            $test_num2 = $_POST['test_divisor'];
            
            echo "<div class='code-output'>";
            echo "<strong>📝 Process Log:</strong><br><br>";
            
            try {
                echo "1️⃣ เริ่มคำนวณ...<br>";
                $result = divide($test_num1, $test_num2);
                echo "2️⃣ ผลลัพธ์: $test_num1 ÷ $test_num2 = $result<br>";
            } catch(Exception $e) {
                echo "❌ เกิดข้อผิดพลาด: " . $e->getMessage() . "<br>";
            } finally {
                echo "3️⃣ <strong style='color:#fbbf24;'>Finally block: กระบวนการเสร็จสิ้น</strong><br>";
                echo "4️⃣ ปิดการเชื่อมต่อฐานข้อมูล (สมมติ)<br>";
            }
            
            echo "</div>";
        }
        ?>
        
        <div class="example-box">
            <strong>PHP Code:</strong>
            <pre>try {
    echo "1. เริ่มคำนวณ...\n";
    $result = divide(10, 2);
    echo "2. ผลลัพธ์: $result\n";
} catch(Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} finally {
    echo "3. Finally: กระบวนการเสร็จสิ้น\n";
    echo "4. ปิดการเชื่อมต่อฐานข้อมูล\n";
}</pre>
        </div>

        <form method="POST">
            <label><strong>🔢 เลขตั้ง:</strong></label>
            <input type="number" name="test_dividend" value="10" required>
            
            <label><strong>➗ เลขหาร:</strong></label>
            <input type="number" name="test_divisor" value="0" required>
            
            <button type="submit" name="test_finally">🧪 ทดสอบ Finally</button>
        </form>
    </div>

    <!-- Section 4: Exception Object -->
    <div class="section">
        <h2>4. Exception Object - Methods</h2>
        <div class="info-box">
            💡 Exception Object มี Methods สำหรับดึงข้อมูล Error
        </div>
        
        <?php
        if(isset($_POST['test_exception_obj'])) {
            try {
                throw new Exception("ทดสอบ Exception Object", 500);
            } catch(Exception $ex) {
                echo "<div class='code-output'>";
                echo "<strong>📋 Exception Information:</strong><br><br>";
                echo "<strong>getMessage():</strong> " . $ex->getMessage() . "<br>";
                echo "<strong>getCode():</strong> " . $ex->getCode() . "<br>";
                echo "<strong>getFile():</strong> " . $ex->getFile() . "<br>";
                echo "<strong>getLine():</strong> " . $ex->getLine() . "<br>";
                echo "</div>";
            }
        }
        ?>
        
        <div class="example-box">
            <strong>Exception Methods:</strong>
            <pre>try {
    throw new Exception("Error message", 500);
} catch(Exception $ex) {
    echo $ex->getMessage();   // Error message
    echo $ex->getCode();      // 500
    echo $ex->getFile();      // /path/to/file.php
    echo $ex->getLine();      // 42
}</pre>
        </div>

        <form method="POST">
            <button type="submit" name="test_exception_obj">🔍 ดู Exception Object</button>
        </form>
    </div>

    <!-- Section 5: Real-World Example -->
    <div class="section">
        <h2>5. ตัวอย่างจริง: File Upload Validator</h2>
        <div class="info-box">
            💡 ใช้ Exception ตรวจสอบการอัพโหลดไฟล์
        </div>
        
        <?php
        class FileUploadException extends Exception {}
        
        function validateFileUpload($filename, $filesize, $filetype) {
            // ตรวจสอบขนาดไฟล์ (จำกัด 5MB)
            if($filesize > 5000000) {
                throw new FileUploadException("ไฟล์ใหญ่เกินไป! (สูงสุด 5MB)");
            }
            
            // ตรวจสอบประเภทไฟล์
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if(!in_array($filetype, $allowed_types)) {
                throw new FileUploadException("ประเภทไฟล์ไม่ถูกต้อง! (รองรับเฉพาะ JPG, PNG, GIF)");
            }
            
            // ตรวจสอบชื่อไฟล์
            if(empty($filename)) {
                throw new FileUploadException("ไม่มีชื่อไฟล์!");
            }
            
            return true;
        }
        
        if(isset($_POST['test_upload'])) {
            $filename = $_POST['filename'];
            $filesize = $_POST['filesize'];
            $filetype = $_POST['filetype'];
            
            try {
                validateFileUpload($filename, $filesize, $filetype);
                echo "<div class='success-box'>";
                echo "✅ <strong>ไฟล์ผ่านการตรวจสอบ!</strong><br>";
                echo "ชื่อไฟล์: $filename<br>";
                echo "ขนาด: " . number_format($filesize/1000000, 2) . " MB<br>";
                echo "ประเภท: $filetype";
                echo "</div>";
            } catch(FileUploadException $e) {
                echo "<div class='error-box'>";
                echo "❌ <strong>Upload Failed:</strong> " . $e->getMessage();
                echo "</div>";
            }
        }
        ?>
        
        <form method="POST">
            <label><strong>📁 ชื่อไฟล์:</strong></label>
            <input type="text" name="filename" value="photo.jpg" required>
            
            <label><strong>📏 ขนาดไฟล์ (bytes):</strong></label>
            <input type="number" name="filesize" value="2000000" required>
            
            <label><strong>🎨 ประเภทไฟล์:</strong></label>
            <select name="filetype" style="width:100%; padding:15px; border:3px solid #ddd; border-radius:8px; margin:12px 0;">
                <option value="image/jpeg">image/jpeg</option>
                <option value="image/png">image/png</option>
                <option value="image/gif">image/gif</option>
                <option value="application/pdf">application/pdf (จะ Error)</option>
                <option value="text/plain">text/plain (จะ Error)</option>
            </select>
            
            <button type="submit" name="test_upload">📤 ทดสอบ Upload</button>
        </form>
    </div>

    <!-- Section 6: Exception Methods Table -->
    <div class="section">
        <h2>6. Exception Methods อ้างอิง</h2>
        <table>
            <thead>
                <tr>
                    <th>Method</th>
                    <th>คำอธิบาย</th>
                    <th>ตัวอย่าง</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>getMessage()</code></td>
                    <td>ข้อความ Error</td>
                    <td>"Division by zero"</td>
                </tr>
                <tr>
                    <td><code>getCode()</code></td>
                    <td>รหัส Error</td>
                    <td>500, 404, 1</td>
                </tr>
                <tr>
                    <td><code>getFile()</code></td>
                    <td>ไฟล์ที่เกิด Error</td>
                    <td>/var/www/index.php</td>
                </tr>
                <tr>
                    <td><code>getLine()</code></td>
                    <td>บรรทัดที่เกิด Error</td>
                    <td>42</td>
                </tr>
                <tr>
                    <td><code>getPrevious()</code></td>
                    <td>Exception ก่อนหน้า</td>
                    <td>Exception object หรือ null</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- คำอธิบาย -->
    <div class="section">
        <h3>📚 สรุป PHP Exceptions:</h3>
        <div style="background:white; padding:25px; border-radius:10px; margin:15px 0;">
            <h4 style="color:#f5576c;">🎯 โครงสร้างหลัก:</h4>
            <table>
                <tr>
                    <th>Keyword</th>
                    <th>คำอธิบาย</th>
                </tr>
                <tr>
                    <td><code>throw</code></td>
                    <td>โยน Exception</td>
                </tr>
                <tr>
                    <td><code>try</code></td>
                    <td>Block ที่อาจเกิด Exception</td>
                </tr>
                <tr>
                    <td><code>catch</code></td>
                    <td>จับและจัดการ Exception</td>
                </tr>
                <tr>
                    <td><code>finally</code></td>
                    <td>ทำงานเสมอ (ไม่ว่าจะ Error หรือไม่)</td>
                </tr>
            </table>

            <h4 style="color:#f5576c; margin-top:20px;">💡 Use Cases ในโลกจริง:</h4>
            <ul style="line-height:2; font-size:1.1em; margin-left:25px;">
                <li>✅ <strong>Database Errors:</strong> Connection failed, Query error</li>
                <li>✅ <strong>File Operations:</strong> File not found, Permission denied</li>
                <li>✅ <strong>Validation:</strong> Invalid email, Wrong format</li>
                <li>✅ <strong>API Requests:</strong> Timeout, Invalid response</li>
                <li>✅ <strong>Payment:</strong> Insufficient funds, Card declined</li>
            </ul>

            <h4 style="color:#f5576c; margin-top:20px;">✨ ข้อดีของ Exception Handling:</h4>
            <ul style="line-height:2; font-size:1.1em; margin-left:25px;">
                <li>✅ ควบคุม Error ได้ดีกว่า</li>
                <li>✅ แยก Error Handling ออกจาก Business Logic</li>
                <li>✅ สามารถส่งต่อ Exception ได้</li>
                <li>✅ ทำให้โค้ดอ่านง่าย เข้าใจง่าย</li>
                <li>✅ สร้าง Custom Exception ได้</li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>


