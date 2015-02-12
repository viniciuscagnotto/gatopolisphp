<?php

include_once "banco.class.php";

class WrittenWord {

	private $banco;
	
	public function __construct() {
		$this->banco = banco::getInstance();
	}
	
	public function Load($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND wd.written_word_id = $id";
	
		$sql = "SELECT * 
					FROM written_word wd
				 		INNER JOIN school s ON s.school_id = wd.school_id
						INNER JOIN student st ON st.student_id = wd.student_id
							WHERE 1=1".$where;
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadByStudent($studentID, $limit = ""){
		$lastStudents = "";
		if($limit != "")
			$lastStudents .= " ORDER by written_at DESC LIMIT $limit";
		
		$sql = "SELECT * 
					FROM written_word wd 
				   		INNER JOIN school s ON s.school_id = wd.school_id
						INNER JOIN student st ON st.student_id = wd.student_id
							WHERE wd.student_id = $studentID".$limit;
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadBySchool($school_id){
		$sql = "SELECT *
					FROM written_word wd
				 		INNER JOIN school s ON s.school_id = wd.school_id
						INNER JOIN student st ON st.student_id = wd.student_id
							WHERE wd.school_id = $school_id";
		$result = $banco->executa($sql);
		return $result;
	}

	public function Save($data){
		$sql = "INSERT INTO written_word (input,
										 expected,
										 gesture,
										 diagnosis_level,
										 written_at,
										 school_id,
										 student_id) VALUES ('".$data["input"]."',
											  		  	     '".$data["expected"]."',
													   		 '".$data["gesture"]."',
													   		 '".$data["diagnosis_level"]."',
													   		 ".$data["written_at"].",
													   		 ".$data["school_id"].",
													   		 ".$data["student_id"].");";
		return $banco->executa($sql);
	}
	
	public function RemoveByID($id){
		$sql = "DELETE FROM written_word WHERE written_word_id = $id";
		return $banco->executa($sql);
	}
	
	public function RemoveBySchoolID($schoolID){
		$sql = "DELETE FROM written_word WHERE school_id = $schoolID";
		return $banco->executa($sql);
	}
	
	public function RemoveByStudentID($studentID){
		$sql = "DELETE FROM written_word WHERE student_id = $studentID";
		return $banco->executa($sql);
	}

}

?>