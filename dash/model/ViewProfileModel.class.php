<?php

/**
 * @author Gabriel de Almeida
 */
class ViewProfileModel extends Model
{
	private $Model;
	
	function  __construct()
	{
		$this->Model = new parent();
	}

	public function getAllViewProfile(){
		$sql = "QUERY";
		return $this->Model->getData($sql);
	}

}