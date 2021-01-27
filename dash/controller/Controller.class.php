<?php
/*
 *
 * @author Gabriel de Almeida
 */
class Controller
{
	private $WebSite;

	function __construct()
	{
		$this->WebSite = new Website();
	}

	//VERIFICA SE A PAGINA ESTÁ ATIVA
	public function IsActive($thisPage){
		return $this->WebSite->getParameter(1) == $thisPage ? 'exp-active' : 'not';
	}

	//CONVERTE DATA DO FORMATO EUA PARA O FORMATO BRASILEIRO
	public function transformDataBr($data){
		$newData = explode('-', $data);
		return $newData[2].'/'.$newData[1].'/'.$newData[0];
	}

	//OBTEM O DIA DE UMA DATA
	public function getDay($data){
		$result = explode('-', $data);
		return $result[2];
	}

	//TRANSFORMA UMA STRING EM UM TITULO PARA EXIBIÇÃO
	public function nameToView($name){
		return ucwords(mb_strtolower($name, 'UTF-8'));
	}
	
	//RETIRA OS ACENTOS DE UMA STRING
	public function removeAccent($string){
    	$string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    	return strtolower($string);
	}

	//realiza o include e cria uma nova instancia de uma biblioteca
	public function getInstance($class){
		include_once("//lib//".$class.".class.php");
		return new $class;
	}

	//redireciona para a pagina principal
	public function toHome(){
		echo "<script>window.location.href = '".BASE_URL."';</script>";
	}

	//obtem dados de uma outra pagina
	public function cUrl($url){
		// Inicializa a sessão CURL. 
		$ch = curl_init();
		// Retorna o conteudo da pagina 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//pega a URL e passa para a variavel 
		curl_setopt($ch, CURLOPT_URL, $url);
		//executa o curl
		$result = curl_exec($ch);
		//retorna o resultado
		return $result;
	}

	public function getImageForGoogle($profile){
		$termUrl = urlencode($profile);
		$content = $this->cUrl('https://www.google.com/search?q='.$termUrl.'&source=lnms&tbm=isch');
		$img = explode('<img',$content);
		$img = explode(' class="t0fcAb" alt="" src=',$img[8]);
		$img = explode('"/>',$img[1]);
		$out = substr($img[0], 1);
		return $out;
	}

	public function getNameMonth($numberMonth){
		$meses = array(
			1 => 'Janeiro',
			2 => 'Fevereiro',
			3 => 'Março',
			4 => 'Abril',
			5 => 'Maio',
			6 => 'Junho',
			7 => 'Julho',
			8 => 'Agosto',
			9 => 'Setembro',
			10 => 'Outubro',
			11 => 'Novembro',
			12 => 'Dezembro'
		);
		$numberMonth = intval($numberMonth);
		return $meses[$numberMonth];
	}

}