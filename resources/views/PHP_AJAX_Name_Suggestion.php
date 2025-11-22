<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Name Suggestion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        h2 {
            color: #667eea;
            text-align: center;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="text"]:focus {
            border-color: #667eea;
            outline: none;
        }
        #txtHint {
            margin-top: 15px;
            padding: 15px;
            background: #f0f0f0;
            border-radius: 5px;
            min-height: 20px;
            color: #333;
            font-size: 16px;
        }
        .info {
            background: #e7f3ff;
            padding: 10px;
            border-left: 4px solid #667eea;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔍 ระบบค้นหาชื่อแบบ AJAX</h2>
        <p><b>เริ่มพิมพ์ชื่อในช่องด้านล่าง:</b></p>
        
        <form>
            <label for="fname">ชื่อ (First name):</label>
            <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)" 
                   placeholder="พิมพ์ชื่อ เช่น A, B, C...">
        </form>
        
        <p><b>คำแนะนำ:</b> <span id="txtHint">พิมพ์เพื่อดูคำแนะนำ...</span></p>
        
        <div class="info">
            <strong>💡 วิธีใช้:</strong> พิมพ์ตัวอักษรเพื่อค้นหาชื่อที่ขึ้นต้นด้วยตัวอักษรนั้น ระบบจะแสดงผลทันทีโดยไม่ต้องรีโหลดหน้าเว็บ
        </div>
    </div>

    <script>
        // ฟังก์ชัน showHint จะทำงานเมื่อมีการพิมพ์ในช่อง input
        function showHint(str) {
            // ถ้าไม่มีข้อความ ให้ล้างผลลัพธ์
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "พิมพ์เพื่อดูคำแนะนำ...";
                return;
            }
            
            // จำลองการทำงานของ PHP โดยใช้ JavaScript
            // (ในการใช้งานจริง ควรส่งไปยัง PHP ที่เซิร์ฟเวอร์)
            
            // Array ของชื่อ (เหมือนที่อยู่ใน PHP)
            const names = [
                "Anna", "Brittany", "Cinderella", "Diana", "Eva", "Fiona",
                "Gunda", "Hege", "Inga", "Johanna", "Kitty", "Linda",
                "Nina", "Ophelia", "Petunia", "Amanda", "Raquel", "Cindy",
                "Doris", "Eve", "Evita", "Sunniva", "Tove", "Unni",
                "Violet", "Liza", "Elizabeth", "Ellen", "Wenche", "Vicky"
            ];
            
            // ค้นหาชื่อที่ตรงกับคำค้นหา
            const q = str.toLowerCase();
            let hint = "";
            
            names.forEach(name => {
                // ตรวจสอบว่าชื่อขึ้นต้นด้วยตัวอักษรที่พิมพ์หรือไม่
                if (name.toLowerCase().startsWith(q)) {
                    if (hint === "") {
                        hint = name;
                    } else {
                        hint += ", " + name;
                    }
                }
            });
            
            // แสดงผลลัพธ์
            if (hint === "") {
                document.getElementById("txtHint").innerHTML = "❌ ไม่พบคำแนะนำ";
            } else {
                document.getElementById("txtHint").innerHTML = "✅ " + hint;
            }
        }
        
        /* 
        ========================================
        📝 โค้ด PHP ที่ควรอยู่ในไฟล์ gethint.php:
        ========================================
        
        <?php
        // Array ของชื่อ
        $a = array(
            "Anna", "Brittany", "Cinderella", "Diana", "Eva", "Fiona",
            "Gunda", "Hege", "Inga", "Johanna", "Kitty", "Linda",
            "Nina", "Ophelia", "Petunia", "Amanda", "Raquel", "Cindy",
            "Doris", "Eve", "Evita", "Sunniva", "Tove", "Unni",
            "Violet", "Liza", "Elizabeth", "Ellen", "Wenche", "Vicky"
        );
        
        // รับค่า q จาก URL
        $q = $_REQUEST["q"];
        $hint = "";
        
        // ค้นหาชื่อที่ตรงกับคำค้นหา
        if ($q !== "") {
            $q = strtolower($q);
            $len = strlen($q);
            foreach($a as $name) {
                if (stristr($q, substr($name, 0, $len))) {
                    if ($hint === "") {
                        $hint = $name;
                    } else {
                        $hint .= ", $name";
                    }
                }
            }
        }
        
        // ส่งผลลัพธ์กลับไป
        echo $hint === "" ? "no suggestion" : $hint;
        ?>
        
        ========================================
        📌 การใช้งานจริงกับ PHP:
        ========================================
        
        เปลี่ยนส่วน JavaScript ให้เป็น:
        
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "gethint.php?q=" + str, true);
            xmlhttp.send();
        }
        */
    </script>
</body>
</html>