<?php

class Database {
	private $url, $username, $password, $dbname, $connection;
	
	function __construct($url, $username, $password, $dbname) {
		$this -> url = $url;
		$this -> username = $username;
		$this -> password = $password;
		$this -> dbname = $dbname;
		$this -> connection = mysqli_connect($url, $username, $password, $dbname);
		if (!$this -> connection) {
			echo "Unknown database error!";
			assert(false);
		}
	}
	
	function __destruct() {
		mysqli_close($this -> connection);
	}
	
	private function filter($str) {
		return mysqli_real_escape_string($this -> connection, $str);
	}
	
	function query($stmt, $args) {
		assert(is_array($args));
		// Format
		for ($i = 0; $i < count($args); $i++) { 
			if (is_string($args[$i])) $args[$i] = $this -> filter($args[$i]);
		} 
		$str = vsprintf($stmt, $args);
		// Query
		$result = mysqli_query($this -> connection, $str);
		if ($result === false) {
			echo "Unknown database error!";
			assert(false);
		}
		return $result;
	}
	
	static function countRows($result) {
		return mysqli_num_rows($result);
	}
	
	static function getRowArray($result) {
		return mysqli_fetch_array($result);
	}
	
	static function getRow($result) {
		return mysqli_fetch_row($result);
	}
}

function DefaultDatabase() {
	return new Database('localhost', 'newinf', 'nYfw4>=54$s&+cK', 'newinf');
}

?>
