<?
class manageFile {
	
	public $pathFile;
	
	public function readTxtFile($type){
		$myFile = fopen($this->pathFile, $type);
		$content = fread($myFile, filesize($this->pathFile));
		fclose($myFile);
		
		return $content;
	}
	
	public function writeTxtFile($content, $type){
		$myFile = fopen($this->pathFile, $type);
		$content = fwrite($myFile, $content);
		fclose($myFile);
	}
	
	public function findPositionWord($text, $findText)
	{
		$content = "";
		$lastPosition = 0;
		while( ($foundPosition = strpos($text, $findText, $lastPosition)) !== false ) {
			$content .= $foundPosition." ";
			$lastPosition = $foundPosition + 1;
		}
		
		return $content;
	}
	
	public function checkUploadFile($file){
		return (is_uploaded_file($_FILES[$file]["tmp_name"]) ? true : false);
	}
	
	public function readCsvFile($file){
		$csvFile = file($file);
		$data = [];
		foreach ($csvFile as $line) {
			$data[] = str_getcsv($line);
		}
		array_shift($data);
		return $data;
	}
	
	public function checkFileType($fileName, $type){
		$arrName = explode(".", $_FILES[$fileName]["name"]);
		if( strcasecmp(end($arrName), $type) == 0 ){
			return true;
		}else{
			return false;
		}
	}
	
	public function moveUploadFile($fileName){
		move_uploaded_file($_FILES[$fileName]["tmp_name"],$_FILES[$fileName]["name"]);
		return $_FILES[$fileName]["name"];
		
	}
	
	public function moveBack(){
		return '<br><button type="button" onclick="window.history.back()">กลับ</button>';
	}
	
	public function checkName($value, $row){
		if(preg_match('/^[a-zA-Zก-๙-]+$/', $value)){
			return $value;
		}else{
			echo 'แถวที่ '.$row.' ชื่อ เป็นตัวอักษรเท่านั้น';
			echo '<br>';
		}
	}
	
	public function checkSurname($value, $row){
		if(preg_match('/^[a-zA-Zก-๙-]+$/', $value)){
			return $value;
		}else{
			echo 'แถวที่ '.$row.' นามสกุล เป็นตัวอักษรเท่านั้น';
			echo '<br>';
		}
	}
	
	public function checkAge($value, $row){
		if(is_numeric($value)){
			return $value;
		}else{
			echo 'แถวที่ '.$row.' อายุเป็นตัวเลขเท่านั้น';
			echo '<br>';
		}
	}
	
	public function checkSex($value, $row){
		if(preg_match('/^[(Men|Women)]+$/', $value)){
			return $value;
		}else{
			echo 'แถวที่ '.$row.' เพศต้องเป็น Men หรือ Women เท่านั้น';
			echo '<br>';
		}
	}
	
	public function checkBloodType($value, $row){
		if(preg_match('/^[(A|B|O|AB)]+$/', $value)){
			return $value;
		}else{
			echo 'แถวที่ '.$row.' กรุ๊ปเลือด ต้องเป็น A,B,O และ AB เท่านั้น';
			echo '<br>';
		}
	}
	
}

// $mFile = new manageFile();

// echo ($mFile->checkFileType("asdasd.csv", "csv") ? '1' : '0');

// $mFile->pathFile = "text.txt";

// $content = "awrtdyrjkrfghfasfhtr5y69o4e5aetghnt";
// $mFile->writeTxtFile($content, "w");

// echo $mFile->readTxtFile("r");

// echo "<br>";

// echo $mFile->findPositionWord($mFile->readTxtFile("r"), "6");

?>