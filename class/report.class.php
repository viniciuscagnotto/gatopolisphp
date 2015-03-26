<?php

include_once "bancoms.class.php";

class Report {

	private $banco;
	
	public function __construct(bancoMS $banco) {
		$this->banco = $banco;
	}
	
/*
 * REPORT STUDENT ******************************************
 */
	public function LoadReportStudents($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND rs.report_student_id = $id";
	
		$sql = "SELECT *, st.name as student_name, s.name as school_name
					FROM report_student rs
				 		INNER JOIN school s ON s.school_id = rs.school_id
						INNER JOIN student st ON st.student_id = rs.student_id
							WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadReportStudentBySchoolID($schoolID){
		$sql = "SELECT *, st.name as student_name, s.name as school_name
					FROM report_student rs
				 		INNER JOIN school s ON s.school_id = rs.school_id
						INNER JOIN student st ON st.student_id = rs.student_id
							WHERE rs.school_id = $schoolID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadReportStudentByStudentID($studentID){
		$sql = "SELECT *, st.name as student_name, s.name as school_name
					FROM report_student rs
						INNER JOIN school s ON s.school_id = rs.school_id
						INNER JOIN student st ON st.student_id = rs.student_id
							WHERE rs.student_id = $studentID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function SaveReportStudent($data){
		$sql = "INSERT INTO report_student (date_access,
								 		    student_id,
								 		    school_id) VALUES ('".$data["date_access"]."',
															   ".$data["student_id"].",
													 		   ".$data["school_id"].");";
		$sql .= " SELECT SCOPE_IDENTITY() AS IDENTITY_COLUMN_NAME";
		$rs = $this->banco->executa($sql);
		return $this->banco->ultimo_id($rs);
	}
	
	public function RemoveReportStudentByID($id){
		$sql = "DELETE FROM report_student WHERE report_student_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveReportStudentBySchoolID($schoolID){
		$sql = "DELETE FROM report_student WHERE school_id = $schoolID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveReportStudentByStudentID($studentID){
		$sql = "DELETE FROM report_student WHERE student_id = $studentID";
		return $this->banco->executa($sql);
	}
	
	public function UpdateReportStudent($data){
		if($data["report_student_id"] == "")
			return;
	
		$sql = "UPDATE report_student
					SET date_access = '".$data["date_access"]."',
						student_id = ".$data["student_id"].",
						school_id = ".$data["school_id"]."
							WHERE report_student_id = ".$data["report_student_id"];
		return $this->banco->executa($sql);
	}
	
/*
 * REPORT TEACHER ******************************************
 */
	public function LoadReportTeachers($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND rt.report_teacher_id = $id";
	
		$sql = "SELECT *, t.name as teacher_name, s.name as school_name
					FROM report_student rt
				 		INNER JOIN school s ON s.school_id = rt.school_id
						INNER JOIN teacher t ON t.teacher_id = rt.teacher_id
							WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadReportTeacherBySchoolID($schoolID){
		$sql = "SELECT *, t.name as teacher_name, s.name as school_name
					FROM report_student rt
				 		INNER JOIN school s ON s.school_id = rt.school_id
						INNER JOIN teacher t ON t.teacher_id = rt.teacher_id
							WHERE rt.school_id = $schoolID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadReportTeacherByTeacherID($teacherID){
		$sql = "SELECT *, t.name as teacher_name, s.name as school_name
					FROM report_student rt
				 		INNER JOIN school s ON s.school_id = rt.school_id
						INNER JOIN teacher t ON t.teacher_id = rt.teacher_id
							WHERE rt.teacher_id = $teacherID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function SaveReportTeacher($data){
		$sql = "INSERT INTO report_teacher (dashboard_opened,
								 		    dashboard_duration,
								 		    duration_aba_obs,
											duration_aba_prod,
											duration_aba_freq,
											duration_transitions,
											duration_grouping,
											teacher_id,
											school_id) VALUES (".$data["dashboard_opened"].",
															   ".$data["dashboard_duration"].",
													 		   ".$data["duration_aba_obs"].",
													 		   ".$data["duration_aba_prod"].",
													 		   ".$data["duration_aba_freq"].",
													 		   ".$data["duration_transitions"].",
													 		   ".$data["duration_grouping"].",
													 		   ".$data["teacher_id"].",
													 		   ".$data["school_id"].");";
		$sql .= " SELECT SCOPE_IDENTITY() AS IDENTITY_COLUMN_NAME";
		$rs = $this->banco->executa($sql);
		return $this->banco->ultimo_id($rs);
	}
	
	public function RemoveReportTeacherByID($id){
		$sql = "DELETE FROM report_teacher WHERE report_teacher_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveReportTeacherBySchoolID($schoolID){
		$sql = "DELETE FROM report_teacher WHERE school_id = $schoolID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveReportTeacherByTeacherID($teacherID){
		$sql = "DELETE FROM report_teacher WHERE teacher_id = $teacherID";
		return $this->banco->executa($sql);
	}
	
	public function UpdateReportTeacher($data){
		if($data["report_teacher_id"] == "")
			return;
	
		$sql = "UPDATE report_teacher
					SET dashboard_opened = ".$data["dashboard_opened"].",
						dashboard_duration = ".$data["dashboard_duration"].",
						duration_aba_obs = ".$data["duration_aba_obs"].",
						duration_aba_prod = ".$data["duration_aba_prod"].",
						duration_aba_freq = ".$data["duration_aba_freq"].",
						duration_transitions = ".$data["duration_transitions"].",
						duration_grouping = ".$data["duration_grouping"].",
						teacher_id = ".$data["teacher_id"].",
						school_id = ".$data["school_id"]."
							WHERE report_teacher_id = ".$data["report_teacher_id"];
		return $this->banco->executa($sql);
	}
	
}

?>