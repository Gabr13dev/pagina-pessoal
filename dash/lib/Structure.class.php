<?php

class Structure {
public $namePage;

static function getNamepage($currentPage){
	$page = explode(".", $currentPage);
	$pageName = $page[0];
	if($pageName == "index"){
		$result = "Inicio";
	}elseif($pageName == "Produto"){
		$url = $_SERVER["REQUEST_URI"];
		$url = explode("/", $url);
		$Produto = $url[count($url)-2];
		$arr_rp = ['-','+','/','%20'];
		$result = str_replace($arr_rp," ",$Produto);
		$result = "Produto " . $result;
	}elseif($pageName == 'areaGestor'){
		$result = "Área Gestor";
	}else{
		$arr_rp = ['-','_'];
		$result = str_replace($arr_rp," ",$pageName);
	}
	return  baseTitle . " - " . $result;
	}

static function getBaseInc(){
				$base = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				$base = explode("/",$base);
				$num = count($base);

		return $num;
		}

static function getWayInc(){
				$way = protocol . $_SERVER['SERVER_NAME'] ."/". pasta ."/";
				return $way;
		}

}
?>