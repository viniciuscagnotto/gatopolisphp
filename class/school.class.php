<?php

include_once "banco.class.php";

class School {

	private $banco;
	
	public function __construct() {
		$this->banco = banco::getInstance();
	}
	
	public function Load($id = ""){	
		$where = "";
		if($id != "")
			$where .= " AND school_id = $id";
		
		$sql = "SELECT * FROM school WHERE 1=1".$where;
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadByPublicID($publicID){
		$sql = "SELECT * FROM school WHERE public_id = '$publicID'";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadBySyncCode($syncCode){
		$sql = "SELECT * FROM school WHERE sync_code = '$publicID'";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function Save($data){
		$sql = "INSERT INTO school (name, 
									coordinator_code, 
									public_id, 
									sync_code) VALUES ('".$data["name"]."',
													   '".$data["coordinator_code"]."',
													   '".$data["public_id"]."',
													   '".$data["sync_code"]."');";
		return $banco->executa($sql);
	}
	
	public function RemoveByID($id){
		$sql = "DELETE FROM school WHERE school_id = $id";
		return $banco->executa($sql);
	}
	
	public function RemoveByPublicID($publicID){
		$sql = "DELETE FROM school WHERE public_id = '$publicID'";
		return $banco->executa($sql);
	}
	
	public function RemoveBySyncCode($syncCode){
		$sql = "DELETE FROM school WHERE sync_code = '$syncCode'";
		return $banco->executa($sql);
	}
	
}

?>