<?php
 
include_once "class/banco.class.php";
include_once "class/writtenword.class.php";

class WrittenWordWS {
 
        public function LoadAllWrittenWords() {
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadWrittenWordsByID($id) {
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadWrittenWordsBySchoolID($schoolID) {
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->LoadBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadWrittenWordsByStudentID($studentID, $amount) {
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->LoadByStudentID($studentID, $amount);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveWrittenWords($input){
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$ultimoID = $WrittenWord->Save(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveWrittenWordsByID($id){
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->RemoveByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveWrittenWordsBySchoolID($schoolID){
        	$banco = new banco();
        	$WrittenWord = new WrittenWord($banco);
        	$rs = $WrittenWord->RemoveBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveWrittenWordsByStudentID($studentID){
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