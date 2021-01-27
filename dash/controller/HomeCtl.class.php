<?php
/**
 * @author Gabriel de Almeida
 */
class HomeCtl extends Controller
{
	public $data = [];
    private $model;

	function __construct()
	{
		$this->model = new HomeModel();
	}

	//METODO QUE PASSA VARIAVEIS A VIEW
	public function main(){
		$data['category'] = $this->getDropDown();
		return $data;
	}

	private function getDropDown(){
		$data = $this->model->getData();
		$names = [];
        $nmb = count($data);
            for($i = 0;$i < $nmb;$i++){
                $name[$i] = $data[$i][0];
			}
			return array_unique($name);
	}

}