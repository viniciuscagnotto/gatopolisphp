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
        	
        	$data = "";
        	
        	$School->Save($data);
        	$banco->desconecta_banco();
        	return "1";
        }
        
}
 
$oSoapServer = new SoapServer('school_ws.wsdl');
$oSoapServer->setClass("SchoolWS");
$oSoapServer->handle();

?>