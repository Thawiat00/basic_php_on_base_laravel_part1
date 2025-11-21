<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>PHP File Create/Write Tutorial</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            padding: 60px;
            text-align: center;
        }
        .header h1 {
            font-size: 3.5em;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        .header p { font-size: 1.3em; opacity: 0.95; }
        
        .content { padding: 50px; }
        
        .section {
            margin-bottom: 45px;
            padding: 35px;
            background: linear-gradient(to right, #f8f9fa, #ffffff);
            border-radius: 20px;
            border-left: 8px solid #11998e;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }
        .section h2 {
            color: #11998e;
            font-size: 2.2em;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 4px solid #38ef7d;
        }
        .section h3 {
            color: #38ef7d;
            margin: 25px 0 15px 0;
            font-size: 1.6em;
        }
        
        .code-editor {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 30px;
            border-radius: 12px;
            margin: 20px 0;
            font-family: 'Consolas', 'Courier New', monospace;
            line-height: 1.9;
            overflow-x: auto;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            position: relative;
        }
        .code-editor::before {
            content: "PHP";
            position: absolute;
            top: 10px;
            right: 15px;
            background: #38ef7d;
            color: #1e1e1e;
            padding: 4px 12px;
            border-radius: 5px;
            font-size: 0.75em;
            font-weight: bold;
        }
        .code-editor .kw { color: #569cd6; font-weight: bold; }
        .code-editor .str { color: #ce9178; }
        .code-editor .func { color: #dcdcaa; }
        .code-editor .cmt { color: #6a9955; font-style: italic; }
        .code-editor .var { color: #9cdcfe; }
        
        .result-box {
            background: #d4edda;
            border: 3px solid #28a745;
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);
        }
        .result-box h4 {
            color: #155724;
            margin-bottom: 15px;
            font-size: 1.3em;
        }
        
        .file-display {
            background: #2d3748;
            color: #e2e8f0;
            padding: 25px;
            border-radius: 10px;
            font-family: monospace;
            white-space: pre-wrap;
            margin: 15px 0;
            border: 3px solid #4a5568;
            box-shadow: inset 0 2px 10px rgba(0,0,0,0.3);
        }
        
        .warning-banner {
            background: #fff3cd;
            border: 3px solid #ffc107;
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
        }
        .warning-banner h4 {
            color: #856404;
            margin-bottom: 12px;
            font-size: 1.3em;
        }
        
        .info-banner {
            background: #d1ecf1;
            border: 3px solid #17a2b8;
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
        }
        .info-banner h4 {
            color: #0c5460;
            margin-bottom: 12px;
            font-size: 1.3em;
        }
        
        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .comparison-table th {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            padding: 18px;
            text-align: left;
            font-size: 1.15em;
        }
        .comparison-table td {
            padding: 18px;
            border-bottom: 1px solid #e0e0e0;
            background: white;
        }
        .comparison-table tr:hover td { background: #f8f9fa; }
        .comparison-table code {
            background: #11998e;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: bold;
        }
        
        .step-box {
            background: white;
            border: 3px dashed #11998e;
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
        }
        .step-box .step {
            display: flex;
            align-items: center;
            margin: 15px 0;
            font-size: 1.1em;
        }
        .step-box .step-num {
            background: #38ef7d;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .example-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin: 25px 0;
        }
        
        @media (max-width: 768px) {
            .example-grid { grid-template-columns: 1fr; }
        }
        
        .badge-success {
            background: #28a745;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            display: inline-block;
            margin: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✍️ PHP File Create/Write</h1>
            <p>สร้างและเขียนไฟล์ด้วย PHP แบบมืออาชีพ</p>
        </div>
        
        <div class="content">
            
            <!-- Section 1: การสร้างไฟล์ -->
            <div class="section">
                <h2>📝 การสร้างไฟล์ด้วย fopen()</h2>
                
                <div class="info-banner">
                    <h4>💡 ความลับของ fopen()</h4>
                    <p><strong>fopen()</strong> ไม่ได้เป็นเพียงฟังก์ชันเปิดไฟล์ แต่ยังสร้างไฟล์ใหม่ได้ด้วย!</p>
                    <ul style="margin-left: 25px; margin-top: 15px; line-height: 2;">
                        <li>✅ ถ้าใช้โหมด <strong>"w"</strong> หรือ <strong>"a"</strong> และไฟล์ไม่มีอยู่ → จะสร้างไฟล์ใหม่ให้อัตโนมัติ</li>
                        <li>✅ ไฟล์จะถูกสร้างในตำแหน่งเดียวกับไฟล์ PHP ที่รันอยู่</li>
                    </ul>
                </div>
                
                <h3>ตัวอย่างที่ 1: สร้างไฟล์ใหม่</h3>
                <div class="code-editor">
<span class="kw">&lt;?php</span>
<span class="cmt">// สร้างไฟล์ใหม่ชื่อ "testfile.txt"</span>
<span class="var">$myfile</span> = <span class="func">fopen</span>(<span class="str">"testfile.txt"</span>, <span class="str">"w"</span>);

<span class="cmt">// ถ้าสร้างสำเร็จ</span>
<span class="kw">if</span> (<span class="var">$myfile</span>) {
    <span class="kw">echo</span> <span class="str">"✅ สร้างไฟล์สำเร็จ!"</span>;
    <span class="func">fclose</span>(<span class="var">$myfile</span>);
} <span class="kw">else</span> {
    <span class="kw">echo</span> <span class="str">"❌ ไม่สามารถสร้างไฟล์ได้"</span>;
}
<span class="kw">?&gt;</span>
                </div>
                
                <div class="result-box">
                    <h4>✅ ผลลัพธ์:</h4>
                    <p style="font-size: 1.1em;">ไฟล์ <strong>testfile.txt</strong> ถูกสร้างขึ้นในโฟลเดอร์เดียวกับไฟล์ PHP</p>
                </div>
                
                <div class="warning-banner">
                    <h4>⚠️ เรื่อง File Permissions ที่ต้องระวัง!</h4>
                    <p>บางครั้งอาจเกิด Error ว่า <strong>"Permission denied"</strong></p>
                    <ul style="margin-left: 25px; margin-top: 10px; line-height: 2;">
                        <li>🔐 ต้องให้สิทธิ์ PHP ในการเขียนไฟล์ในโฟลเดอร์นั้น</li>
                        <li>🔐 บน Linux/Mac: ใช้คำสั่ง <code>chmod 755 folder_name</code></li>
                        <li>🔐 บน Windows: คลิกขวาโฟลเดอร์ → Properties → Security</li>
                    </ul>
                </div>
            </div>
            
            <!-- Section 2: การเขียนไฟล์ -->
            <div class="section">
                <h2>✍️ การเขียนข้อมูลลงไฟล์ด้วย fwrite()</h2>
                
                <div class="step-box">
                    <h3>🎯 ขั้นตอนการเขียนไฟล์:</h3>
                    <div class="step">
                        <div class="step-num">1</div>
                        <div>เปิดไฟล์ด้วย <strong>fopen()</strong> โหมด "w" หรือ "a"</div>
                    </div>
                    <div class="step">
                        <div class="step-num">2</div>
                        <div>เขียนข้อมูลด้วย <strong>fwrite()</strong></div>
                    </div>
                    <div class="step">
                        <div class="step-num">3</div>
                        <div>ปิดไฟล์ด้วย <strong>fclose()</strong></div>
                    </div>
                </div>
                
                <h3>📝 ตัวอย่างที่ 2: เขียนข้อมูลลงไฟล์</h3>
                <div class="code-editor">
<span class="kw">&lt;?php</span>
<span class="cmt">// เปิดไฟล์ในโหมดเขียน</span>
<span class="var">$myfile</span> = <span class="func">fopen</span>(<span class="str">"newfile.txt"</span>, <span class="str">"w"</span>) or <span class="func">die</span>(<span class="str">"Unable to open file!"</span>);

<span class="cmt">// เขียนบรรทัดแรก</span>
<span class="var">$txt</span> = <span class="str">"John Doe\n"</span>;
<span class="func">fwrite</span>(<span class="var">$myfile</span>, <span class="var">$txt</span>);

<span class="cmt">// เขียนบรรทัดที่สอง</span>
<span class="var">$txt</span> = <span class="str">"Jane Doe\n"</span>;
<span class="func">fwrite</span>(<span class="var">$myfile</span>, <span class="var">$txt</span>);

<span class="cmt">// ปิดไฟล์</span>
<span class="func">fclose</span>(<span class="var">$myfile</span>);

<span class="kw">echo</span> <span class="str">"✅ เขียนไฟล์สำเร็จ!"</span>;
<span class="kw">?&gt;</span>
                </div>
                
                <div class="result-box">
                    <h4>✅ เนื้อหาในไฟล์ newfile.txt:</h4>
                    <div class="file-display">John Doe
Jane Doe</div>
                </div>
            </div>
            
            <!-- Section 3: การเขียนทับ -->
            <div class="section">
                <h2>🔄 การเขียนทับไฟล์ (Overwriting)</h2>
                
                <div class="warning-banner">
                    <h4>⚠️ คำเตือนสำคัญ!</h4>
                    <p><strong>โหมด "w" จะลบข้อมูลเดิมทั้งหมดในไฟล์!</strong></p>
                    <p style="margin-top: 10px;">หากเปิดไฟล์ที่มีข้อมูลอยู่แล้วด้วยโหมด "w" → ข้อมูลเดิมจะหายไปทันที</p>
                </div>
                
                <h3>📝 ตัวอย่างที่ 3: เขียนทับข้อมูลเดิม</h3>
                <div class="code-editor">
<span class="kw">&lt;?php</span>
<span class="cmt">// เปิดไฟล์เดิมที่มี "John Doe" และ "Jane Doe"</span>
<span class="var">$myfile</span> = <span class="func">fopen</span>(<span class="str">"newfile.txt"</span>, <span class="str">"w"</span>) or <span class="func">die</span>(<span class="str">"Unable to open file!"</span>);

<span class="cmt">// เขียนข้อมูลใหม่ (ข้อมูลเดิมจะหายไป)</span>
<span class="var">$txt</span> = <span class="str">"Mickey Mouse\n"</span>;
<span class="func">fwrite</span>(<span class="var">$myfile</span>, <span class="var">$txt</span>);

<span class="var">$txt</span> = <span class="str">"Minnie Mouse\n"</span>;
<span class="func">fwrite</span>(<span class="var">$myfile</span>, <span class="var">$txt</span>);

<span class="func">fclose</span>(<span class="var">$myfile</span>);
<span class="kw">?&gt;</span>
                </div>
                
                <div class="example-grid">
                    <div>
                        <h4 style="color: #dc3545;">❌ ก่อนเขียนทับ:</h4>
                        <div class="file-display">John Doe
Jane Doe</div>
                    </div>
                    <div>
                        <h4 style="color: #28a745;">✅ หลังเขียนทับ:</h4>
                        <div class="file-display">Mickey Mouse
Minnie Mouse</div>
                    </div>
                </div>
            </div>
            
            <!-- Section 4: การเขียนต่อท้าย -->
            <div class="section">
                <h2>➕ การเขียนต่อท้ายไฟล์ (Append)</h2>
                
                <div class="info-banner">
                    <h4>💡 โหมด "a" = Append Mode</h4>
                    <p>ใช้เมื่อต้องการเพิ่มข้อมูลใหม่โดยไม่ลบข้อมูลเดิม</p>
                    <ul style="margin-left: 25px; margin-top: 10px; line-height: 2;">
                        <li>✅ ข้อมูลเดิมจะยังอยู่ครบ</li>
                        <li>✅ ข้อมูลใหม่จะถูกเพิ่มต่อท้าย</li>
                        <li>✅ เหมาะสำหรับ Log Files, บันทึกข้อมูล</li>
                    </ul>
                </div>
                
                <h3>📝 ตัวอย่างที่ 4: เขียนต่อท้าย</h3>
                <div class="code-editor">
<span class="kw">&lt;?php</span>
<span class="cmt">// เปิดไฟล์ในโหมด Append</span>
<span class="var">$myfile</span> = <span class="func">fopen</span>(<span class="str">"newfile.txt"</span>, <span class="str">"a"</span>) or <span class="func">die</span>(<span class="str">"Unable to open file!"</span>);

<span class="cmt">// เขียนต่อท้าย</span>
<span class="var">$txt</span> = <span class="str">"Donald Duck\n"</span>;
<span class="func">fwrite</span>(<span class="var">$myfile</span>, <span class="var">$txt</span>);

<span class="var">$txt</span> = <span class="str">"Goofy Goof\n"</span>;
<span class="func">fwrite</span>(<span class="var">$myfile</span>, <span class="var">$txt</span>);

<span class="func">fclose</span>(<span class="var">$myfile</span>);
<span class="kw">?&gt;</span>
                </div>
                
                <div class="result-box">
                    <h4>✅ เนื้อหาในไฟล์หลังเขียนต่อท้าย:</h4>
                    <div class="file-display">Mickey Mouse
Minnie Mouse
Donald Duck
Goofy Goof</div>
                </div>
            </div>
            
            <!-- Section 5: เปรียบเทียบโหมด -->
            <div class="section">
                <h2>⚖️ เปรียบเทียบโหมด "w" และ "a"</h2>
                
                <table class="comparison-table">
                    <tr>
                        <th style="width: 20%;">คุณสมบัติ</th>
                        <th style="width: 40%;">โหมด <code>w</code> (Write)</th>
                        <th style="width: 40%;">โหมด <code>a</code> (Append)</th>
                    </tr>
                    <tr>
                        <td><strong>ข้อมูลเดิม</strong></td>
                        <td>❌ ลบทิ้งทั้งหมด</td>
                        <td>✅ เก็บไว้ทั้งหมด</td>
                    </tr>
                    <tr>
                        <td><strong>ตำแหน่งเขียน</strong></td>
                        <td>📍 เริ่มต้นไฟล์</td>
                        <td>📍 ท้ายไฟล์</td>
                    </tr>
                    <tr>
                        <td><strong>สร้างไฟล์ใหม่</strong></td>
                        <td>✅ ถ้าไม่มีจะสร้าง</td>
                        <td>✅ ถ้าไม่มีจะสร้าง</td>
                    </tr>
                    <tr>
                        <td><strong>เหมาะสำหรับ</strong></td>
                        <td>📝 สร้างไฟล์ใหม่, แทนที่เนื้อหา</td>
                        <td>📝 Log Files, เพิ่มข้อมูล</td>
                    </tr>
                    <tr>
                        <td><strong>ความเสี่ยง</strong></td>
                        <td>⚠️ สูง (ข้อมูลอาจหายได้)</td>
                        <td>✅ ต่ำ (ข้อมูลเดิมปลอดภัย)</td>
                    </tr>
                </table>
            </div>
            
            <!-- Section 6: ตัวอย่างขั้นสูง -->
            <div class="section">
                <h2>🚀 ตัวอย่างการใช้งานจริง</h2>
                
                <h3>📊 1. ระบบบันทึก Log</h3>
                <div class="code-editor">
<span class="kw">&lt;?php</span>
<span class="kw">function</span> <span class="func">writeLog</span>(<span class="var">$message</span>) {
    <span class="var">$logFile</span> = <span class="str">"system.log"</span>;
    <span class="var">$timestamp</span> = <span class="func">date</span>(<span class="str">"Y-m-d H:i:s"</span>);
    <span class="var">$logEntry</span> = <span class="str">"[$timestamp] $message\n"</span>;
    
    <span class="var">$file</span> = <span class="func">fopen</span>(<span class="var">$logFile</span>, <span class="str">"a"</span>);
    <span class="func">fwrite</span>(<span class="var">$file</span>, <span class="var">$logEntry</span>);
    <span class="func">fclose</span>(<span class="var">$file</span>);
}

<span class="cmt">// ใช้งาน</span>
<span class="func">writeLog</span>(<span class="str">"User logged in"</span>);
<span class="func">writeLog</span>(<span class="str">"File uploaded successfully"</span>);
<span class="kw">?&gt;</span>
                </div>
                
                <h3>💾 2. บันทึกข้อมูล JSON</h3>
                <div class="code-editor">
<span class="kw">&lt;?php</span>
<span class="var">$users</span> = [
    [<span class="str">"name"</span> => <span class="str">"John"</span>, <span class="str">"age"</span> => 30],
    [<span class="str">"name"</span> => <span class="str">"Jane"</span>, <span class="str">"age"</span> => 25]
];

<span class="cmt">// แปลงเป็น JSON</span>
<span class="var">$jsonData</span> = <span class="func">json_encode</span>(<span class="var">$users</span>, JSON_PRETTY_PRINT);

<span class="cmt">// บันทึกลงไฟล์</span>
<span class="var">$file</span> = <span class="func">fopen</span>(<span class="str">"users.json"</span>, <span class="str">"w"</span>);
<span class="func">fwrite</span>(<span class="var">$file</span>, <span class="var">$jsonData</span>);
<span class="func">fclose</span>(<span class="var">$file</span>);

<span class="kw">echo</span> <span class="str">"✅ บันทึก JSON สำเร็จ"</span>;
<span class="kw">?&gt;</span>
                </div>
                
                <h3>📝 3. สร้างไฟล์ CSV</h3>
                <div class="code-editor">
<span class="kw">&lt;?php</span>
<span class="var">$data</span> = [
    [<span class="str">"Name"</span>, <span class="str">"Email"</span>, <span class="str">"Phone"</span>],
    [<span class="str">"John Doe"</span>, <span class="str">"john@email.com"</span>, <span class="str">"123-456"</span>],
    [<span class="str">"Jane Doe"</span>, <span class="str">"jane@email.com"</span>, <span class="str">"789-012"</span>]
];

<span class="var">$file</span> = <span class="func">fopen</span>(<span class="str">"contacts.csv"</span>, <span class="str">"w"</span>);

<span class="kw">foreach</span> (<span class="var">$data</span> <span class="kw">as</span> <span class="var">$row</span>) {
    <span class="func">fwrite</span>(<span class="var">$file</span>, <span class="func">implode</span>(<span class="str">","</span>, <span class="var">$row</span>) . <span class="str">"\n"</span>);
}

<span class="func">fclose</span>(<span class="var">$file</span>);
<span class="kw">?&gt;</span>
                </div>
            </div>
            
            <!-- สรุป -->
            <div class="section">
                <h2>✅ สรุปความรู้</h2>
                
                <div class="step-box">
                    <h3>🎯 จุดสำคัญที่ต้องจำ:</h3>
                    <div style="line-height: 2.5; font-size: 1.1em; margin-top: 15px;">
                        <div><span class="badge-success">1</span> ใช้ fopen() โหมด "w" สำหรับสร้าง/เขียนทับไฟล์</div>
                        <div><span class="badge-success">2</span> ใช้ fopen() โหมด "a" สำหรับเขียนต่อท้ายไฟล์</div>
                        <div><span class="badge-success">3</span> fwrite() ใช้สำหรับเขียนข้อมูลลงไฟล์</div>
                        <div><span class="badge-success">4</span> ต้อง fclose() ทุกครั้งหลังเสร็จงาน</div>
                        <div><span class="badge-success">5</span> ตรวจสอบ File Permissions ก่อนใช้งาน</div>
                        <div><span class="badge-success">6</span> ใช้ \n สำหรับขึ้นบรรทัดใหม่</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>