<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Poll System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
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
            box-shadow: 0 25px 60px rgba(0,0,0,0.4);
            max-width: 600px;
            width: 100%;
        }
        h2 {
            color: #667eea;
            text-align: center;
            margin-bottom: 30px;
            font-size: 26px;
        }
        #poll {
            text-align: center;
        }
        .question {
            font-size: 20px;
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
        }
        .vote-options {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 30px;
        }
        .vote-btn {
            padding: 15px 40px;
            font-size: 18px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .vote-btn.yes {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .vote-btn.no {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        .vote-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        .vote-btn:active {
            transform: translateY(-1px);
        }
        .results {
            margin-top: 30px;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 15px;
        }
        .results h3 {
            color: #667eea;
            margin-bottom: 20px;
            text-align: center;
        }
        .result-row {
            margin-bottom: 20px;
        }
        .result-label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
            font-size: 16px;
        }
        .progress-bar {
            width: 100%;
            height: 40px;
            background: #e9ecef;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.1);
        }
        .progress-fill {
            height: 100%;
            transition: width 0.5s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }
        .progress-fill.yes {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        }
        .progress-fill.no {
            background: linear-gradient(90deg, #f093fb 0%, #f5576c 100%);
        }
        .info-box {
            background: linear-gradient(135deg, #ffeaa7 0%, #fdcb6e 100%);
            padding: 20px;
            border-radius: 15px;
            margin-top: 25px;
            text-align: center;
            color: #333;
        }
        .info-box strong {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }
        .emoji {
            font-size: 50px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="emoji">🗳️</div>
        <h2>ระบบโหวตแบบเรียลไทม์</h2>
        
        <div id="poll">
            <div class="question">
                คุณชอบ PHP และ AJAX หรือไม่?
            </div>
            
            <div class="vote-options">
                <button class="vote-btn yes" onclick="getVote(0)">
                    👍 ชอบ
                </button>
                <button class="vote-btn no" onclick="getVote(1)">
                    👎 ไม่ชอบ
                </button>
            </div>
        </div>
        
        <div class="info-box">
            <strong>💡 วิธีใช้</strong>
            กดปุ่มโหวตเพื่อแสดงความคิดเห็น ผลโหวตจะแสดงทันทีโดยไม่ต้องรีโหลดหน้า
        </div>
    </div>

    <script>
        // ตัวแปรเก็บคะแนนโหวต (ในการใช้งานจริง จะเก็บในไฟล์หรือฐานข้อมูล)
        let votes = {
            yes: 0,
            no: 0
        };
        
        // ตรวจสอบว่าเคยโหวตแล้วหรือไม่
        let hasVoted = false;
        
        // ฟังก์ชันสำหรับโหวต
        function getVote(voteValue) {
            // ป้องกันการโหวตซ้ำ
            if (hasVoted) {
                alert("⚠️ คุณโหวตไปแล้ว!");
                return;
            }
            
            // บันทึกคะแนนโหวต
            if (voteValue == 0) {
                votes.yes++;
            } else {
                votes.no++;
            }
            
            hasVoted = true;
            
            // แสดงผลลัพธ์
            displayResults();
        }
        
        // ฟังก์ชันแสดงผลลัพธ์
        function displayResults() {
            const total = votes.yes + votes.no;
            const yesPercent = total > 0 ? Math.round((votes.yes / total) * 100) : 0;
            const noPercent = total > 0 ? Math.round((votes.no / total) * 100) : 0;
            
            const resultsHtml = `
                <div class="results">
                    <h3>📊 ผลโหวต</h3>
                    
                    <div class="result-row">
                        <div class="result-label">👍 ชอบ (${votes.yes} โหวต)</div>
                        <div class="progress-bar">
                            <div class="progress-fill yes" style="width: ${yesPercent}%">
                                ${yesPercent}%
                            </div>
                        </div>
                    </div>
                    
                    <div class="result-row">
                        <div class="result-label">👎 ไม่ชอบ (${votes.no} โหวต)</div>
                        <div class="progress-bar">
                            <div class="progress-fill no" style="width: ${noPercent}%">
                                ${noPercent}%
                            </div>
                        </div>
                    </div>
                    
                    <div style="text-align: center; margin-top: 20px; color: #666;">
                        รวมทั้งหมด: ${total} โหวต
                    </div>
                </div>
            `;
            
            document.getElementById("poll").innerHTML += resultsHtml;
        }
        
        /* 
        ========================================
        📝 ไฟล์ข้อความ (poll_result.txt):
        ========================================
        
        เก็บข้อมูลในรูปแบบ: yes||no
        ตัวอย่าง: 15||8
        (15 โหวตชอบ, 8 โหวตไม่ชอบ)
        
        ========================================
        📝 โค้ด PHP ที่ควรอยู่ในไฟล์ poll_vote.php:
        ========================================
        
        <?php
        // รับค่าโหวตจาก URL
        $vote = $_REQUEST['vote'];
        
        // ชื่อไฟล์ที่เก็บผลโหวต
        $filename = "poll_result.txt";
        
        // อ่านข้อมูลจากไฟล์
        $content = file($filename);
        
        // แยกข้อมูล (format: yes||no)
        $array = explode("||", $content[0]);
        $yes = $array[0];
        $no = $array[1];
        
        // อัพเดทคะแนนโหวต
        if ($vote == 0) {
            $yes = $yes + 1;
        }
        if ($vote == 1) {
            $no = $no + 1;
        }
        
        // เขียนข้อมูลกลับลงไฟล์
        $insertvote = $yes . "||" . $no;
        $fp = fopen($filename, "w");
        fputs($fp, $insertvote);
        fclose($fp);
        
        // คำนวณเปอร์เซ็นต์
        $total = $yes + $no;
        $yesPercent = round(($yes / $total) * 100);
        $noPercent = round(($no / $total) * 100);
        ?>
        
        <h2>📊 ผลโหวต:</h2>
        <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="padding: 10px;">👍 ชอบ:</td>
            <td>
                <div style="background: linear-gradient(90deg, #667eea, #764ba2); 
                            width: <?php echo $yesPercent; ?>%; 
                            height: 30px; 
                            border-radius: 15px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                            font-weight: bold;">
                    <?php echo $yesPercent; ?>%
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding: 10px;">👎 ไม่ชอบ:</td>
            <td>
                <div style="background: linear-gradient(90deg, #f093fb, #f5576c); 
                            width: <?php echo $noPercent; ?>%; 
                            height: 30px; 
                            border-radius: 15px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                            font-weight: bold;">
                    <?php echo $noPercent; ?>%
                </div>
            </td>
        </tr>
        </table>
        
        ========================================
        📌 การใช้งานจริงกับ AJAX:
        ========================================
        
        เปลี่ยนส่วน JavaScript ให้เป็น:
        
        function getVote(int) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("poll").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "poll_vote.php?vote=" + int, true);
            xmlhttp.send();
        }
        
        ========================================
        🔐 ข้อควรระวัง:
        ========================================
        
        1. ตั้งค่า Permission ไฟล์ให้ถูกต้อง:
           chmod 666 poll_result.txt
        
        2. ป้องกันการโหวตซ้ำด้วย:
           - Cookie
           - Session
           - IP Address
           - Database logging
        
        3. Validate input เสมอ:
           $vote = intval($_REQUEST['vote']);
           if ($vote !== 0 && $vote !== 1) {
               die("Invalid vote");
           }
        
        4. ใช้ File Locking เพื่อป้องกัน Race Condition:
           $fp = fopen($filename, "w");
           if (flock($fp, LOCK_EX)) {
               fputs($fp, $insertvote);
               flock($fp, LOCK_UN);
           }
           fclose($fp);
        */
    </script>
</body>
</html>