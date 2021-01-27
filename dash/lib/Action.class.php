<?php
/*
*
* @author Gabriel Almeida 
*/

class Action {

	private $local,$Control,$Web,$Mod,$dataurl;
	

	function __construct()
	{
		$this->local = $_POST;
		$this->dataurl = $_GET;
		$this->Web = new Website();
		$this->Mod = new Model();
		$this->Control = new Controller();
	}

	function exec(){
		$acao = $this->Web->getParameter(2);
		switch ($acao) {
			case 'getProfile':
				$this->getProfile();
				break;
			case 'ViewProfile':
				$this->ViewProfile();
				break;
			default:
				$this->toScreen('fail','realizar','ação');
				break;
		}
	}

	//obtem os dados da categoria selecionada
	private function getProfile(){
		//recebe a categoria selecionada
		$category = $this->dataurl['name'];
		//obtem os dados do csv
		$data = $this->Mod->getDataCsv();
		//inicializa o array de saida
		$output = [];
		//pecorre os dados e guarda somente os dados necessario
		foreach($data as $key => $search){
			if($search[0] == $category){
				$output[$key]['id'] = $key;
				$output[$key]['nome'] = $search[1];
			}
		}
		//pecorre os dados novamente realizando o filtro para evitar duplicatas
		foreach($output as $filter){
			$search = $filter['nome'];
			$duplicados = array_keys(
				array_filter(
					$output,
					function ($value) use ($search) {
						return (strpos($value['nome'], $search) !== false);
					}
				)
			);
			//evita que todos os dados da duplicata seja apagados
			$countDuplicate = count($duplicados);
			foreach($duplicados as $key => $remove){
				if($key != $countDuplicate-1){
					unset($output[$remove]);
				}
			}
		}
		//imprime um json com o resultado
		echo json_encode($output,JSON_UNESCAPED_UNICODE);
	}

	private function toScreen($type,$action,$what){
	    $callBack_link = $_SERVER['HTTP_REFERER'];
	    $explodeLink = explode("?",$callBack_link);
	    $callBack_link = $explodeLink[0];
	    $_SESSION['action'] = $action; 
	    $_SESSION['what'] = $what;
		echo "<script>window.location.href = '".$callBack_link."?action=".$type."';</script>";
	}
	
	private function toHome(){
	    	echo "<script>window.location.href = '".BASE_URL."';</script>";
	}
	
}