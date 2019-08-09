<?php

class mysqli_class{
	
	protected $servername;
	protected $username;
	protected $password;
	protected $dbName;
	protected $dbCharset;
	
	public $conn;
	
	public function __construct($server = null, $user = null, $pass = null, $db = null, $charset = 'utf8'){
		
		$this->servername = $server;
		$this->username = $user;
		$this->password = $pass;
		$this->dbName = $db;
		$this->dbCharset = $charset;
		
		$this->conn = mysqli_connect($server, $user, $pass, $db);
		
		if(!$this->conn) {
			die("Connection faild: ". mysqli_connect_error());
		}
		
		mysqli_set_charset($this->conn, $charset);
		
		return $this->conn;
		
	}
	
	public function select_one($table, $fields = '*', $where = null, $condition = null){
		
		if(is_array($fields)){
			$field = implode(", ", $fields);
		}else{
			$field = $fields;
		}

		$con = $this->where($where, $condition);
		
		
		$sql = "SELECT ". $field . " FROM ". $table ." ".$con." ".$this->limit(1);
		// echo $this->debugStrNewLine($sql);
		$result = mysqli_query($this->conn, $sql);
		$result = mysqli_fetch_assoc($result);
		if($result){
			return $result;
		}else{
			return false;
		}
		// return $result;
		// echo $this->debugArray($result);

		
	}
	
	public function where($where = null, $condition = null){
		if($where != null){
			if(is_array($where)){
				$result = 'WHERE ';
				foreach($where as $con){
					$result .= $con[0]." ".$con[2]." '".$con[1]."' ";
					if ($con !== end($where)){
						$result .= $condition." ";
					}
				}
				return $result;
			}
			$result = $con[0]." ".$con[2]." ".$con[1];
			return $result;
		}
	}
	
	public function multi_insert($sql){
		if(mysqli_multi_query($this->conn, $sql)){
			return true;
		}else{
			return "Error: " . $sql . "<br>".$mysqli_error($this->conn);
		}
	}
	
	public function insert_csv($table = null, $fields = [], $data = [], $startRow = 2){
		$field = implode(", ", $fields);
		$row = $startRow;
		$sql = '';
		// echo $this->debugArray($data);
		$result = [];
		foreach($data as $col){
			
			$countField = count($fields);
			$valueCondition = [];
			for($i = 0; $i<$countField; $i++){
				if($fields[$i] and $col[$i] == ''){
					$arr = [$fields[$i],$col[$i],'='];
					array_push($valueCondition,$arr);
				}
			}
			
			// echo $this->where($valueCondition, 'AND'); 
			
			$query = $this->select_one($table, $fields, $valueCondition, "AND");
			
			// echo $this->debugStrNewLine($query);
			
			// echo $this->debugArray($query);
			
			if(!$query){
				$valueInsert = "'".implode("', '", $col)."'";
				echo $this->debugArray($valueInsert);
			
				$sql .= "INSERT INTO ".$table;
				$sql .= " (";
				$sql .= $field;
				$sql .= ") ";
				$sql .= "VALUES ";
				$sql .= " (";
				$sql .= $valueInsert;
				$sql .= ");";
				// echo $this->debugStrNewLine($sql);
			}else{
				$result['duplicate'][] = $row;
			}

							
				$row++;
		}
		
		if($sql){
			$result['status'] = $this->multi_insert($sql);
		}else{
			$result['status'] = false;
		}
		
		return $result;
		
	}
	
	public function limit($limit = null, $offset = null){
		if($offset == null){
			return 'LIMIT '.$limit;
		}else{
			return 'LIMIT '.$limit.', '.$offset;
		}
	}
	
	public function debugStrNewLine($str){
		return $str."<br>";
	}
	
	public function debugArray($arr){
		$text = '<pre>'.print_r($arr,true).'</pre>';
		
		return $text;
	}
	

	
	public function __destruct(){
		
		mysqli_close($this->conn);
	}
	
}

?>