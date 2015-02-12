<?php
 
include_once "class/banco.class.php";
include_once "class/writtenword.class.php";

class WrittenWordWS {
 
        public function LoadAll() {
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadByID($id) {
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadBySchoolID($schoolID) {
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->LoadBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadByStudentID($studentID, $amount) {
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->LoadByStudentID($studentID, $amount);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function Save($input){
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$WrittenWord->Save(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveByID($id){
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->RemoveByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveBySchoolID($schoolID){
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->RemoveBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveByStudentID($studentID){
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->RemoveByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('writtenword_ws.wsdl');
$oSoapServer->setClass("WrittenWordWS");
$oSoapServer->handle();

?>