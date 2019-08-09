<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	class TestClass
	{
		public $name = 'abcd efg';
		private $qaz = 'qqq www';
		protected $wsx = 'www sss';
		
		public function test()
		{
			echo 'test<br>'.$this->qaz;
		}
		public function test2()
		{
			return 'test2'.$this->test3();
		}
		private function test3()
		{
			return 'test3';
		}
		protected function test4()
		{
			return 'test4';
		}
		public function __construct()
		{
			echo 'start ';
		}
		public function __destruct()
		{
			echo ' end';
		}
	}
	class TestClass2 extends TestClass
	{
		public function show()
		{
			echo $this->test4();
		}
	}
	
	//$test = new TestClass;
	//echo $test->name;
	//$test->name = 'ssssss';
	//echo $test->name;
	
	#สรุป
	#$this ใช้ชี้ตำแหน่ง ตัวแปร หรือ ชื่อ class
	#public เรียกใช้ได้ ทั้งในและนอก class
	#private เรียกใช้ได้แค่ใน class เท่านั้น
	#protected เอาไว้เรียกใช้ ตัวแปร หรือ method ของ class แม่ ใน class ลูก เท่านั้น ใช้ข้างนอกไม่ได้
	#__construct เหมือน method ปกติ แต่พอประกาศใช้งาน class แล้ว จะทำงานอันดับแรกทันทีไม่สน method อื่นๆ
	#__destruct เหมือน method ปกติ แต่เมื่อเสร็จสิ้นการใช้งาน class ทั้งหมด จะทำงานอัตโนมัติทันที
	
	class Mom
	{
		protected static $name = 'name mom';
		
		public function __construct()
		{
			echo 'sdfsdf';
		}
	}
	class Child extends Mom
	{
		protected static $name = 'name child';
		public static $static_name = 'name static';
		public function testChild()
		{
			echo self::$name.' '.parent::$name;
		}
	}
	echo Child::$static_name;
	echo '<br>';
	$testChild = new Child();
	$testChild->testChild();
	
	#static เรียกใช่้โดยไม่ต้องประกาศ class ก็ได้ 
	#self,parent ใช้กับพวก static class หรือ กับ class แม่ลูก
	#self เรียกใช้ภายใน class ลูก
	#parent เรียกจาก class แม่มาใช้
?>