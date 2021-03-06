<?php

require_once 'WindowsAzure\WindowsAzure.php';
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Blob\Models\ListBlobsOptions;

class StorageWS {
 
        public function Save($stringToSave, $returnURL) {
        	$connectionString = "DefaultEndpointsProtocol=https;AccountName=gatopolisphpstorage;AccountKey=MKz0r3FP4329Qk6opMqUh5T64GpchgTs1HYwIdPeKfmC0mxrfA75Q11HW5p7SeXQ2CBodAMF1ZEVDDbVSmgMEg==";
        	$blob_name = str_replace(" ", "", "blob_".microtime());
        	$blob_name = str_replace(".", "", $blob_name);
        	$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
        	
        	if($returnURL == 1){
        		$decode = rawurldecode($stringToSave);
        		$blobRestProxy->createBlockBlob("gatopolis", $blob_name.".jpg", $decode);
        		
     		   	$listBlobsOptions = new ListBlobsOptions();
    			$listBlobsOptions->setPrefix($blob_name.".jpg");
    			$blob_list = $blobRestProxy->listBlobs("gatopolis", $listBlobsOptions);
    			$blobs = $blob_list->getBlobs();
    			foreach($blobs as $blob)
    				return $blob->getUrl();
        	}
        	
        	$blobRestProxy->createBlockBlob("gatopolis", $blob_name, $stringToSave);
        	return $blob_name;
        }
        
        public function Get($blobToString) {
        	$connectionString = "DefaultEndpointsProtocol=https;AccountName=gatopolisphpstorage;AccountKey=MKz0r3FP4329Qk6opMqUh5T64GpchgTs1HYwIdPeKfmC0mxrfA75Q11HW5p7SeXQ2CBodAMF1ZEVDDbVSmgMEg==";
        	$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
        	$blob = $blobRestProxy->getBlob("gatopolis", $blobToString);
        	return stream_get_contents($blob->getContentStream());
        }
        
        public function Delete($blobToDelete) {
        	$connectionString = "DefaultEndpointsProtocol=https;AccountName=gatopolisphpstorage;AccountKey=MKz0r3FP4329Qk6opMqUh5T64GpchgTs1HYwIdPeKfmC0mxrfA75Q11HW5p7SeXQ2CBodAMF1ZEVDDbVSmgMEg==";
        	$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
        	$blobRestProxy->deleteBlob("gatopolis", $blobToDelete);
        	return "";
        }
        
       
}
 
$oSoapServer = new SoapServer('storage_ws.wsdl');
$oSoapServer->setClass("StorageWS");
$oSoapServer->handle();

?>