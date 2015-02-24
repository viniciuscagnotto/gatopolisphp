<?php
 
include_once "class/banco.class.php";
include_once "class/note.class.php";

class NoteWS {
 
        public function LoadAllNotes() {
        	$banco = new banco();
        	$Note = new Note($banco);
        	$rs = $Note->Load();
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadNotesByID($id) {
        	$banco = new banco();
        	$Note = new Note($banco);
        	$rs = $Note->Load($id);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadNotesBySchoolID($schoolID) {
        	$banco = new banco();
        	$Note = new Note($banco);
        	$rs = $Note->LoadBySchoolID($schoolID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadNotesByStudentID($studentID) {
        	$banco = new banco();
        	$Note = new Note($banco);
        	$rs = $Note->LoadByStudentID($studentID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function LoadNotesByTeacherID($teacherID) {
        	$banco = new banco();
        	$Note = new Note($banco);
        	$rs = $Note->LoadByTeacherID($teacherID);
        	$string = $banco->encodeJSON($rs);
        	$banco->desconecta_banco();
        	return $string;
        }
        
        public function SaveNotes($input){
        	$banco = new banco();
        	$Note = new Note($banco);
        	$Note->Save(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveNotesByID($id){
        	$banco = new banco();
        	$Note = new Note($banco);
        	$rs = $Note->RemoveByID($id);
        	$banco->desconecta_banco();
        	return "";	
        }
        
        public function RemoveNotesBySchoolID($schoolID){
        	$banco = new banco();
        	$Note = new Note($banco);
        	$rs = $Note->RemoveBySchoolID($schoolID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveNotesByStudentID($studentID){
        	$banco = new banco();
        	$Note = new Note($banco);
        	$rs = $Note->RemoveByStudentID($studentID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function RemoveNotesByTeacherID($teacherID){
        	$banco = new banco();
        	$Note = new Note($banco);
        	$rs = $Note->RemoveByTeacherID($teacherID);
        	$banco->desconecta_banco();
        	return "";
        }
        
        public function UpdateNotes($input){
        	$banco = new banco();
        	$Note = new Note($banco);
        	$Note->Update(json_decode($input, true));
        	$banco->desconecta_banco();
        	return "";
        }
}
 
$oSoapServer = new SoapServer('note_ws.wsdl');
$oSoapServer->setClass("NoteWS");
$oSoapServer->handle();

?>