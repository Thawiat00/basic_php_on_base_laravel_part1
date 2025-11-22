<?php


function divide($dividend, $divisor) {
    if($divisor == 0) {
        throw new Exception("Division by zero");
    }
    return $dividend / $divisor;
}

try {
    $result = divide(5, 0);
    echo "Result: $result";
} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>