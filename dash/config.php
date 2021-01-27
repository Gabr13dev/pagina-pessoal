<?php
ob_start();
session_start();
//error_reporting(0);
header("Content-Type: text/html; charset=utf8");
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
define('BASE_URL', 'https://gabriel-almeida-dev.000webhostapp.com/dash');
define('SERVIDOR', 'mysql:host=localhost;dbname=[NAME_DB];charset=utf8');
define('USUARIO', 'root');
define('SENHA', '');

define('baseTitle', "Dashboard");
define('pasta', "dash");
define('protocol', "https://");

define('SEM_REGISTRO','<div><p><b>Sem registros</b></p></div>');


include('controller/Controller.class.php');
include('model/Model.class.php');
include('lib/Website.class.php');

$Website = new Website();


