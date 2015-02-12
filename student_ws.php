<?php
 
include_once "class/banco.class.php";
include_once "class/student.class.php";

class StudentWS {
 
/*
 * STUDENT GROUP
 */

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
        	$Student->SaveStudentGroup(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
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
        
/*
 * STUDENT
 */
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
        	$Student->SaveStudent(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
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
        
/*
 * STUDENT GROUP TEACHER
 */
        public function LoadAllStudentGroupTeachers() {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacher();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupTeacherByID($id) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacher($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupTeacherBySchoolID($schoolID) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacherBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupTeacherByStudentGroupID($studentGroupID) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacherByStudentGroupID($studentGroupID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadStudentGroupTeacherByTeacherID($teacherID) {
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->LoadStudentGroupTeacherByTeacherID($teacherID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveStudentGroupTeacher($input){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$Student->SaveStudentGroupTeacher(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveStudentGroupTeacherByID($id){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupTeacherByID($id);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveStudentGroupTeacherBySchoolID($schoolID){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupTeacherBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveStudentGroupTeacherByStudentGroupID($studentGroupID){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupTeacherByStudentGroupID($studentGroupID);
        	$banco->desconecta_banco();
        	return "";
        }          
        
        public function RemoveStudentGroupTeacherByTeacherID($teacherID){
        	$banco = new banco();
        	$Student = new Student($banco);
        	$rs = $Student->RemoveStudentGroupTeacherByTeacherID($teacherID);
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('student_ws.wsdl');
$oSoapServer->setClass("StudentWS");
$oSoapServer->handle();

?>