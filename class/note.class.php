<?php

include_once "banco.class.php";

class Note {

	private $banco;
	
	public function __construct(banco $banco) {
		$this->banco = $banco;
	}
	
	public function Load($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND n.note_id = $id";
	
		$sql = "SELECT *
					FROM note n
				 		INNER JOIN school s ON s.school_id = n.school_id
						INNER JOIN student st ON st.student_id = n.student_id
						INNER JOIN teacher t ON t.teacher_id = n.teacher_id
							WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadBySchoolID($schoolID){
		$sql = "SELECT *
					FROM note n
				 		INNER JOIN school s ON s.school_id = n.school_id
						INNER JOIN student st ON st.student_id = n.student_id
						INNER JOIN teacher t ON t.teacher_id = n.teacher_id
							WHERE n.school_id = $schoolID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadByStudentID($studentID){
		$sql = "SELECT *
					FROM note n
						INNER JOIN school s ON s.school_id = n.school_id
						INNER JOIN student st ON st.student_id = n.student_id
						INNER JOIN teacher t ON t.teacher_id = n.teacher_id
							WHERE n.student_id = $studentID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadByTeacherID($teacherID){
		$sql = "SELECT *
					FROM note n
						INNER JOIN school s ON s.school_id = n.school_id
						INNER JOIN student st ON st.student_id = n.student_id
						INNER JOIN teacher t ON t.teacher_id = n.teacher_id
							WHERE n.teacher_id = $teacherID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function Save($data){
		$sql = "INSERT INTO note (note_text,
								 school_id,
								 teacher_id,
								 student_id,
								 written_at) VALUES ('".$data["note_text"]."',
													 ".$data["school_id"].",
													 ".$data["teacher_id"].",
													 ".$data["student_id"].",
													 ".$data["written_at"].");";
		return $this->banco->executa($sql);
	}
	
	public function RemoveByID($id){
		$sql = "DELETE FROM note WHERE note_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveBySchoolID($schoolID){
		$sql = "DELETE FROM note WHERE school_id = $schoolID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveByStudentID($studentID){
		$sql = "DELETE FROM note WHERE student_id = $studentID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveByTeacherID($teacherID){
		$sql = "DELETE FROM note WHERE teacher_id = $teacherID";
		return $this->banco->executa($sql);
	}

	public function Update($data){
		if($data["note_id"] == "")
			return;
		
		$sql = "UPDATE note
					SET note_text = '".$data["note_text"]."',
						school_id = ".$data["school_id"].",
						teacher_id = ".$data["teacher_id"].",
						student_id = ".$data["student_id"].",
						written_at = '".$data["written_at"]."'
							WHERE note_id = ".$data["note_id"];
		return $this->banco->executa($sql);
	}
	
}

?>