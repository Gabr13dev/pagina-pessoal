<?php
/**
 * @author Gabriel de Almeida
 */
class ViewProfileCtl extends Controller
{
	public $profile,$data = [];
    private $model,$control,$website;

	function __construct()
	{
		$this->profileModel = new ViewProfileModel();
		$this->model = new Model();
		$this->control = new parent();
		$this->website = new Website();
		if($this->website->countArrayParam() < 2){
			$this->control->toHome();
		}else{
			if(empty($this->website->getParameter(2))){
				$this->control->toHome();
			}
			$this->profile = urldecode($this->website->getParameter(2));
		}
	}

	public function main(){
		$data['image'] = $this->getImage($this->profile);
		$data['dataFollowersFacebook'] = $this->facebookChartValue();
		$data['dataFollowersInstagram'] = $this->instagramChartValue(); 
		$data['dataFollowersTwitter'] = $this->twitterChartValue();
		$data['dataFollowersNames'] = $this->facebookChartNames();
		$data['title'] = urldecode($this->website->getParameter(2));
		return $data;
	}

	private function twitterChartValue(){
		$data = $this->dataForChartFollowers('twitter_fans');
		$output = '[';

		foreach($data as $key => $facebook){
			$output .= '"'.$facebook['twitter_fans'].'",';
		}
		$output = substr($output, 0, -1);
		$output .= ']';
		return $output;
	}

	private function instagramChartValue(){
		$data = $this->dataForChartFollowers('instagram_seguidores');
		$output = '[';

		foreach($data as $key => $facebook){
			$output .= '"'.$facebook['instagram_seguidores'].'",';
		}
		$output = substr($output, 0, -1);
		$output .= ']';
		return $output;
	}

	private function facebookChartValue(){
		$data = $this->dataForChartFollowers('facebook_seguidores');
		$output = '[';

		foreach($data as $key => $facebook){
			$output .= '"'.$facebook['facebook_seguidores'].'",';
		}
		$output = substr($output, 0, -1);
		$output .= ']';
		return $output;
	}

	private function facebookChartNames(){
		$data = $this->dataForChartFollowers('facebook_seguidores');
		$output = '[';
		foreach($data as $key => $facebook){
			$output .= '"'.$facebook['mes'].'",';
		}
		$output = substr($output, 0, -1);
		$output .= ']';
		return $output;
	}
	
	private function viewProfile($prof){
		//obtem os dados do csv
		$data = $this->model->getDataCsv();
		//inicializa o array de saida
		$output = [];
		//pecorre os dados e guarda somente os dados necessario
		foreach($data as $key => $search){
			if($search[1] == $prof){
				$output[$key] = $search;
			}
		}
		//TRANSFORMA O ARRAY EM UM JSON
		$output = json_encode($output,JSON_UNESCAPED_UNICODE);
		//array com os caracteres a ser retirados
		$toReplace = ['\\n'];
		//retira caracteres desnecessarios
		$output = str_replace($toReplace,'',$output);
		return $output;
	}

	//chama a função de imagem da controller
	private function getImage($profile){
		return $this->control->getImageForGoogle($profile);
	}

	//trata os dados recebidos para ser visualizado
	private function dataToView(){
		$data = $this->viewProfile($this->profile);
		//Transforma o JSON em um array php
		$data = json_decode($data);
		//pecorre os dados e os organiza
		foreach($data as $key => $filter){
			$output[$key]['categoria'] = $filter[0];
			$output[$key]['perfil'] = $filter[1];
			$output[$key]['mes'] = $filter[2];
			$output[$key]['ano'] = $filter[3];
			$output[$key]['facebook_seguidores'] = $filter[4];
			$output[$key]['facebook_curtidas'] = $filter[5];
			$output[$key]['facebook_curtidas'] = $filter[6];
			$output[$key]['facebook_comentarios'] = $filter[7];
			$output[$key]['facebook_postagens'] = $filter[8];
			$output[$key]['instagram_seguidores'] = $filter[9];
			$output[$key]['instagram_comentarios'] = $filter[10];
			$output[$key]['instagram_postagens'] = $filter[11];
			$output[$key]['instagram_curtidas'] = $filter[12];
			$output[$key]['twitter_fans'] = $filter[13];
			$output[$key]['twitter_postagens'] = $filter[14];
			$output[$key]['twitter_curtidas'] = $filter[15];
		}
		return $output;
	}

	//trata os dados para  o grafico de evolução de seguidores
	private function dataForChartFollowers($type){
		$data = $this->dataToView();
		$output = [];
		foreach($data as $key => $followers){
			$output[$key]['mes'] = $this->control->getNameMonth($followers['mes']);
			$output[$key][$type] = $followers[$type];
		}
		return $output;
	}



}