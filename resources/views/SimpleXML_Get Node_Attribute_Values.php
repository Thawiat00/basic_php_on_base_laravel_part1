<?php
echo "<h2>ข้อ 2: PHP SimpleXML - Get Node/Attribute Values</h2>";
echo "<hr>";

// ============================================
// ส่วนที่ 1: สร้างไฟล์ books.xml
// ============================================
$booksXML = '<?xml version="1.0" encoding="utf-8"?>
<bookstore>
    <book category="COOKING">
        <title lang="en">Everyday Italian</title>
        <author>Giada De Laurentiis</author>
        <year>2005</year>
        <price>30.00</price>
    </book>
    <book category="CHILDREN">
        <title lang="en">Harry Potter</title>
        <author>J K. Rowling</author>
        <year>2005</year>
        <price>29.99</price>
    </book>
    <book category="WEB">
        <title lang="en-us">XQuery Kick Start</title>
        <author>James McGovern</author>
        <year>2003</year>
        <price>49.99</price>
    </book>
    <book category="WEB">
        <title lang="en-us">Learning XML</title>
        <author>Erik T. Ray</author>
        <year>2003</year>
        <price>39.95</price>
    </book>
</bookstore>';

file_put_contents("books.xml", $booksXML);

// ============================================
// ส่วนที่ 2: ดึงค่า Node แบบระบุตำแหน่ง
// ============================================
echo "<h3>2.1 ดึงค่า Node จากหนังสือเล่มที่ 1 และ 2</h3>";

$xml = simplexml_load_file("books.xml") or die("Error: Cannot create object");

echo "หนังสือเล่มที่ 1: " . $xml->book[0]->title . "<br>";
echo "หนังสือเล่มที่ 2: " . $xml->book[1]->title . "<br>";

echo "<hr>";

// ============================================
// ส่วนที่ 3: ใช้ Loop วนดึงข้อมูลทุกเล่ม
// ============================================
echo "<h3>2.2 วน Loop ดึงข้อมูลทุกหนังสือ</h3>";

$xml = simplexml_load_file("books.xml") or die("Error: Cannot create object");

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Title</th><th>Author</th><th>Year</th><th>Price</th></tr>";

foreach($xml->children() as $book) {
    echo "<tr>";
    echo "<td>" . $book->title . "</td>";
    echo "<td>" . $book->author . "</td>";
    echo "<td>" . $book->year . "</td>";
    echo "<td>$" . $book->price . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<hr>";

// ============================================
// ส่วนที่ 4: ดึงค่า Attribute
// ============================================
echo "<h3>2.3 ดึงค่า Attribute</h3>";

$xml = simplexml_load_file("books.xml") or die("Error: Cannot create object");

echo "<strong>Attribute ของหนังสือเล่มที่ 1:</strong><br>";
echo "Category: " . $xml->book[0]['category'] . "<br>";
echo "Title Language: " . $xml->book[0]->title['lang'] . "<br>";

echo "<br>";

echo "<strong>Attribute ของหนังสือเล่มที่ 2:</strong><br>";
echo "Category: " . $xml->book[1]['category'] . "<br>";
echo "Title Language: " . $xml->book[1]->title['lang'] . "<br>";

echo "<hr>";

// ============================================
// ส่วนที่ 5: Loop ดึง Attribute ทุกเล่ม
// ============================================
echo "<h3>2.4 Loop ดึง Attribute ทุกหนังสือ</h3>";

$xml = simplexml_load_file("books.xml") or die("Error: Cannot create object");

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Book #</th><th>Category</th><th>Title</th><th>Language</th></tr>";

$bookNumber = 1;
foreach($xml->children() as $book) {
    echo "<tr>";
    echo "<td>" . $bookNumber . "</td>";
    echo "<td>" . $book['category'] . "</td>";
    echo "<td>" . $book->title . "</td>";
    echo "<td>" . $book->title['lang'] . "</td>";
    echo "</tr>";
    $bookNumber++;
}

echo "</table>";

echo "<hr>";

// ============================================
// ส่วนที่ 6: ตัวอย่างการกรองข้อมูล
// ============================================
echo "<h3>2.5 ตัวอย่างการกรองข้อมูล</h3>";

$xml = simplexml_load_file("books.xml") or die("Error: Cannot create object");

echo "<strong>หนังสือหมวด WEB:</strong><br>";
foreach($xml->children() as $book) {
    if ($book['category'] == 'WEB') {
        echo "- " . $book->title . " (" . $book->price . " บาท)<br>";
    }
}

echo "<br>";

echo "<strong>หนังสือที่ราคามากกว่า 35 บาท:</strong><br>";
foreach($xml->children() as $book) {
    if ((float)$book->price > 35) {
        echo "- " . $book->title . " ราคา $" . $book->price . "<br>";
    }
}

echo "<hr>";

// ============================================
// สรุป
// ============================================
echo "<h3>สรุปการใช้งาน:</h3>";
echo "<ul>";
echo "<li><strong>\$xml->book[0]->title</strong> - เข้าถึง node แบบระบุ index</li>";
echo "<li><strong>\$xml->children()</strong> - ดึง child nodes ทั้งหมด</li>";
echo "<li><strong>\$book['category']</strong> - เข้าถึง attribute ด้วย [ ]</li>";
echo "<li><strong>\$book->title['lang']</strong> - เข้าถึง attribute ของ child node</li>";
echo "<li>ใช้ <strong>foreach</strong> วน loop เพื่อดึงข้อมูลทั้งหมด</li>";
echo "<li>สามารถใช้ <strong>if</strong> กรองข้อมูลได้</li>";
echo "</ul>";

echo "<p><em>SimpleXML ทำให้การเข้าถึงข้อมูล XML ง่ายมาก เหมือนใช้ array หรือ object ธรรมดา</em></p>";
?>