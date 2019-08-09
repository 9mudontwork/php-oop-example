<?php
include 'testNamespace.php';
include 'testNamespace2.php';

use testNamespace as MyClass;
use testNamespace\Sub as MyClass2;

$class = new MyClass\testClass();
$class3 = new MyClass2\testClass();

echo $class->testFunction();
echo '<br>';
echo $class3->testFunction();
?>