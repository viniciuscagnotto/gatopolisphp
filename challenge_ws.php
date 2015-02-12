<?php
 
include_once "class/banco.class.php";
include_once "class/challenge.class.php";

class ChallengeWS {
 
/*
 * CHALLENGE OUTPUT
 */
		public function LoadAllChallengeOutputs() {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeGroup();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeOutputByID($id) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeOutput($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeOutputBySchoolID($schoolID) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeOutputBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeOutputByStudentID($studentID) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeOutputByStudentID($studentID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeOutputByStudentIDAndEtapa($studentID, $etapa) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeOutputByStudentIDAndEtapa($studentID, $etapa);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveChallengeOutput($input){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$Challenge->SaveChallengeOutput(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveChallengeOutputByID($id){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveChallengeOutputByID($id);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveChallengeOutputBySchoolID($schoolID){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveChallengeOutputBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveChallengeOutputByStudentID($studentID){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveChallengeOutputByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }
        
/*
 * CHALLENGE SUMMARY
 */
		public function LoadAllChallengeSummaries() {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummary();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeSummaryByID($id) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummary($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeSummaryBySchoolID($schoolID) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummaryBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeSummaryByStudentID($studentID) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummaryByStudentID($studentID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeSummaryByStudentIDAndEtapa($studentID, $etapa) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummaryByStudentIDAndEtapa($studentID, $etapa);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveChallengeSummary($input){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$Challenge->SaveChallengeSummary(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveChallengeSummaryByID($id){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveChallengeSummaryByID($id);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveChallengeSummaryBySchoolID($schoolID){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveChallengeSummaryBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveChallengeSummaryByStudentID($studentID){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveChallengeSummaryByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }
        
/*
 * WEEK SUMMARY
 */
		public function LoadAllWeekSummaries() {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadWeekSummary();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadWeekSummaryByID($id) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadWeekSummary($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadWeekSummaryBySchoolID($schoolID) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadWeekSummaryBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadWeekSummaryByStudentID($studentID) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadWeekSummaryByStudentID($studentID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadWeekSummaryByStudentIDAndEtapa($studentID, $etapa) {
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadWeekSummaryByStudentIDAndEtapa($studentID, $etapa);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveWeekSummary($input){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$Challenge->SaveWeekSummary(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveWeekSummaryByID($id){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveWeekSummaryByID($id);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveWeekSummaryBySchoolID($schoolID){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveWeekSummaryBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveWeekSummaryByStudentID($studentID){
        	$banco = new banco();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveWeekSummaryByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('challenge_ws.wsdl');
$oSoapServer->setClass("ChallengeWS");
$oSoapServer->handle();

?>