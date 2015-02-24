<?php
 
include_once "class/banco.class.php";
include_once "class/diagnosis.class.php";

class DiagnosisWS {
 
        public function LoadAllDiagnosis() {
        	$banco = new banco();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadDiagnosisByID($id) {
        	$banco = new banco();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadDiagnosisBySchoolID($schoolID) {
        	$banco = new banco();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->LoadBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadDiagnosisByStudentID($studentID) {
        	$banco = new banco();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->LoadByStudentID($studentID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadDiagnosisByStudentGroupID($studentGroupID) {
        	$banco = new banco();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->LoadByStudentGroupID($studentGroupID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveDiagnosis($input){
        	$banco = new banco();
        	$Diagnosis = new Diagnosis($banco);
        	$Diagnosis->Save(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveDiagnosisByID($id){
        	$banco = new banco();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->RemoveByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveDiagnosisBySchoolID($schoolID){
        	$banco = new banco();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->RemoveBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveDiagnosisByStudentID($studentID){
        	$banco = new banco();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->RemoveByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }
                
}
 
$oSoapServer = new SoapServer('diagnosis_ws.wsdl');
$oSoapServer->setClass("DiagnosisWS");
$oSoapServer->handle();

?>