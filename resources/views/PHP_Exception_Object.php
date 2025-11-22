


<?php


function divide($dividend, $divisor) {
    if($divisor == 0) {
        throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
}

try {
    throw new Exception("Error message", 500);
    
} catch(Exception $ex) {
    echo $ex->getMessage();   // Error message
    echo $ex->getCode();      // 500
    echo $ex->getFile();      // /path/to/file.php
    echo $ex->getLine();      // 42
}

?>