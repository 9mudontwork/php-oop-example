<?php
include_once 'manageFile.php';
$mFile = new manageFile();
include_once 'mysqlClass.php';
$db = new mysqli_class('localhost', 'root', '', 'work');
?>
<html>
	<head>
		<title>Save CSV</title>
	</head>
	<body>
	<?php
	// print_r($_FILES);
	// print_r($_POST);
	
		($_POST) ? : exit();
		
		if($mFile->checkUploadFile("fileCSV")){
			if($mFile->checkFileType("fileCSV", "csv")){
				$fileCSV = $mFile->moveUploadFile("fileCSV");
			}else{
				echo 'นามสกุลไฟล์ไม่ตรงกับที่ต้องการ';
				echo $mFile->moveBack();
				exit();
			}
		}else{
			echo 'ไม่มีการอัปโหลดไฟล์';
			echo $mFile->moveBack();
			exit();
		}

		$csvData = $mFile->readCsvFile('fileCSV.csv');
		$startRow = 2;
		
		foreach($csvData as $col){
			
			$name = ($mFile->checkName($col[0], $startRow));
			$surName = ($mFile->checkSurname($col[1], $startRow));
			$age = ($mFile->checkAge($col[2], $startRow));
			$sex = ($mFile->checkSex($col[3], $startRow));
			$bloodType = ($mFile->checkBloodType($col[4], $startRow));
			$startRow++;
		}

		$table = 'human';
		$fields = ['name', 'surname', 'age', 'sex', 'bloodtype', 'email', 'idcard', 'phone'];


		$result = $db->insert_csv($table, $fields, $csvData, 2);

		// echo $db->debugArray($result);
		
	?>
	</body>
</html>