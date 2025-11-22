<?php
// กำหนดไฟล์นี้เป็น upload_test.php
class FileUploadException extends Exception {}

function validateFileUpload($filename, $filesize, $filetype) {
    // ตรวจสอบขนาดไฟล์ (จำกัด 5MB)
    if($filesize > 5000000) {
        throw new FileUploadException("ไฟล์ใหญ่เกินไป! (สูงสุด 5MB)");
    }
    
    // ตรวจสอบประเภทไฟล์
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if(!in_array($filetype, $allowed_types)) {
        throw new FileUploadException("ประเภทไฟล์ไม่ถูกต้อง! (รองรับเฉพาะ JPG, PNG, GIF)");
    }
    
    // ตรวจสอบชื่อไฟล์
    if(empty($filename)) {
        throw new FileUploadException("ไม่มีชื่อไฟล์!");
    }
    
    return true;
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ทดสอบ File Upload Validation</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; background: #f5f5f5; }
        form { background: #fff; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select, button { width: 100%; padding: 12px; margin: 8px 0; border-radius: 6px; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; font-size: 16px; }
        button:hover { background-color: #45a049; }
        .success-box { background: #e0f8e0; border-left: 6px solid #4CAF50; padding: 10px; margin-bottom: 20px; }
        .error-box { background: #fde0e0; border-left: 6px solid #f44336; padding: 10px; margin-bottom: 20px; }
    </style>
</head>
<body>

<h2>ทดสอบ File Upload Validation</h2>

<?php
if(isset($_POST['test_upload'])) {
    $filename = $_POST['filename'];
    $filesize = $_POST['filesize'];
    $filetype = $_POST['filetype'];
    
    try {
        validateFileUpload($filename, $filesize, $filetype);
        echo "<div class='success-box'>";
        echo "✅ <strong>ไฟล์ผ่านการตรวจสอบ!</strong><br>";
        echo "ชื่อไฟล์: $filename<br>";
        echo "ขนาด: " . number_format($filesize/1000000, 2) . " MB<br>";
        echo "ประเภท: $filetype";
        echo "</div>";
    } catch(FileUploadException $e) {
        echo "<div class='error-box'>";
        echo "❌ <strong>Upload Failed:</strong> " . $e->getMessage();
        echo "</div>";
    }
}
?>

<form method="POST">
    <label><strong>📁 ชื่อไฟล์:</strong></label>
    <input type="text" name="filename" value="photo.jpg" required>
    
    <label><strong>📏 ขนาดไฟล์ (bytes):</strong></label>
    <input type="number" name="filesize" value="2000000" required>
    
    <label><strong>🎨 ประเภทไฟล์:</strong></label>
    <select name="filetype">
        <option value="image/jpeg">image/jpeg</option>
        <option value="image/png">image/png</option>
        <option value="image/gif">image/gif</option>
        <option value="application/pdf">application/pdf (จะ Error)</option>
        <option value="text/plain">text/plain (จะ Error)</option>
    </select>
    
    <button type="submit" name="test_upload">📤 ทดสอบ Upload</button>
</form>

</body>
</html>
