<?php

class Db{

	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "tms";
	public $conn;
	public $error;

	function __construct(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
			$this->error = $this->conn->connect_error;
		}
	}

	function get_item_by_id($table_name, $item_id){
		$sql = "SELECT * FROM ".$table_name." WHERE id=".$item_id;
		$result = $this->conn->query($sql);
		$data = $result->fetch_assoc();
		return $data;
	}

	function get_all_items($table_name){
		$sql = "SELECT * FROM ".$table_name;
		$result = $this->conn->query($sql);
		$data = $result->fetch_all();
		return $data;
	}

	function post_item($table_name, $fields = [], $values = []){
		$sql = "INSERT INTO ".$table_name." (id";
		for ($i=0; $i < count($fields); $i++) { 
			$sql .= ",".$fields[$i];
		}
		$sql .= ") VALUES ('0'";
		for ($i=0; $i < count($values); $i++) { 
			$sql .= ",'".$values[$i]."'";
		}
		$sql .= ");";
		$result = $this->conn->query($sql);
		if ($result != TRUE){
			$this->error = $this->conn->error;
		}
		return $result;
	}

	function update_item_by_id($table_name, $id, $fields = [], $values = []){
		$sql = "UPDATE ".$table_name." SET ";
		for ($i=0; $i < count($fields); $i++) { 
			if ($i == 0){
				$sql .= $fields[$i]."='".$values[$i]."'";
			} else {
				$sql .= ", ".$fields[$i]."='".$values[$i]."'";
			}
		}
		$sql .= " WHERE id=$id;";
		$result = $this->conn->query($sql);
		if ($result != TRUE){
			$this->error = $this->conn->error;
		}
		return $sql;
	}

	function delete_item_by_id($table_name, $id){
		$sql = "DELETE FROM $table_name WHERE id=$id";
		$result = $this->conn->query($sql);
		if ($result != TRUE){
			$this->error = $this->conn->error;
		}
	}

}
