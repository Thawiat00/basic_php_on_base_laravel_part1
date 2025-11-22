<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP and JSON Tutorial</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            color: #764ba2; 
            text-align: center; 
            margin-bottom: 40px;
            font-size: 3em;
        }
        h2 { 
            color: #333; 
            margin: 30px 0 15px 0;
            border-bottom: 4px solid #667eea;
            padding-bottom: 12px;
        }
        .section { 
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
            padding: 30px; 
            margin: 25px 0; 
            border-radius: 15px;
            border-left: 8px solid #667eea;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .json-output {
            background: #2d3748;
            color: #68d391;
            padding: 20px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            margin: 15px 0;
            overflow-x: auto;
            border: 3px solid #4a5568;
            font-size: 14px;
            line-height: 1.8;
        }
        .php-output {
            background: #fef3c7;
            color: #92400e;
            padding: 20px;
            border-radius: 10px;
            font-family: 'Courier New', monospace;
            margin: 15px 0;
            overflow-x: auto;
            border: 3px solid #f59e0b;
            font-size: 14px;
        }
        .info-box {
            background: #dbeafe;
            border: 3px solid #3b82f6;
            color: #1e40af;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
            font-size: 1.1em;
        }
        .example-box {
            background: #e0f2fe;
            border-left: 6px solid #0284c7;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        table th {
            background: #667eea;
            color: white;
            padding: 15px;
            text-align: left;
        }
        table td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        table tr:nth-child(even) {
            background: #f5f5f5;
        }
        .arrow {
            font-size: 2em;
            color: #667eea;
            text-align: center;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📦 PHP and JSON Tutorial</h1>

    <!-- Section 1: json_encode() - PHP to JSON -->
    <div class="section">
        <h2>1. json_encode() - แปลง PHP → JSON</h2>
        <div class="info-box">
            💡 <strong>json_encode():</strong> แปลงข้อมูล PHP (Array, Object) เป็น JSON String
        </div>

        <h3 style="margin-top:20px;">📋 ตัวอย่างที่ 1: Associative Array → JSON Object</h3>
        <?php
        $age = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
        $json_age = json_encode($age);
        ?>
        
        <div class="example-box">
            <strong>PHP Code:</strong>
            <pre>$age = array("Peter" => 35, "Ben" => 37, "Joe" => 43);
$json_age = json_encode($age);</pre>
        </div>

        <div class="php-output">
            <strong>🐘 PHP Associative Array:</strong>
            <pre><?php print_r($age); ?></pre>
        </div>

        <div class="arrow">⬇️</div>

        <div class="json-output">
            <strong>📦 JSON Output:</strong>
            <pre><?php echo $json_age; ?></pre>
        </div>

        <h3 style="margin-top:30px;">📋 ตัวอย่างที่ 2: Indexed Array → JSON Array</h3>
        <?php
        $cars = array("Volvo", "BMW", "Toyota", "Honda");
        $json_cars = json_encode($cars);
        ?>
        
        <div class="example-box">
            <strong>PHP Code:</strong>
            <pre>$cars = array("Volvo", "BMW", "Toyota", "Honda");
$json_cars = json_encode($cars);</pre>
        </div>

        <div class="php-output">
            <strong>🐘 PHP Indexed Array:</strong>
            <pre><?php print_r($cars); ?></pre>
        </div>

        <div class="arrow">⬇️</div>

        <div class="json-output">
            <strong>📦 JSON Output:</strong>
            <pre><?php echo $json_cars; ?></pre>
        </div>

        <h3 style="margin-top:30px;">📋 ตัวอย่างที่ 3: Complex Data Structure</h3>
        <?php
        $users = array(
            array("name" => "John", "age" => 30, "city" => "New York"),
            array("name" => "Sarah", "age" => 25, "city" => "London"),
            array("name" => "Mike", "age" => 35, "city" => "Tokyo")
        );
        $json_users = json_encode($users, JSON_PRETTY_PRINT);
        ?>
        
        <div class="php-output">
            <strong>🐘 PHP Multi-dimensional Array:</strong>
            <pre><?php print_r($users); ?></pre>
        </div>

        <div class="arrow">⬇️</div>

        <div class="json-output">
            <strong>📦 JSON Output (with JSON_PRETTY_PRINT):</strong>
            <pre><?php echo $json_users; ?></pre>
        </div>
    </div>

    <!-- Section 2: json_decode() - JSON to PHP -->
    <div class="section">
        <h2>2. json_decode() - แปลง JSON → PHP</h2>
        <div class="info-box">
            💡 <strong>json_decode():</strong> แปลง JSON String เป็น PHP Object หรือ Array
        </div>

        <h3 style="margin-top:20px;">📋 ตัวอย่างที่ 1: JSON → PHP Object</h3>
        <?php
        $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
        $obj = json_decode($jsonobj);
        ?>
        
        <div class="json-output">
            <strong>📦 JSON String:</strong>
            <pre><?php echo $jsonobj; ?></pre>
        </div>

        <div class="arrow">⬇️</div>

        <div class="php-output">
            <strong>🐘 PHP Object (default behavior):</strong>
            <pre><?php var_dump($obj); ?></pre>
        </div>

        <div class="example-box">
            <strong>เข้าถึงข้อมูล (Object Syntax):</strong>
            <pre>echo $obj->Peter;  // Output: <?php echo $obj->Peter; ?>

echo $obj->Ben;    // Output: <?php echo $obj->Ben; ?>

echo $obj->Joe;    // Output: <?php echo $obj->Joe; ?></pre>
        </div>

        <h3 style="margin-top:30px;">📋 ตัวอย่างที่ 2: JSON → PHP Associative Array</h3>
        <?php
        $arr = json_decode($jsonobj, true);
        ?>
        
        <div class="json-output">
            <strong>📦 JSON String:</strong>
            <pre><?php echo $jsonobj; ?></pre>
        </div>

        <div class="arrow">⬇️</div>

        <div class="php-output">
            <strong>🐘 PHP Associative Array (with true parameter):</strong>
            <pre><?php var_dump($arr); ?></pre>
        </div>

        <div class="example-box">
            <strong>เข้าถึงข้อมูล (Array Syntax):</strong>
            <pre>echo $arr["Peter"];  // Output: <?php echo $arr["Peter"]; ?>

echo $arr["Ben"];    // Output: <?php echo $arr["Ben"]; ?>

echo $arr["Joe"];    // Output: <?php echo $arr["Joe"]; ?></pre>
        </div>
    </div>

    <!-- Section 3: Loop Through JSON -->
    <div class="section">
        <h2>3. วน Loop ผ่านข้อมูล JSON</h2>
        
        <h3 style="margin-top:20px;">📋 Loop ผ่าน Object</h3>
        <?php
        $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
        $obj = json_decode($jsonobj);
        ?>
        
        <div class="example-box">
            <strong>PHP Code:</strong>
            <pre>$obj = json_decode($jsonobj);

foreach($obj as $key => $value) {
    echo "$key => $value";
}</pre>
        </div>

        <div class="php-output">
            <strong>🔄 Output:</strong><br>
            <?php
            foreach($obj as $key => $value) {
                echo "$key => $value<br>";
            }
            ?>
        </div>

        <h3 style="margin-top:30px;">📋 Loop ผ่าน Associative Array</h3>
        <?php
        $arr = json_decode($jsonobj, true);
        ?>
        
        <div class="example-box">
            <strong>PHP Code:</strong>
            <pre>$arr = json_decode($jsonobj, true);

foreach($arr as $key => $value) {
    echo "$key => $value";
}</pre>
        </div>

        <div class="php-output">
            <strong>🔄 Output:</strong><br>
            <?php
            foreach($arr as $key => $value) {
                echo "$key => $value<br>";
            }
            ?>
        </div>
    </div>

    <!-- Section 4: Real-World Example - API Response -->
    <div class="section">
        <h2>4. ตัวอย่างจริง: จำลอง API Response</h2>
        <div class="info-box">
            💡 ใช้กรณี: ดึงข้อมูลจาก API (เช่น Weather API, User API)
        </div>
        
        <?php
        // จำลอง API Response
        $api_response = array(
            "status" => "success",
            "code" => 200,
            "data" => array(
                "user_id" => 12345,
                "username" => "john_doe",
                "email" => "john@example.com",
                "profile" => array(
                    "first_name" => "John",
                    "last_name" => "Doe",
                    "age" => 30,
                    "country" => "USA"
                ),
                "settings" => array(
                    "notifications" => true,
                    "theme" => "dark"
                )
            ),
            "timestamp" => date("Y-m-d H:i:s")
        );
        
        $json_response = json_encode($api_response, JSON_PRETTY_PRINT);
        ?>
        
        <h3>📤 Step 1: PHP Array → JSON (ส่งจาก Server)</h3>
        <div class="php-output">
            <strong>🐘 PHP Array:</strong>
            <pre><?php print_r($api_response); ?></pre>
        </div>

        <div class="arrow">⬇️ json_encode()</div>

        <div class="json-output">
            <strong>📦 JSON Response:</strong>
            <pre><?php echo $json_response; ?></pre>
        </div>

        <h3 style="margin-top:30px;">📥 Step 2: JSON → PHP (รับที่ Client)</h3>
        <?php
        $received_data = json_decode($json_response, true);
        ?>
        
        <div class="json-output">
            <strong>📦 JSON Response (ที่รับมา):</strong>
            <pre><?php echo $json_response; ?></pre>
        </div>

        <div class="arrow">⬇️ json_decode()</div>

        <div class="php-output">
            <strong>🐘 PHP Array:</strong>
            <pre><?php print_r($received_data); ?></pre>
        </div>

        <h3 style="margin-top:30px;">🎯 Step 3: ใช้งานข้อมูล</h3>
        <div class="example-box">
            <strong>เข้าถึงข้อมูล Nested:</strong>
            <pre>echo $received_data['status'];                    // <?php echo $received_data['status']; ?>

echo $received_data['data']['username'];          // <?php echo $received_data['data']['username']; ?>

echo $received_data['data']['profile']['age'];    // <?php echo $received_data['data']['profile']['age']; ?>

echo $received_data['data']['settings']['theme']; // <?php echo $received_data['data']['settings']['theme']; ?></pre>
        </div>
    </div>

    <!-- Section 5: Comparison Table -->
    <div class="section">
        <h2>5. เปรียบเทียบ json_decode() Parameters</h2>
        <table>
            <thead>
                <tr>
                    <th>Parameter</th>
                    <th>Return Type</th>
                    <th>Access Method</th>
                    <th>Example</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>json_decode($json)</code></td>
                    <td>PHP Object</td>
                    <td><code>$obj->property</code></td>
                    <td><code>$obj->Peter</code></td>
                </tr>
                <tr>
                    <td><code>json_decode($json, true)</code></td>
                    <td>Associative Array</td>
                    <td><code>$arr['key']</code></td>
                    <td><code>$arr['Peter']</code></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- คำอธิบาย -->
    <div class="section">
        <h3>📚 สรุป PHP & JSON:</h3>
        <div style="background:white; padding:25px; border-radius:10px; margin:15px 0;">
            <h4 style="color:#667eea;">🔑 ฟังก์ชันหลัก:</h4>
            <table>
                <tr>
                    <th>Function</th>
                    <th>Description</th>
                    <th>Use Case</th>
                </tr>
                <tr>
                    <td><code>json_encode()</code></td>
                    <td>PHP → JSON</td>
                    <td>ส่งข้อมูลให้ API, AJAX</td>
                </tr>
                <tr>
                    <td><code>json_decode()</code></td>
                    <td>JSON → PHP Object</td>
                    <td>รับข้อมูลจาก API</td>
                </tr>
                <tr>
                    <td><code>json_decode($json, true)</code></td>
                    <td>JSON → PHP Array</td>
                    <td>ใช้งานข้อมูลแบบ Array</td>
                </tr>
            </table>

            <h4 style="color:#667eea; margin-top:20px;">💡 Use Cases ในโลกจริง:</h4>
            <ul style="line-height:2; font-size:1.1em; margin-left:25px;">
                <li>✅ <strong>REST API:</strong> รับส่งข้อมูลระหว่าง Server และ Client</li>
                <li>✅ <strong>AJAX:</strong> อัพเดทข้อมูลแบบ Realtime</li>
                <li>✅ <strong>Configuration Files:</strong> เก็บ Settings แบบ JSON</li>
                <li>✅ <strong>Data Exchange:</strong> แลกเปลี่ยนข้อมูลระหว่างภาษาต่างๆ</li>
                <li>✅ <strong>NoSQL Databases:</strong> MongoDB ใช้ JSON Format</li>
            </ul>

            <h4 style="color:#667eea; margin-top:20px;">⚠️ ข้อควรระวัง:</h4>
            <ul style="line-height:2; font-size:1.1em; margin-left:25px;">
                <li>⚠️ ตรวจสอบข้อมูลด้วย <code>json_last_error()</code></li>
                <li>⚠️ ใช้ <code>JSON_PRETTY_PRINT</code> สำหรับ Debug</li>
                <li>⚠️ JSON รองรับ UTF-8 เท่านั้น</li>
                <li>⚠️ ระวัง Circular Reference</li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>