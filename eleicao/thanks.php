<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'config.php';
?>
<!DOCTYPE html>
<html  lang="pt-BR">
<title>FIM</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body
{
    background-repeat: no-repeat;
    background-size: 100%;
	background-attachment: fixed;
}
.cl:hover {
transition: transform .2s;
transform: scale(1.05);
}
</style>
<body background="img/BH (1192)2.jpg">
<div class="w3-content w3-padding" style="max-width:1364px">
	<div class="w3-row">
	
<div class="w3-col l4">
  <!-- Blog entry -->
  <div class=" w3-margin">
    <img s style="width:100%">
    <div class="w3-container">
      <h3><b></b></h3>
      <h5><span class="w3-opacity"></span></h5>
    </div>

    <div class="w3-container">
      <p></p>
    </div>
	<div class="w3-row">
        <div class="w3-col l4 s12" style="margin-left:9px">
          <p></p>
        </div>
	   </div>
	 </div>
	</div>
<!-- Blog entries -->
<div class="w3-col l4 s12 w3-hide-medium" style="margin-top:10px">
  <!-- Blog entry -->
  <div>
    <div class="w3-container center">
<img src="img/logo.png" width="95%">
<br><br>
    <div class="w3-container" >
		<form action="pont.php" method="POST">
		<div>
		<br>
     <h4><font color="#ffffff">Obrigado por votar </font><font color="green"><i class="fa fa-check-circle"></font></i></h4>
	 <input class="w3-input" type="text" placeholder="Coloque seu nome para pontuar" autocomplete="off" required name="login"><br>
	 <button  class="btn btn-info" type="submit"><font color="#ffffff">Enviar</font></button>
    </form>
	   </div>
	 </div>
	</div>
  </div>
 </div>
</div>
</div>

<audio controls autoplay="true" style="display:none;">
  <source src="sons/fim.mp3" type="audio/mpeg">
</audio>

</body>
  
</html>