<?php
 
include_once "class/banco.class.php";
include_once "class/teacher.class.php";

class TeacherWS {
 
        public function LoadAll() {
        	$banco = new banco();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadByID($id) {
        	$banco = new banco();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadBySchoolID($schoolID) {
        	$banco = new banco();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->LoadBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadByLogin($email, $passcode) {
        	$banco = new banco();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->LoadByLogin($email, $passcode);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function Save($input){
        	$banco = new banco();
        	$Teacher = new Teacher($banco);
        	$Teacher->Save(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveByID($id){
        	$banco = new banco();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->RemoveByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveBySchoolID($schoolID){
        	$banco = new banco();
        	$Teacher = new Teacher($banco);
        	$rs = $Teacher->RemoveBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function Update($input){
        	$banco = new banco();
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