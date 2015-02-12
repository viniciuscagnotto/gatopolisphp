<?php

include_once "banco.class.php";

class School {

	private $banco;
	
	public function __construct(banco $banco) {
		$this->banco = $banco;
	}
	
	public function Load($id = ""){	
		$where = "";
		if($id != "")
			$where .= " AND school_id = $id";
		
		$sql = "SELECT * FROM school WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadByPublicID($publicID){
		$sql = "SELECT * FROM school WHERE public_id = '$publicID'";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadBySyncCode($syncCode){
		$sql = "SELECT * FROM school WHERE sync_code = '$syncCode'";
		$result = $this->banco->executa($sql);
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
		return $this->banco->executa($sql);
	}
	
	public function RemoveByID($id){
		$sql = "DELETE FROM school WHERE school_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveByPublicID($publicID){
		$sql = "DELETE FROM school WHERE public_id = '$publicID'";
		return $this->banco->executa($sql);
	}
	
	public function RemoveBySyncCode($syncCode){
		$sql = "DELETE FROM school WHERE sync_code = '$syncCode'";
		return $this->banco->executa($sql);
	}
	
	public function Update($data){
		if($data["school_id"] == "")
			return;
		
		$sql = "UPDATE school
					SET name = '".$data["name"]."',
						coordinator_code = '".$data["coordinator_code"]."',
						public_id = '".$data["public_id"]."',
						sync_code = '".$data["sync_code"]."'
							WHERE school_id = ".$data["school_id"];
		return $this->banco->executa($sql);
	}
	
}

?>