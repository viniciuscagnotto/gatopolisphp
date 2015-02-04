<?php
 
class UserFacade {
 
        /**
         * @return string
         */
        public function getUser() {
 
                $sName = 'MeuNome';
                $sName .= ' MeuSobrenome';
 
                return $sName;
        }
}
 
$oSoapServer = new SoapServer('service.wsdl');
$oSoapServer->setClass("UserFacade");
$oSoapServer->handle();
?>