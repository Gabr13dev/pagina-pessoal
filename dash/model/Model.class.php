<?php
/**
 * @author Gabriel de Almeida
 */
class Model
{
	public $data,$table = [];
	private $control;

	//CONEXÃO COM O BANCO DE DADOS
	/*function __construct()
	{
		try{
			$this->con = new PDO(SERVIDOR, USUARIO, SENHA);
		}catch( PDOException $Exception ) {
			echo '<pre>';
    		$jsOut = '{ "Msg" : "'.$Exception->getMessage( ).'", "Code" : '.$Exception->getCode();
			$jsOut .= ', "Reason" : "Falha ao conectar-se ao Banco de Dados" }';
			echo $jsOut;
			echo '</pre>';
			die();
		}
	}*/

	function __construct(){
		//instancia no objeto control a classe Controller
		$this->control = new Controller();
		//Obtem o arquivo csv e transforma em um array
		$this->data = file(BASE_URL.'/documents/dados.csv');
		//chama a função para organizar os dados
		$this->manipulateDataCsv();
	}

	private function manipulateDataCsv(){
		//obtem o numero de dados
		$rows = count($this->data);
		//separa a primeira linha onde obtem o cabeçalho dos dados
		$csvHead = explode(',',$this->data[0]);
		//separa os dados de cada linha pulando a primeira (0)
		for($i = 1;$i < $rows;$i++){
			$csvLine[$i-1] = explode(',',$this->data[$i]);
		}
		$this->table['head'] = $csvHead;
		$this->table['data'] = $csvLine;
	}

	//retorna os tipos de dados 
	public function getHeadCsv(){
		return $this->table['head'];
	}

	public function getDataCsv(){
		return $this->table['data'];
	}


	//FUNÇÕES DE CONTROLE DO BANCO DE DADOS
	/*public function getData($sql){
	  	$sql = $this->con->prepare($sql);
      	$sql->execute();
      	$r = $sql->fetchAll();
      	return $r;
	}

	public function insertData($sql){
		$sql = $this->con->prepare($sql);
		if($sql->execute() == false){
			return false;
		}else{
			return true;
	 	}
	}

	public function insertDataEncapsule($sql,$data){
		$sql = $this->con->prepare($sql);
		if($sql->execute($data) == false){
			return false;
		}else{
			return true;
	 	}
	}*/

}