<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตัวอย่าง PHP ข้อ 1-10 แบบเต็ม</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        h1 {
            color: #667eea;
            text-align: center;
            border-bottom: 3px solid #667eea;
            padding-bottom: 15px;
        }
        h2 {
            color: #764ba2;
            background: #f0f0f0;
            padding: 10px 15px;
            border-left: 5px solid #764ba2;
            margin-top: 30px;
        }
        .example {
            background: #f8f9fa;
            border: 2px solid #667eea;
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
        }
        .result {
            background: #e8f5e9;
            border-left: 4px solid #4caf50;
            padding: 10px;
            margin: 10px 0;
            font-weight: bold;
        }
        .code {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
        }
        .note {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 10px;
            margin: 10px 0;
        }
        .error {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 10px;
            margin: 10px 0;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📘 ตัวอย่าง PHP ข้อ 1-10 แบบครบถ้วน</h1>

        <!-- ข้อ 1: Learn PHP -->
        <h2>ข้อ 1: Learn PHP - เริ่มต้นกับ PHP</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 1.1: โค้ด PHP แรก</h3>
            <?php
            echo "<div class='result'>My first PHP script! 🚀</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 1.2: ผสม HTML กับ PHP</h3>
            <?php
            echo "<h4>สวัสดีจาก PHP!</h4>";
            echo "<p>PHP ทำงานบนเซิร์ฟเวอร์และส่งผลลัพธ์เป็น HTML</p>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 1.3: PHP สร้าง Dynamic Content</h3>
            <?php
            $current_time = date("H:i:s");
            $current_date = date("d/m/Y");
            echo "<div class='result'>";
            echo "เวลาปัจจุบัน: $current_time<br>";
            echo "วันที่: $current_date";
            echo "</div>";
            ?>
        </div>

        <!-- ข้อ 2: PHP Introduction -->
        <h2>ข้อ 2: PHP Introduction - แนะนำ PHP</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 2.1: PHP ทำอะไรได้บ้าง</h3>
            <?php
            echo "<div class='result'>";
            echo "✅ PHP สามารถ:<br>";
            echo "- สร้างเนื้อหาแบบไดนามิก<br>";
            echo "- จัดการฐานข้อมูล<br>";
            echo "- รับข้อมูลจากฟอร์ม<br>";
            echo "- สร้างและลบไฟล์<br>";
            echo "- เข้ารหัสข้อมูล<br>";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 2.2: ตรวจสอบเวอร์ชัน PHP</h3>
            <?php
            echo "<div class='result'>";
            echo "PHP Version: " . phpversion() . "<br>";
            echo "System: " . PHP_OS . "<br>";
            echo "Server: " . $_SERVER['SERVER_SOFTWARE'];
            echo "</div>";
            ?>
        </div>

        <!-- ข้อ 3: PHP Installation -->
        <h2>ข้อ 3: PHP Installation - ติดตั้ง PHP</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 3.1: ตรวจสอบการติดตั้ง PHP</h3>
            <?php
            if (function_exists('phpversion')) {
                echo "<div class='result'>✅ PHP ติดตั้งสำเร็จ!<br>";
                echo "เวอร์ชัน: " . phpversion() . "</div>";
            } else {
                echo "<div class='error'>❌ PHP ยังไม่ได้ติดตั้ง</div>";
            }
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 3.2: ข้อมูล PHP Configuration</h3>
            <?php
            echo "<div class='result'>";
            echo "Max Execution Time: " . ini_get('max_execution_time') . " วินาที<br>";
            echo "Memory Limit: " . ini_get('memory_limit') . "<br>";
            echo "Upload Max Filesize: " . ini_get('upload_max_filesize');
            echo "</div>";
            ?>
        </div>

        <!-- ข้อ 4: PHP Syntax -->
        <h2>ข้อ 4: PHP Syntax - โครงสร้างภาษา</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 4.1: PHP Tags และ Statement</h3>
            <?php
            echo "บรรทัดที่ 1<br>";
            echo "บรรทัดที่ 2<br>";
            echo "บรรทัดที่ 3<br>";
            echo "<div class='result'>✅ แต่ละบรรทัดจบด้วย semicolon (;)</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 4.2: Case Sensitivity - Keywords (ไม่สนใจตัวพิมพ์)</h3>
            <?php
            ECHO "ECHO ใช้ได้<br>";
            echo "echo ใช้ได้<br>";
            EcHo "EcHo ใช้ได้<br>";
            Echo "<div class='result'>✅ Keywords ไม่สนใจตัวพิมพ์เล็ก-ใหญ่</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 4.3: Case Sensitivity - Variables (สนใจตัวพิมพ์)</h3>
            <?php
            $color = "แดง";
            $COLOR = "น้ำเงิน";
            $Color = "เขียว";
            
            echo "<div class='result'>";
            echo "\$color = $color<br>";
            echo "\$COLOR = $COLOR<br>";
            echo "\$Color = $Color<br>";
            echo "✅ ตัวแปรสนใจตัวพิมพ์เล็ก-ใหญ่ (ถือว่าเป็นคนละตัว)";
            echo "</div>";
            ?>
        </div>

        <!-- ข้อ 5: PHP Comments -->
        <h2>ข้อ 5: PHP Comments - คอมเมนต์</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 5.1: Single-line Comments (//)</h3>
            <?php
            // นี่คือคอมเมนต์บรรทัดเดียว
            echo "บรรทัดนี้จะทำงาน<br>";
            
            // echo "บรรทัดนี้จะไม่ทำงาน เพราะเป็นคอมเมนต์";
            
            echo "บรรทัดนี้ทำงาน"; // คอมเมนต์ท้ายบรรทัด
            
            echo "<div class='result'>✅ ใช้ // สำหรับคอมเมนต์บรรทัดเดียว</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 5.2: Single-line Comments (#)</h3>
            <?php
            # นี่ก็เป็นคอมเมนต์บรรทัดเดียวเหมือนกัน
            echo "รูปแบบ # ก็ใช้ได้<br>";
            echo "<div class='result'>✅ ใช้ # ได้เหมือนกัน (แต่ใช้ // บ่อยกว่า)</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 5.3: ใช้คอมเมนต์ปิดโค้ดชั่วคราว</h3>
            <?php
            $price = 100;
            
            // $price = $price * 2; // ปิดการคูณ 2
            // $price = $price + 50; // ปิดการบวก 50
            
            echo "<div class='result'>ราคา: $price บาท (โค้ดบางส่วนถูกปิดด้วยคอมเมนต์)</div>";
            ?>
        </div>

        <!-- ข้อ 6: PHP Multiline Comments -->
        <h2>ข้อ 6: PHP Multiline Comments - คอมเมนต์หลายบรรทัด</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 6.1: Multi-line Comments พื้นฐาน</h3>
            <?php
            /*
            นี่คือคอมเมนต์หลายบรรทัด
            สามารถเขียนได้หลายบรรทัด
            จนกว่าจะปิดด้วย */
            
            
            echo "โค้ดนี้ทำงานปกติ<br>";
            echo "<div class='result'>✅ ใช้ /* */ สำหรับคอมเมนต์หลายบรรทัด</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 6.2: ปิดโค้ดหลายบรรทัด</h3>
            <?php
            $total = 0;
            
            /*
            $total = $total + 10;
            $total = $total + 20;
            $total = $total + 30;
            */
            
            $total = $total + 5; // เพิ่มแค่ 5
            
            echo "<div class='result'>ผลรวม: $total (โค้ด 3 บรรทัดถูกปิด เหลือแค่บวก 5)</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 6.3: Comments ในกลางโค้ด</h3>
            <?php
            $result = 10 + 5 /* + 20 */ + 3;
            echo "<div class='result'>ผลลัพธ์: $result (10 + 5 + 3 = 18, ส่วน +20 ถูกปิด)</div>";
            ?>
        </div>

        <!-- ข้อ 7: PHP Variables -->
        <h2>ข้อ 7: PHP Variables - ตัวแปร</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 7.1: การสร้างตัวแปรพื้นฐาน</h3>
            <?php
            $name = "สมชาย";
            $age = 25;
            $salary = 35000.50;
            $is_student = false;
            
            echo "<div class='result'>";
            echo "ชื่อ: $name<br>";
            echo "อายุ: $age ปี<br>";
            echo "เงินเดือน: $salary บาท<br>";
            echo "เป็นนักเรียน: " . ($is_student ? "ใช่" : "ไม่ใช่");
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 7.2: การตั้งชื่อตัวแปร (ถูก-ผิด)</h3>
            <?php
            // ✅ ถูกต้อง
            $_name = "ชื่อ 1";
            $name2 = "ชื่อ 2";
            $my_name = "ชื่อ 3";
            
            // ❌ ผิด (ใส่ในคอมเมนต์ เพราะจะ Error)
            // $2name = "ผิด"; // ขึ้นต้นด้วยตัวเลข
            // $my-name = "ผิด"; // มี -
            // $my name = "ผิด"; // มีช่องว่าง
            
            echo "<div class='result'>";
            echo "✅ ชื่อที่ถูก: $_name, $name2, $my_name";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 7.3: การแสดงผลตัวแปร</h3>
            <?php
            $site = "PHP Tutorial";
            
            // วิธีที่ 1: ใส่ตัวแปรใน double quotes
            echo "ยินดีต้อนรับสู่ $site<br>";
            
            // วิธีที่ 2: ใช้ . เชื่อม
            echo "ยินดีต้อนรับสู่ " . $site . "<br>";
            
            // วิธีที่ 3: แสดงการคำนวณ
            $a = 10;
            $b = 20;
            echo "<div class='result'>$a + $b = " . ($a + $b) . "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 7.4: var_dump() - เช็คชนิดข้อมูล</h3>
            <?php
            $int_var = 42;
            $float_var = 3.14;
            $string_var = "Hello";
            $bool_var = true;
            $array_var = array(1, 2, 3);
            
            echo "<div class='result'>";
            echo "Integer: "; var_dump($int_var); echo "<br>";
            echo "Float: "; var_dump($float_var); echo "<br>";
            echo "String: "; var_dump($string_var); echo "<br>";
            echo "Boolean: "; var_dump($bool_var); echo "<br>";
            echo "Array: "; var_dump($array_var);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 7.5: Variable Scope - Global และ Local</h3>
            <?php
            $global_var = "ฉันเป็น Global";
            
            function testScope() {
                $local_var = "ฉันเป็น Local";
                echo "ใน Function: $local_var<br>";
            }
            
            testScope();
            echo "<div class='result'>นอก Function: $global_var</div>";
            // echo $local_var; // จะ Error เพราะใช้นอก Function ไม่ได้
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 7.6: ใช้ global keyword</h3>
            <?php
            $x = 100;
            $y = 200;
            
            function calculate() {
                global $x, $y; // เรียกใช้ตัวแปร global
                $result = $x + $y;
                echo "<div class='result'>ผลรวม: $result</div>";
            }
            
            calculate();
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 7.7: Static Variable</h3>
            <?php
            function counter() {
                static $count = 0;
                $count++;
                echo "เรียกครั้งที่: $count<br>";
            }
            
            echo "<div class='result'>";
            counter(); // 1
            counter(); // 2
            counter(); // 3
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 7.8: กำหนดค่าหลายตัวแปรพร้อมกัน</h3>
            <?php
            $a = $b = $c = "PHP";
            echo "<div class='result'>\$a = $a, \$b = $b, \$c = $c</div>";
            ?>
        </div>

        <!-- ข้อ 8: PHP echo and print -->
        <h2>ข้อ 8: PHP echo and print - การแสดงผล</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 8.1: echo แบบต่างๆ</h3>
            <?php
            echo "วิธีที่ 1: echo ไม่มีวงเล็บ<br>";
            echo("วิธีที่ 2: echo มีวงเล็บ<br>");
            echo "<div class='result'>✅ ทั้งสองวิธีเหมือนกัน</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 8.2: echo หลายพารามิเตอร์</h3>
            <?php
            echo "PHP", " is", " awesome", "!<br>";
            echo "<div class='result'>✅ echo รับได้หลายค่า คั่นด้วย comma</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 8.3: Double quotes vs Single quotes</h3>
            <?php
            $name = "John";
            $age = 30;
            
            // Double quotes - แสดงค่าตัวแปร
            echo "Double quotes: $name อายุ $age ปี<br>";
            
            // Single quotes - ไม่แสดงค่าตัวแปร
            echo 'Single quotes: $name อายุ $age ปี<br>';
            
            // Single quotes + เชื่อมด้วย .
            echo '<div class="result">Single quotes + .: ' . $name . ' อายุ ' . $age . ' ปี</div>';
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 8.4: print พื้นฐาน</h3>
            <?php
            print "print ทำงานคล้าย echo<br>";
            print("print ก็ใช้วงเล็บได้<br>");
            
            $txt = "PHP Tutorial";
            print "<div class='result'>print: $txt</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 8.5: print มี return value</h3>
            <?php
            $result = print "print คืนค่า 1 เสมอ";
            echo "<div class='result'><br>Return value ของ print = $result</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 8.6: แสดง HTML ด้วย echo</h3>
            <?php
            echo "<h4 style='color: blue;'>หัวข้อสีน้ำเงิน</h4>";
            echo "<p style='background: yellow; padding: 10px;'>ย่อหน้าพื้นหลังเหลือง</p>";
            echo "<ul>";
            echo "  <li>รายการที่ 1</li>";
            echo "  <li>รายการที่ 2</li>";
            echo "  <li>รายการที่ 3</li>";
            echo "</ul>";
            ?>
        </div>

        <!-- ข้อ 9: PHP Data Types -->
        <h2>ข้อ 9: PHP Data Types - ชนิดข้อมูล</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 9.1: String (ข้อความ)</h3>
            <?php
            $str1 = "สวัสดี";
            $str2 = 'Hello';
            $str3 = "ตัวเลข 123 ก็เป็น String ได้";
            
            echo "<div class='result'>";
            var_dump($str1); echo "<br>";
            var_dump($str2); echo "<br>";
            var_dump($str3);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 9.2: Integer (จำนวนเต็ม)</h3>
            <?php
            $int1 = 42;           // บวก
            $int2 = -17;          // ลบ
            $int3 = 0;            // ศูนย์
            $int4 = 0xFF;         // Hexadecimal (255)
            $int5 = 0b1010;       // Binary (10)
            
            echo "<div class='result'>";
            echo "Decimal: "; var_dump($int1); echo "<br>";
            echo "Negative: "; var_dump($int2); echo "<br>";
            echo "Hexadecimal: "; var_dump($int4); echo "<br>";
            echo "Binary: "; var_dump($int5);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 9.3: Float (ทศนิยม)</h3>
            <?php
            $float1 = 3.14;
            $float2 = -10.5;
            $float3 = 2.5e3;      // 2.5 x 10^3 = 2500
            $float4 = 1.8E-3;     // 0.0018
            
            echo "<div class='result'>";
            var_dump($float1); echo "<br>";
            var_dump($float2); echo "<br>";
            var_dump($float3); echo "<br>";
            var_dump($float4);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 9.4: Boolean (จริง/เท็จ)</h3>
            <?php
            $bool1 = true;
            $bool2 = false;
            $bool3 = (10 > 5);    // true
            $bool4 = (5 > 10);    // false
            
            echo "<div class='result'>";
            echo "true: "; var_dump($bool1); echo "<br>";
            echo "false: "; var_dump($bool2); echo "<br>";
            echo "10 > 5: "; var_dump($bool3); echo "<br>";
            echo "5 > 10: "; var_dump($bool4);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 9.5: Array (อาร์เรย์)</h3>
            <?php
            $colors = array("แดง", "เขียว", "น้ำเงิน");
            $numbers = [1, 2, 3, 4, 5];  // รูปแบบสั้น
            $person = array(
                "name" => "สมชาย",
                "age" => 30,
                "city" => "กรุงเทพ"
            );
            
            echo "<div class='result'>";
            echo "สีต่างๆ: "; var_dump($colors); echo "<br>";
            echo "ตัวเลข: "; var_dump($numbers); echo "<br>";
            echo "ข้อมูลบุคคล: "; var_dump($person);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 9.6: Object (วัตถุ)</h3>
            <?php
            class Product {
                public $name;
                public $price;
                
                function __construct($name, $price) {
                    $this->name = $name;
                    $this->price = $price;
                }
                
                function getInfo() {
                    return $this->name . " ราคา " . $this->price . " บาท";
                }
            }
            
            $product1 = new Product("โน้ตบุ๊ก", 25000);
            $product2 = new Product("มือถือ", 15000);
            
            echo "<div class='result'>";
            echo $product1->getInfo() . "<br>";
            echo $product2->getInfo() . "<br>";
            var_dump($product1);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 9.7: NULL</h3>
            <?php
            $var1 = null;
            $var2 = "มีค่า";
            $var2 = null;  // เคลียร์ค่า
            
            echo "<div class='result'>";
            echo "var1: "; var_dump($var1); echo "<br>";
            echo "var2 (หลังเคลียร์): "; var_dump($var2);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 9.8: Type Casting (แปลงชนิดข้อมูล)</h3>
            <?php
            $num = 10;
            $str = (string) $num;    // แปลงเป็น string
            $float = (float) $num;   // แปลงเป็น float
            
            $text = "123";
            $int = (int) $text;      // แปลงเป็น int
            
            echo "<div class='result'>";
            echo "Original: "; var_dump($num); echo "<br>";
            echo "To String: "; var_dump($str); echo "<br>";
            echo "To Float: "; var_dump($float); echo "<br>";
            echo "Text '123': "; var_dump($text); echo "<br>";
            echo "To Integer: "; var_dump($int);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 9.9: ตรวจสอบชนิดข้อมูล</h3>
            <?php
            $test1 = "Hello";
            $test2 = 42;
            $test3 = 3.14;
            $test4 = true;
            $test5 = array(1, 2, 3);
            
            echo "<div class='result'>";
            echo "is_string: " . (is_string($test1) ? "✅" : "❌") . "<br>";
            echo "is_int: " . (is_int($test2) ? "✅" : "❌") . "<br>";
            echo "is_float: " . (is_float($test3) ? "✅" : "❌") . "<br>";
            echo "is_bool: " . (is_bool($test4) ? "✅" : "❌") . "<br>";
            echo "is_array: " . (is_array($test5) ? "✅" : "❌");
            echo "</div>";
            ?>
        </div>

        <!-- ข้อ 10: PHP Strings -->
        <h2>ข้อ 10: PHP Strings - การทำงานกับข้อความ</h2>
        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.1: strlen() - หาความยาวข้อความ</h3>
            <?php
            $text1 = "Hello World!";
            $text2 = "PHP is awesome";
            $text3 = "สวัสดีครับ";
            
            echo "<div class='result'>";
            echo "'$text1' ความยาว = " . strlen($text1) . " ตัวอักษร<br>";
            echo "'$text2' ความยาว = " . strlen($text2) . " ตัวอักษร<br>";
            echo "'$text3' ความยาว = " . strlen($text3) . " bytes";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.2: str_word_count() - นับจำนวนคำ</h3>
            <?php
            $sentence1 = "Hello World";
            $sentence2 = "PHP is a server-side scripting language";
            
            echo "<div class='result'>";
            echo "'$sentence1' มี " . str_word_count($sentence1) . " คำ<br>";
            echo "'$sentence2' มี " . str_word_count($sentence2) . " คำ";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.3: strpos() - ค้นหาตำแหน่งข้อความ</h3>
            <?php
            $text = "Hello World! Welcome to PHP World!";
            
            $pos1 = strpos($text, "World");
            $pos2 = strpos($text, "PHP");
            $pos3 = strpos($text, "xyz");  // ไม่พบ
            
            echo "<div class='result'>";
            echo "ข้อความ: '$text'<br>";
            echo "ตำแหน่งของ 'World': " . $pos1 . "<br>";
            echo "ตำแหน่งของ 'PHP': " . $pos2 . "<br>";
            echo "ตำแหน่งของ 'xyz': " . ($pos3 === false ? "ไม่พบ" : $pos3);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.4: strtoupper() และ strtolower()</h3>
            <?php
            $text = "Hello World";
            
            echo "<div class='result'>";
            echo "ข้อความเดิม: $text<br>";
            echo "Uppercase: " . strtoupper($text) . "<br>";
            echo "Lowercase: " . strtolower($text);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.5: str_replace() - แทนที่ข้อความ</h3>
            <?php
            $text = "I love Java!";
            $new_text = str_replace("Java", "PHP", $text);
            
            echo "<div class='result'>";
            echo "ข้อความเดิม: $text<br>";
            echo "ข้อความใหม่: $new_text";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.6: substr() - ตัดข้อความ</h3>
            <?php
            $text = "Hello World!";
            
            $part1 = substr($text, 0, 5);   // เริ่มที่ 0 ยาว 5
            $part2 = substr($text, 6);       // เริ่มที่ 6 ถึงสุดท้าย
            $part3 = substr($text, -6);      // 6 ตัวสุดท้าย
            
            echo "<div class='result'>";
            echo "ข้อความเดิม: '$text'<br>";
            echo "substr(0, 5): '$part1'<br>";
            echo "substr(6): '$part2'<br>";
            echo "substr(-6): '$part3'";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.7: trim() - ตัดช่องว่าง</h3>
            <?php
            $text1 = "   Hello World   ";
            $text2 = trim($text1);
            
            echo "<div class='result'>";
            echo "ก่อน trim: '" . $text1 . "' (ความยาว " . strlen($text1) . ")<br>";
            echo "หลัง trim: '" . $text2 . "' (ความยาว " . strlen($text2) . ")";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.8: explode() - แยกข้อความเป็น Array</h3>
            <?php
            $fruits = "แอปเปิล,กล้วย,ส้ม,มะม่วง";
            $arr = explode(",", $fruits);
            
            echo "<div class='result'>";
            echo "ข้อความเดิม: $fruits<br>";
            echo "แยกเป็น Array:<br>";
            foreach ($arr as $index => $fruit) {
                echo "[$index] = $fruit<br>";
            }
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.9: implode() - รวม Array เป็นข้อความ</h3>
            <?php
            $colors = array("แดง", "เขียว", "น้ำเงิน", "เหลือง");
            $text = implode(", ", $colors);
            
            echo "<div class='result'>";
            echo "Array: ";
            print_r($colors);
            echo "<br>รวมเป็นข้อความ: $text";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.10: ucfirst() และ ucwords()</h3>
            <?php
            $text1 = "hello world";
            $text2 = "welcome to php tutorial";
            
            echo "<div class='result'>";
            echo "ข้อความเดิม: '$text1'<br>";
            echo "ucfirst(): '" . ucfirst($text1) . "' (ตัวแรกพิมพ์ใหญ่)<br><br>";
            
            echo "ข้อความเดิม: '$text2'<br>";
            echo "ucwords(): '" . ucwords($text2) . "' (ทุกคำขึ้นต้นพิมพ์ใหญ่)";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.11: String Concatenation (เชื่อมข้อความ)</h3>
            <?php
            $first_name = "สมชาย";
            $last_name = "ใจดี";
            
            // วิธีที่ 1: ใช้ .
            $full_name1 = $first_name . " " . $last_name;
            
            // วิธีที่ 2: ใช้ .=
            $full_name2 = $first_name;
            $full_name2 .= " ";
            $full_name2 .= $last_name;
            
            // วิธีที่ 3: ใส่ใน double quotes
            $full_name3 = "$first_name $last_name";
            
            echo "<div class='result'>";
            echo "วิธีที่ 1 (. operator): $full_name1<br>";
            echo "วิธีที่ 2 (.= operator): $full_name2<br>";
            echo "วิธีที่ 3 (double quotes): $full_name3";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.12: str_repeat() - ทำซ้ำข้อความ</h3>
            <?php
            $pattern = "=";
            $star = "*";
            
            echo "<div class='result'>";
            echo str_repeat($pattern, 50) . "<br>";
            echo str_repeat($star, 10) . " PHP " . str_repeat($star, 10) . "<br>";
            echo str_repeat($pattern, 50);
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.13: strcmp() - เปรียบเทียบข้อความ</h3>
            <?php
            $str1 = "Hello";
            $str2 = "Hello";
            $str3 = "World";
            
            echo "<div class='result'>";
            echo "strcmp('$str1', '$str2') = " . strcmp($str1, $str2) . " (เท่ากัน)<br>";
            echo "strcmp('$str1', '$str3') = " . strcmp($str1, $str3) . " (ไม่เท่ากัน)<br>";
            echo "strcmp('$str3', '$str1') = " . strcmp($str3, $str1) . " (ไม่เท่ากัน)";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.14: strrev() - กลับข้อความ</h3>
            <?php
            $text = "Hello World";
            $reversed = strrev($text);
            
            echo "<div class='result'>";
            echo "ข้อความเดิม: $text<br>";
            echo "ข้อความกลับ: $reversed";
            echo "</div>";
            ?>
        </div>

        <div class="example">
            <h3>🎯 ตัวอย่างที่ 10.15: ตัวอย่างรวม - ประยุกต์ใช้ String Functions</h3>
            <?php
            $email = "  USER@EXAMPLE.COM  ";
            
            // ทำความสะอาดและปรับแต่ง email
            $clean_email = trim($email);                    // ตัดช่องว่าง
            $clean_email = strtolower($clean_email);        // เป็นตัวเล็กทั้งหมด
            
            // แยก username และ domain
            $parts = explode("@", $clean_email);
            $username = $parts[0];
            $domain = $parts[1];
            
            // ตรวจสอบความยาว
            $email_length = strlen($clean_email);
            
            // ค้นหา @
            $at_position = strpos($clean_email, "@");
            
            echo "<div class='result'>";
            echo "<strong>📧 การจัดการ Email</strong><br><br>";
            echo "Email เดิม: '$email'<br>";
            echo "Email สะอาด: '$clean_email'<br>";
            echo "Username: $username<br>";
            echo "Domain: $domain<br>";
            echo "ความยาวทั้งหมด: $email_length ตัวอักษร<br>";
            echo "ตำแหน่งของ @: $at_position<br>";
            echo "เป็น .com: " . (str_ends_with($clean_email, ".com") ? "✅ ใช่" : "❌ ไม่ใช่");
            echo "</div>";
            ?>
        </div>

        <!-- สรุปท้าย -->
        <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 10px; margin-top: 30px;">
            <h2 style="color: white; border: none;">🎉 สรุป PHP Tutorial ข้อ 1-10</h2>
            <ul style="line-height: 1.8;">
                <li>✅ <strong>ข้อ 1:</strong> เรียนรู้ว่า PHP คืออะไร และทำอะไรได้บ้าง</li>
                <li>✅ <strong>ข้อ 2:</strong> ทำความเข้าใจพื้นฐานและความสามารถของ PHP</li>
                <li>✅ <strong>ข้อ 3:</strong> วิธีติดตั้งและตรวจสอบ PHP</li>
                <li>✅ <strong>ข้อ 4:</strong> โครงสร้างพื้นฐานและ Case Sensitivity</li>
                <li>✅ <strong>ข้อ 5:</strong> การใส่คอมเมนต์บรรทัดเดียว</li>
                <li>✅ <strong>ข้อ 6:</strong> การใส่คอมเมนต์หลายบรรทัด</li>
                <li>✅ <strong>ข้อ 7:</strong> ตัวแปร, ชนิดข้อมูล, และ Variable Scope</li>
                <li>✅ <strong>ข้อ 8:</strong> echo และ print สำหรับแสดงผล</li>
                <li>✅ <strong>ข้อ 9:</strong> ชนิดข้อมูลทั้งหมดใน PHP</li>
                <li>✅ <strong>ข้อ 10:</strong> String Functions สำหรับจัดการข้อความ</li>
            </ul>
            <p style="margin-top: 20px; font-size: 18px;">
                🚀 ตอนนี้คุณมีพื้นฐาน PHP แล้ว! พร้อมเรียนรู้เรื่องอื่นๆ ต่อไปได้เลย
            </p>
        </div>

        <div class="note" style="margin-top: 20px;">
            <strong>💡 หมายเหตุ:</strong> ตัวอย่างทั้งหมดนี้แสดงผลจริงด้วย PHP<br>
            คุณสามารถนำไปประยุกต์ใช้ในโปรเจกต์ของคุณได้เลย!
        </div>

    </div>
</body>
</html>