<?php
error_reporting(-1);

define('DOCROOT', dirname(__FILE__));

class TestAutoload{
	
	public function __construct(){
		spl_autoload_register([$this, 'myAutoload']);
		echo 'con work<br>';
	}

	
	public function myAutoload($className){
		
		$docRoot = str_replace('\\','/',DOCROOT);
		
		include_once $docRoot.'/class.'.$className.'.php';
		
		echo 'auto work<br>';
		
	
	}
}


$test = new TestAutoload();

$file1 = new File1();
$file2 = new File2();

echo '<br>';

echo $file1->testFile();

echo '<br>';

echo $file2->testFile();

?>