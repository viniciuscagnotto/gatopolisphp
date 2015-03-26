<?php
 
include_once "class/bancoms.class.php";
include_once "class/report.class.php";

class ReportStudentWS {
 
        public function LoadAllReportStudents() {
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->LoadReportStudents();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadReportStudentByID($id) {
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->LoadReportStudents($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadReportStudentBySchoolID($schoolID) {
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->LoadReportStudentBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadReportStudentByStudentID($studentID) {
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->LoadReportStudentByStudentID($studentID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveReportStudent($input){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$ultimoID = $Report->SaveReportStudent(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveReportStudentByID($id){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->RemoveReportStudentByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveReportStudentBySchoolID($schoolID){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->RemoveReportStudentBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveReportStudentByStudentID($studentID){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->RemoveReportStudentByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateReportStudent($input){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$Report->UpdateReportStudent(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('report_student_ws.wsdl');
$oSoapServer->setClass("ReportStudentWS");
$oSoapServer->handle();

?>