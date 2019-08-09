<?php

class Class1{
	
	public $value1;
	public $value2;
	
	public function __construct($x, $y){
		$this->value1 = $x;
		$this->value2 = $y;
	}
	
	public function function1(){
		return $this->value1;
	}
	
	public function function2(){
		
		return $this->value2;
	}
}

class Class2{
	
	public $xxx;
	public $yyy;
	
	public function __construct($x = null, $y = null){
		$this->xxx = new Class1(1,2);
		$this->yyy = new Class1(3,4);
	}
	
	public function function2(){
		return $this->yyy = new Class1(3,4);
	}
	
}


$result = new Class2();

echo $result->xxx->value1;
echo '<br>';
echo $result->yyy->value1;
echo '<br>';
echo $result->function2()->value2;
echo '<br>';
echo $result->function2()->function2();