<?php

include_once "banco.class.php";

class Teacher {

	private $banco;
	
	public function __construct(banco $banco) {
		$this->banco = $banco;
	}
	
	public function Load($id = ""){	
		$where = "";
		if($id != "")
			$where .= " AND t.teacher_id = $id";
		
		$sql = "SELECT * 
					FROM teacher t
						INNER JOIN school s ON s.school_id = t.school_id 
							WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadByLogin($email, $passcode){
		$sql = "SELECT * 
					FROM teacher t
						INNER JOIN school s ON s.school_id = t.school_id
							WHERE t.email = '$email' 
								AND t.passcode = '$passcode'";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadBySchoolID($schoolID){
		$sql = "SELECT * 
					FROM teacher t 
						INNER JOIN school s ON s.school_id = t.school_id
							WHERE t.school_id = '$schoolID'";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function Save($data){
		$sql = "INSERT INTO teacher (name,
									last_name,
									email,
									passcode,
									question,
									answer,
									picture,
									school_id) VALUES ('".$data["name"]."',
													   '".$data["last_name"]."',
													   '".$data["email"]."',
													   '".$data["passcode"]."',
													   '".$data["question"]."',
													   '".$data["answer"]."',
													   '".$data["picture"]."',
													   ".$data["school_id"].");";
		$this->banco->executa($sql);
		return $this->banco->ultimo_id();
	}
	
	public function RemoveByID($id){
		$sql = "DELETE FROM teacher WHERE teacher_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveBySchoolID($schoolID){
		$sql = "DELETE FROM teacher WHERE school_id = '$schoolID'";
		return $this->banco->executa($sql);
	}

	public function Update($data){
		if($data["teacher_id"] == "")
			return;
	
		$sql = "UPDATE teacher
					SET name = '".$data["name"]."',
				 		last_name = '".$data["last_name"]."',
						email = '".$data["email"]."',
						passcode = '".$data["passcode"]."',
						question = '".$data["question"]."',
						answer = '".$data["answer"]."',
						picture = '".$data["picture"]."',
						school_id = ".$data["school_id"]." 
								WHERE teacher_id = ".$data["teacher_id"];
		return $this->banco->executa($sql);
	}
	
}

?>