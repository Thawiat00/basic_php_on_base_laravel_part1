<?php
echo "<h2>ข้อ 1: PHP Casting (การแปลงชนิดข้อมูล)</h2>";

// ==========================================
// 1. Cast to String
// ==========================================
echo "<h3>1.1 แปลงเป็น String</h3>";
$a = 5;
$b = 5.34;
$c = "hello";
$d = true;
$e = NULL;

$a = (string) $a;
$b = (string) $b;
$c = (string) $c;
$d = (string) $d;
$e = (string) $e;

echo "Integer to String: ";
var_dump($a);
echo "<br>";
echo "Float to String: ";
var_dump($b);
echo "<br>";
echo "Boolean to String: ";
var_dump($d);
echo "<br>";
echo "NULL to String: ";
var_dump($e);
echo "<br><br>";

// ==========================================
// 2. Cast to Integer
// ==========================================
echo "<h3>1.2 แปลงเป็น Integer</h3>";
$num1 = 5;
$num2 = 5.34;
$num3 = "25 kilometers";
$num4 = "kilometers 25";
$num5 = "hello";
$num6 = true;
$num7 = NULL;

echo "Integer: " . (int)$num1 . "<br>";
echo "Float 5.34 → Integer: " . (int)$num2 . "<br>";
echo "'25 kilometers' → Integer: " . (int)$num3 . "<br>";
echo "'kilometers 25' → Integer: " . (int)$num4 . "<br>";
echo "'hello' → Integer: " . (int)$num5 . "<br>";
echo "Boolean true → Integer: " . (int)$num6 . "<br>";
echo "NULL → Integer: " . (int)$num7 . "<br><br>";

// ==========================================
// 3. Cast to Float
// ==========================================
echo "<h3>1.3 แปลงเป็น Float</h3>";
$f1 = 5;
$f2 = "25 kilometers";
$f3 = true;

echo "Integer 5 → Float: " . (float)$f1 . "<br>";
echo "'25 kilometers' → Float: " . (float)$f2 . "<br>";
echo "Boolean true → Float: " . (float)$f3 . "<br><br>";

// ==========================================
// 4. Cast to Boolean
// ==========================================
echo "<h3>1.4 แปลงเป็น Boolean</h3>";
$b1 = 5;       // true
$b2 = 0;       // false
$b3 = -1;      // true (แม้แต่ค่าลบก็เป็น true)
$b4 = "hello"; // true
$b5 = "";      // false
$b6 = NULL;    // false

echo "5 → Boolean: " . ((bool)$b1 ? "true" : "false") . "<br>";
echo "0 → Boolean: " . ((bool)$b2 ? "true" : "false") . "<br>";
echo "-1 → Boolean: " . ((bool)$b3 ? "true" : "false") . "<br>";
echo "'hello' → Boolean: " . ((bool)$b4 ? "true" : "false") . "<br>";
echo "'' (empty) → Boolean: " . ((bool)$b5 ? "true" : "false") . "<br>";
echo "NULL → Boolean: " . ((bool)$b6 ? "true" : "false") . "<br><br>";

// ==========================================
// 5. Cast to Array
// ==========================================
echo "<h3>1.5 แปลงเป็น Array</h3>";
$arr1 = 5;
$arr2 = "hello";
$arr3 = NULL;

$arr1 = (array) $arr1;
$arr2 = (array) $arr2;
$arr3 = (array) $arr3;

echo "Integer 5 → Array: ";
print_r($arr1);
echo "<br>";
echo "String 'hello' → Array: ";
print_r($arr2);
echo "<br>";
echo "NULL → Array: ";
print_r($arr3);
echo "<br><br>";

// ==========================================
// 6. Cast Object to Array
// ==========================================
echo "<h3>1.6 แปลง Object เป็น Array</h3>";
class Car {
    public $color;
    public $model;
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
}

$myCar = new Car("red", "Volvo");
$carArray = (array) $myCar;
echo "Object → Array: ";
print_r($carArray);
echo "<br><br>";

// ==========================================
// 7. Cast to Object
// ==========================================
echo "<h3>1.7 แปลงเป็น Object</h3>";
$obj1 = 5;
$obj2 = "hello";
$obj3 = array("Volvo", "BMW", "Toyota");
$obj4 = array("Peter"=>"35", "Ben"=>"37");

echo "Integer → Object: ";
var_dump((object)$obj1);
echo "<br>";
echo "String → Object: ";
var_dump((object)$obj2);
echo "<br>";
echo "Indexed Array → Object: ";
var_dump((object)$obj3);
echo "<br>";
echo "Associative Array → Object: ";
var_dump((object)$obj4);
echo "<br><br>";

// ==========================================
// 8. Cast to NULL
// ==========================================
echo "<h3>1.8 แปลงเป็น NULL</h3>";

function foo() 
{
    unset($GLOBALS['bar']);
}

$bar = "something";
foo();


echo "<hr>";
?>