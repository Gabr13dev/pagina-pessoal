<?php
include 'config.php';
$con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("INSERT INTO `voto`(`id`, `voto`, `ip`) VALUES (NULL,?,?);");
       $sql->execute(array($_GET['voto'],$_SERVER['REMOTE_ADDR']));
	   
header('Location: thanks.php'); 
?>