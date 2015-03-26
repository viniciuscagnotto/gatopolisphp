<?php

include_once "bancoms.class.php";

class Student {

	private $banco;
	
	public function __construct(bancoMS $banco) {
		$this->banco = $banco;
	}
	
/*
 * STUDENT GROUP ******************************************
 */
	public function LoadStudentGroup($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND sg.student_group_id = $id";
	
		$sql = "SELECT *, sg.name as student_group_name, s.name as school_name
					FROM student_group sg
				 		INNER JOIN school s ON s.school_id = sg.school_id
							WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentGroupBySchoolID($schoolID){
		$sql = "SELECT *, sg.name as student_group_name, s.name as school_name
					FROM student_group sg
				 		INNER JOIN school s ON s.school_id = sg.school_id
							WHERE sg.school_id = $schoolID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function SaveStudentGroup($data){
		$sql = "INSERT INTO student_group (name,
								 		   period,
								 		   series,
								 		   school_id) VALUES ('".$data["name"]."',
															   '".$data["period"]."',
													 		   '".$data["series"]."',
													 		   ".$data["school_id"].");";
		$sql .= " SELECT SCOPE_IDENTITY() AS IDENTITY_COLUMN_NAME";
		$rs = $this->banco->executa($sql);
		return $this->banco->ultimo_id($rs);
	}
	
	public function RemoveStudentGroupByID($id){
		$sql = "DELETE FROM student_group WHERE student_group_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveStudentGroupBySchoolID($schoolID){
		$sql = "DELETE FROM student_group WHERE school_id = $schoolID";
		return $this->banco->executa($sql);
	}
	
	public function UpdateStudentGroup($data){
		if($data["student_group_id"] == "")
			return;
	
		$sql = "UPDATE student_group
					SET name = '".$data["name"]."',
						period = '".$data["period"]."',
						series = '".$data["series"]."',
						school_id = ".$data["school_id"]."
							WHERE student_group_id = ".$data["student_group_id"];
		return $this->banco->executa($sql);
	}
	
	
/*
 * STUDENT ******************************************
 */
	public function LoadStudent($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND st.student_id = $id";
	
		$sql = "SELECT *, st.name as student_name, s.name as school_name, sg.name as student_group_name
					FROM student st
				 		INNER JOIN school s ON s.school_id = st.school_id
						INNER JOIN student_group sg ON sg.student_group_id = st.student_group_id
							WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentBySchoolID($schoolID){
		$sql = "SELECT *, st.name as student_name, s.name as school_name, sg.name as student_group_name
					FROM student st
						INNER JOIN school s ON s.school_id = st.school_id
						INNER JOIN student_group sg ON sg.student_group_id = st.student_group_id
							WHERE st.school_id = $schoolID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentByStudentGroupID($studentGroupID){
		$sql = "SELECT *, st.name as student_name, s.name as school_name, sg.name as student_group_name
					FROM student st
						INNER JOIN school s ON s.school_id = st.school_id
						INNER JOIN student_group sg ON sg.student_group_id = st.student_group_id
							WHERE st.student_group_id = $studentGroupID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function SaveStudent($data){
		$sql = "INSERT INTO student (name,
								 	 last_name,
								 	 gender,
								 	 diagnosis_level,
									 coins,
									 buildings_count,
									 birth_date,
									 school_id,
									 student_group_id,
									 picture,
									 app_rating,
									 used_times_week,
									 used_times_mont, 
									 used_times_year) VALUES ('".$data["name"]."',
															  '".$data["last_name"]."',
															  '".$data["gender"]."',
															  '".$data["diagnosis_level"]."',
															  ".$data["coins"].",
															  '".$data["buildings_count"]."',
															  '".$data["birth_date"]."',
															  ".$data["school_id"].",
															  ".$data["student_group_id"].",
															  '".$data["picture"]."',
															  ".$data["app_rating"].",
															  ".$data["used_times_week"].",
															  ".$data["used_times_mont"].",
															  ".$data["used_times_year"].");";
		$sql .= " SELECT SCOPE_IDENTITY() AS IDENTITY_COLUMN_NAME";
		$rs = $this->banco->executa($sql);
		return $this->banco->ultimo_id($rs);
	}
	
	public function RemoveStudentByID($id){
		$sql = "DELETE FROM student WHERE student_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveStudentBySchoolID($schoolID){
		$sql = "DELETE FROM student WHERE school_id = $schoolID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveStudentByStudentGroupID($studentGroupID){
		$sql = "DELETE FROM student WHERE student_group_id = $studentGroupID";
		return $this->banco->executa($sql);
	}
	
	public function UpdateStudent($data){
		if($data["student_id"] == "")
			return;
		
		$sql = "UPDATE student
					SET name = '".$data["name"]."',
						last_name = '".$data["last_name"]."',
						gender = '".$data["gender"]."',
						diagnosis_level = '".$data["diagnosis_level"]."',
						coins = ".$data["coins"].",
						buildings_count = '".$data["buildings_count"]."',
						birth_date = '".$data["birth_date"]."',
						school_id = ".$data["school_id"].",
						student_group_id = ".$data["student_group_id"].",
						picture = '".$data["picture"]."',
						app_rating = ".$data["app_rating"].",
						used_times_week = ".$data["used_times_week"].",
						used_times_mont = ".$data["used_times_mont"].",
						used_times_year = ".$data["used_times_year"]."
							WHERE student_id = ".$data["student_id"];
		
		return $this->banco->executa($sql);
	}
	

/*
 * STUDENT GROUP TEACHER ******************************************
 */	

	public function LoadStudentGroupTeacher($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND sgt.student_group_teacher_id = $id";
	
		$sql = "SELECT *, s.name as school_name, sg.name as student_group_name, t.name as teacher_name
					FROM student_group_teacher sgt
				 		INNER JOIN school s ON s.school_id = sgt.school_id
						INNER JOIN student_group sg ON sg.student_group_id = sgt.student_group_id
						INNER JOIN teacher t ON t.teacher_id = sgt.teacher_id
							WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentGroupTeacherBySchoolID($schoolID){
		$sql = "SELECT *, s.name as school_name, sg.name as student_group_name, t.name as teacher_name
					FROM student_group_teacher sgt
				 		INNER JOIN school s ON s.school_id = sgt.school_id
						INNER JOIN student_group sg ON sg.student_group_id = sgt.student_group_id
						INNER JOIN teacher t ON t.teacher_id = sgt.teacher_id
							WHERE sgt.school_id = $schoolID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentGroupTeacherByStudentGroupID($studentGroupID){
		$sql = "SELECT *, s.name as school_name, sg.name as student_group_name, t.name as teacher_name
					FROM student_group_teacher sgt
						INNER JOIN school s ON s.school_id = sgt.school_id
						INNER JOIN student_group sg ON sg.student_group_id = sgt.student_group_id
						INNER JOIN teacher t ON t.teacher_id = sgt.teacher_id
							WHERE sgt.student_group_id = $studentGroupID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadStudentGroupTeacherByTeacherID($teacherID){
		$sql = "SELECT *, s.name as school_name, sg.name as student_group_name, t.name as teacher_name
					FROM student_group_teacher sgt
						INNER JOIN school s ON s.school_id = sgt.school_id
						INNER JOIN student_group sg ON sg.student_group_id = sgt.student_group_id
						INNER JOIN teacher t ON t.teacher_id = sgt.teacher_id
							WHERE sgt.teacher_id = $teacherID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function SaveStudentGroupTeacher($data){
		$sql = "INSERT INTO student_group_teacher (school_id,
								 		   		  student_group_id,
								 		   		  teacher_id) VALUES (".$data["school_id"].",
															   ".$data["student_group_id"].",
													 		   ".$data["teacher_id"].");";
		$this->banco->executa($sql);
		return $this->banco->ultimo_id();
	}
	
	public function RemoveStudentGroupTeacherByID($id){
		$sql = "DELETE FROM student_group_teacher WHERE student_group_teacher_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveStudentGroupTeacherBySchoolID($schoolID){
		$sql = "DELETE FROM student_group_teacher WHERE school_id = $schoolID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveStudentGroupTeacherByStudentGroupID($studentGroupID){
		$sql = "DELETE FROM student_group_teacher WHERE student_group_id = $studentGroupID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveStudentGroupTeacherByTeacherID($teacherID){
		$sql = "DELETE FROM student_group_teacher WHERE teacher_id = $teacherID";
		return $this->banco->executa($sql);
	}
	
	public function UpdateStudentGroupTeacher($data){
		if($data["student_group_teacher_id"] == "")
			return;
	
		$sql = "UPDATE student_group_teacher
					SET school_id = ".$data["school_id"].",
						student_group_id = ".$data["student_group_id"].",
						teacher_id = ".$data["teacher_id"]."
							WHERE student_group_teacher_id = ".$data["student_group_teacher_id"];
		return $this->banco->executa($sql);
	}
	
/*
 * VIEWED STUDENT ******************************************
 */
	
	public function LoadViewedStudent($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND vs.viewed_student_id = $id";
	
		$sql = "SELECT *, s.name as school_name, st.name as student_name, t.name as teacher_name
					FROM viewed_student vs
				 		INNER JOIN school s ON s.school_id = vs.school_id
						INNER JOIN student st ON st.student_id = vs.student_id
						INNER JOIN teacher t ON t.teacher_id = vs.teacher_id
							WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadViewedStudentBySchoolID($schoolID){
		$sql = "SELECT *, s.name as school_name, st.name as student_name, t.name as teacher_name
					FROM viewed_student vs
						INNER JOIN school s ON s.school_id = vs.school_id
						INNER JOIN student st ON st.student_id = vs.student_id
						INNER JOIN teacher t ON t.teacher_id = vs.teacher_id
							WHERE vs.school_id = $schoolID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadViewedStudentByStudentID($studentID){
		$sql = "SELECT *, s.name as school_name, st.name as student_name, t.name as teacher_name
					FROM viewed_student vs
						INNER JOIN school s ON s.school_id = vs.school_id
						INNER JOIN student st ON st.student_id = vs.student_id
						INNER JOIN teacher t ON t.teacher_id = vs.teacher_id
							WHERE vs.student_id = $studentID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadViewedStudentByTeacherID($teacherID){
		$sql = "SELECT *, s.name as school_name, st.name as student_name, t.name as teacher_name
					FROM viewed_student vs
						INNER JOIN school s ON s.school_id = vs.school_id
						INNER JOIN student st ON st.student_id = vs.student_id
						INNER JOIN teacher t ON t.teacher_id = vs.teacher_id
							WHERE vs.teacher_id = $teacherID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function SaveViewedStudent($data){
		$sql = "INSERT INTO viewed_student (times_viewed,
											school_id,
								 		    student_id,
								 		    teacher_id) VALUES (".$data["times_viewed"].",
															    ".$data["school_id"].",
															    ".$data["student_id"].",
													 		    ".$data["teacher_id"].");";
		$this->banco->executa($sql);
		return $this->banco->ultimo_id();
	}
	
	public function RemoveViewedStudentByID($id){
		$sql = "DELETE FROM viewed_student WHERE viewed_student_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveViewedStudentBySchoolID($schoolID){
		$sql = "DELETE FROM viewed_student WHERE school_id = $schoolID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveViewedStudentByStudentID($studentID){
		$sql = "DELETE FROM viewed_student WHERE student_id = $studentID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveViewedStudentByTeacherID($teacherID){
		$sql = "DELETE FROM viewed_student WHERE teacher_id = $teacherID";
		return $this->banco->executa($sql);
	}
	
	public function UpdateViewedStudent($data){
		if($data["viewed_student_id"] == "")
			return;
	
		$sql = "UPDATE viewed_student
					SET times_viewed = ".$data["times_viewed"].",
						school_id = ".$data["school_id"].",
						student_id = ".$data["student_id"].",
						teacher_id = ".$data["teacher_id"]."
							WHERE viewed_student_id = ".$data["viewed_student_id"];
		return $this->banco->executa($sql);
	}
	
}

?>