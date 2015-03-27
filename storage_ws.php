<?php

require_once 'WindowsAzure\WindowsAzure.php';
use WindowsAzure\Common\ServicesBuilder;

class StorageWS {
 
        public function Save($stringToSave, $returnURL) {
        	$connectionString = "DefaultEndpointsProtocol=https;AccountName=gatopolisphpstorage;AccountKey=MKz0r3FP4329Qk6opMqUh5T64GpchgTs1HYwIdPeKfmC0mxrfA75Q11HW5p7SeXQ2CBodAMF1ZEVDDbVSmgMEg==";
        	$blob_name = str_replace(" ", "", "blob_".microtime());
        	$blob_name = str_replace(".", "", $blob_name);
        	$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
        	$blobRestProxy->createBlockBlob("gatopolis", $blob_name, $stringToSave);
        	
        	if($returnURL == 1){
        		$blob = $blobRestProxy->getBlob("gatopolis", $blob_name);
        		return $blob->getURI();
        	}
        	
        	return $blob_name;
        }
        
        public function Get($blobToString) {
        	$connectionString = "DefaultEndpointsProtocol=https;AccountName=gatopolisphpstorage;AccountKey=MKz0r3FP4329Qk6opMqUh5T64GpchgTs1HYwIdPeKfmC0mxrfA75Q11HW5p7SeXQ2CBodAMF1ZEVDDbVSmgMEg==";
        	$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
        	$blob = $blobRestProxy->getBlob("gatopolis", $blobToString);
        	return stream_get_contents($blob->getContentStream());
        }
       
}
 
$oSoapServer = new SoapServer('storage_ws.wsdl');
$oSoapServer->setClass("StorageWS");
$oSoapServer->handle();

?>