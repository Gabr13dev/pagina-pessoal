<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt" xml:lang="pt-br">
    <head>
        <title>Eleições 2018 - JHCG</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=9">
        <link type="text/css" rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.4.css">
        <link type="text/css" rel="stylesheet" href="css/lib/slick.css"/>
        <link type="text/css" rel="stylesheet" href="css/urna.css" />
        <link type="text/css" rel="stylesheet" href="css/deputado.css" />
        <script type="text/javascript" src="js/lib/jquery.min.js"></script>
        <script type="text/javascript" src="js/lib/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/lib/jquery.pulse.min.js"></script>
        <script type="text/javascript" src="js/lib/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="js/lib/slick.min.js"></script>
        <script type="text/javascript" src="js/lib/jquery.noty.packaged.min.js"></script>
    </head>
    <body bgcolor="#ffffff">
        <div id="conteudo">
            <img id="tela" src="image/tela.jpg" width="451" height="423" border="0">
            <img id="topo" src="image/topo.jpg" width="192" height="183" border="0">
            <img id="faixaDir" src="image/faixaDir.jpg" width="38" height="357" border="0">
            <img id="ladoEsqTec" src="image/ladoEsqTec.jpg" width="19" height="160" border="0">
            <img id="n_1" src="image/n1.jpg" width="51" height="41" border="0" onclick="digita('1')">
            <img id="n_2" src="image/n2.jpg" width="48" height="41" border="0" onclick="digita('2')">
            <img id="n_3" src="image/n3.jpg" width="48" height="41" border="0" onclick="digita('3')">
            <img id="ladoDirTec" src="image/ladoDirTec.jpg" width="26" height="152" border="0">
            <img id="n_4" src="image/n4.jpg" width="51" height="42" border="0" onclick="digita('4')">
            <img id="n_5" src="image/n5.jpg" width="48" height="42" border="0" onclick="digita('5')">
            <img id="n_6" src="image/n6.jpg" width="48" height="42" border="0" onclick="digita('6')">
            <img id="n_7" src="image/n7.jpg" width="51" height="41" border="0" onclick="digita('7')">
            <img id="n_8" src="image/n8.jpg" width="48" height="41" border="0" onclick="digita('8')">
            <img id="n_9" src="image/n9.jpg" width="48" height="41" border="0" onclick="digita('9')">
            <img id="ptabaixo7" src="image/ptabaixo7.jpg" width="51" height="36" border="0">
            <img id="n_0" src="image/n0.jpg" width="56" height="36" border="0" onclick="digita('0')">
            <img id="ptabaixo9" src="image/ptabaixo9.jpg" width="40" height="28" border="0">
            <img id="confirma" src="image/confirma.jpg" width="66" height="49" border="0" onclick="confirma()">
            <img id="branco" src="image/branco.jpg" width="63" height="41" border="0" onclick="branco()">
            <img id="corrige" src="image/corrige.jpg" width="63" height="41" border="0" onclick="corrige()">
            <img id="abaixoTec" src="image/abaixoTec.jpg" width="226" height="27" border="0">
        </div>
        <div id="painel">
            <div id="cabecalho">SEU VOTO PARA</div>
            <div id="cxFoto"><img id="foto" src="" width="135" height="145" /></div>
            <div id="cargo">Presidente</div>
            <div id="numeros">
                <div id="numeroLabel">N&uacute;mero:</div>
                <div id="cxNumero1"></div>
                <div id="cxNumero2"></div>
            </div>
            <div id="avisoInexistente">CANDIDATO INEXISTENTE</div>
            <div id="candidato">
                <div id="candidatoLabel">Nome:</div>
                <div id="candidatoNome"></div>
				<div id="avisoBranco">VOTO EM BRANCO</div>
				<div id="avisoNulo">VOTO NULO</div>
            </div>
            <div id="partido">
                <div id="partidoLabel">Partido:</div>
                <div id="partidoNome"></div>
            </div>
            <div id="resultado"></div>
            <div id="regua"></div>

	        <div id="instrucoes">
                <div id="obs">(voto de legenda)</div>
                <span id="textoInstrucoes">Aperte a tecla:</span><br />
                <span id="verde">CONFIRMA</span><span id ="restoVerde">para CONFIRMAR o voto</span><br />
                <span id="laranja">CORRIGE</span><span id ="restoLaranja">para REINICIAR o voto</span><br />
            </div>
        </div>
        <audio id="audioOps" >
            <source  src="sons/ops.mp3" type="audio/mp3" />
            <source  src="sons/ops.wav" type="audio/wav" />
            <div style="display:none">
                    <object id="mediaPlayer" type="audio/mpeg" width="1" height="1">
                        <param name="src" value="sons/ops.mp3" />
                    </object>
            </div>
        </audio>
        <audio id="audioInter" >
            <source src="sons/inter.mp3" type="audio/mp3" />
            <source src="sons/inter.wav" type="audio/wav" />
            <div style="display:none">
                <object id="mediaPlayer" type="audio/mpeg" width="1" height="1">
                    <param name="src" value="sons/inter.mp3" />
                </object>
            </div>
        </audio>
        
    </body>
</html>
</body>
<script>

function digita(acc){
	div1 = document.getElementById("cxNumero1").innerText;
	div2 = document.getElementById("cxNumero2").innerText;
	if(div1 == ""){
	document.getElementById("cxNumero1").innerText = "" + acc;	
	}else{
	if(div2 != ""){return 0}else{
	document.getElementById("cxNumero2").innerText = "" + acc;
	exibeCandidato();
		}
	}
};

function corrige(){
	document.getElementById("cxNumero1").innerText = "";
	document.getElementById("cxNumero2").innerText = "";
	document.getElementById("candidatoLabel").style.display = "none";
	document.getElementById("candidatoNome").style.display = "none";
	document.getElementById("partidoLabel").style.display = "none";
	document.getElementById("partidoNome").style.display = "none";
	document.getElementById("cxFoto").style.display = "none";
	document.getElementById("avisoInexistente").style.display = "none";
	document.getElementById("avisoNulo").style.display = "none";
	document.getElementById("avisoBranco").style.display = "none";
	document.getElementById("numeros").style.display = "block";
	document.getElementById("foto").style.display = "block";
	document.getElementById("candidato").style.display = "block";
	document.getElementById("partido").style.display = "block";
};

function exibeCandidato(){
	nmCand = document.getElementById("cxNumero1").innerText + document.getElementById("cxNumero2").innerText;
	if(nmCand == "19"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "ALVARO DIAS";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "PODE";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/alvaro.jpg";
	}
	if(nmCand == "51"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "CABO DACIOLO";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "PATRIOTA";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/cabo.jpg";
	}
	if(nmCand == "12"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "CIRO GOMES";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "PDT";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/ciro.jpg";
	}
	if(nmCand == "27"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "EYMAEL";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "DC";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/eymael.jpg";
	}
	if(nmCand == "13"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "FERNANDO HADDAD";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "PT";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/haddad.jpeg";
	}
	if(nmCand == "45"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "ALCKIMIN";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "PSDB";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/alckmin.jpg";
	}
	if(nmCand == "50"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "GUILHERME BOULOS";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "PSOL";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/guilherme.jpeg";
	}
	if(nmCand == "15"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "HENRIQUE MEIRELLES";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "MDB";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/henrique.jpg";
	}
	if(nmCand == "17"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "JAIR BOLSONARO";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "PSL";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/jair.jpg";
	}
	if(nmCand == "30"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "JOÃO AMOEDO";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "NOVO";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/jamoedo.jpg";
	}
	if(nmCand == "54"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "JOÃO GOULART FILHO";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "PPL";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/jgoulart.jpg";
	}
	if(nmCand == "18"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "MARINA SILVA";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "REDE";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/marina.jpeg";
	}
	if(nmCand == "16"){
	document.getElementById("candidatoLabel").style.display = "block";
	document.getElementById("candidatoNome").style.display = "block";
	document.getElementById("candidatoNome").innerText = "VERA LUCIA";
	document.getElementById("partidoLabel").style.display = "block";
	document.getElementById("partidoNome").style.display = "block";
	document.getElementById("partidoNome").innerText = "PSTU";
	document.getElementById("cxFoto").style.display = "block";
	document.getElementById("foto").src = "candidatos/vera.jpg";
	}
	if(nmCand != "19" & nmCand != "51" & nmCand != "12" & nmCand != "27" & nmCand != "13" & nmCand != "45" & nmCand != "50" & nmCand != "15" & nmCand != "17" & nmCand != "30" & nmCand != "54" & nmCand != "18" & nmCand != "16"){
		document.getElementById("avisoInexistente").style.display = "block";
		document.getElementById("avisoNulo").style.display = "block";
	}
};

function branco(){
	document.getElementById("cxNumero1").innerText = "B";	
	document.getElementById("cxNumero2").innerText = "R";
	document.getElementById("avisoBranco").style.display = "block";
	document.getElementById("avisoNulo").style.display = "none";
	document.getElementById("avisoInexistente").style.display = "none";
	document.getElementById("numeros").style.display = "none";
	document.getElementById("foto").style.display = "none";
	document.getElementById("partido").style.display = "none";
}

function confirma(){
	div1 = document.getElementById("cxNumero1").innerText;
	div2 = document.getElementById("cxNumero2").innerText;
	if(div1 == "" || div2 == ""){
	alert("O VOTO NAO PODE SER VAZIO (USE A TECLA 'BRANCO')");
	}else{
	vt = document.getElementById("cxNumero1").innerText + document.getElementById("cxNumero2").innerText;
	window.location.href = "votar.php?voto=" + vt;
	}
}

function ajuda(act){
	if(act == 1){
    $('#myModal').modal('show');
	}
	if(act == 2){
	$('#myModal').modal('hide');
	}
}


</script>
</html>