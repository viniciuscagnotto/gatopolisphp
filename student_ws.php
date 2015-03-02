<?php
 
include_once "class/banco.class.php";
include_once "class/student.class.php";

class StudentWS {
 
        public function LoadAllStudents() {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudent();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentByID($id) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudent($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentBySchoolID($schoolID) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentByStudentGroupID($studentGroupID) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentByStudentGroupID($studentGroupID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveStudent($input){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$ultimoID = $Student->SaveStudent(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveStudentByID($id){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentByID($id);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveStudentBySchoolID($schoolID){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveStudentByStudentGroupID($studentGroupID){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentByStudentGroupID($studentGroupID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateStudent($input){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$Student->UpdateStudent(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        
}
 
$oSoapServer = new SoapServer('student_ws.wsdl');
$oSoapServer->setClass("StudentWS");
$oSoapServer->handle();

?>