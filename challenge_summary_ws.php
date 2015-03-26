<?php
 
include_once "class/bancoms.class.php";
include_once "class/challenge.class.php";

class ChallengeSummaryWS {
 
	public function LoadAllChallengeSummaries() {
        	$banco = new bancoMS();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummary();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeSummaryByID($id) {
        	$banco = new bancoMS();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummary($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeSummaryBySchoolID($schoolID) {
        	$banco = new bancoMS();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummaryBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeSummaryByStudentID($studentID) {
        	$banco = new bancoMS();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummaryByStudentID($studentID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadChallengeSummaryByStudentIDAndEtapa($studentID, $etapa) {
        	$banco = new bancoMS();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->LoadChallengeSummaryByStudentIDAndEtapa($studentID, $etapa);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveChallengeSummary($input){
        	$banco = new bancoMS();
        	$Challenge = new Challenge($banco);
        	$ultimoID = $Challenge->SaveChallengeSummary(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveChallengeSummaryByID($id){
        	$banco = new bancoMS();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveChallengeSummaryByID($id);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveChallengeSummaryBySchoolID($schoolID){
        	$banco = new bancoMS();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveChallengeSummaryBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveChallengeSummaryByStudentID($studentID){
        	$banco = new bancoMS();
        	$Challenge = new Challenge($banco);
        	$rs = $Challenge->RemoveChallengeSummaryByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('challenge_summary_ws.wsdl');
$oSoapServer->setClass("ChallengeSummaryWS");
$oSoapServer->handle();

?>