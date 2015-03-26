<?php
 
include_once "class/bancoms.class.php";
include_once "class/diagnosis.class.php";

class DiagnosisWS {
 
        public function LoadAllDiagnosis() {
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadDiagnosisByID($id) {
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadDiagnosisBySchoolID($schoolID) {
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->LoadBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadDiagnosisByStudentID($studentID) {
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->LoadByStudentID($studentID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadDiagnosisByStudentGroupID($studentGroupID) {
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->LoadByStudentGroupID($studentGroupID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveDiagnosis($input){
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$ultimoID = $Diagnosis->Save(json_decode($input, true));
        	$banco->desconecta_banco();
        	return $ultimoID."";
        }
        
        public function RemoveDiagnosisByID($id){
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->RemoveByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveDiagnosisBySchoolID($schoolID){
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->RemoveBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveDiagnosisByStudentID($studentID){
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$rs = $Diagnosis->RemoveByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateDiagnosis($update){
        	$banco = new bancoMS();
        	$Diagnosis = new Diagnosis($banco);
        	$Diagnosis->Update(json_decode($update, true));
        	$banco->desconecta_banco();
        	return "";
        }
                
}
 
$oSoapServer = new SoapServer('diagnosis_ws.wsdl');
$oSoapServer->setClass("DiagnosisWS");
$oSoapServer->handle();

?>