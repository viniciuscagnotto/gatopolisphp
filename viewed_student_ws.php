<?php
 
include_once "class/banco.class.php";
include_once "class/student.class.php";

class ViewedStudentWS {
 
     public function LoadAllViewedStudents() {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadViewedStudent();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadViewedStudentByID($id) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadViewedStudent($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadViewedStudentBySchoolID($schoolID) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadViewedStudentBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadViewedStudentByStudentID($studentID) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadViewedStudentByStudentID($studentID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadViewedStudentByTeacherID($teacherID) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadViewedStudentByTeacherID($teacherID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveViewedStudent($input){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$ultimoID = $Student->SaveViewedStudent(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveViewedStudentByID($id){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveViewedStudentByID($id);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveViewedStudentBySchoolID($schoolID){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveViewedStudentBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveViewedStudentByStudentID($studentID){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveViewedStudentByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }          
        
        public function RemoveViewedStudentByTeacherID($teacherID){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveViewedStudentByTeacherID($teacherID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateViewedStudent($update){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$Student->UpdateViewedStudent(json_decode($update, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('viewed_student_ws.wsdl');
$oSoapServer->setClass("ViewedStudentWS");
$oSoapServer->handle();

?>