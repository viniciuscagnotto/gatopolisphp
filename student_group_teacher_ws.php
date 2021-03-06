<?php
 
include_once "class/bancoms.class.php";
include_once "class/student.class.php";

class StudentGroupTeacherWS {
 
     public function LoadAllStudentGroupTeachers() {
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacher();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupTeacherByID($id) {
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacher($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupTeacherBySchoolID($schoolID) {
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacherBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupTeacherByStudentGroupID($studentGroupID) {
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacherByStudentGroupID($studentGroupID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupTeacherByTeacherID($teacherID) {
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacherByTeacherID($teacherID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveStudentGroupTeacher($input){
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$ultimoID = $Student->SaveStudentGroupTeacher(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveStudentGroupTeacherByID($id){
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupTeacherByID($id);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveStudentGroupTeacherBySchoolID($schoolID){
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupTeacherBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveStudentGroupTeacherByStudentGroupID($studentGroupID){
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupTeacherByStudentGroupID($studentGroupID);
        	$banco->desconecta_banco();
        	return "";
        }          
        
        public function RemoveStudentGroupTeacherByTeacherID($teacherID){
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupTeacherByTeacherID($teacherID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateStudentGroupTeacher($update){
        	$banco = new bancoMS();
        	$Student = new Student($banco);
        	$Student->UpdateStudentGroupTeacher(json_decode($update, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('student_group_teacher_ws.wsdl');
$oSoapServer->setClass("StudentGroupTeacherWS");
$oSoapServer->handle();

?>