<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>PHP File Handling Tutorial</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .content {
            padding: 30px;
        }
        .section {
            margin-bottom: 30px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 25px;
            background: #f8f9fa;
        }
        .section h2 {
            color: #667eea;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .code-block {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            overflow-x: auto;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
            line-height: 1.6;
        }
        .output-box {
            background: #e8f5e9;
            border-left: 5px solid #4caf50;
            padding: 20px;
            margin: 15px 0;
            border-radius: 5px;
        }
        .warning-box {
            background: #fff3cd;
            border-left: 5px solid #ffc107;
            padding: 20px;
            margin: 15px 0;
            border-radius: 5px;
        }
        .error-box {
            background: #f8d7da;
            border-left: 5px solid #dc3545;
            padding: 20px;
            margin: 15px 0;
            border-radius: 5px;
        }
        .info-box {
            background: #d1ecf1;
            border-left: 5px solid #17a2b8;
            padding: 20px;
            margin: 15px 0;
            border-radius: 5px;
        }
        .file-content {
            background: white;
            border: 2px dashed #667eea;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            font-family: monospace;
            white-space: pre-wrap;
        }
        .badge {
            display: inline-block;
            padding: 5px 12px;
            background: #667eea;
            color: white;
            border-radius: 15px;
            font-size: 0.85em;
            margin: 0 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        table th {
            background: #667eea;
            color: white;
            padding: 12px;
            text-align: left;
        }
        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        table tr:hover {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📁 PHP File Handling</h1>
            <p>เรียนรู้การจัดการไฟล์ด้วย PHP</p>
        </div>
        
        <div class="content">
            <?php
            // ============================================
            // สร้างไฟล์ตัวอย่างสำหรับใช้ในการสาธิต
            // ============================================
            $sampleFileName = "webdictionary.txt";
            $sampleContent = "AJAX = Asynchronous JavaScript and XML
CSS = Cascading Style Sheets
HTML = Hyper Text Markup Language
PHP = PHP Hypertext Preprocessor
SQL = Structured Query Language
SVG = Scalable Vector Graphics
XML = EXtensible Markup Language";
            
            // สร้างไฟล์ในหน่วยความจำ (สำหรับการสาธิต)
            $fileData = $sampleContent;
            ?>
            
            <!-- ส่วนที่ 1: แนะนำ File Handling -->
            <div class="section">
                <h2>📚 ความรู้เบื้องต้นเกี่ยวกับ File Handling</h2>
                
                <div class="info-box">
                    <h3>🎯 PHP สามารถทำอะไรกับไฟล์ได้บ้าง?</h3>
                    <ul style="margin-left: 20px;">
                        <li>✅ <strong>อ่านไฟล์</strong> - Read files</li>
                        <li>✅ <strong>เขียนไฟล์</strong> - Write files</li>
                        <li>✅ <strong>สร้างไฟล์</strong> - Create files</li>
                        <li>✅ <strong>แก้ไขไฟล์</strong> - Edit files</li>
                        <li>✅ <strong>ลบไฟล์</strong> - Delete files</li>
                        <li>✅ <strong>อัพโหลดไฟล์</strong> - Upload files</li>
                    </ul>
                </div>
                
                <div class="warning-box">
                    <h3>⚠️ คำเตือนสำคัญ!</h3>
                    <p><strong>ต้องระมัดระวังเมื่อทำงานกับไฟล์:</strong></p>
                    <ul style="margin-left: 20px; margin-top: 10px;">
                        <li>❌ อาจแก้ไขผิดไฟล์</li>
                        <li>❌ อาจเติม Harddrive เต็มด้วยข้อมูลขยะ</li>
                        <li>❌ อาจลบเนื้อหาไฟล์โดยไม่ตั้งใจ</li>
                        <li>❌ ปัญหาเรื่องสิทธิ์การเข้าถึง (Permissions)</li>
                    </ul>
                </div>
            </div>
            
            <!-- ส่วนที่ 2: ฟังก์ชัน readfile() -->
            <div class="section">
                <h2>📖 ฟังก์ชัน readfile() - อ่านไฟล์อย่างง่าย</h2>
                
                <div class="info-box">
                    <p><strong>readfile()</strong> คือฟังก์ชันที่ใช้อ่านไฟล์และแสดงผลทันที</p>
                    <p>✨ คืนค่าจำนวน bytes ที่อ่านได้</p>
                </div>
                
                <div class="code-block">
                    &lt;?php<br>
                    echo readfile("webdictionary.txt");<br>
                    ?&gt;
                </div>
                
                <h3>📄 เนื้อหาไฟล์ตัวอย่าง (webdictionary.txt):</h3>
                <div class="file-content"><?php echo htmlspecialchars($fileData); ?></div>
                
                <h3>✅ ผลลัพธ์จากการใช้ readfile():</h3>
                <div class="output-box">
                    <?php 
                    // แสดงเนื้อหาไฟล์
                    echo nl2br(htmlspecialchars($fileData));
                    
                    // คำนวณจำนวน bytes
                    $byteCount = strlen($fileData);
                    echo "<br><br><strong>📊 จำนวน Bytes ที่อ่านได้:</strong> <span class='badge'>$byteCount bytes</span>";
                    ?>
                </div>
            </div>
            
            <!-- ส่วนที่ 3: ตัวอย่างการใช้งานจริง -->
            <div class="section">
                <h2>🔧 ตัวอย่างการใช้งาน readfile() จริง</h2>
                
                <h3>📝 ตัวอย่างที่ 1: อ่านไฟล์ข้อความ</h3>
                <div class="code-block">
                    &lt;?php<br>
                    // อ่านไฟล์และเก็บจำนวน bytes<br>
                    $bytes = readfile("document.txt");<br>
                    echo "&lt;p&gt;อ่านไฟล์สำเร็จ: $bytes bytes&lt;/p&gt;";<br>
                    ?&gt;
                </div>
                
                <h3>📊 ตัวอย่างที่ 2: แสดงรายงาน CSV</h3>
                <div class="code-block">
                    &lt;?php<br>
                    header('Content-Type: text/csv');<br>
                    header('Content-Disposition: attachment; filename="report.csv"');<br>
                    readfile("sales_report.csv");<br>
                    ?&gt;
                </div>
                
                <h3>🖼️ ตัวอย่างที่ 3: แสดงรูปภาพ</h3>
                <div class="code-block">
                    &lt;?php<br>
                    header('Content-Type: image/jpeg');<br>
                    readfile("photo.jpg");<br>
                    ?&gt;
                </div>
            </div>
            
            <!-- ส่วนที่ 4: ข้อดีข้อเสีย -->
            <div class="section">
                <h2>⚖️ ข้อดีและข้อเสียของ readfile()</h2>
                
                <table>
                    <tr>
                        <th style="width: 50%;">✅ ข้อดี</th>
                        <th style="width: 50%;">❌ ข้อเสีย</th>
                    </tr>
                    <tr>
                        <td>📌 เขียนโค้ดง่าย 1 บรรทัดเสร็จ</td>
                        <td>📌 ไม่สามารถแก้ไขเนื้อหาก่อนแสดงผล</td>
                    </tr>
                    <tr>
                        <td>📌 เหมาะกับไฟล์ขนาดเล็ก</td>
                        <td>📌 ไม่เหมาะกับไฟล์ใหญ่ (เปลือง Memory)</td>
                    </tr>
                    <tr>
                        <td>📌 รวดเร็ว ไม่ต้องเปิด-ปิดไฟล์</td>
                        <td>📌 อ่านทั้งไฟล์ทีเดียว ไม่ได้ทีละบรรทัด</td>
                    </tr>
                    <tr>
                        <td>📌 คืนค่าจำนวน bytes อัตโนมัติ</td>
                        <td>📌 ไม่มีการควบคุมการอ่านแบบละเอียด</td>
                    </tr>
                </table>
            </div>
            
            <!-- ส่วนที่ 5: เปรียบเทียบกับวิธีอื่น -->
            <div class="section">
                <h2>🔄 เปรียบเทียบวิธีการอ่านไฟล์</h2>
                
                <h3>1️⃣ readfile() - อ่านและแสดงผลทันที</h3>
                <div class="code-block">
                    &lt;?php<br>
                    readfile("file.txt");<br>
                    ?&gt;
                </div>
                <div class="info-box">
                    ✅ ใช้เมื่อ: ต้องการแสดงเนื้อหาไฟล์โดยตรง<br>
                    ✅ เหมาะกับ: ไฟล์ Download, รูปภาพ, PDF
                </div>
                
                <h3>2️⃣ file_get_contents() - อ่านเก็บในตัวแปร</h3>
                <div class="code-block">
                    &lt;?php<br>
                    $content = file_get_contents("file.txt");<br>
                    echo $content;<br>
                    ?&gt;
                </div>
                <div class="info-box">
                    ✅ ใช้เมื่อ: ต้องการแก้ไขเนื้อหาก่อนแสดงผล<br>
                    ✅ เหมาะกับ: ไฟล์ Template, Config Files
                </div>
                
                <h3>3️⃣ fopen() + fread() - ควบคุมการอ่านได้ละเอียด</h3>
                <div class="code-block">
                    &lt;?php<br>
                    $file = fopen("file.txt", "r");<br>
                    $content = fread($file, filesize("file.txt"));<br>
                    fclose($file);<br>
                    echo $content;<br>
                    ?&gt;
                </div>
                <div class="info-box">
                    ✅ ใช้เมื่อ: ต้องการควบคุมการอ่านแบบละเอียด<br>
                    ✅ เหมาะกับ: ไฟล์ใหญ่, การอ่านทีละส่วน
                </div>
            </div>
            
            <!-- ส่วนที่ 6: ตัวอย่างโปรเจคจริง -->
            <div class="section">
                <h2>💼 ตัวอย่างโปรเจคการใช้งานจริง</h2>
                
                <h3>📚 โปรเจค 1: ระบบแสดงบทความ</h3>
                <div class="code-block">
                    &lt;?php<br>
                    $articleId = $_GET['id'] ?? 1;<br>
                    $filename = "articles/article_" . $articleId . ".txt";<br>
                    <br>
                    if (file_exists($filename)) {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;echo "&lt;h1&gt;บทความ&lt;/h1&gt;";<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;readfile($filename);<br>
                    } else {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;echo "&lt;p&gt;ไม่พบบทความ&lt;/p&gt;";<br>
                    }<br>
                    ?&gt;
                </div>
                
                <h3>📥 โปรเจค 2: ระบบดาวน์โหลดไฟล์</h3>
                <div class="code-block">
                    &lt;?php<br>
                    $file = "documents/manual.pdf";<br>
                    <br>
                    if (file_exists($file)) {<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;header('Content-Description: File Transfer');<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;header('Content-Type: application/pdf');<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;header('Content-Disposition: attachment; filename="'.basename($file).'"');<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;header('Content-Length: ' . filesize($file));<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;readfile($file);<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;exit;<br>
                    }<br>
                    ?&gt;
                </div>
                
                <h3>📊 โปรเจค 3: แสดง Log Files</h3>
                <div class="code-block">
                    &lt;?php<br>
                    $logFile = "logs/system.log";<br>
                    <br>
                    echo "&lt;h2&gt;System Logs&lt;/h2&gt;";<br>
                    echo "&lt;pre&gt;";<br>
                    readfile($logFile);<br>
                    echo "&lt;/pre&gt;";<br>
                    ?&gt;
                </div>
            </div>
            
            <!-- สรุป -->
            <div class="section">
                <h2>✅ สรุป</h2>
                <div class="output-box">
                    <h3>🎯 ข้อควรจำ:</h3>
                    <ul style="margin-left: 20px;">
                        <li>✅ <strong>readfile()</strong> เหมาะกับไฟล์ขนาดเล็กที่ต้องการแสดงผลโดยตรง</li>
                        <li>✅ ตรวจสอบว่าไฟล์มีอยู่จริงก่อนด้วย <strong>file_exists()</strong></li>
                        <li>✅ ระวังเรื่องความปลอดภัย - อย่าให้ผู้ใช้เข้าถึงไฟล์สำคัญ</li>
                        <li>✅ ตั้งค่า Header ให้ถูกต้องเมื่อส่งไฟล์ Download</li>
                        <li>✅ สำหรับไฟล์ใหญ่ใช้ <strong>fopen() + fread()</strong> แทน</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>