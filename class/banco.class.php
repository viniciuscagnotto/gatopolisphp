<?php

class banco {

	private static $instance;
	
	//********** VARIÁVEIS PARA CONEXÃO DE BANCO DE DADOS**********//
	private $banco			;
	private $usuario_banco	;
	private $senha_banco	;
	private $host			;
	private $conexao = 0;

	private function __construct() {
		$this->banco = "gatopolisphpdb";
		$this->usuario_banco = "b33f81945fc541";
		$this->senha_banco = "a2536739";
		$this->host = "br-cdbr-azure-south-a.cloudapp.net";
		conecta_banco();
	}
	
	
	public function getHost(){
		return $this->host;
	}
	
	/**
	 * @return banco
	 */
	public static function getInstance(){
		if(!self::$instance instanceof banco){
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

	function conecta_banco() {
		if($this->conexao==1)
			return;
			
		$this->conexao= @mysql_connect($this->host, $this->usuario_banco, $this->senha_banco) or die ("Não foi possível conectar no banco de dados");
		mysql_select_db($this->banco) or die ("Não foi possível selecionar o banco");
	}

	function executa($sql) {
		//echo $sql;
		if($this->conexao!=1){
			$this->conecta_banco();
		}
		
		if ( $query = mysql_query ($sql))
			return $query;
		
		return false;
	}

	function encodeJSON($result){
		$rows = array();
		while($r = mysql_fetch_assoc($result))
			$rows[] = $r;
		return json_encode($rows);
	}
	
	function sql_array($resultado){
		if($this->contagem($resultado)>0){
			$valor=mysql_fetch_array($resultado);
			return $valor;
		}else{
			return false;
		}
	}

	function sql_assoc($resultado){
		if($this->contagem($resultado)>0){
			$valor=mysql_fetch_assoc($resultado);
			return $valor;
		}else{
			return false;
		}
	}

	function sql_row($resultado){
		if($this->contagem($resultado)>0){
			$valor=mysql_fetch_row($resultado);
			return $valor;
		}else{
			return false;
		}
	}

	function sql_object($resultado){
		if($this->contagem($resultado)>0){
			$valor=mysql_fetch_object($resultado);
			return $valor;
		}else{
			return false;
		}
	}

	
	
	/**
	 * Volta o ponteiro do recordset para a
	 * posição inicial
	 *
	 * @param resource $rs
	 * @return resource
	 */
	public function rsReset($rs){
		if($rs!==false && $this->contagem($rs)>0){
			return mysql_data_seek($rs,0);
		}
			
	}
	
	function contagem($resultado){
		$quantidade=mysql_num_rows($resultado);
		return $quantidade;
	}

	function linha($resultado,$linha,$campo){
		if($linha < $this->contagem($resultado)){
			return @mysql_result($resultado,$linha,$campo);
		}else{
			return null;
		}
	}
	
	
	public function freeResult($rs){
		return mysql_free_result($rs);		
	}


	function desconecta_banco(){
		mysql_close($this->conexao);
	}

	function ultimo_id(){
		return mysql_insert_id();
	}

	
	function describe($tabela,$coluna){
		$sql="describe $tabela $coluna";
		$resultado=$this->executa($sql);
		$campo=$this->linha($resultado,0,"Type");
		$campo=str_replace("enum('","",$campo);
		$campo=str_replace("set('","",$campo);
		$campo=str_replace("')","",$campo);
		return explode("','",$campo);
	}



	function prepara_set($campo){

		$campo_formatado="";
		$campo_formatado.="('";
		if(is_array($campo)){
			foreach($campo as $valor){
				$campo_formatado.="$valor,";
			}
			$campo_formatado = substr($campo_formatado,0,-1);
		}
		$campo_formatado.="')";
		return $campo_formatado;

	}



	function sql_in($array){
		$where_in="";
		if(is_array($array)){
			foreach($array as $codigo){
				$where_in.="$codigo,";
			}
		}else{
			$where_in.=$array .",";
		}
		
		return $where_in=substr($where_in,0,-1);
	}

	function sql_in_string($array){
		$where_in="";
		if(is_array($array)){
			foreach($array as $codigo){
				$where_in.="'{$codigo}',";
			}
		}else{
			$where_in.="'{$array}',";
		}
		
		return $where_in=substr($where_in,0,-1);
	}

	function data_banco($string,$separador,$completo=false){

		$dia=$string;

		if($completo===true){

			if(strlen($string)==19){

				$data = explode(" ",$string);
				$dia = $data[0];

				$hora=substr($data[1],0,-3);

			}else{

				$dia="0000-00-00";

			}

		}else{

			if(!strlen($string)==10){

				$dia="0000-00-00";

			}

		}

		if($dia!="0000-00-00"){
			$data_array = explode("-",$dia);

			$data_formatada=$data_array[2] ."$separador". $data_array[1] ."$separador". $data_array[0];

			if($completo===true){
				$data_formatada.= " às $hora";
			}
		}else{
			$data_formatada="";
		}

		return $data_formatada;

	}


	function retorna_campo($campo,$tabela,$campo_procura,$codigo){

		if($codigo!="" && $tabela!="" && $campo!="" && $campo_procura!=""){

			$sql="select $campo from $tabela where $campo_procura=$codigo";
			$rs=$this->executa($sql);

			if($rs!==false && $this->contagem($rs)>0){

				$valor = $this->sql_assoc($rs);
				return $valor[$campo];

			}

		}

		return "";

	}

	function inserir($tabela,$array){
		if(is_array($array)){
			$str_ini="insert into $tabela";
			$str_campo=" (";
			$str_valor=" values (";

			foreach($array as $indice=>$valor){
				$str_campo.="$indice,";
				if($valor=="'null'" || $valor==NULL || trim($valor)=="''"){
					$valor = "null";
				}
				$str_valor.="$valor,";
			}
			$str_campo=substr($str_campo,0,-1) . ")";
			$str_valor=substr($str_valor,0,-1) . ")";

			$this->sql=$str_ini . $str_campo . $str_valor;


			if (isset($_SESSION['debug']))
			{
				//echo $this->sql."<br>";
			}
			//echo $this->sql;
			return $this->executa($this->sql);
		}else{
			return false;
		}

	}

	function last_id ($tabela,$campo,$criterio="")
	{
		$sql = "SELECT * FROM ".$tabela." ".$criterio." ORDER BY ".$campo." DESC LIMIT 1";

		//echo $sql;

		$query = $this->executa($sql);
		$resultado = $this->sql_assoc($query);
		return ( $resultado[$campo]);
	}


	function inserir_multi($tabela,$fixo,$variavel){

		if(is_array($fixo) and is_array($variavel)){
			$str_ini="insert into $tabela";
			$str_campo=" (";
			$str_valor=" values ";
			$str_fixo="";

			foreach($fixo as $indice=>$valor){
				$str_campo.="$indice,";
				$str_fixo.="$valor,";
			}

			foreach($variavel as $indice=>$valor){
				$str_campo.="$indice,";

				foreach($variavel[$indice] as $subvalor){

					$str_valor.= "(". $str_fixo;
					$str_valor.="$subvalor),";

				}

			}

			$str_campo=substr($str_campo,0,-1) . ")";
			$str_valor=substr($str_valor,0,-2) . ")";

			$this->sql=$str_ini . $str_campo . $str_valor;

			//echo $this->sql."<BR>";

			return $this->executa($this->sql);

		}else{

			return false;

		}

	}



	function inserir_multi_novo($tabela,$fixo,$variavel){

		$campo_variavel = false;

		if(is_array($fixo) and is_array($variavel)){
			$str_ini="insert into $tabela";
			$str_campo=" (";
			$str_valor=" values ";
			$str_fixo="";

			foreach($fixo as $indice=>$valor){
				$str_campo.="$indice,";
				$str_fixo.="$valor,";
			}

			foreach($variavel as $valor){

				$str_valor.= "(". $str_fixo;

				//echo $valor."<br>";
				foreach($valor as $chave => $subvalor){

					if($campo_variavel===false){
						$str_campo.="$chave,";
					}


					$str_valor.="$subvalor,";

				}

				$str_valor=substr($str_valor,0,-1) ."), ";

				$campo_variavel = true;
			}

			$str_campo=substr($str_campo,0,-1) . ")";
			$str_valor=substr($str_valor,0,-2);

			$this->sql=$str_ini . $str_campo . $str_valor;


			//echo $this->sql."<br>";

			return $this->executa($this->sql);

		}else{

			return false;

		}

	}

	function atualizar($tabela,$array,$criterio){
		if($criterio!=""){
			if(is_array($array)){
				$str_ini="update $tabela set ";
				$str_campo="";

				foreach($array as $indice=>$valor){

					if ( !empty($valor) || $valor==0 )
					{
						
						if($valor=="'null'" || $valor==NULL || trim($valor)=="''"){
							$valor = "null";
						}
						$str_campo.="$indice=$valor,";
					}
				}
				$str_campo=substr($str_campo,0,-1);


				$this->sql=$str_ini . $str_campo . $criterio;

				if ( isset($_SESSION['debug']))
				{
					echo $this->sql."<br>";	
				}

				return $this->executa($this->sql);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function begin()
	{
		$this->executa('begin');
	}

	function rollback()
	{
		$this->executa('rollback');
	}

	function commit()
	{
		$this->executa('commit');
	}
	
	function buscarTabelas(){
		$rs = $this->executa("show tables");
		$arrayTabelas = array();
		if($rs !== false && $this->contagem($rs) > 0){
			while($dados = $this->sql_assoc($rs)){
				$arrayTabelas[$dados["Tables_in_".$this->banco]] = $dados["Tables_in_".$this->banco]; 
			}
		}

		return $arrayTabelas;
	}
	
	function buscarCampos($tabela, $campo=""){
		$rs = $this->executa("show columns from ".$tabela);
		
		if($campo == ""){
			return $rs;
		}else{
			$campoEncontrado = false;
			while($dados = $this->sql_assoc($rs)){
				if($dados["Field"] == $campo){
					$campoEncontrado = true;
				}
			}	
			
			return $campoEncontrado;
		}	
	}

	/**
	 * Monta e valida um rs conforme parametros.
	 * @param string  $sql
	 * @param string  $comparacao
	 * @param integer $count
	 */
	function montarRs($sql, $comparacao="maiorIgual", $count=1){
		$rs	= $this->executa($sql);
		if($rs!=false){
			switch ($comparacao){
				case "igual":
						if($this->contagem($rs) == $count){
							return $rs;
						}else{
							return false;
						}
					break;
				case "maiorIgual":
						if($this->contagem($rs) >= $count){
							return $rs;
						}else{
							return false;
						}
					break;
				case "menor":
						if($this->contagem($rs) < $count){
							return $rs;
						}else{
							return false;
						}
					break;
				case "menorIgual":
						if($this->contagem($rs) <= $count){
							return $rs;
						}else{
							return false;
						}
					break;
				case "diferente":
						if($this->contagem($rs) <> $count){
							return $rs;
						}else{
							return false;
						}
					break;
				default:
						if($this->contagem($rs) == $count){
							return $rs;
						}else{
							return false;
						}
					break;
			}
		}
		return false;
	}
	
	/** Retorna contexto de uma operadcao para uso em consultas sql 
	 * @access public
	 * @param $valor
	 * @param $operador (string)
	 */
	public function operacao($valor,$operador){
		switch ($operador){
				case "igual":
						return "= '{$valor}'";
					break;
				case "maiorIgual":
						return ">= '{$valor}'";
					break;
				case "menor":
						return "< '{$valor}'";
					break;
				case "menorIgual":
						return "<= '{$valor}'";
					break;
				case "diferente":
						return "<> '{$valor}'";
					break;
				case "LIKE":
						return "LIKE '%{$valor}%' ";
					break;
				default:
						return "= {$valor}";
					break;
			}
	}

}

?>