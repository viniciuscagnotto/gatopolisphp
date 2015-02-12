<?php
 
include_once "class/banco.class.php";
include_once "class/challenge.class.php";

class WeekSummaryWS {
 
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
 
$oSoapServer = new SoapServer('week_summary_ws.wsdl');
$oSoapServer->setClass("WeekSummaryWS");
$oSoapServer->handle();

?>