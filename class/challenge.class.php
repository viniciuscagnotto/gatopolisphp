<?php

include_once "banco.class.php";

class Challenge {

	private $banco;
	
	public function __construct() {
		$this->banco = banco::getInstance();
	}
	
	
/*
 * CHALLENGE OUTPUT ******************************************
 */
	public function LoadChallengeOutput($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND co.challenge_output_id = $id";
	
		$sql = "SELECT *
					FROM challenge_output co
				 		INNER JOIN school s ON s.school_id = co.school_id
						INNER JOIN student st ON st.student_id = co.student_id
							WHERE 1=1".$where;
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadChallengeOutputBySchoolID($schoolID){
		$sql = "SELECT *
					FROM challenge_output co
						INNER JOIN school s ON s.school_id = co.school_id
						INNER JOIN student st ON st.student_id = co.student_id
							WHERE co.school_id = $schoolID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadChallengeOutputByStudentID($studentID){
		$sql = "SELECT *
					FROM challenge_output co
						INNER JOIN school s ON s.school_id = co.school_id
						INNER JOIN student st ON st.student_id = co.student_id
							WHERE co.student_id = $studentID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadChallengeOutputByStudentIDAndEtapa($studentID, $etapa){
		$sql = "SELECT *
					FROM challenge_output co
						INNER JOIN school s ON s.school_id = co.school_id
						INNER JOIN student st ON st.student_id = co.student_id
							WHERE co.student_id = $studentID
								AND co.etapa = '$etapa'";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function SaveChallengeOutput($data){
		$sql = "INSERT INTO challenge_output (asserts,
								 			 asserts_percentage,
								 	 		 challenge_exercise,
								 	 		 duration,
									 		 etapa,
									 		 etapa_challenge,
									 		 minigame,
									 		 school_id,
									 		 student_id,
									 		 summarized,
									 		 week_summarized) VALUES (".$data["asserts"].",
															  		  ".$data["asserts_percentage"].",
															   		  '".$data["challenge_exercise"]."',
															   		  ".$data["duration"].",
															   		  '".$data["etapa"]."',
															   		  '".$data["etapa_challenge"]."',
															   		  '".$data["minigame"]."',
															   		  ".$data["school_id"].",
															   		  ".$data["student_id"].",
															   		  ".$data["summarized"].",
															   		  ".$data["week_summarized"].");";
		return $banco->executa($sql);
	}

	public function RemoveChallengeOutputByID($id){
		$sql = "DELETE FROM challenge_output WHERE challenge_output_id = $id";
		return $banco->executa($sql);
	}
	
	public function RemoveChallengeOutputBySchoolID($schoolID){
		$sql = "DELETE FROM challenge_output WHERE school_id = $schoolID";
		return $banco->executa($sql);
	}
	
	public function RemoveChallengeOutputByStudentID($studentID){
		$sql = "DELETE FROM challenge_output WHERE student_id = $studentID";
		return $banco->executa($sql);
	}
	
/*
 * CHALLENGE SUMMARY ******************************************
 */
	public function LoadChallengeSummary($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND cs.challenge_summary_id = $id";
	
		$sql = "SELECT *
					FROM challenge_summary cs
				 		INNER JOIN school s ON s.school_id = cs.school_id
						INNER JOIN student st ON st.student_id = cs.student_id
							WHERE 1=1".$where;
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadChallengeSummaryBySchoolID($schoolID){
		$sql = "SELECT *
					FROM challenge_summary cs
						INNER JOIN school s ON s.school_id = cs.school_id
						INNER JOIN student st ON st.student_id = cs.student_id
							WHERE cs.school_id = $schoolID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadChallengeSummaryByStudentID($studentID){
		$sql = "SELECT *
					FROM challenge_summary cs
						INNER JOIN school s ON s.school_id = cs.school_id
						INNER JOIN student st ON st.student_id = cs.student_id
							WHERE cs.student_id = $studentID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadChallengeSummaryByStudentIDAndEtapa($studentID, $etapa){
		$sql = "SELECT *
					FROM challenge_summary cs
						INNER JOIN school s ON s.school_id = cs.school_id
						INNER JOIN student st ON st.student_id = cs.student_id
							WHERE cs.student_id = $studentID
								AND cs.etapa = '$etapa'";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function SaveChallengeSummary($data){
		$sql = "INSERT INTO challenge_summary (asserts,
								 			  asserts_percentage,
								 	 		  etapa,
									 		  etapa_challenge,
									 		  minigame,
									 		  school_id,
									 		  student_id,
									 		  times_played,
									 		  total_time) VALUES (".$data["asserts"].",
															  	  ".$data["asserts_percentage"].",
															   	  '".$data["etapa"]."',
															   	  '".$data["etapa_challenge"]."',
															   	  '".$data["minigame"]."',
															      ".$data["school_id"].",
															      ".$data["student_id"].",
															      ".$data["times_played"].",
															      ".$data["total_time"].");";
		return $banco->executa($sql);
	}
	
	public function RemoveChallengeSummaryByID($id){
		$sql = "DELETE FROM challenge_summary WHERE challenge_summary_id = $id";
		return $banco->executa($sql);
	}
	
	public function RemoveChallengeSummaryBySchoolID($schoolID){
		$sql = "DELETE FROM challenge_summary WHERE school_id = $schoolID";
		return $banco->executa($sql);
	}
	
	public function RemoveChallengeSummaryByStudentID($studentID){
		$sql = "DELETE FROM challenge_summary WHERE student_id = $studentID";
		return $banco->executa($sql);
	}


/*
 * WEEK SUMMARY ******************************************
 */
	
	public function LoadWeekSummary($id = ""){
		$where = "";
		if($id != "")
			$where .= " AND ws.week_summary_id = $id";
	
		$sql = "SELECT *
					FROM week_summary ws
				 		INNER JOIN school s ON s.school_id = ws.school_id
						INNER JOIN student st ON st.student_id = ws.student_id
							WHERE 1=1".$where;
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadWeekSummaryBySchoolID($schoolID){
		$sql = "SELECT *
					FROM week_summary ws
						INNER JOIN school s ON s.school_id = ws.school_id
						INNER JOIN student st ON st.student_id = ws.student_id
							WHERE ws.school_id = $schoolID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadWeekSummaryByStudentID($studentID){
		$sql = "SELECT *
					FROM week_summary ws
						INNER JOIN school s ON s.school_id = ws.school_id
						INNER JOIN student st ON st.student_id = ws.student_id
							WHERE ws.student_id = $studentID";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function LoadWeekSummaryByStudentIDAndEtapa($studentID, $etapa){
		$sql = "SELECT *
					FROM week_summary ws
						INNER JOIN school s ON s.school_id = ws.school_id
						INNER JOIN student st ON st.student_id = ws.student_id
							WHERE ws.student_id = $studentID
								AND ws.etapa = '$etapa'";
		$result = $banco->executa($sql);
		return $result;
	}
	
	public function SaveWeekSummary($data){
		$sql = "INSERT INTO week_summary (asserts,
								 		  asserts_percentage,
								 	 	  etapa,
									 	  etapa_challenge,
									 	  minigame,
									 	  school_id,
									 	  student_id,
									 	  times_played,
									 	  total_time,
					`					  week) VALUES (".$data["asserts"].",
													    ".$data["asserts_percentage"].",
														'".$data["etapa"]."',
														'".$data["etapa_challenge"]."',
														'".$data["minigame"]."',
														".$data["school_id"].",
														".$data["student_id"].",
														".$data["times_played"].",
														".$data["total_time"].",
														".$data["week"].");";
		return $banco->executa($sql);
	}
	
	public function RemoveWeekSummaryByID($id){
		$sql = "DELETE FROM week_summary WHERE week_summary_id = $id";
		return $banco->executa($sql);
	}
	
	public function RemoveWeekSummaryBySchoolID($schoolID){
		$sql = "DELETE FROM week_summary WHERE school_id = $schoolID";
		return $banco->executa($sql);
	}
	
	public function RemoveWeekSummaryByStudentID($studentID){
		$sql = "DELETE FROM week_summary WHERE student_id = $studentID";
		return $banco->executa($sql);
	}
	
}

?>