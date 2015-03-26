<?php
 
include_once "class/bancoms.class.php";
include_once "class/teacher.class.php";

class TeacherWS {
 
        public function LoadAllTeachers() {
        	$banco = new bancoMS();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadTeachersByID($id) {
        	$banco = new bancoMS();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadTeachersBySchoolID($schoolID) {
        	$banco = new bancoMS();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->LoadBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadTeachersByLogin($email, $passcode) {
        	$banco = new bancoMS();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->LoadByLogin($email, $passcode);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveTeachers($input){
        	$banco = new bancoMS();
        	$Teacher = new Teacher($banco);
        	$ultimoID = $Teacher->Save(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveTeachersByID($id){
        	$banco = new bancoMS();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->RemoveByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveTeachersBySchoolID($schoolID){
        	$banco = new bancoMS();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->RemoveBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateTeachers($input){
        	$banco = new bancoMS();
        	$Teacher = new Teacher($banco);
        	$Teacher->Update(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('teacher_ws.wsdl');
$oSoapServer->setClass("TeacherWS");
$oSoapServer->handle();

?>