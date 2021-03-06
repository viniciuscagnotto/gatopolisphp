<?php

include_once "bancoms.class.php";

class Diagnosis {

	private $banco;
	
	public function __construct(bancoMS $banco) {
		$this->banco = $banco;
	}
	
	public function Load($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND dls.diagnosis_level_snapshot_id = $id";
	
		$sql = "SELECT *, s.name as school_name, st.name as student_name,
					   dls.diagnosis_level as diagnosis_level_dls, st.diagnosis_level as diagnosis_level_st
					FROM diagnosis_level_snapshop dls
				 		INNER JOIN school s ON s.school_id = dls.school_id
						INNER JOIN student st ON st.student_id = dls.student_id
							WHERE 1=1".$where;
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadBySchoolID($schoolID){
		$sql = "SELECT *, s.name as school_name, st.name as student_name,
					   dls.diagnosis_level as diagnosis_level_dls, st.diagnosis_level as diagnosis_level_st
					FROM diagnosis_level_snapshop dls
						INNER JOIN school s ON s.school_id = dls.school_id
						INNER JOIN student st ON st.student_id = dls.student_id
							WHERE dls.school_id = $schoolID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadByStudentID($studentID){
		$sql = "SELECT *, s.name as school_name, st.name as student_name,
					   dls.diagnosis_level as diagnosis_level_dls, st.diagnosis_level as diagnosis_level_st
					FROM diagnosis_level_snapshop dls
						INNER JOIN school s ON s.school_id = dls.school_id
						INNER JOIN student st ON st.student_id = dls.student_id
							WHERE dls.student_id = $studentID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function LoadByStudentGroupID($studentGroupID){
		$sql = "SELECT *, s.name as school_name, st.name as student_name, stg.name as student_group_name,
					   dls.diagnosis_level as diagnosis_level_dls, st.diagnosis_level as diagnosis_level_st
					FROM diagnosis_level_snapshop dls
						INNER JOIN school s ON s.school_id = dls.school_id
						INNER JOIN student st ON st.student_id = dls.student_id
						INNER JOIN student_group stg ON stg.student_group_id = st.student_group_id
							WHERE st.student_group_id = $studentGroupID";
		$result = $this->banco->executa($sql);
		return $result;
	}
	
	public function Save($data){
		$sql = "INSERT INTO diagnosis_level_snapshop (diagnosis_level,
								 	 				 school_id,
								 	 				 student_id,
													 start_time) VALUES ('".$data["diagnosis_level"]."',
																		 ".$data["school_id"].",
														 				 ".$data["student_id"].",
																		 '".$data["start_time"]."');";
		$sql .= " SELECT SCOPE_IDENTITY() AS IDENTITY_COLUMN_NAME";
		$rs = $this->banco->executa($sql);
		return $this->banco->ultimo_id($rs);
	}
	
	public function RemoveByID($id){
		$sql = "DELETE FROM diagnosis_level_snapshop WHERE diagnosis_level_snapshot_id = $id";
		return $this->banco->executa($sql);
	}
	
	public function RemoveBySchoolID($schoolID){
		$sql = "DELETE FROM diagnosis_level_snapshop WHERE school_id = $schoolID";
		return $this->banco->executa($sql);
	}
	
	public function RemoveByStudentID($studentID){
		$sql = "DELETE FROM diagnosis_level_snapshop WHERE student_id = $studentID";
		return $this->banco->executa($sql);
	}
	
	public function Update($data){
		if($data["diagnosis_level_snapshot_id"] == "")
			return;
	
		$sql = "UPDATE diagnosis_level_snapshop
					SET diagnosis_level = '".$data["diagnosis_level"]."',
						school_id = ".$data["school_id"].",
						student_id = ".$data["student_id"].",
						date_time = '".$data["date_time"]."',
							WHERE diagnosis_level_snapshot_id = ".$data["diagnosis_level_snapshot_id"];
		return $this->banco->executa($sql);
	}
}

?>