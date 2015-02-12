<?php
 
include_once "class/banco.class.php";
include_once "class/challenge.class.php";

class ChallengeOutputWS {

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
        

}
 
$oSoapServer = new SoapServer('challenge_output_ws.wsdl');
$oSoapServer->setClass("ChallengeOutputWS");
$oSoapServer->handle();

?>