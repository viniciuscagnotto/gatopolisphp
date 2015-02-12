<?php
 
include_once "class/banco.class.php";
include_once "class/school.class.php";

class SchoolWS {
 
        public function Load($id = "") {
        	$banco = new banco();
        	$School = new School($banco);
        	$rs = $School->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
}
 
$oSoapServer = new SoapServer('school_ws.wsdl');
$oSoapServer->setClass("SchoolWS");
$oSoapServer->handle();

?>