<?php
include 'config.php';
$con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("INSERT INTO `usuario`(`id`, `nome`) VALUES (NULL,?);");
       $sql->execute(array($_POST['login']));
	   
header('Location: ../index.php'); 
?>