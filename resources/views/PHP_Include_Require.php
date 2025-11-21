<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>PHP Include & Require Tutorial</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        
        .container { max-width: 900px; margin: 0 auto; padding: 20px; }
        
        /* Header Style */
        .header {
            background: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        .header h1 { color: #667eea; font-size: 2.5em; margin-bottom: 10px; }
        .header p { color: #666; font-size: 1.1em; }
        
        /* Navigation Menu Style */
        .menu {
            background: #2c3e50;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .menu a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 5px;
            display: inline-block;
            background: #34495e;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .menu a:hover {
            background: #3498db;
            transform: translateY(-2px);
        }
        
        /* Content Section */
        .content {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 20px;
        }
        .content h2 {
            color: #2c3e50;
            border-left: 5px solid #667eea;
            padding-left: 15px;
            margin-bottom: 20px;
        }
        
        /* Example Box */
        .example-box {
            background: #f8f9fa;
            border: 2px solid #667eea;
            border-radius: 8px;
            padding: 20px;
            margin: 15px 0;
        }
        .example-box h3 {
            color: #667eea;
            margin-bottom: 10px;
        }
        .example-box pre {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            margin: 10px 0;
        }
        
        /* Variables Display */
        .var-display {
            background: #e8f5e9;
            border-left: 4px solid #4caf50;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
        }
        
        /* Footer Style */
        .footer {
            background: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .footer p { color: #666; }
        
        /* Alert Boxes */
        .alert {
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            border-left: 5px solid;
        }
        .alert-success { background: #d4edda; border-color: #28a745; color: #155724; }
        .alert-error { background: #f8d7da; border-color: #dc3545; color: #721c24; }
        .alert-info { background: #d1ecf1; border-color: #17a2b8; color: #0c5460; }
        
        .badge {
            display: inline-block;
            padding: 5px 10px;
            background: #667eea;
            color: white;
            border-radius: 15px;
            font-size: 0.85em;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <?php
        // ============================================
        // ส่วนที่ 1: สร้างเนื้อหาสำหรับ Header
        // ============================================
        $headerContent = '
        <div class="header">
            <h1>🚀 PHP Include & Require</h1>
            <p>เรียนรู้การนำไฟล์เข้ามาใช้งานอย่างมีประสิทธิภาพ</p>
        </div>
        ';
        
        // แสดง Header (จำลองการ include)
        echo $headerContent;
        ?>
        
        <?php
        // ============================================
        // ส่วนที่ 2: สร้าง Navigation Menu
        // ============================================
        $menuContent = '
        <div class="menu">
            <a href="#home">🏠 หน้าแรก</a>
            <a href="#about">👥 เกี่ยวกับเรา</a>
            <a href="#services">⚙️ บริการ</a>
            <a href="#contact">📧 ติดต่อ</a>
            <a href="#blog">📝 บล็อก</a>
        </div>
        ';
        
        // แสดง Menu (จำลองการ include)
        echo $menuContent;
        ?>
        
        <!-- Content Section -->
        <div class="content">
            <h2>📚 ทำความเข้าใจ Include และ Require</h2>
            
            <!-- ตัวอย่างที่ 1: Include vs Require -->
            <div class="example-box">
                <h3>🔍 ตัวอย่างที่ 1: ความแตกต่างระหว่าง Include และ Require</h3>
                
                <div class="alert alert-info">
                    <strong>include</strong> - ถ้าไฟล์ไม่พบจะแสดง Warning แต่โปรแกรมทำงานต่อ
                </div>
                
                <pre>&lt;?php
include 'menu.php';
echo "โค้ดนี้ทำงานต่อถึงไฟล์ไม่เจอ";
?&gt;</pre>
                
                <div class="alert alert-error">
                    <strong>require</strong> - ถ้าไฟล์ไม่พบจะแสดง Fatal Error และหยุดทำงานทันที
                </div>
                
                <pre>&lt;?php
require 'config.php';
echo "ถ้าไฟล์ไม่เจอจะไม่รันบรรทัดนี้";
?&gt;</pre>
            </div>
            
            <!-- ตัวอย่างที่ 2: การใช้ Variables จากไฟล์อื่น -->
            <div class="example-box">
                <h3>🎨 ตัวอย่างที่ 2: การใช้ตัวแปรจากไฟล์ที่ Include</h3>
                
                <?php
                // สร้างตัวแปรจำลอง (เหมือนอยู่ในไฟล์ vars.php)
                $siteName = "My Awesome Website";
                $themeColor = "blue";
                $year = date("Y");
                $author = "John Developer";
                ?>
                
                <div class="var-display">
                    <strong>ตัวแปรที่ได้จากไฟล์ vars.php:</strong><br>
                    🌐 ชื่อเว็บไซต์: <span class="badge"><?php echo $siteName; ?></span><br>
                    🎨 สีธีม: <span class="badge"><?php echo $themeColor; ?></span><br>
                    📅 ปี: <span class="badge"><?php echo $year; ?></span><br>
                    👤 ผู้พัฒนา: <span class="badge"><?php echo $author; ?></span>
                </div>
                
                <pre>&lt;?php
// ไฟล์ vars.php
$siteName = "My Awesome Website";
$themeColor = "blue";
$year = date("Y");
$author = "John Developer";
?&gt;

&lt;!-- ไฟล์ index.php --&gt;
&lt;?php
include 'vars.php';
echo "ยินดีต้อนรับสู่ $siteName";
echo "สร้างโดย $author ปี $year";
?&gt;</pre>
            </div>
            
            <!-- ตัวอย่างที่ 3: การทดสอบไฟล์ไม่พบ -->
            <div class="example-box">
                <h3>⚠️ ตัวอย่างที่ 3: ทดสอบเมื่อไฟล์ไม่พบ</h3>
                
                <?php
                // ทดสอบ include ไฟล์ที่ไม่มี
                echo "<div class='alert alert-info'><strong>ทดสอบ include:</strong></div>";
                
                // ปิด error reporting ชั่วคราวเพื่อไม่ให้แสดง warning
                $oldErrorReporting = error_reporting(0);
                
                @include 'fileNotExists.php';
                echo "<div class='alert alert-success'>✅ โค้ดนี้ยังทำงานต่อได้หลัง include ไฟล์ที่ไม่มี</div>";
                
                // เปิด error reporting กลับ
                error_reporting($oldErrorReporting);
                ?>
                
                <pre>&lt;?php
// ตัวอย่างการใช้ include
include 'fileNotExists.php';
echo "บรรทัดนี้ยังทำงาน"; // ✅ ทำงาน

// ตัวอย่างการใช้ require
require 'fileNotExists.php';
echo "บรรทัดนี้ไม่ทำงาน"; // ❌ ไม่ทำงาน
?&gt;</pre>
            </div>
            
            <!-- ตัวอย่างที่ 4: โครงสร้างเว็บไซต์มาตรฐาน -->
            <div class="example-box">
                <h3>🏗️ ตัวอย่างที่ 4: โครงสร้างเว็บไซต์มาตรฐาน</h3>
                
                <div class="alert alert-info">
                    <strong>โครงสร้างไฟล์แนะนำ:</strong><br>
                    📁 includes/<br>
                    ├── 📄 header.php<br>
                    ├── 📄 menu.php<br>
                    ├── 📄 footer.php<br>
                    └── 📄 config.php
                </div>
                
                <pre>&lt;!-- ไฟล์ index.php --&gt;
&lt;?php require 'includes/config.php'; ?&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;
    &lt;?php include 'includes/header.php'; ?&gt;
    &lt;?php include 'includes/menu.php'; ?&gt;
    
    &lt;main&gt;
        &lt;h1&gt;เนื้อหาหลัก&lt;/h1&gt;
        &lt;p&gt;นี่คือเนื้อหาของหน้าเพจ&lt;/p&gt;
    &lt;/main&gt;
    
    &lt;?php include 'includes/footer.php'; ?&gt;
&lt;/body&gt;
&lt;/html&gt;</pre>
            </div>
            
            <!-- ตัวอย่างที่ 5: Include แบบมีเงื่อนไข -->
            <div class="example-box">
                <h3>🎯 ตัวอย่างที่ 5: Include แบบมีเงื่อนไข</h3>
                
                <?php
                $userRole = "admin"; // สมมติว่าผู้ใช้เป็น admin
                
                if ($userRole == "admin") {
                    echo "<div class='alert alert-success'>✅ คุณเป็น Admin - โหลดเมนูผู้ดูแลระบบ</div>";
                } else {
                    echo "<div class='alert alert-info'>ℹ️ คุณเป็นผู้ใช้ทั่วไป - โหลดเมนูปกติ</div>";
                }
                ?>
                
                <pre>&lt;?php
$userRole = "admin";

if ($userRole == "admin") {
    include 'menu_admin.php';
} else {
    include 'menu_user.php';
}

// หรือใช้ Switch
switch ($page) {
    case 'home':
        include 'home.php';
        break;
    case 'about':
        include 'about.php';
        break;
    default:
        include '404.php';
}
?&gt;</pre>
            </div>
            
            <!-- สรุปข้อแนะนำ -->
            <div class="alert alert-success">
                <h3>💡 ข้อแนะนำในการใช้งาน:</h3>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li>✅ ใช้ <strong>require</strong> สำหรับไฟล์สำคัญ (config, database)</li>
                    <li>✅ ใช้ <strong>include</strong> สำหรับไฟล์ที่ไม่จำเป็น (sidebar, ads)</li>
                    <li>✅ ใช้ <strong>require_once</strong> / <strong>include_once</strong> เพื่อป้องกันการโหลดซ้ำ</li>
                    <li>✅ จัดเก็บไฟล์ include ในโฟลเดอร์เดียวกัน</li>
                    <li>✅ ตั้งชื่อไฟล์ให้สื่อความหมาย (header.php, footer.php)</li>
                </ul>
            </div>
        </div>
        
        <?php
        // ============================================
        // ส่วนที่ 3: สร้าง Footer
        // ============================================
        $footerContent = '
        <div class="footer">
            <p>&copy; 2010-' . date("Y") . ' PHP Tutorial Website</p>
            <p style="color: #999; margin-top: 10px;">สร้างด้วย ❤️ และ PHP</p>
        </div>
        ';
        
        // แสดง Footer (จำลองการ include)
        echo $footerContent;
        ?>
        
    </div>
</body>
</html>