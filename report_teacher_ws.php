<?php
 
include_once "class/bancoms.class.php";
include_once "class/report.class.php";

class ReportTeacherWS {
 
        public function LoadAllReportTeachers() {
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->LoadReportTeachers();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadReportTeacherByID($id) {
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->LoadReportTeachers($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadReportTeacherBySchoolID($schoolID) {
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->LoadReportTeacherBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadReportTeacherByTeacherID($teacherID) {
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->LoadReportTeacherByTeacherID($teacherID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveReportTeacher($input){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$ultimoID = $Report->SaveReportTeacher(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveReportTeacherByID($id){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->RemoveReportTeacherByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveReportTeacherBySchoolID($schoolID){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->RemoveReportTeacherBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveReportTeacherByTeacherID($teacherID){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$rs = $Report->RemoveReportTeacherByTeacherID($teacherID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateReportTeacher($input){
        	$banco = new bancoMS();
        	$Report = new Report($banco);
        	$Report->UpdateReportTeacher(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('report_teacher_ws.wsdl');
$oSoapServer->setClass("ReportTeacherWS");
$oSoapServer->handle();

?>