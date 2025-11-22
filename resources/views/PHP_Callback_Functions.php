<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Callback Functions</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 25px 70px rgba(0,0,0,0.3);
        }
        h1 { 
            color: #fa709a; 
            text-align: center; 
            margin-bottom: 40px;
            font-size: 3em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        h2 { 
            color: #333; 
            margin: 30px 0 15px 0;
            border-bottom: 4px solid #fa709a;
            padding-bottom: 10px;
        }
        .section { 
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
            padding: 30px; 
            margin: 25px 0; 
            border-radius: 15px;
            border-left: 8px solid #fa709a;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
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
        }
        .code-output h4 {
            color: #fbbf24;
            margin-bottom: 10px;
        }
        .example-box {
            background: #e0f2fe;
            border-left: 5px solid #0284c7;
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
        }
        .highlight {
            background: #fef3c7;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: bold;
        }
        pre {
            background: #1a202c;
            color: #e2e8f0;
            padding: 20px;
            border-radius: 10px;
            overflow-x: auto;
            font-size: 14px;
            line-height: 1.6;
            border: 2px solid #4a5568;
        }
        code {
            background: #2d3748;
            color: #fbbf24;
            padding: 3px 8px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
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
        button {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: #333;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            margin: 10px 5px;
            transition: 0.3s;
        }
        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
        ul, ol {
            margin-left: 25px;
            line-height: 2;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🎯 PHP Callback Functions</h1>

    <!-- Section 1: Callback กับ array_map -->
    <div class="section">
        <h2>1. Callback Function กับ array_map()</h2>
        <div class="info-box">
            💡 <strong>array_map():</strong> ใช้ฟังก์ชันกับทุกๆ Element ใน Array
        </div>
        
        <div class="example-box">
            <h4>📝 ตัวอย่าง: หาความยาวของคำในแต่ละ Element</h4>
            <pre><?php
echo "// สร้าง Callback Function\n";
echo "function my_callback(\$item) {\n";
echo "    return strlen(\$item);\n";
echo "}\n\n";
echo "\$strings = ['apple', 'orange', 'banana', 'coconut'];\n";
echo "\$lengths = array_map('my_callback', \$strings);";
            ?></pre>
        </div>

        <?php
        // ตัวอย่างที่ 1: ใช้ Named Function
        function my_callback($item) {
            return strlen($item);
        }

        $strings = ["apple", "orange", "banana", "coconut"];
        $lengths = array_map("my_callback", $strings);
        
        echo "<div class='code-output'>";
        echo "<h4>🔢 ผลลัพธ์:</h4>";
        echo "<strong>Array เดิม:</strong> ";
        print_r($strings);
        echo "<br><strong>ความยาวของแต่ละคำ:</strong> ";
        print_r($lengths);
        echo "</div>";
        ?>
    </div>

    <!-- Section 2: Anonymous Function -->
    <div class="section">
        <h2>2. Anonymous Function (ฟังก์ชันไม่มีชื่อ)</h2>
        <div class="info-box">
            💡 <strong>Anonymous Function:</strong> ฟังก์ชันที่ไม่ต้องตั้งชื่อ เขียนแบบ Inline ได้เลย (PHP 7+)
        </div>
        
        <div class="example-box">
            <h4>📝 ตัวอย่าง: แปลงคำเป็นตัวพิมพ์ใหญ่</h4>
            <pre><?php
echo "\$strings = ['apple', 'orange', 'banana'];\n\n";
echo "\$uppercase = array_map(\n";
echo "    function(\$item) { \n";
echo "        return strtoupper(\$item); \n";
echo "    }, \n";
echo "    \$strings\n";
echo ");";
            ?></pre>
        </div>

        <?php
        $strings = ["apple", "orange", "banana"];
        $uppercase = array_map(
            function($item) { 
                return strtoupper($item); 
            }, 
            $strings
        );
        
        echo "<div class='code-output'>";
        echo "<h4>🔤 ผลลัพธ์:</h4>";
        echo "<strong>Array เดิม:</strong> ";
        print_r($strings);
        echo "<br><strong>แปลงเป็นตัวใหญ่:</strong> ";
        print_r($uppercase);
        echo "</div>";
        ?>
    </div>

    <!-- Section 3: Callback ใน User-Defined Function -->
    <div class="section">
        <h2>3. Callback ใน User-Defined Function</h2>
        <div class="info-box">
            💡 เราสามารถสร้างฟังก์ชันของเราเอง ที่รับ Callback Function เป็น Parameter ได้
        </div>
        
        <div class="example-box">
            <h4>📝 ตัวอย่าง: ระบบ Format ข้อความ</h4>
            <pre><?php
echo "function exclaim(\$str) {\n";
echo "    return \$str . '! ';\n";
echo "}\n\n";
echo "function ask(\$str) {\n";
echo "    return \$str . '? ';\n";
echo "}\n\n";
echo "function printFormatted(\$str, \$format) {\n";
echo "    echo \$format(\$str);\n";
echo "}\n\n";
echo "printFormatted('Hello world', 'exclaim');\n";
echo "printFormatted('How are you', 'ask');";
            ?></pre>
        </div>

        <?php
        // สร้างฟังก์ชัน Callback สำหรับ Format
        function exclaim($str) {
            return $str . "! ";
        }

        function ask($str) {
            return $str . "? ";
        }

        function shout($str) {
            return strtoupper($str) . "!!! ";
        }

        // ฟังก์ชันหลักที่รับ Callback
        function printFormatted($str, $format) {
            return $format($str);
        }

        echo "<div class='code-output'>";
        echo "<h4>💬 ผลลัพธ์:</h4>";
        echo "<strong>ใช้ exclaim:</strong> " . printFormatted("Hello world", "exclaim") . "<br>";
        echo "<strong>ใช้ ask:</strong> " . printFormatted("How are you", "ask") . "<br>";
        echo "<strong>ใช้ shout:</strong> " . printFormatted("Good morning", "shout") . "<br>";
        echo "</div>";
        ?>
    </div>

    <!-- Section 4: array_filter() กับ Callback -->
    <div class="section">
        <h2>4. array_filter() - กรองข้อมูลด้วย Callback</h2>
        <div class="info-box">
            💡 <strong>array_filter():</strong> กรอง Element ที่ผ่านเงื่อนไขเท่านั้น
        </div>
        
        <div class="example-box">
            <h4>📝 ตัวอย่าง: กรองเฉพาะเลขคู่</h4>
            <pre><?php
echo "\$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];\n\n";
echo "\$even_numbers = array_filter(\$numbers, function(\$num) {\n";
echo "    return \$num % 2 == 0;\n";
echo "});";
            ?></pre>
        </div>

        <?php
        $numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        
        $even_numbers = array_filter($numbers, function($num) {
            return $num % 2 == 0;
        });
        
        $odd_numbers = array_filter($numbers, function($num) {
            return $num % 2 != 0;
        });
        
        echo "<div class='code-output'>";
        echo "<h4>🔢 ผลลัพธ์:</h4>";
        echo "<strong>Array เดิม:</strong> ";
        print_r($numbers);
        echo "<br><strong>เลขคู่:</strong> ";
        print_r(array_values($even_numbers));
        echo "<br><strong>เลขคี่:</strong> ";
        print_r(array_values($odd_numbers));
        echo "</div>";
        ?>
    </div>

    <!-- Section 5: usort() - เรียงข้อมูลด้วย Callback -->
    <div class="section">
        <h2>5. usort() - เรียงลำดับแบบกำหนดเอง</h2>
        <div class="info-box">
            💡 <strong>usort():</strong> เรียงลำดับ Array ด้วยฟังก์ชันที่เรากำหนดเอง
        </div>
        
        <div class="example-box">
            <h4>📝 ตัวอย่าง: เรียงตามความยาวของคำ</h4>
            <pre><?php
echo "\$words = ['elephant', 'cat', 'dog', 'butterfly'];\n\n";
echo "usort(\$words, function(\$a, \$b) {\n";
echo "    return strlen(\$a) - strlen(\$b);\n";
echo "});";
            ?></pre>
        </div>

        <?php
        $words = ['elephant', 'cat', 'dog', 'butterfly', 'ant', 'crocodile'];
        $words_copy = $words;
        
        // เรียงตามความยาวคำ (สั้น -> ยาว)
        usort($words_copy, function($a, $b) {
            return strlen($a) - strlen($b);
        });
        
        echo "<div class='code-output'>";
        echo "<h4>📊 ผลลัพธ์:</h4>";
        echo "<strong>Array เดิม:</strong> ";
        print_r($words);
        echo "<br><strong>เรียงตามความยาว (สั้น->ยาว):</strong> ";
        print_r($words_copy);
        echo "</div>";
        ?>
    </div>

    <!-- Section 6: ตัวอย่างประยุกต์ - Calculator -->
    <div class="section">
        <h2>6. ตัวอย่างประยุกต์: Simple Calculator</h2>
        <div class="info-box">
            💡 สร้างเครื่องคิดเลขง่ายๆ โดยใช้ Callback Functions
        </div>
        
        <?php
        // สร้าง Callback Functions สำหรับการคำนวณ
        function add($a, $b) { return $a + $b; }
        function subtract($a, $b) { return $a - $b; }
        function multiply($a, $b) { return $a * $b; }
        function divide($a, $b) { 
            return $b != 0 ? $a / $b : "Error: Division by zero"; 
        }
        
        // ฟังก์ชัน Calculator ที่รับ Callback
        function calculator($num1, $num2, $operation) {
            return $operation($num1, $num2);
        }
        
        $num1 = 20;
        $num2 = 5;
        
        echo "<div class='code-output'>";
        echo "<h4>🧮 Calculator Results:</h4>";
        echo "<strong>Number 1:</strong> $num1<br>";
        echo "<strong>Number 2:</strong> $num2<br><br>";
        echo "<strong>Add:</strong> " . calculator($num1, $num2, "add") . "<br>";
        echo "<strong>Subtract:</strong> " . calculator($num1, $num2, "subtract") . "<br>";
        echo "<strong>Multiply:</strong> " . calculator($num1, $num2, "multiply") . "<br>";
        echo "<strong>Divide:</strong> " . calculator($num1, $num2, "divide") . "<br>";
        echo "</div>";
        ?>
    </div>

    <!-- คำอธิบาย -->
    <div class="section">
        <h3>📚 สรุป Callback Functions:</h3>
        <div style="background:white; padding:25px; border-radius:10px; margin:15px 0;">
            <h4 style="color:#fa709a;">🎯 ฟังก์ชันที่ใช้ Callback บ่อย:</h4>
            <ol style="line-height:2; font-size:1.1em;">
                <li><code>array_map()</code> - ใช้ฟังก์ชันกับทุก Element</li>
                <li><code>array_filter()</code> - กรอง Element ตามเงื่อนไข</li>
                <li><code>array_reduce()</code> - รวมค่าใน Array</li>
                <li><code>usort()</code> - เรียงลำดับแบบกำหนดเอง</li>
                <li><code>preg_replace_callback()</code> - Replace ด้วย Callback</li>
            </ol>

            <h4 style="color:#fa709a; margin-top:20px;">✨ ข้อดีของ Callback:</h4>
            <ul style="line-height:2; font-size:1.1em;">
                <li>✅ โค้ดสั้นลง อ่านง่ายขึ้น</li>
                <li>✅ ยืดหยุ่น ใช้ฟังก์ชันได้หลายแบบ</li>
                <li>✅ แยกส่วนการทำงานได้ชัดเจน</li>
                <li>✅ เหมาะกับ Functional Programming</li>
            </ul>

            <h4 style="color:#fa709a; margin-top:20px;">💡 เมื่อไหร่ควรใช้ Callback:</h4>
            <ul style="line-height:2; font-size:1.1em;">
                <li>🔹 ต้องการประมวลผล Array แบบเฉพาะ</li>
                <li>🔹 ต้องการเรียงลำดับข้อมูลแบบพิเศษ</li>
                <li>🔹 ต้องการสร้าง Flexible Functions</li>
                <li>🔹 Event Handlers, API Callbacks</li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>