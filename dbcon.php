<?php
class DBController {
private $host = "localhost";
	private $user = "id15009118_cakenbakeofficial";
	private $password = "Ambujacement123-";
	private $database = "id15009118_website";
	private $connection;



	function __construct() {
		$conn = $this->connectDB();
		$this->connection = $conn;
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->connection,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->connection,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>