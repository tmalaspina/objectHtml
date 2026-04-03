<?php
class mysql {
	protected $servername,$username,$password, $dbname, $conn, $result;

	function __construct(/*$server, $user, $password, $db*/) {
		$this->servername= 'localhost';
		$this->username= 'root';
		$this->password= 'Tito1998$';
		$this->dbname= 'test';
	}

	function connect(){
		$this->conn= new mysqli($this->servername, $this->username, $this->password, $this->dbname);
	}

	function select($sql) {
		$this->result= $this->conn->query($sql);
	}

	function close() {
		$this->conn->close();
	}

	function getResult() {
		return $this->result;
	}
}
?>
