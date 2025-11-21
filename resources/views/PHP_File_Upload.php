<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>PHP File Upload Tutorial</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 25px;
            box-shadow: 0 30px 90px rgba(0,0,0,0.4);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .header::before {
            content: "📤";
            position: absolute;
            font-size: 15em;
            opacity: 0.1;
            top: -30px;
            right: -30px;
        }
        .header h1 {
            font-size: 3.5em;
            margin-bottom: 15px;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.3);
            position: relative;
            z-index: 1;
        }
        .header p {
            font-size: 1.4em;
            opacity: 0.95;
            position: relative;
            z-index: 1;
        }
        
        .content { padding: 50px; }
        
        .section {
            margin-bottom: 45px;
            padding: 40px;
            background: linear-gradient(to bottom right, #f8f9fa, #ffffff);
            border-radius: 20px;
            border: 3px solid #e9ecef;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            position: relative;
        }
        .section h2 {
            color: #667eea;
            font-size: 2.3em;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 5px solid #764ba2;
        }
        .section h3 {
            color: #764ba2;
            margin: 25px 0 15px 0;
            font-size: 1.7em;
        }
        
        .code-container {
            background: #1e1e3f;
            border-radius: 15px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            position: relative;
        }
        .code-container::before {
            content: "💻 Code";
            position: absolute;
            top: 15px;
            right: 20px;
            background: #764ba2;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: bold;
        }
        .code-container pre {
            color: #e0e0e0;
            font-family: 'Consolas', 'Courier New', monospace;
            line-height: 2;
            overflow-x: auto;
        }
        .code-container .tag { color: #569cd6; }
        .code-container .attr { color: #9cdcfe; }
        .code-container .str { color: #ce9178; }
        .code-container .kw { color: #c586c0; }
        .code-container .func { color: #dcdcaa; }
        .code-container .cmt { color: #6a9955; font-style: italic; }
        .code-container .var { color: #4fc1ff; }
        
        .upload-demo {
            background: white;
            border: 4px dashed #667eea;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            margin: 25px 0;
            transition: all 0.3s;
        }
        .upload-demo:hover {
            border-color: #764ba2;
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
        }
        .upload-demo input[type="file"] {
            display: none;
        }
        .upload-demo label {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 40px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1.2em;
            font-weight: bold;
            transition: all 0.3s;
        }
        .upload-demo label:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }
        .upload-demo .file-info {
            margin-top: 20px;
            font-size: 1.1em;
            color: #666;
        }
        
        .info-box {
            background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
            border-left: 6px solid #17a2b8;
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
        }
        .info-box h4 {
            color: #0c5460;
            margin-bottom: 15px;
            font-size: 1.4em;
        }
        
        .warning-box {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%);
            border-left: 6px solid #ffc107;
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
        }
        .warning-box h4 {
            color: #856404;
            margin-bottom: 15px;
            font-size: 1.4em;
        }
        
        .success-box {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border-left: 6px solid #28a745;
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
        }
        .success-box h4 {
            color: #155724;
            margin-bottom: 15px;
            font-size: 1.4em;
        }
        
        .error-box {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            border-left: 6px solid #dc3545;
            border-radius: 12px;
            padding: 25px;
            margin: 20px 0;
        }
        .error-box h4 {
            color: #721c24;
            margin-bottom: 15px;
            font-size: 1.4em;
        }
        
        .config-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-radius: 12px;
            overflow: hidden;
        }
        .config-table th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: left;
            font-size: 1.2em;
        }
        .config-table td {
            padding: 18px 20px;
            border-bottom: 1px solid #e0e0e0;
            background: white;
        }
        .config-table tr:hover td {
            background: #f8f9fa;
        }
        .config-table code {
            background: #667eea;
            color: white;
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: bold;
        }
        
        .step-guide {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin: 25px 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .step-item {
            display: flex;
            align-items: flex-start;
            margin: 25px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s;
        }
        .step-item:hover {
            transform: translateX(10px);
            background: #e9ecef;
        }
        .step-number {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.5em;
            margin-right: 20px;
            flex-shrink: 0;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        .step-content {
            flex: 1;
        }
        .step-content h4 {
            color: #667eea;
            margin-bottom: 10px;
            font-size: 1.3em;
        }
        .step-content p {
            color: #666;
            line-height: 1.8;
            font-size: 1.05em;
        }
        
        .security-checklist {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%);
            border-radius: 15px;
            padding: 30px;
            margin: 25px 0;
        }
        .security-checklist ul {
            list-style: none;
            margin-top: 15px;
        }
        .security-checklist li {
            padding: 12px 0;
            padding-left: 35px;
            position: relative;
            font-size: 1.1em;
            line-height: 1.8;
        }
        .security-checklist li::before {
            content: "🔒";
            position: absolute;
            left: 0;
            font-size: 1.3em;
        }
        
        .file-types {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 25px 0;
        }
        .file-type-card {
            background: white;
            border: 3px solid #e9ecef;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s;
        }
        .file-type-card:hover {
            border-color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
        }
        .file-type-card .icon {
            font-size: 3em;
            margin-bottom: 15px;
        }
        .file-type-card h4 {
            color: #667eea;
            margin-bottom: 10px;
        }
        .file-type-card p {
            color: #666;
            font-size: 0.95em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📤 PHP File Upload</h1>
            <p>ระบบอัพโหลดไฟล์แบบมืออาชีพและปลอดภัย</p>
        </div>
        
        <div class="content">
            
            <!-- Section 1: การตั้งค่า php.ini -->
            <div class="section">
                <h2>⚙️ ขั้นตอนที่ 1: ตั้งค่า php.ini</h2>
                
                <div class="info-box">
                    <h4>🎯 ต้องตรวจสอบการตั้งค่าเหล่านี้ใน php.ini</h4>
                    <p>ก่อนจะใช้งาน File Upload ต้องแน่ใจว่า PHP อนุญาตให้อัพโหลดไฟล์</p>
                </div>
                
                <table class="config-table">
                    <tr>
                        <th style="width: 35%;">ตัวเลือกใน php.ini</th>
                        <th style="width: 25%;">ค่าที่แนะนำ</th>
                        <th style="width: 40%;">คำอธิบาย</th>
                    </tr>
                    <tr>
                        <td><code>file_uploads</code></td>
                        <td><strong>On</strong></td>
                        <td>เปิดใช้งานการอัพโหลดไฟล์</td>
                    </tr>
                    <tr>
                        <td><code>upload_max_filesize</code></td>
                        <td><strong>20M</strong></td>
                        <td>ขนาดไฟล์สูงสุดที่อัพโหลดได้</td>
                    </tr>
                    <tr>
                        <td><code>post_max_size</code></td>
                        <td><strong>25M</strong></td>
                        <td>ขนาด POST data สูงสุด (ต้องมากกว่า upload_max_filesize)</td>
                    </tr>
                    <tr>
                        <td><code>max_file_uploads</code></td>
                        <td><strong>20</strong></td>
                        <td>จำนวนไฟล์สูงสุดที่อัพโหลดพร้อมกันได้</td>
                    </tr>
                    <tr>
                        <td><code>upload_tmp_dir</code></td>
                        <td><strong>/tmp</strong></td>
                        <td>โฟลเดอร์เก็บไฟล์ชั่วคราว</td>
                    </tr>
                </table>
                
                <div class="code-container">
<pre><span class="cmt">; ตัวอย่างการตั้งค่าใน php.ini</span>
<span class="var">file_uploads</span> = <span class="str">On</span>
<span class="var">upload_max_filesize</span> = <span class="str">20M</span>
<span class="var">post_max_size</span> = <span class="str">25M</span>
<span class="var">max_file_uploads</span> = <span class="str">20</span></pre>
                </div>
            </div>
            
            <!-- Section 2: สร้าง HTML Form -->
            <div class="section">
                <h2>📝 ขั้นตอนที่ 2: สร้าง HTML Form</h2>
                
                <div class="warning-box">
                    <h4>⚠️ ข้อกำหนดสำคัญของ Form!</h4>
                    <ul style="margin-left: 25px; line-height: 2; margin-top: 10px;">
                        <li>✅ ต้องใช้ <code>method="post"</code></li>
                        <li>✅ ต้องใช้ <code>enctype="multipart/form-data"</code></li>
                        <li>✅ Input ต้องเป็น <code>type="file"</code></li>
                    </ul>
                </div>
                
                <h3>💡 ตัวอย่าง HTML Form</h3>
                <div class="code-container">
<pre><span class="tag">&lt;!DOCTYPE html&gt;</span>
<span class="tag">&lt;html&gt;</span>
<span class="tag">&lt;body&gt;</span>

<span class="tag">&lt;h2&gt;</span>อัพโหลดรูปภาพ<span class="tag">&lt;/h2&gt;</span>

<span class="tag">&lt;form</span> <span class="attr">action</span>=<span class="str">"upload.php"</span> <span class="attr">method</span>=<span class="str">"post"</span> <span class="attr">enctype</span>=<span class="str">"multipart/form-data"</span><span class="tag">&gt;</span>
    <span class="tag">&lt;label</span> <span class="attr">for</span>=<span class="str">"fileToUpload"</span><span class="tag">&gt;</span>เลือกรูปภาพ:<span class="tag">&lt;/label&gt;</span>
    <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="str">"file"</span> <span class="attr">name</span>=<span class="str">"fileToUpload"</span> <span class="attr">id</span>=<span class="str">"fileToUpload"</span><span class="tag">&gt;</span>
    <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="str">"submit"</span> <span class="attr">value</span>=<span class="str">"อัพโหลด"</span> <span class="attr">name</span>=<span class="str">"submit"</span><span class="tag">&gt;</span>
<span class="tag">&lt;/form&gt;</span>

<span class="tag">&lt;/body&gt;</span>
<span class="tag">&lt;/html&gt;</span></pre>
                </div>
                
                <h3>🎨 Demo Form สวยงาม</h3>
                <div class="upload-demo">
                    <div style="font-size: 4em; margin-bottom: 20px;">📁</div>
                    <h3 style="color: #667eea; margin-bottom: 20px;">เลือกไฟล์เพื่ออัพโหลด</h3>
                    <form id="demoForm">
                        <input type="file" id="fileInput" accept="image/*">
                        <label for="fileInput">📤 เลือกรูปภาพ</label>
                        <div class="file-info" id="fileInfo">ยังไม่ได้เลือกไฟล์</div>
                    </form>
                </div>
                
                <script>
                document.getElementById('fileInput').addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    const fileInfo = document.getElementById('fileInfo');
                    if (file) {
                        const size = (file.size / 1024).toFixed(2);
                        fileInfo.innerHTML = `<strong>ไฟล์:</strong> ${file.name}<br><strong>ขนาด:</strong> ${size} KB<br><strong>ชนิด:</strong> ${file.type}`;
                        fileInfo.style.color = '#28a745';
                    }
                });
                </script>
            </div>
            
            <!-- Section 3: PHP Upload Script -->
            <div class="section">
                <h2>🚀 ขั้นตอนที่ 3: สร้างสคริปต์ PHP (upload.php)</h2>
                
                <div class="step-guide">
                    <h3 style="color: #667eea; margin-bottom: 20px;">📋 ขั้นตอนการทำงาน</h3>
                    
                    <div class="step-item">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h4>รับข้อมูลไฟล์</h4>
                            <p>รับข้อมูลจาก $_FILES superglobal array</p>
                        </div>
                    </div>
                    
                    <div class="step-item">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h4>ตรวจสอบความถูกต้อง</h4>
                            <p>ตรวจสอบชนิดไฟล์, ขนาด, ว่าเป็นรูปจริงหรือไม่</p>
                        </div>
                    </div>
                    
                    <div class="step-item">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h4>ย้ายไฟล์</h4>
                            <p>ย้ายไฟล์จาก temp folder ไปยังปลายทาง</p>
                        </div>
                    </div>
                    
                    <div class="step-item">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <h4>แสดงผลลัพธ์</h4>
                            <p>แจ้งผลการอัพโหลดให้ผู้ใช้ทราบ</p>
                        </div>
                    </div>
                </div>
                
                <h3>💻 โค้ดสคริปต์อัพโหลดแบบสมบูรณ์</h3>
                <div class="code-container">
<pre><span class="kw">&lt;?php</span>
<span class="cmt">// กำหนดโฟลเดอร์ปลายทาง</span>
<span class="var">$target_dir</span> = <span class="str">"uploads/"</span>;
<span class="var">$target_file</span> = <span class="var">$target_dir</span> . <span class="func">basename</span>(<span class="var">$_FILES</span>[<span class="str">"fileToUpload"</span>][<span class="str">"name"</span>]);
<span class="var">$uploadOk</span> = 1;
<span class="var">$imageFileType</span> = <span class="func">strtolower</span>(<span class="func">pathinfo</span>(<span class="var">$target_file</span>, PATHINFO_EXTENSION));

<span class="cmt">// ตรวจสอบว่าเป็นรูปภาพจริงหรือไม่</span>
<span class="kw">if</span>(<span class="func">isset</span>(<span class="var">$_POST</span>[<span class="str">"submit"</span>])) {
    <span class="var">$check</span> = <span class="func">getimagesize</span>(<span class="var">$_FILES</span>[<span class="str">"fileToUpload"</span>][<span class="str">"tmp_name"</span>]);
    <span class="kw">if</span>(<span class="var">$check</span> !== <span class="kw">false</span>) {
        <span class="kw">echo</span> <span class="str">"File is an image - "</span> . <span class="var">$check</span>[<span class="str">"mime"</span>] . <span class="str">"."</span>;
        <span class="var">$uploadOk</span> = 1;
    } <span class="kw">else</span> {
        <span class="kw">echo</span> <span class="str">"File is not an image."</span>;
        <span class="var">$uploadOk</span> = 0;
    }
}

<span class="cmt">// ตรวจสอบว่าไฟล์มีอยู่แล้วหรือไม่</span>
<span class="kw">if</span> (<span class="func">file_exists</span>(<span class="var">$target_file</span>)) {
    <span class="kw">echo</span> <span class="str">"Sorry, file already exists."</span>;
    <span class="var">$uploadOk</span> = 0;
}

<span class="cmt">// ตรวจสอบขนาดไฟล์ (จำกัดไม่เกิน 500KB)</span>
<span class="kw">if</span> (<span class="var">$_FILES</span>[<span class="str">"fileToUpload"</span>][<span class="str">"size"</span>] > 500000) {
    <span class="kw">echo</span> <span class="str">"Sorry, your file is too large."</span>;
    <span class="var">$uploadOk</span> = 0;
}

<span class="cmt">// อนุญาตเฉพาะไฟล์บางชนิด</span>
<span class="kw">if</span>(<span class="var">$imageFileType</span> != <span class="str">"jpg"</span> && <span class="var">$imageFileType</span> != <span class="str">"png"</span> && 
   <span class="var">$imageFileType</span> != <span class="str">"jpeg"</span> && <span class="var">$imageFileType</span> != <span class="str">"gif"</span>) {
    <span class="kw">echo</span> <span class="str">"Sorry, only JPG, JPEG, PNG & GIF files are allowed."</span>;
    <span class="var">$uploadOk</span> = 0;
}

<span class="cmt">// ตรวจสอบว่า $uploadOk เป็น 0 จาก error หรือไม่</span>
<span class="kw">if</span> (<span class="var">$uploadOk</span> == 0) {
    <span class="kw">echo</span> <span class="str">"Sorry, your file was not uploaded."</span>;
<span class="cmt">// ถ้าทุกอย่างโอเค ลองอัพโหลด</span>
} <span class="kw">else</span> {
    <span class="kw">if</span> (<span class="func">move_uploaded_file</span>(<span class="var">$_FILES</span>[<span class="str">"fileToUpload"</span>][<span class="str">"tmp_name"</span>], <span class="var">$target_file</span>)) {
        <span class="kw">echo</span> <span class="str">"The file "</span> . <span class="func">htmlspecialchars</span>(<span class="func">basename</span>(<span class="var">$_FILES</span>[<span class="str">"fileToUpload"</span>][<span class="str">"name"</span>])). 
             <span class="str">" has been uploaded."</span>;
    } <span class="kw">else</span> {
        <span class="kw">echo</span> <span class="str">"Sorry, there was an error uploading your file."</span>;
    }
}
<span class="kw">?&gt;</span></pre>
                </div>
            </div>
            
            <!-- Section 4: การตรวจสอบความปลอดภัย -->
            <div class="section">
                <h2>🔒 มาตรการรักษาความปลอดภัย</h2>
                
                <div class="security-checklist">
                    <h3 style="color: #856404; margin-bottom: 20px;">🛡️ Checklist ความปลอดภัย</h3>
                    <ul>
                        <li>ตรวจสอบว่าไฟล์มีอยู่แล้วหรือไม่ด้วย <code>file_exists()</code></li>
                        <li>เปลี่ยนชื่อไฟล์เป็นชื่อสุ่ม เพื่อป้องกันการเขียนทับ</li>
                        <li>ใช้ <code>htmlspecialchars()</code> เพื่อป้องกัน XSS</li>
                        <li>เก็บไฟล์นอก Document Root หรือในโฟลเดอร์ที่ไม่มีสิทธิ์ Execute</li>
                        <li>สร้างโฟลเดอร์ uploads/ และตั้งค่า permissions ให้ถูกต้อง</li>
                        <li>ใช้ <code>move_uploaded_file()</code> แทน <code>copy()</code></li>
                        <li>Log การอัพโหลดทุกครั้งเพื่อตรวจสอบ</li>
                    </ul>
                </div>
                
                <h3>🔍 ตัวอย่างการตรวจสอบแบบละเอียด</h3>
                <div class="code-container">
<pre><span class="kw">&lt;?php</span>
<span class="cmt">// ฟังก์ชันตรวจสอบความปลอดภัย</span>
<span class="kw">function</span> <span class="func">validateUpload</span>(<span class="var">$file</span>) {
    <span class="var">$errors</span> = [];
    
    <span class="cmt">// ตรวจสอบว่ามีไฟล์หรือไม่</span>
    <span class="kw">if</span> (<span class="var">$file</span>[<span class="str">'error'</span>] !== UPLOAD_ERR_OK) {
        <span class="var">$errors</span>[] = <span class="str">"เกิดข้อผิดพลาดในการอัพโหลด"</span>;
        <span class="kw">return</span> <span class="var">$errors</span>;
    }
    
    <span class="cmt">// ตรวจสอบขนาด (5MB)</span>
    <span class="var">$maxSize</span> = 5 * 1024 * 1024;
    <span class="kw">if</span> (<span class="var">$file</span>[<span class="str">'size'</span>] > <span class="var">$maxSize</span>) {
        <span class="var">$errors</span>[] = <span class="str">"ไฟล์ใหญ่เกินไป (สูงสุด 5MB)"</span>;
    }
    
    <span class="cmt">// ตรวจสอบชนิดไฟล์</span>
    <span class="var">$allowedTypes</span> = [<span class="str">'image/jpeg'</span>, <span class="str">'image/png'</span>, <span class="str">'image/gif'</span>];
    <span class="var">$finfo</span> = <span class="func">finfo_open</span>(FILEINFO_MIME_TYPE);
    <span class="var">$mimeType</span> = <span class="func">finfo_file</span>(<span class="var">$finfo</span>, <span class="var">$file</span>[<span class="str">'tmp_name'</span>]);
    <span class="func">finfo_close</span>(<span class="var">$finfo</span>);
    
    <span class="kw">if</span> (!<span class="func">in_array</span>(<span class="var">$mimeType</span>, <span class="var">$allowedTypes</span>)) {
        <span class="var">$errors</span>[] = <span class="str">"อนุญาตเฉพาะไฟล์ JPG, PNG, GIF"</span>;
    }
    
    <span class="cmt">// ตรวจสอบว่าเป็นรูปจริง</span>
    <span class="var">$imageInfo</span> = <span class="func">getimagesize</span>(<span class="var">$file</span>[<span class="str">'tmp_name'</span>]);
    <span class="kw">if</span> (<span class="var">$imageInfo</span> === <span class="kw">false</span>) {
        <span class="var">$errors</span>[] = <span class="str">"ไฟล์ไม่ใช่รูปภาพที่ถูกต้อง"</span>;
    }
    
    <span class="kw">return</span> <span class="var">$errors</span>;
}

<span class="cmt">// ใช้งาน</span>
<span class="var">$errors</span> = <span class="func">validateUpload</span>(<span class="var">$_FILES</span>[<span class="str">'fileToUpload'</span>]);
<span class="kw">if</span> (<span class="func">empty</span>(<span class="var">$errors</span>)) {
    <span class="kw">echo</span> <span class="str">"✅ ไฟล์ผ่านการตรวจสอบ"</span>;
} <span class="kw">else</span> {
    <span class="kw">foreach</span> (<span class="var">$errors</span> <span class="kw">as</span> <span class="var">$error</span>) {
        <span class="kw">echo</span> <span class="str">"❌ "</span> . <span class="var">$error</span> . <span class="str">"&lt;br&gt;"</span>;
    }
}
<span class="kw">?&gt;</span></pre>
                </div>
            </div>
            
            <!-- Section 5: ชนิดไฟล์ที่รองรับ -->
            <div class="section">
                <h2>📁 ชนิดไฟล์ที่นิยมรองรับ</h2>
                
                <div class="file-types">
                    <div class="file-type-card">
                        <div class="icon">🖼️</div>
                        <h4>รูปภาพ</h4>
                        <p><strong>นามสกุล:</strong> jpg, jpeg, png, gif, webp</p>
                        <p><strong>MIME:</strong> image/*</p>
                    </div>
                    
                    <div class="file-type-card">
                        <div class="icon">📄</div>
                        <h4>เอกสาร</h4>
                        <p><strong>นามสกุล:</strong> pdf, doc, docx, txt</p>
                        <p><strong>MIME:</strong> application/pdf</p>
                    </div>
                    
                    <div class="file-type-card">
                        <div class="icon">📊</div>
                        <h4>สเปรดชีต</h4>
                        <p><strong>นามสกุล:</strong> xls, xlsx, csv</p>
                        <p><strong>MIME:</strong> application/vnd.ms-excel</p>
                    </div>
                    
                    <div class="file-type-card">
                        <div class="icon">🎵</div>
                        <h4>เสียง</h4>
                        <p><strong>นามสกุล:</strong> mp3, wav, ogg</p>
                        <p><strong>MIME:</strong> audio/*</p>
                    </div>
                    
                    <div class="file-type-card">
                        <div class="icon">🎬</div>
                        <h4>วิดีโอ</h4>
                        <p><strong>นามสกุล:</strong> mp4, avi, mov</p>
                        <p><strong>MIME:</strong> video/*</p>
                    </div>
                    
                    <div class="file-type-card">
                        <div class="icon">📦</div>
                        <h4>ไฟล์บีบอัด</h4>
                        <p><strong>นามสกุล:</strong> zip, rar, 7z</p>
                        <p><strong>MIME:</strong> application/zip</p>
                    </div>
                </div>
                
                <h3>💻 โค้ดตรวจสอบหลายชนิดไฟล์</h3>
                <div class="code-container">
<pre><span class="kw">&lt;?php</span>
<span class="cmt">// กำหนดชนิดไฟล์ที่อนุญาต</span>
<span class="var">$allowedExtensions</span> = [<span class="str">'jpg'</span>, <span class="str">'jpeg'</span>, <span class="str">'png'</span>, <span class="str">'gif'</span>, <span class="str">'pdf'</span>, <span class="str">'doc'</span>, <span class="str">'docx'</span>];
<span class="var">$allowedMimeTypes</span> = [
    <span class="str">'image/jpeg'</span>,
    <span class="str">'image/png'</span>,
    <span class="str">'image/gif'</span>,
    <span class="str">'application/pdf'</span>,
    <span class="str">'application/msword'</span>,
    <span class="str">'application/vnd.openxmlformats-officedocument.wordprocessingml.document'</span>
];

<span class="var">$fileExtension</span> = <span class="func">strtolower</span>(<span class="func">pathinfo</span>(<span class="var">$_FILES</span>[<span class="str">'file'</span>][<span class="str">'name'</span>], PATHINFO_EXTENSION));
<span class="var">$fileMimeType</span> = <span class="func">mime_content_type</span>(<span class="var">$_FILES</span>[<span class="str">'file'</span>][<span class="str">'tmp_name'</span>]);

<span class="kw">if</span> (<span class="func">in_array</span>(<span class="var">$fileExtension</span>, <span class="var">$allowedExtensions</span>) && 
    <span class="func">in_array</span>(<span class="var">$fileMimeType</span>, <span class="var">$allowedMimeTypes</span>)) {
    <span class="kw">echo</span> <span class="str">"✅ ไฟล์ได้รับอนุญาต"</span>;
} <span class="kw">else</span> {
    <span class="kw">echo</span> <span class="str">"❌ ชนิดไฟล์ไม่ได้รับอนุญาต"</span>;
}
<span class="kw">?&gt;</span></pre>
                </div>
            </div>
            
            <!-- Section 6: ตัวอย่างขั้นสูง -->
            <div class="section">
                <h2>🚀 ตัวอย่างขั้นสูง</h2>
                
                <h3>📸 1. อัพโหลดพร้อมปรับขนาดรูป</h3>
                <div class="code-container">
<pre><span class="kw">&lt;?php</span>
<span class="kw">function</span> <span class="func">resizeImage</span>(<span class="var">$source</span>, <span class="var">$destination</span>, <span class="var">$maxWidth</span> = 800) {
    <span class="cmt">// อ่านข้อมูลรูป</span>
    <span class="var">$imageInfo</span> = <span class="func">getimagesize</span>(<span class="var">$source</span>);
    <span class="var">$width</span> = <span class="var">$imageInfo</span>[0];
    <span class="var">$height</span> = <span class="var">$imageInfo</span>[1];
    <span class="var">$mimeType</span> = <span class="var">$imageInfo</span>[<span class="str">'mime'</span>];
    
    <span class="cmt">// คำนวณขนาดใหม่</span>
    <span class="var">$ratio</span> = <span class="var">$width</span> / <span class="var">$maxWidth</span>;
    <span class="var">$newWidth</span> = <span class="var">$maxWidth</span>;
    <span class="var">$newHeight</span> = <span class="var">$height</span> / <span class="var">$ratio</span>;
    
    <span class="cmt">// สร้างภาพใหม่</span>
    <span class="var">$newImage</span> = <span class="func">imagecreatetruecolor</span>(<span class="var">$newWidth</span>, <span class="var">$newHeight</span>);
    
    <span class="cmt">// โหลดภาพต้นฉบับ</span>
    <span class="kw">switch</span> (<span class="var">$mimeType</span>) {
        <span class="kw">case</span> <span class="str">'image/jpeg'</span>:
            <span class="var">$image</span> = <span class="func">imagecreatefromjpeg</span>(<span class="var">$source</span>);
            <span class="kw">break</span>;
        <span class="kw">case</span> <span class="str">'image/png'</span>:
            <span class="var">$image</span> = <span class="func">imagecreatefrompng</span>(<span class="var">$source</span>);
            <span class="kw">break</span>;
        <span class="kw">case</span> <span class="str">'image/gif'</span>:
            <span class="var">$image</span> = <span class="func">imagecreatefromgif</span>(<span class="var">$source</span>);
            <span class="kw">break</span>;
    }
    
    <span class="cmt">// ปรับขนาด</span>
    <span class="func">imagecopyresampled</span>(<span class="var">$newImage</span>, <span class="var">$image</span>, 0, 0, 0, 0, 
                       <span class="var">$newWidth</span>, <span class="var">$newHeight</span>, <span class="var">$width</span>, <span class="var">$height</span>);
    
    <span class="cmt">// บันทึกภาพใหม่</span>
    <span class="func">imagejpeg</span>(<span class="var">$newImage</span>, <span class="var">$destination</span>, 90);
    
    <span class="cmt">// ล้างหน่วยความจำ</span>
    <span class="func">imagedestroy</span>(<span class="var">$image</span>);
    <span class="func">imagedestroy</span>(<span class="var">$newImage</span>);
}

<span class="cmt">// ใช้งาน</span>
<span class="var">$tempFile</span> = <span class="var">$_FILES</span>[<span class="str">'image'</span>][<span class="str">'tmp_name'</span>];
<span class="var">$targetFile</span> = <span class="str">"uploads/resized_image.jpg"</span>;
<span class="func">resizeImage</span>(<span class="var">$tempFile</span>, <span class="var">$targetFile</span>, 800);
<span class="kw">?&gt;</span></pre>
                </div>
                
                <h3>📁 2. อัพโหลดหลายไฟล์พร้อมกัน</h3>
                <div class="code-container">
<pre><span class="cmt">&lt;!-- HTML Form --&gt;</span>
<span class="tag">&lt;form</span> <span class="attr">method</span>=<span class="str">"post"</span> <span class="attr">enctype</span>=<span class="str">"multipart/form-data"</span><span class="tag">&gt;</span>
    <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="str">"file"</span> <span class="attr">name</span>=<span class="str">"files[]"</span> <span class="attr">multiple</span><span class="tag">&gt;</span>
    <span class="tag">&lt;input</span> <span class="attr">type</span>=<span class="str">"submit"</span> <span class="attr">value</span>=<span class="str">"อัพโหลดหลายไฟล์"</span><span class="tag">&gt;</span>
<span class="tag">&lt;/form&gt;</span>

<span class="kw">&lt;?php</span>
<span class="cmt">// PHP Script</span>
<span class="kw">if</span> (<span class="func">isset</span>(<span class="var">$_FILES</span>[<span class="str">'files'</span>])) {
    <span class="var">$files</span> = <span class="var">$_FILES</span>[<span class="str">'files'</span>];
    <span class="var">$fileCount</span> = <span class="func">count</span>(<span class="var">$files</span>[<span class="str">'name'</span>]);
    
    <span class="kw">for</span> (<span class="var">$i</span> = 0; <span class="var">$i</span> &lt; <span class="var">$fileCount</span>; <span class="var">$i</span>++) {
        <span class="var">$fileName</span> = <span class="var">$files</span>[<span class="str">'name'</span>][<span class="var">$i</span>];
        <span class="var">$fileTmpName</span> = <span class="var">$files</span>[<span class="str">'tmp_name'</span>][<span class="var">$i</span>];
        <span class="var">$fileSize</span> = <span class="var">$files</span>[<span class="str">'size'</span>][<span class="var">$i</span>];
        <span class="var">$fileError</span> = <span class="var">$files</span>[<span class="str">'error'</span>][<span class="var">$i</span>];
        
        <span class="kw">if</span> (<span class="var">$fileError</span> === 0) {
            <span class="var">$destination</span> = <span class="str">"uploads/"</span> . <span class="var">$fileName</span>;
            <span class="kw">if</span> (<span class="func">move_uploaded_file</span>(<span class="var">$fileTmpName</span>, <span class="var">$destination</span>)) {
                <span class="kw">echo</span> <span class="str">"✅ อัพโหลด $fileName สำเร็จ&lt;br&gt;"</span>;
            }
        }
    }
}
<span class="kw">?&gt;</span></pre>
                </div>
                
                <h3>🔐 3. ระบบอัพโหลดแบบปลอดภัยสูงสุด</h3>
                <div class="code-container">
<pre><span class="kw">&lt;?php</span>
<span class="kw">class</span> <span class="func">SecureUpload</span> {
    <span class="kw">private</span> <span class="var">$uploadDir</span> = <span class="str">'uploads/'</span>;
    <span class="kw">private</span> <span class="var">$maxSize</span> = 5242880; <span class="cmt">// 5MB</span>
    <span class="kw">private</span> <span class="var">$allowedTypes</span> = [<span class="str">'image/jpeg'</span>, <span class="str">'image/png'</span>, <span class="str">'image/gif'</span>];
    
    <span class="kw">public function</span> <span class="func">upload</span>(<span class="var">$file</span>) {
        <span class="cmt">// สร้างชื่อไฟล์ใหม่ (สุ่ม + timestamp)</span>
        <span class="var">$extension</span> = <span class="func">pathinfo</span>(<span class="var">$file</span>[<span class="str">'name'</span>], PATHINFO_EXTENSION);
        <span class="var">$newFileName</span> = <span class="func">uniqid</span>(<span class="str">'img_'</span>, <span class="kw">true</span>) . <span class="str">'.'</span> . <span class="var">$extension</span>;
        <span class="var">$destination</span> = <span class="var">$this</span>-><span class="var">uploadDir</span> . <span class="var">$newFileName</span>;
        
        <span class="cmt">// ตรวจสอบทุกอย่าง</span>
        <span class="kw">if</span> (!<span class="var">$this</span>-><span class="func">validateFile</span>(<span class="var">$file</span>)) {
            <span class="kw">return</span> [<span class="str">'success'</span> => <span class="kw">false</span>, <span class="str">'message'</span> => <span class="str">'Validation failed'</span>];
        }
        
        <span class="cmt">// อัพโหลด</span>
        <span class="kw">if</span> (<span class="func">move_uploaded_file</span>(<span class="var">$file</span>[<span class="str">'tmp_name'</span>], <span class="var">$destination</span>)) {
            <span class="cmt">// ตั้งค่า permissions</span>
            <span class="func">chmod</span>(<span class="var">$destination</span>, 0644);
            
            <span class="cmt">// บันทึก Log</span>
            <span class="var">$this</span>-><span class="func">logUpload</span>(<span class="var">$newFileName</span>);
            
            <span class="kw">return</span> [
                <span class="str">'success'</span> => <span class="kw">true</span>, 
                <span class="str">'filename'</span> => <span class="var">$newFileName</span>,
                <span class="str">'path'</span> => <span class="var">$destination</span>
            ];
        }
        
        <span class="kw">return</span> [<span class="str">'success'</span> => <span class="kw">false</span>, <span class="str">'message'</span> => <span class="str">'Upload failed'</span>];
    }
    
    <span class="kw">private function</span> <span class="func">validateFile</span>(<span class="var">$file</span>) {
        <span class="cmt">// ตรวจสอบ error</span>
        <span class="kw">if</span> (<span class="var">$file</span>[<span class="str">'error'</span>] !== UPLOAD_ERR_OK) <span class="kw">return false</span>;
        
        <span class="cmt">// ตรวจสอบขนาด</span>
        <span class="kw">if</span> (<span class="var">$file</span>[<span class="str">'size'</span>] > <span class="var">$this</span>-><span class="var">maxSize</span>) <span class="kw">return false</span>;
        
        <span class="cmt">// ตรวจสอบ MIME type</span>
        <span class="var">$finfo</span> = <span class="func">finfo_open</span>(FILEINFO_MIME_TYPE);
        <span class="var">$mimeType</span> = <span class="func">finfo_file</span>(<span class="var">$finfo</span>, <span class="var">$file</span>[<span class="str">'tmp_name'</span>]);
        <span class="func">finfo_close</span>(<span class="var">$finfo</span>);
        
        <span class="kw">if</span> (!<span class="func">in_array</span>(<span class="var">$mimeType</span>, <span class="var">$this</span>-><span class="var">allowedTypes</span>)) <span class="kw">return false</span>;
        
        <span class="cmt">// ตรวจสอบว่าเป็นรูปจริง</span>
        <span class="kw">if</span> (<span class="func">getimagesize</span>(<span class="var">$file</span>[<span class="str">'tmp_name'</span>]) === <span class="kw">false</span>) <span class="kw">return false</span>;
        
        <span class="kw">return true</span>;
    }
    
    <span class="kw">private function</span> <span class="func">logUpload</span>(<span class="var">$filename</span>) {
        <span class="var">$logEntry</span> = <span class="func">date</span>(<span class="str">'Y-m-d H:i:s'</span>) . <span class="str">" - "</span> . <span class="var">$filename</span> . <span class="str">"\n"</span>;
        <span class="func">file_put_contents</span>(<span class="str">'upload.log'</span>, <span class="var">$logEntry</span>, FILE_APPEND);
    }
}

<span class="cmt">// ใช้งาน</span>
<span class="var">$uploader</span> = <span class="kw">new</span> <span class="func">SecureUpload</span>();
<span class="var">$result</span> = <span class="var">$uploader</span>-><span class="func">upload</span>(<span class="var">$_FILES</span>[<span class="str">'file'</span>]);

<span class="kw">if</span> (<span class="var">$result</span>[<span class="str">'success'</span>]) {
    <span class="kw">echo</span> <span class="str">"✅ อัพโหลดสำเร็จ: "</span> . <span class="var">$result</span>[<span class="str">'filename'</span>];
} <span class="kw">else</span> {
    <span class="kw">echo</span> <span class="str">"❌ "</span> . <span class="var">$result</span>[<span class="str">'message'</span>];
}
<span class="kw">?&gt;</span></pre>
                </div>
            </div>
            
            <!-- สรุป -->
            <div class="section">
                <h2>✅ สรุปความรู้ทั้งหมด</h2>
                
                <div class="success-box">
                    <h4>🎯 จุดสำคัญที่ต้องจำ:</h4>
                    <ol style="margin-left: 25px; line-height: 2.5; font-size: 1.1em; margin-top: 15px;">
                        <li><strong>ตั้งค่า php.ini</strong> ให้ <code>file_uploads = On</code></li>
                        <li><strong>Form ต้องมี</strong> <code>enctype="multipart/form-data"</code></li>
                        <li><strong>ตรวจสอบทุกอย่าง:</strong> ขนาด, ชนิด, ความถูกต้อง</li>
                        <li><strong>ใช้ move_uploaded_file()</strong> ไม่ใช่ copy()</li>
                        <li><strong>เปลี่ยนชื่อไฟล์</strong>เป็นชื่อสุ่มเพื่อความปลอดภัย</li>
                        <li><strong>สร้างโฟลเดอร์ uploads/</strong> และตั้งค่า permissions</li>
                        <li><strong>ใช้ htmlspecialchars()</strong> เพื่อป้องกัน XSS</li>
                        <li><strong>Log การอัพโหลด</strong>ทุกครั้งเพื่อตรวจสอบ</li>
                    </ol>
                </div>
                
                <div class="info-box">
                    <h4>📚 ตัวแปร $_FILES มีอะไรบ้าง?</h4>
                    <ul style="margin-left: 25px; line-height: 2; margin-top: 10px;">
                        <li><code>$_FILES['file']['name']</code> - ชื่อไฟล์ต้นฉบับ</li>
                        <li><code>$_FILES['file']['type']</code> - MIME type ของไฟล์</li>
                        <li><code>$_FILES['file']['tmp_name']</code> - ตำแหน่งชั่วคราวบน Server</li>
                        <li><code>$_FILES['file']['error']</code> - รหัส Error (0 = สำเร็จ)</li>
                        <li><code>$_FILES['file']['size']</code> - ขนาดไฟล์ (bytes)</li>
                    </ul>
                </div>
                
                <div class="warning-box">
                    <h4>⚠️ ข้อผิดพลาดที่พบบ่อย:</h4>
                    <ul style="margin-left: 25px; line-height: 2; margin-top: 10px;">
                        <li>❌ ลืมใส่ <code>enctype="multipart/form-data"</code></li>
                        <li>❌ ไม่ตรวจสอบ MIME type (ตรวจเฉพาะนามสกุล)</li>
                        <li>❌ ไม่จำกัดขนาดไฟล์</li>
                        <li>❌ เก็บไฟล์ในโฟลเดอร์ที่ Execute PHP ได้</li>
                        <li>❌ ใช้ชื่อไฟล์เดิมโดยตรง (เสี่ยง Path Traversal)</li>
                        <li>❌ ไม่ตรวจสอบว่าเป็นไฟล์จริงหรือไม่</li>
                    </ul>
                </div>
                
                <div class="success-box">
                    <h4>🎓 สิ่งที่ควรทำเพิ่มเติม:</h4>
                    <ul style="margin-left: 25px; line-height: 2; margin-top: 10px;">
                        <li>✅ สร้าง Progress Bar แสดงความคืบหน้า</li>
                        <li>✅ บีบอัดรูปภาพอัตโนมัติเพื่อประหยัดพื้นที่</li>
                        <li>✅ สร้าง Thumbnail สำหรับรูปภาพ</li>
                        <li>✅ เก็บข้อมูลไฟล์ลงฐานข้อมูล</li>
                        <li>✅ เพิ่มการ Scan Virus (ถ้าเป็นระบบใหญ่)</li>
                        <li>✅ ทำ Rate Limiting เพื่อป้องกัน Spam</li>
                    </ul>
                </div>
            </div>
            
        </div>
        
        <!-- Footer -->
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center;">
            <h3 style="margin-bottom: 15px;">🎉 จบบทเรียน PHP File Upload!</h3>
            <p style="font-size: 1.1em; opacity: 0.9;">ตอนนี้คุณสามารถสร้างระบบอัพโหลดไฟล์ที่ปลอดภัยได้แล้ว</p>
            <p style="margin-top: 20px; font-size: 0.95em;">💡 อย่าลืม: ความปลอดภัยคือสิ่งสำคัญที่สุด!</p>
        </div>
    </div>
</body>
</html>ว่าเป็นไฟล์รูปจริง ด้วย <code>getimagesize()</code></li>
                        <li>จำกัดขนาดไฟล์ (เช่น ไม่เกิน 500KB หรือ 5MB)</li>
                        <li>ตรวจสอบนามสกุลไฟล์ที่อนุญาต (jpg, png, gif เท่านั้น)</li>
                        <li>ตรวจสอบ