<?php
include_once 'manageFile.php';
$mFile = new manageFile();

include_once 'mysqlClass.php';
$db = new mysqli_class('localhost', 'root', '', 'work');

// $a = $db->select_one([	'id',
						// 'name',
						// 'surname',
						// 'age',
						// ],
						// 'human');
// print_r($a);

$csvData = $mFile->readCsvFile('fileCSV.csv');

$table = 'human';
$fields = ['name', 'surname', 'age', 'sex', 'bloodtype'];

$result = $db->insert_csv2($table, $fields, $csvData, 1);

echo $db->debugArray($result);

/* sample select */
// $fields = ['a','b'];
// $condition = 	[	['name','1','='],
					// ['surname','2','='],
				// ];
// $a = $db->get('a', $fields, $condition, 'AND');
?>