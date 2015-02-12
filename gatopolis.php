<?php
 
include_once "class/banco.class.php";
include_once "class/challenge.class.php";
include_once "class/diagnosis.class.php";
include_once "class/note.class.php";
include_once "class/school.class.php";
include_once "class/student.class.php";
include_once "class/writtenword.class.php";

class GatopolisWS {
 
        public function LoadSchools() {
        	$banco = new banco();
        	$School = new School();
        	$rs = $School->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	
        	return $string;
        }
        
}
 
$oSoapServer = new SoapServer('gatopolis.wsdl');
$oSoapServer->setClass("GatopolisWS");
$oSoapServer->handle();

?>