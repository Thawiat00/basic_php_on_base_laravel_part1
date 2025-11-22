<table>
  <tr>
    <td>Filter Name</td>
    <td>Filter ID</td>
  </tr>
  <?php
  foreach (filter_list() as $id =>$filter) {
    echo ' <tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
  }
  ?>

  <?php
   echo ' PHP filters are used to validate and sanitize external input. <br>

            echo The PHP filter extension has many of the functions needed for checking user input, and is designed to make data validation easier and quicker. <br>

            The filter_list() function can be used to list what the PHP filter extension offers: 
            
            <br>  <br>  ';

  echo 'The PHP Filter Extension
ส่วนขยาย Filter ของ PHP

PHP filters are used to validate and sanitize external input. <br>
Filter ใน PHP ใช้สำหรับ ตรวจสอบความถูกต้อง (validate) และ ทำความสะอาดข้อมูล (sanitize) ที่มาจากภายนอก เช่น ข้อมูลจากฟอร์ม, URL, cookie ฯลฯ <br>

The PHP filter extension has many of the functions needed for checking user input, and is designed to make data validation easier and quicker. <br>
ส่วนขยาย Filter ของ PHP มีฟังก์ชันมากมายที่ช่วยตรวจสอบข้อมูลที่ผู้ใช้ส่งเข้ามา <br>
ถูกออกแบบมาเพื่อให้การตรวจสอบข้อมูลทำได้ง่ายขึ้นและเร็วขึ้น <br>
 
The filter_list() function can be used to list what the PHP filter extension offers: <br>
ฟังก์ชัน filter_list() ใช้สำหรับ แสดงรายการ filter ทั้งหมด ที่ PHP มีให้ในระบบ <br>
(เช่น filter สำหรับตรวจ Format อีเมล, URL, ตัวเลข เป็นต้น) <br>
  <br>  <br>  ';


   echo ' Why Use PHP Filters? <br>
        Many web applications receive external input. External input/data can be: <br>

            User input from a form <br>
            Cookies
            Web services data <br>
        Server variables <br>
            Database query results <br>
            
            <br>  <br>  ';

   ?>




</table>



