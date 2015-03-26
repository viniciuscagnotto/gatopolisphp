<?php
 
include_once "class/bancoms.class.php";
include_once "class/school.class.php";

class SchoolWS {
 
        public function LoadAllSchools() {
        	$banco = new bancoMS();
        	$School = new School($banco);
        	$rs = $School->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadSchoolsByID($id) {
        	$banco = new bancoMS();
        	$School = new School($banco);
        	$rs = $School->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
         
        public function LoadSchoolsByPublicID($publicID) {
        	$banco = new bancoMS();
        	$School = new School($banco);
        	$rs = $School->LoadByPublicID($publicID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadSchoolsBySyncCode($syncCode) {
        	$banco = new bancoMS();
        	$School = new School($banco);
        	$rs = $School->LoadBySyncCode($syncCode);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveSchools($input){
        	$banco = new bancoMS();
        	$School = new School($banco);
        	$ultimoID = $School->Save(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveSchoolsByID($id){
        	$banco = new bancoMS();
        	$School = new School($banco);
        	$rs = $School->RemoveByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveSchoolsByPublicID($publicID){
        	$banco = new bancoMS();
        	$School = new School($banco);
        	$rs = $School->RemoveByPublicID($publicID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveSchoolsBySyncCode($syncCode){
        	$banco = new bancoMS();
        	$School = new School($banco);
        	$rs = $School->RemoveBySyncCode($syncCode);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateSchools($input){
        	$banco = new bancoMS();
        	$School = new School($banco);
        	$School->Update(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
}
 
$oSoapServer = new SoapServer('school_ws.wsdl');
$oSoapServer->setClass("SchoolWS");
$oSoapServer->handle();

?>