<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Live Search</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 700px;
            width: 100%;
        }
        h2 {
            color: #667eea;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .search-box {
            position: relative;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 18px 50px 18px 20px;
            font-size: 18px;
            border: 3px solid #ddd;
            border-radius: 50px;
            outline: none;
            transition: all 0.3s;
        }
        input[type="text"]:focus {
            border-color: #667eea;
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
        }
        .search-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            color: #667eea;
        }
        #livesearch {
            margin-top: 15px;
            border-radius: 15px;
            overflow: hidden;
        }
        .result-item {
            padding: 15px 20px;
            background: #f8f9fa;
            margin-bottom: 10px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            transition: all 0.3s;
        }
        .result-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .result-item a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
        }
        .result-item a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        .no-result {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
        .info-box {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            margin-top: 25px;
            text-align: center;
        }
        .info-box strong {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }
        .badge {
            display: inline-block;
            background: rgba(255,255,255,0.3);
            padding: 5px 15px;
            border-radius: 20px;
            margin: 5px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔍 Live Search - ค้นหาแบบเรียลไทม์</h2>
        
        <form>
            <div class="search-box">
                <input type="text" 
                       id="searchInput" 
                       placeholder="พิมพ์เพื่อค้นหา... (ลอง: php, html, css, javascript)" 
                       onkeyup="showResult(this.value)"
                       autocomplete="off">
                <span class="search-icon">🔍</span>
            </div>
        </form>
        
        <div id="livesearch"></div>
        
        <div class="info-box">
            <strong>💡 ฟีเจอร์เด่น</strong>
            <div>
                <span class="badge">⚡ ผลลัพธ์แบบทันที</span>
                <span class="badge">🎯 ยิ่งพิมพ์ยิ่งแม่นยำ</span>
                <span class="badge">🚀 ไม่ต้องกดปุ่ม</span>
            </div>
        </div>
    </div>

    <script>
        // ฟังก์ชันสำหรับแสดงผลการค้นหาแบบ Live
        function showResult(str) {
            const resultDiv = document.getElementById("livesearch");
            
            // ถ้าไม่มีข้อความ ให้ล้างผลลัพธ์
            if (str.length == 0) {
                resultDiv.innerHTML = "";
                resultDiv.style.border = "0px";
                return;
            }
            
            // จำลองฐานข้อมูลลิงก์ (ในการใช้งานจริง จะอ่านจากไฟล์ XML ผ่าน PHP)
            const links = [
                { title: "PHP Tutorial", url: "https://www.w3schools.com/php/" },
                { title: "PHP Forms", url: "https://www.w3schools.com/php/php_forms.asp" },
                { title: "PHP Arrays", url: "https://www.w3schools.com/php/php_arrays.asp" },
                { title: "HTML Tutorial", url: "https://www.w3schools.com/html/" },
                { title: "HTML Forms", url: "https://www.w3schools.com/html/html_forms.asp" },
                { title: "CSS Tutorial", url: "https://www.w3schools.com/css/" },
                { title: "JavaScript Tutorial", url: "https://www.w3schools.com/js/" },
                { title: "AJAX Introduction", url: "https://www.w3schools.com/js/js_ajax_intro.asp" },
                { title: "MySQL Tutorial", url: "https://www.w3schools.com/mysql/" },
                { title: "SQL Tutorial", url: "https://www.w3schools.com/sql/" }
            ];
            
            // ค้นหาลิงก์ที่ตรงกับคำค้นหา
            const query = str.toLowerCase();
            let results = links.filter(link => 
                link.title.toLowerCase().includes(query)
            );
            
            // แสดงผลลัพธ์
            if (results.length > 0) {
                let html = "";
                results.forEach(result => {
                    html += `
                        <div class="result-item">
                            <a href="${result.url}" target="_blank">
                                📄 ${result.title}
                            </a>
                        </div>
                    `;
                });
                resultDiv.innerHTML = html;
                resultDiv.style.border = "1px solid #ddd";
            } else {
                resultDiv.innerHTML = `
                    <div class="no-result">
                        ❌ ไม่พบผลลัพธ์สำหรับ "${str}"<br>
                        <small>ลองค้นหา: php, html, css, javascript, ajax, mysql</small>
                    </div>
                `;
                resultDiv.style.border = "1px solid #ddd";
            }
        }
        
        /* 
        ========================================
        📝 ไฟล์ XML ตัวอย่าง (links.xml):
        ========================================
        
        <?xml version="1.0" encoding="UTF-8"?>
        <pages>
            <link>
                <title>PHP Tutorial</title>
                <url>https://www.w3schools.com/php/</url>
            </link>
            <link>
                <title>PHP Forms</title>
                <url>https://www.w3schools.com/php/php_forms.asp</url>
            </link>
            <link>
                <title>HTML Tutorial</title>
                <url>https://www.w3schools.com/html/</url>
            </link>
            <link>
                <title>CSS Tutorial</title>
                <url>https://www.w3schools.com/css/</url>
            </link>
            <link>
                <title>JavaScript Tutorial</title>
                <url>https://www.w3schools.com/js/</url>
            </link>
        </pages>
        
        ========================================
        📝 โค้ด PHP ที่ควรอยู่ในไฟล์ livesearch.php:
        ========================================
        
        <?php
        // โหลดไฟล์ XML
        $xmlDoc = new DOMDocument();
        $xmlDoc->load("links.xml");
        
        // ดึง elements ทั้งหมด
        $x = $xmlDoc->getElementsByTagName('link');
        
        // รับคำค้นหาจาก URL
        $q = $_GET["q"];
        
        // ตัวแปรเก็บผลลัพธ์
        $hint = "";
        
        // ค้นหาในไฟล์ XML
        if (strlen($q) > 0) {
            for($i = 0; $i < ($x->length); $i++) {
                // ดึง title และ url
                $y = $x->item($i)->getElementsByTagName('title');
                $z = $x->item($i)->getElementsByTagName('url');
                
                if ($y->item(0)->nodeType == 1) {
                    // ค้นหาที่ตรงกับคำค้นหา (ไม่สนใจตัวพิมพ์เล็ก-ใหญ่)
                    if (stristr($y->item(0)->childNodes->item(0)->nodeValue, $q)) {
                        // เพิ่มผลลัพธ์
                        if ($hint == "") {
                            $hint = "<a href='" . 
                                    $z->item(0)->childNodes->item(0)->nodeValue . 
                                    "' target='_blank'>" . 
                                    $y->item(0)->childNodes->item(0)->nodeValue . 
                                    "</a>";
                        } else {
                            $hint = $hint . "<br /><a href='" . 
                                    $z->item(0)->childNodes->item(0)->nodeValue . 
                                    "' target='_blank'>" . 
                                    $y->item(0)->childNodes->item(0)->nodeValue . 
                                    "</a>";
                        }
                    }
                }
            }
        }
        
        // ถ้าไม่พบผลลัพธ์
        if ($hint == "") {
            $response = "no suggestion";
        } else {
            $response = $hint;
        }
        
        // ส่งผลลัพธ์กลับไป
        echo $response;
        ?>
        
        ========================================
        📌 การใช้งานจริงกับ AJAX:
        ========================================
        
        เปลี่ยนส่วน JavaScript ให้เป็น:
        
        function showResult(str) {
            if (str.length == 0) {
                document.getElementById("livesearch").innerHTML = "";
                document.getElementById("livesearch").style.border = "0px";
                return;
            }
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("livesearch").innerHTML = this.responseText;
                    document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                }
            };
            xmlhttp.open("GET", "livesearch.php?q=" + str, true);
            xmlhttp.send();
        }
        
        ========================================
        🎯 ข้อดีของ Live Search:
        ========================================
        
        ✅ แสดงผลทันทีขณะพิมพ์
        ✅ ผลลัพธ์แคบลงเมื่อพิมพ์เพิ่ม
        ✅ สามารถลบตัวอักษรเพื่อขยายผลลัพธ์
        ✅ ประสบการณ์ผู้ใช้ที่ดีกว่า
        ✅ ลดการโหลดหน้าเว็บ
        */
    </script>
</body>
</html>