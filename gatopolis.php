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
        	$banco = banco::getInstance();
        	$School = new School();
        	$rs = $School->Load();
        	return $banco->encodeJSON($rs);
        }
        
}
 
$oSoapServer = new SoapServer('gatopolis.wsdl');
$oSoapServer->setClass("GatopolisWS");
$oSoapServer->handle();

?>