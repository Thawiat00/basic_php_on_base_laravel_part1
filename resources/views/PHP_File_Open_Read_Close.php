<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>PHP File Open/Read/Close Tutorial</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 20px;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 70px rgba(0,0,0,0.4);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 50px;
            text-align: center;
        }
        .header h1 { font-size: 3em; margin-bottom: 10px; }
        .header p { font-size: 1.2em; opacity: 0.9; }
        
        .content { padding: 40px; }
        
        .section {
            margin-bottom: 40px;
            padding: 30px;
            background: #f8f9fa;
            border-radius: 15px;
            border: 3px solid #e9ecef;
        }
        .section h2 {
            color: #1e3c72;
            font-size: 2em;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 4px solid #2a5298;
        }
        .section h3 {
            color: #2a5298;
            margin: 20px 0 15px 0;
            font-size: 1.5em;
        }
        
        .code-box {
            background: #282c34;
            color: #abb2bf;
            padding: 25px;
            border-radius: 10px;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
            line-height: 1.8;
            overflow-x: auto;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.3);
        }
        .code-box .keyword { color: #c678dd; }
        .code-box .string { color: #98c379; }
        .code-box .function { color: #61afef; }
        .code-box .comment { color: #5c6370; font-style: italic; }
        
        .output {
            background: #d4edda;
            border: 2px solid #28a745;
            border-left: 6px solid #28a745;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
            font-family: monospace;
        }
        .warning {
            background: #fff3cd;
            border: 2px solid #ffc107;
            border-left: 6px solid #ffc107;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
        }
        .info {
            background: #d1ecf1;
            border: 2px solid #17a2b8;
            border-left: 6px solid #17a2b8;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
        }
        .error {
            background: #f8d7da;
            border: 2px solid #dc3545;
            border-left: 6px solid #dc3545;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
        }
        
        .mode-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .mode-table th {
            background: #1e3c72;
            color: white;
            padding: 15px;
            text-align: left;
            font-size: 1.1em;
        }
        .mode-table td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .mode-table tr:hover { background: #f1f3f5; }
        .mode-table code {
            background: #2a5298;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        
        .demo-box {
            background: white;
            border: 3px dashed #2a5298;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
        }
        
        .badge {
            display: inline-block;
            padding: 6px 14px;
            background: #2a5298;
            color: white;
            border-radius: 20px;
            font-size: 0.9em;
            margin: 5px;
            font-weight: bold;
        }
        
        .file-preview {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            font-family: monospace;
            white-space: pre-wrap;
            margin: 15px 0;
            border: 2px solid #34495e;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📂 PHP File Operations</h1>
            <p>Open • Read • Close - การควบคุมไฟล์แบบมืออาชีพ</p>
        </div>
        
        <div class="content">
            <?php
            // สร้างไฟล์ตัวอย่าง
            $sampleFile = "AJAX = Asynchronous JavaScript and XML
CSS = Cascading Style Sheets  
HTML = Hyper Text Markup Language
PHP = PHP Hypertext Preprocessor
SQL = Structured Query Language
SVG = Scalable Vector Graphics
XML = EXtensible Markup Language";
            ?>
            
            <!-- Section 1: File Modes -->
            <div class="section">
                <h2>🔐 โหมดการเปิดไฟล์ (File Modes)</h2>
                
                <div class="info">
                    <strong>🎯 ฟังก์ชัน fopen()</strong> ต้องระบุโหมดการเปิดไฟล์เสมอ<br>
                    <strong>Syntax:</strong> <code>fopen(filename, mode)</code>
                </div>
                
                <table class="mode-table">
                    <tr>
                        <th style="width: 15%;">Mode</th>
                        <th style="width: 85%;">คำอธิบาย</th>
                    </tr>
                    <tr>
                        <td><code>r</code></td>
                        <td><strong>Read only</strong> - เปิดเพื่ออ่านอย่างเดียว / เริ่มที่ตำแหน่งแรก / ไฟล์ต้องมีอยู่</td>
                    </tr>
                    <tr>
                        <td><code>w</code></td>
                        <td><strong>Write only</strong> - เปิดเพื่อเขียนอย่างเดียว / <strong>ลบข้อมูลเดิมทั้งหมด</strong> / สร้างไฟล์ใหม่ถ้าไม่มี</td>
                    </tr>
                    <tr>
                        <td><code>a</code></td>
                        <td><strong>Append</strong> - เปิดเพื่อเขียนต่อท้าย / ข้อมูลเดิมยังอยู่ / เริ่มเขียนที่ท้ายไฟล์</td>
                    </tr>
                    <tr>
                        <td><code>x</code></td>
                        <td><strong>Create new</strong> - สร้างไฟล์ใหม่เพื่อเขียน / ถ้าไฟล์มีอยู่แล้วจะ Error</td>
                    </tr>
                    <tr>
                        <td><code>r+</code></td>
                        <td><strong>Read/Write</strong> - เปิดเพื่ออ่านและเขียน / เริ่มที่ตำแหน่งแรก</td>
                    </tr>
                    <tr>
                        <td><code>w+</code></td>
                        <td><strong>Read/Write</strong> - เปิดเพื่ออ่านและเขียน / <strong>ลบข้อมูลเดิม</strong></td>
                    </tr>
                    <tr>
                        <td><code>a+</code></td>
                        <td><strong>Read/Append</strong> - เปิดเพื่ออ่านและเขียนต่อท้าย / ข้อมูลเดิมยังอยู่</td>
                    </tr>
                    <tr>
                        <td><code>x+</code></td>
                        <td><strong>Create Read/Write</strong> - สร้างไฟล์ใหม่เพื่ออ่านและเขียน / Error ถ้ามีไฟล์อยู่แล้ว</td>
                    </tr>
                </table>
            </div>
            
            <!-- Section 2: fopen() และ fread() -->
            <div class="section">
                <h2>📖 การอ่านไฟล์ด้วย fopen() และ fread()</h2>
                
                <h3>💡 ตัวอย่างพื้นฐาน</h3>
                <div class="code-box">
<span class="keyword">&lt;?php</span>
<span class="comment">// เปิดไฟล์</span>
<span class="keyword">$myfile</span> = <span class="function">fopen</span>(<span class="string">"webdictionary.txt"</span>, <span class="string">"r"</span>) or <span class="function">die</span>(<span class="string">"Unable to open file!"</span>);

<span class="comment">// อ่านเนื้อหาทั้งหมด</span>
<span class="keyword">$content</span> = <span class="function">fread</span>(<span class="keyword">$myfile</span>, <span class="function">filesize</span>(<span class="string">"webdictionary.txt"</span>));

<span class="comment">// ปิดไฟล์</span>
<span class="function">fclose</span>(<span class="keyword">$myfile</span>);

<span class="comment">// แสดงผล</span>
<span class="keyword">echo</span> <span class="keyword">$content</span>;
<span class="keyword">?&gt;</span>
                </div>
                
                <h3>✅ ผลลัพธ์:</h3>
                <div class="output">
                    <?php echo nl2br(htmlspecialchars($sampleFile)); ?>
                </div>
                
                <div class="demo-box">
                    <h3>🔍 อธิบายโค้ดทีละขั้น:</h3>
                    <ol style="margin-left: 25px; line-height: 2;">
                        <li><span class="badge">fopen()</span> เปิดไฟล์โหมด "r" (อ่านอย่างเดียว)</li>
                        <li><span class="badge">or die()</span> ถ้าเปิดไม่ได้แสดง Error และหยุดทำงาน</li>
                        <li><span class="badge">fread()</span> อ่านไฟล์ตามขนาดที่กำหนด</li>
                        <li><span class="badge">filesize()</span> คำนวณขนาดไฟล์เป็น bytes</li>
                        <li><span class="badge">fclose()</span> ปิดไฟล์เพื่อประหยัดทรัพยากร</li>
                    </ol>
                </div>
            </div>
            
            <!-- Section 3: fgets() - อ่านทีละบรรทัด -->
            <div class="section">
                <h2>📝 อ่านทีละบรรทัดด้วย fgets()</h2>
                
                <h3>💡 ตัวอย่างอ่านบรรทัดแรก</h3>
                <div class="code-box">
<span class="keyword">&lt;?php</span>
<span class="keyword">$myfile</span> = <span class="function">fopen</span>(<span class="string">"webdictionary.txt"</span>, <span class="string">"r"</span>);
<span class="keyword">echo</span> <span class="function">fgets</span>(<span class="keyword">$myfile</span>); <span class="comment">// อ่านบรรทัดแรก</span>
<span class="function">fclose</span>(<span class="keyword">$myfile</span>);
<span class="keyword">?&gt;</span>
                </div>
                
                <h3>✅ ผลลัพธ์:</h3>
                <div class="output">
                    <?php
                    $lines = explode("\n", $sampleFile);
                    echo htmlspecialchars($lines[0]);
                    ?>
                </div>
                
                <h3>💡 อ่านทุกบรรทัดด้วย Loop</h3>
                <div class="code-box">
<span class="keyword">&lt;?php</span>
<span class="keyword">$myfile</span> = <span class="function">fopen</span>(<span class="string">"webdictionary.txt"</span>, <span class="string">"r"</span>);

<span class="comment">// วนลูปจนกว่าจะถึงจุดสิ้นสุดไฟล์</span>
<span class="keyword">while</span>(<!<span class="function">feof</span>(<span class="keyword">$myfile</span>)) {
    <span class="keyword">echo</span> <span class="function">fgets</span>(<span class="keyword">$myfile</span>) . <span class="string">"&lt;br&gt;"</span>;
}

<span class="function">fclose</span>(<span class="keyword">$myfile</span>);
<span class="keyword">?&gt;</span>
                </div>
                
                <h3>✅ ผลลัพธ์:</h3>
                <div class="output">
                    <?php
                    foreach ($lines as $line) {
                        echo htmlspecialchars($line) . "<br>";
                    }
                    ?>
                </div>
            </div>
            
            <!-- Section 4: fgetc() - อ่านทีละตัวอักษร -->
            <div class="section">
                <h2>🔤 อ่านทีละตัวอักษรด้วย fgetc()</h2>
                
                <div class="code-box">
<span class="keyword">&lt;?php</span>
<span class="keyword">$myfile</span> = <span class="function">fopen</span>(<span class="string">"webdictionary.txt"</span>, <span class="string">"r"</span>);

<span class="comment">// อ่านทีละตัวอักษร</span>
<span class="keyword">while</span>(<!<span class="function">feof</span>(<span class="keyword">$myfile</span>)) {
    <span class="keyword">echo</span> <span class="function">fgetc</span>(<span class="keyword">$myfile</span>);
}

<span class="function">fclose</span>(<span class="keyword">$myfile</span>);
<span class="keyword">?&gt;</span>
                </div>
                
                <h3>✅ ผลลัพธ์ (อ่าน 50 ตัวอักษรแรก):</h3>
                <div class="output">
                    <?php echo htmlspecialchars(substr($sampleFile, 0, 50)) . "..."; ?>
                </div>
                
                <div class="warning">
                    <strong>⚠️ หมายเหตุ:</strong> fgetc() ใช้สำหรับกรณีพิเศษที่ต้องการควบคุมการอ่านแบบละเอียดมาก ๆ ไม่เหมาะกับการอ่านไฟล์ขนาดใหญ่
                </div>
            </div>
            
            <!-- Section 5: feof() - ตรวจสอบจุดสิ้นสุด -->
            <div class="section">
                <h2>🎯 ตรวจสอบจุดสิ้นสุดไฟล์ด้วย feof()</h2>
                
                <div class="info">
                    <strong>feof()</strong> = File End Of File<br>
                    ใช้ตรวจสอบว่าเราอ่านไฟล์จนถึงจุดสิ้นสุดแล้วหรือยัง
                </div>
                
                <div class="code-box">
<span class="keyword">&lt;?php</span>
<span class="keyword">$myfile</span> = <span class="function">fopen</span>(<span class="string">"webdictionary.txt"</span>, <span class="string">"r"</span>);

<span class="keyword">$lineNumber</span> = 1;
<span class="keyword">while</span>(<!<span class="function">feof</span>(<span class="keyword">$myfile</span>)) {
    <span class="keyword">$line</span> = <span class="function">fgets</span>(<span class="keyword">$myfile</span>);
    <span class="keyword">echo</span> <span class="string">"บรรทัดที่ "</span> . <span class="keyword">$lineNumber</span> . <span class="string">": "</span> . <span class="keyword">$line</span> . <span class="string">"&lt;br&gt;"</span>;
    <span class="keyword">$lineNumber</span>++;
}

<span class="function">fclose</span>(<span class="keyword">$myfile</span>);
<span class="keyword">?&gt;</span>
                </div>
                
                <h3>✅ ผลลัพธ์:</h3>
                <div class="output">
                    <?php
                    $lineNum = 1;
                    foreach ($lines as $line) {
                        if (trim($line) != "") {
                            echo "บรรทัดที่ " . $lineNum . ": " . htmlspecialchars($line) . "<br>";
                            $lineNum++;
                        }
                    }
                    ?>
                </div>
            </div>
            
            <!-- Section 6: ตัวอย่างขั้นสูง -->
            <div class="section">
                <h2>🚀 ตัวอย่างการใช้งานขั้นสูง</h2>
                
                <h3>📊 1. นับจำนวนคำในไฟล์</h3>
                <div class="code-box">
<span class="keyword">&lt;?php</span>
<span class="keyword">$myfile</span> = <span class="function">fopen</span>(<span class="string">"webdictionary.txt"</span>, <span class="string">"r"</span>);
<span class="keyword">$content</span> = <span class="function">fread</span>(<span class="keyword">$myfile</span>, <span class="function">filesize</span>(<span class="string">"webdictionary.txt"</span>));
<span class="function">fclose</span>(<span class="keyword">$myfile</span>);

<span class="keyword">$wordCount</span> = <span class="function">str_word_count</span>(<span class="keyword">$content</span>);
<span class="keyword">$lineCount</span> = <span class="function">substr_count</span>(<span class="keyword">$content</span>, <span class="string">"\n"</span>) + 1;

<span class="keyword">echo</span> <span class="string">"จำนวนคำ: "</span> . <span class="keyword">$wordCount</span>;
<span class="keyword">echo</span> <span class="string">"จำนวนบรรทัด: "</span> . <span class="keyword">$lineCount</span>;
<span class="keyword">?&gt;</span>
                </div>
                
                <div class="output">
                    <?php
                    $wordCount = str_word_count($sampleFile);
                    $lineCount = count($lines);
                    echo "📝 จำนวนคำ: <strong>$wordCount คำ</strong><br>";
                    echo "📄 จำนวนบรรทัด: <strong>$lineCount บรรทัด</strong>";
                    ?>
                </div>
                
                <h3>🔍 2. ค้นหาคำในไฟล์</h3>
                <div class="code-box">
<span class="keyword">&lt;?php</span>
<span class="keyword">$searchWord</span> = <span class="string">"PHP"</span>;
<span class="keyword">$myfile</span> = <span class="function">fopen</span>(<span class="string">"webdictionary.txt"</span>, <span class="string">"r"</span>);

<span class="keyword">while</span>(<!<span class="function">feof</span>(<span class="keyword">$myfile</span>)) {
    <span class="keyword">$line</span> = <span class="function">fgets</span>(<span class="keyword">$myfile</span>);
    <span class="keyword">if</span>(<span class="function">strpos</span>(<span class="keyword">$line</span>, <span class="keyword">$searchWord</span>) !== <span class="keyword">false</span>) {
        <span class="keyword">echo</span> <span class="string">"พบคำ: "</span> . <span class="keyword">$line</span>;
    }
}
<span class="function">fclose</span>(<span class="keyword">$myfile</span>);
<span class="keyword">?&gt;</span>
                </div>
                
                <div class="output">
                    <?php
                    $searchWord = "PHP";
                    foreach ($lines as $line) {
                        if (strpos($line, $searchWord) !== false) {
                            echo "🔍 พบคำ '<strong>$searchWord</strong>' ใน: " . htmlspecialchars($line) . "<br>";
                        }
                    }
                    ?>
                </div>
            </div>
            
            <!-- สรุป -->
            <div class="section">
                <h2>✅ สรุปความรู้สำคัญ</h2>
                
                <div class="demo-box">
                    <h3>🎯 ขั้นตอนการทำงานกับไฟล์:</h3>
                    <ol style="margin-left: 25px; line-height: 2.5; font-size: 1.1em;">
                        <li><span class="badge">fopen()</span> เปิดไฟล์ด้วยโหมดที่เหมาะสม</li>
                        <li><span class="badge">fread/fgets/fgetc()</span> อ่านเนื้อหาตามต้องการ</li>
                        <li><span class="badge">fclose()</span> ปิดไฟล์เมื่อใช้งานเสร็จ</li>
                    </ol>
                    
                    <h3 style="margin-top: 25px;">💡 เลือกใช้ฟังก์ชันให้เหมาะสม:</h3>
                    <ul style="margin-left: 25px; line-height: 2.5; font-size: 1.1em;">
                        <li><strong>fread()</strong> → อ่านทั้งไฟล์หรือตามจำนวน bytes</li>
                        <li><strong>fgets()</strong> → อ่านทีละบรรทัด (แนะนำ)</li>
                        <li><strong>fgetc()</strong> → อ่านทีละตัวอักษร (ช้า)</li>
                        <li><strong>feof()</strong> → ตรวจสอบจุดสิ้นสุดไฟล์</li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>