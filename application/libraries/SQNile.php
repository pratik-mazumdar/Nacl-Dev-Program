<?php
require_once 'DataBase.php';

class SQNile extends DataBase{
	public $conn;
	function  __construct(){
			if (func_num_args() > 4)
				throw new Exception('SQNile Exception: Argument Error');
			switch (func_num_args()) {
				case 4:
					$this->password_database = func_get_arg(3);
				case 3:
					$this->username_database = func_get_arg(2);
				case 2:
					$this->servername = func_get_arg(1);
				case 1:
					$this->dbname = func_get_arg(0);
			}
			$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username_database, $this->password_database);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}
	function set_database_info(){
		$this->conn = null;
			if (func_num_args() > 4 || func_num_args() == 0)
				throw new Exception('SQNile Exception: Argument Error');
			switch (func_num_args()) {
				case 4:
					$this->password_database = func_get_arg(3);
				case 3:
					$this->username_database = func_get_arg(2);
				case 2:
					$this->servername = func_get_arg(1);
				case 1:
					$this->dbname = func_get_arg(0);
			}
			$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username_database, $this->password_database);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	}
	function fetch_all(){
			if (func_num_args() > 2 || func_num_args() == 0)
				throw new Exception('SQNile Exception: Argument Error');
			$query = $this->conn->prepare(func_get_arg(0));
			switch(func_num_args()){
				case 1:
					$query->execute();
					break;
				case 2:
					$query->execute(func_get_arg(1));
			}
			$result = $query->setFetchMode(PDO::FETCH_ASSOC);
			$result = $query->fetchAll();
			return $result;

	}
	function fetch(){
			if (func_num_args() > 2 || func_num_args() == 0)
				throw new Exception('SQNile Exception: Argument Error',1000);
			try{
				switch (func_num_args()) {
					case 1:
						$result = $this->fetch_all(func_get_arg(0));
						break;
					case 2:
						$result = $this->fetch_all(func_get_arg(0),func_get_arg(1));
				}
				if (isset($result[0])) {
					return $result[0];
				} else
					return $result;
			}catch(Exception $e){
				throw new Exception($e->getMessage(),1002);
			}

	}
	function query(){
			if (func_num_args() > 2 || func_num_args() == 0)
				throw new Exception('SQNile Exception: Argument Error',1000);
			try{
				$query = $this->conn->prepare(func_get_arg(0));
				switch(func_num_args()){
					case 1:
						$query->execute();
						break;
					case 2:
						$query->execute(func_get_arg(1));
				}
			}catch(Exception $e){
				throw new Exception($e->getMessage(),1001);
			}
	}
	function create_table($tableName,$columnInfo){
		try{
			$sql = "CREATE TABLE IF NOT EXISTS`".$tableName."` ( ".$columnInfo." )";
			$this->conn->exec($sql);
		}catch(PDOException $e){echo $e->getMessage();}
	}
	function is_unique($var,$table_name,$column_name){
		$result = $this->fetch("SELECT * from $table_name WHERE $column_name = ?", [$var]);
		return empty($result);
	}
	function __destruct(){
		$this->conn = null;
	}
}
