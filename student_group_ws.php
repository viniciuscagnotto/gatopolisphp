<?php
 
include_once "class/banco.class.php";
include_once "class/student.class.php";

class StudentGroupWS {
 
		public function LoadAllStudentGroups() {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroup();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupByID($id) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupBySchoolID($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupBySchoolID($schoolID) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveStudentGroup($input){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$ultimoID = $Student->SaveStudentGroup(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveStudentGroupByID($id){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupByID($id);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveStudentGroupBySchoolID($schoolID){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateStudentGroupTeacher($update){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$Student->UpdateStudentGroup(json_decode($update, true));
        	$banco->desconecta_banco();
        	return "";
        }
}
 
$oSoapServer = new SoapServer('student_group_ws.wsdl');
$oSoapServer->setClass("StudentGroupWS");
$oSoapServer->handle();

?>