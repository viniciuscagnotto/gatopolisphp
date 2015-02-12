<?php
 
include_once "class/banco.class.php";
include_once "class/school.class.php";

class SchoolWS {
 
        public function LoadAll() {
        	$banco = new banco();
        	$School = new School($banco);
        	$rs = $School->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadByID($id) {
        	$banco = new banco();
        	$School = new School($banco);
        	$rs = $School->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadByPublicID($publicID) {
        	$banco = new banco();
        	$School = new School($banco);
        	$rs = $School->LoadByPublicID($publicID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadBySyncCode($syncCode) {
        	$banco = new banco();
        	$School = new School($banco);
        	$rs = $School->LoadBySyncCode($syncCode);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function Save($input){
        	$banco = new banco();
        	$School = new School($banco);
        	$School->Save(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveByID($id){
        	$banco = new banco();
        	$School = new School($banco);
        	$rs = $School->RemoveByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveByPublicID($publicID){
        	$banco = new banco();
        	$School = new School($banco);
        	$rs = $School->RemoveByPublicID($publicID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveBySyncCode($syncCode){
        	$banco = new banco();
        	$School = new School($banco);
        	$rs = $School->RemoveBySyncCode($syncCode);
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('school_ws.wsdl');
$oSoapServer->setClass("SchoolWS");
$oSoapServer->handle();

?>