<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX MySQL Demo</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        }
        h2 {
            color: #1e3c72;
            text-align: center;
            margin-bottom: 30px;
        }
        select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            margin: 20px 0;
            cursor: pointer;
            background: white;
        }
        select:focus {
            border-color: #1e3c72;
            outline: none;
        }
        #txtHint {
            margin-top: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            min-height: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background: #1e3c72;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background: #f0f0f0;
        }
        .info-box {
            background: #d1ecf1;
            border-left: 4px solid #0c5460;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }
        .loading {
            text-align: center;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>👥 ระบบดึงข้อมูลบุคคลด้วย AJAX + MySQL</h2>
        
        <form>
            <label for="users"><b>เลือกบุคคล:</b></label>
            <select name="users" id="users" onchange="showUser(this.value)">
                <option value="">-- เลือกบุคคล --</option>
                <option value="1">Peter Griffin</option>
                <option value="2">Lois Griffin</option>
                <option value="3">Joseph Swanson</option>
                <option value="4">Glenn Quagmire</option>
            </select>
        </form>
        
        <div id="txtHint">
            <b class="loading">📋 ข้อมูลบุคคลจะแสดงที่นี่...</b>
        </div>
        
        <div class="info-box">
            <strong>💡 วิธีใช้:</strong> เลือกชื่อบุคคลจาก dropdown ข้างต้น ระบบจะดึงข้อมูลจากฐานข้อมูลและแสดงผลทันทีโดยไม่ต้องรีโหลดหน้า
        </div>
    </div>

    <script>
        // ฟังก์ชันสำหรับดึงข้อมูลผู้ใช้
        function showUser(str) {
            // ถ้าไม่ได้เลือกบุคคล ให้ล้างข้อมูล
            if (str == "") {
                document.getElementById("txtHint").innerHTML = 
                    "<b class='loading'>📋 ข้อมูลบุคคลจะแสดงที่นี่...</b>";
                return;
            }
            
            // แสดงข้อความ Loading
            document.getElementById("txtHint").innerHTML = 
                "<b class='loading'>⏳ กำลังโหลดข้อมูล...</b>";
            
            // จำลองข้อมูลจากฐานข้อมูล (ในการใช้งานจริง ควรดึงจาก PHP + MySQL)
            const database = {
                "1": {
                    FirstName: "Peter",
                    LastName: "Griffin",
                    Age: 41,
                    Hometown: "Quahog",
                    Job: "Brewery"
                },
                "2": {
                    FirstName: "Lois",
                    LastName: "Griffin",
                    Age: 40,
                    Hometown: "Newport",
                    Job: "Piano Teacher"
                },
                "3": {
                    FirstName: "Joseph",
                    LastName: "Swanson",
                    Age: 39,
                    Hometown: "Quahog",
                    Job: "Police Officer"
                },
                "4": {
                    FirstName: "Glenn",
                    LastName: "Quagmire",
                    Age: 41,
                    Hometown: "Quahog",
                    Job: "Pilot"
                }
            };
            
            // จำลองการหน่วงเวลา (เหมือนการติดต่อฐานข้อมูล)
            setTimeout(function() {
                const person = database[str];
                
                if (person) {
                    let html = `
                        <table>
                            <tr>
                                <th>ชื่อจริง</th>
                                <th>นามสกุล</th>
                                <th>อายุ</th>
                                <th>เมืองบ้านเกิด</th>
                                <th>อาชีพ</th>
                            </tr>
                            <tr>
                                <td>${person.FirstName}</td>
                                <td>${person.LastName}</td>
                                <td>${person.Age}</td>
                                <td>${person.Hometown}</td>
                                <td>${person.Job}</td>
                            </tr>
                        </table>
                    `;
                    document.getElementById("txtHint").innerHTML = html;
                } else {
                    document.getElementById("txtHint").innerHTML = 
                        "<b style='color: red;'>❌ ไม่พบข้อมูล</b>";
                }
            }, 500);
        }
        
        /* 
        ========================================
        📝 โค้ด PHP + MySQL ที่ควรอยู่ในไฟล์ family.php:
        ========================================
        
        <?php
        // รับค่า ID จาก URL และแปลงเป็นตัวเลข
        $q = intval($_GET['q']);
        
        // เชื่อมต่อฐานข้อมูล MySQL
        $con = mysqli_connect('localhost', 'username', 'password', 'database_name');
        
        // ตรวจสอบการเชื่อมต่อ
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        
        // เลือกฐานข้อมูล
        mysqli_select_db($con, "ajax_demo");
        
        // สร้าง SQL Query (ควรใช้ Prepared Statement เพื่อความปลอดภัย)
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $q);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        // แสดงผลเป็นตาราง HTML
        echo "<table>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Age</th>
            <th>Hometown</th>
            <th>Job</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Age']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Hometown']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Job']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // ปิดการเชื่อมต่อ
        mysqli_close($con);
        ?>
        
        ========================================
        📌 SQL สำหรับสร้างตารางฐานข้อมูล:
        ========================================
        
        CREATE TABLE user (
            id INT PRIMARY KEY AUTO_INCREMENT,
            FirstName VARCHAR(50),
            LastName VARCHAR(50),
            Age INT,
            Hometown VARCHAR(100),
            Job VARCHAR(100)
        );
        
        INSERT INTO user VALUES
        (1, 'Peter', 'Griffin', 41, 'Quahog', 'Brewery'),
        (2, 'Lois', 'Griffin', 40, 'Newport', 'Piano Teacher'),
        (3, 'Joseph', 'Swanson', 39, 'Quahog', 'Police Officer'),
        (4, 'Glenn', 'Quagmire', 41, 'Quahog', 'Pilot');
        
        ========================================
        📌 การใช้งานจริงกับ AJAX:
        ========================================
        
        เปลี่ยนส่วน JavaScript ให้เป็น:
        
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "family.php?q=" + str, true);
            xmlhttp.send();
        }
        */
    </script>
</body>
</html>