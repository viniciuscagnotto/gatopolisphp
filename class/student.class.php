<?php

include_once "banco.class.php";

class Student {

	private $banco;
	
	public function __construct() {
		$this->banco = banco::getInstance();
	}
	
/*
 * STUDENT GROUP ******************************************
 */
	public function LoadStudentGroup($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND sg.student_group_id = $id";
	
		$sql = "SELECT *
					FROM student_group sg
				 		INNER JOIN school s ON s.school_id = sg.school_id
							WHERE 1=1".$where;
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentGroupBySchoolID($schoolID){
		$sql = "SELECT *
					FROM student_group sg
				 		INNER JOIN school s ON s.school_id = sg.school_id
							WHERE sg.school_id = $schoolID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function SaveStudentGroup($data){
		$sql = "INSERT INTO student_group (name,
								 		   period,
								 		   series,
								 		   school_id,
								 		   deleted_at) VALUES ('".$data["name"]."',
															   '".$data["period"]."',
													 		   '".$data["series"]."',
													 		   ".$data["school_id"].",
													 		   '".$data["deleted_at"]."');";
		return $banco->executa($sql);
	}
	
	public function RemoveStudentGroupByID($id){
		$sql = "DELETE FROM student_group WHERE student_group_id = $id";
		return $banco->executa($sql);
	}
	
	public function RemoveStudentGroupBySchoolID($schoolID){
		$sql = "DELETE FROM student_group WHERE school_id = $schoolID";
		return $banco->executa($sql);
	}
	
	
/*
 * STUDENT ******************************************
 */
	public function LoadStudent($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND st.student_id = $id";
	
		$sql = "SELECT *
					FROM student st
				 		INNER JOIN school s ON s.school_id = st.school_id
						INNER JOIN student_group sg ON sg.student_group_id = st.student_group_id
							WHERE 1=1".$where;
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentBySchoolID($schoolID){
		$sql = "SELECT *
					FROM student st
						INNER JOIN school s ON s.school_id = st.school_id
						INNER JOIN student_group sg ON sg.student_group_id = st.student_group_id
							WHERE st.school_id = $schoolID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentByStudentGroupID($studentGroupID){
		$sql = "SELECT *
					FROM student st
						INNER JOIN school s ON s.school_id = st.school_id
						INNER JOIN student_group sg ON sg.student_group_id = st.student_group_id
							WHERE st.student_group_id = $studentGroupID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function SaveStudent($data){
		$sql = "INSERT INTO student (name,
								 	 last_name,
								 	 gender,
								 	 guardian,
									 diagnosis_level,
									 coins,
									 buildings_count,
									 birth_date,
									 school_id,
									 student_group_id) VALUES ('".$data["name"]."',
															   '".$data["last_name"]."',
															   '".$data["gender"]."',
															   '".$data["guardian"]."',
															   '".$data["diagnosis_level"]."',
															   ".$data["coins"].",
															   '".$data["buildings_count"]."',
															   '".$data["birth_date"]."',
															   ".$data["school_id"].",
															   ".$data["student_group_id"].");";
		return $banco->executa($sql);
	}
	
	public function RemoveStudentByID($id){
		$sql = "DELETE FROM student WHERE student_id = $id";
		return $banco->executa($sql);
	}
	
	public function RemoveStudentBySchoolID($schoolID){
		$sql = "DELETE FROM student WHERE school_id = $schoolID";
		return $banco->executa($sql);
	}
	
	public function RemoveStudentByStudentGroupID($studentGroupID){
		$sql = "DELETE FROM student WHERE student_group_id = $studentGroupID";
		return $banco->executa($sql);
	}
	

/*
 * STUDENT GROUP TEACHER ******************************************
 */	

	public function LoadStudentGroupTeacher($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND sgt.student_group_teacher_id = $id";
	
		$sql = "SELECT *
					FROM student_group_teacher sgt
				 		INNER JOIN school s ON s.school_id = sgt.school_id
						INNER JOIN student_group sg ON sg.student_group_id = sgt.student_group_id
						INNER JOIN teacher t ON t.teacher_id = sgt.teacher_id
							WHERE 1=1".$where;
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentGroupTeacherBySchoolID($schoolID){
		$sql = "SELECT *
					FROM student_group_teacher sgt
				 		INNER JOIN school s ON s.school_id = sgt.school_id
						INNER JOIN student_group sg ON sg.student_group_id = sgt.student_group_id
						INNER JOIN teacher t ON t.teacher_id = sgt.teacher_id
							WHERE sgt.school_id = $schoolID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentGroupTeacherByStudentGroupID($studentGroupID){
		$sql = "SELECT *
					FROM student_group_teacher sgt
						INNER JOIN school s ON s.school_id = sgt.school_id
						INNER JOIN student_group sg ON sg.student_group_id = sgt.student_group_id
						INNER JOIN teacher t ON t.teacher_id = sgt.teacher_id
							WHERE sgt.student_group_id = $studentGroupID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentGroupTeacherByTeacherID($teacherID){
		$sql = "SELECT *
					FROM student_group_teacher sgt
						INNER JOIN school s ON s.school_id = sgt.school_id
						INNER JOIN student_group sg ON sg.student_group_id = sgt.student_group_id
						INNER JOIN teacher t ON t.teacher_id = sgt.teacher_id
							WHERE sgt.teacher_id = $teacherID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function SaveStudentGroupTeacher($data){
		$sql = "INSERT INTO student_group_teacher (school_id,
								 		   		  student_group_id,
								 		   		  teacher_id,
												  deleted_at) VALUES (".$data["school_id"].",
															   ".$data["student_group_id"].",
													 		   ".$data["teacher_id"].",
													 		   '".$data["deleted_at"]."');";
		return $banco->executa($sql);
	}
	
	public function RemoveStudentGroupTeacherByID($id){
		$sql = "DELETE FROM student_group_teacher WHERE student_group_teacher_id = $id";
		return $banco->executa($sql);
	}
	
	public function RemoveStudentGroupTeacherBySchoolID($schoolID){
		$sql = "DELETE FROM student_group_teacher WHERE school_id = $schoolID";
		return $banco->executa($sql);
	}
	
	public function RemoveStudentGroupTeacherByStudentGroupID($studentGroupID){
		$sql = "DELETE FROM student_group_teacher WHERE student_group_id = $studentGroupID";
		return $banco->executa($sql);
	}
	
	public function RemoveStudentGroupTeacherByTeacherID($teacherID){
		$sql = "DELETE FROM student_group_teacher WHERE teacher_id = $teacherID";
		return $banco->executa($sql);
	}
	
}

?>