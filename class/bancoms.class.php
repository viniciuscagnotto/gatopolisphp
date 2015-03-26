<?php

class bancoMS {

	private static $instance;
	
	//********** VARIÁVEIS PARA CONEXÃO DE BANCO DE DADOS**********//
	private $banco			;
	private $usuario_banco	;
	private $senha_banco	;
	private $host			;
	private $conexao = 0;

	public function __construct() {
		$this->banco = "gatopolis_db";
		$this->usuario_banco = "GPAdmin";
		$this->senha_banco = "GPserver2015";
		$this->host = "daci0gzkgl.database.windows.net";
		$this->conecta_banco();
	}
	
	public function getHost(){
		return $this->host;
	}
	
	/**
	 * @return bancoMS
	 */
	public static function getInstance(){
		if(!self::$instance instanceof bancoMS){
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

	public function conecta_banco() {
		if($this->conexao==1)
			return;
			
		$connectionInfo = array('Database'=>$this->banco,
								'UID'=>$this->usuario_banco,
								'PWD'=>$this->senha_banco);
		$this->conexao = sqlsrv_connect($this->host,$connectionInfo);
	}

	public function executa($sql) {
		if($this->conexao!=1){
			$this->conecta_banco();
		}
		
		if($query = sqlsrv_query($this->conexao, $sql))
			return $query;
		
		return false;
	}

	public function encodeJSON($result){
		$rows = array();
		while($r = sqlsrv_fetch_array($result))
			$rows[] = $r;
		return json_encode($rows);
	}
	
	public function desconecta_banco(){
		sqlsrv_close($this->conexao);
		$this->conexao = 0;
	}

	public function ultimo_id($result){
		sqlsrv_next_result($result);
        sqlsrv_fetch($result);
        return sqlsrv_get_field($result, 0);
	}

}

?>