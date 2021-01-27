<?php

/**
 * @author Gabriel de Almeida
 */
class HomeModel extends Model
{
	private $Model;
	
	function  __construct()
	{
		$this->Model = new Model();
	}

	public function getHead(){
		return $this->Model->getHeadCsv();
	}

	public function getData(){
		return $this->Model->getDataCsv();
	}
	
}