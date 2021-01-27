<?php
include '../config.php';

$con = new PDO(SERVIDOR, USUARIO, SENHA);

		$sql1 = $con->prepare("SELECT COUNT( id ) AS num FROM  `voto` WHERE voto = 19 ;");
		$sql1->execute();
		$alvaro = $sql1->fetchObject();
		
        $sql2 = $con->prepare("SELECT COUNT( id ) AS num FROM  `voto` WHERE voto = 17 ;");
		$sql2->execute();
		$bolsonaro = $sql2->fetchObject();
		
		$sql3 = $con->prepare("SELECT COUNT( id ) AS num FROM  `voto` WHERE voto = 51 ;");
		$sql3->execute();
		$cabo = $sql3->fetchObject();
?>
<html>
<body>
ALVARO : <?php echo $alvaro->num; ?> <BR>
CABO DACIOLO: <?php echo $cabo->num; ?> <BR>
BOLSONARO : <?php echo $bolsonaro->num; ?> <BR>
</body>
</html>