$(function (){

    $(this).mousedown(function (e) {
            var ide = e.target.id;

            //Aqui serÃ£o feitas as aÃ§Ãµes quando se aperta o botÃ£o CONFIRMA
            if(ide == "confirma"){
				if($("#habilitaConfirma").text() == "true"){
                   $('#' + ide).attr("src","image/" + ide + "_down.jpg");                   
				   try { $('#audioInter').get(0).play();} catch(e){}
				   setTimeout(function(){   $(location).attr('href','depEstadual.html');   },500);
			    }else{
                        try { $('#audioOps').get(0).play(); } catch(e){}
                        notifica('information','Para <strong>CONFIRMAR</strong> seu voto Ã© necessÃ¡rio escolher os dois primeiros nÃºmeros<br /> ou votar em BRANCO.<br /><br />[ FECHAR ]');
                }
            }

            //Aqui serÃ£o feitas as aÃ§Ãµes quando se aperta os botÃµes com nÃºmeros
            if(ide.substring(0, 2) == 'n_'){

                //desabitar utilizaÃ§Ã£o de nÃºmeros
                if($("#habilitaNumeros").text() == "false"){
                        try { $('#audioOps').get(0).play(); } catch(e){}
                        notifica('information','Nesta situaÃ§Ã£o a utilizaÃ§Ã£o de qualquer nÃºmero estÃ¡ bloqueada!');
                        return false;
                }
                //Flag utilizada para habilitar/desabilitar utilizaÃ§Ã£o do botao Corrige
                $("#habilitaCorrige").text("true");

                matriz = ide.split("_");
                $('#' + ide).attr("src","image/" + ide.substr(0, 1) + ide.substr(2, 1) + "_down.jpg");

                if($("#cxNumero1").text().length == 0){
                    $('#cxNumero1').text(matriz[1]);
                    $('#cxNumero1').finish();
                    $("#cxNumero2").effect( "pulsate", {times:20}, 25000 );

				}else if($("#cxNumero2").text().length == 0){
                    $('#cxNumero2').text(matriz[1]);
                    $("#cxNumero2").finish();
                    $("#cxNumero3").effect( "pulsate", {times:20}, 25000 );
					$("#numeroLabel").show();
					$("#cabecalho").show();
                    $("#obs").show();
					$("#regua").show();
                    $("#instrucoes").show();
					$("#habilitaConfirma").text("true");
                    num = $("#cxNumero1").text() + $("#cxNumero2").text();
                    mostrarPartido(num);

				}else if($("#cxNumero3").text().length == 0){
                    $('#cxNumero3').text(matriz[1]);
                    $("#cxNumero3").finish();
                    $("#cxNumero4").effect( "pulsate", {times:20}, 25000 );

                }else if($("#cxNumero4").text().length == 0){
                    $('#cxNumero4').text(matriz[1]);
                    $("#cxNumero4").finish();
                    num = $("#cxNumero1").text() + $("#cxNumero2").text() + $("#cxNumero3").text() + $("#cxNumero4").text();
                    mostrarCandidato(num,"deputadoFederal");
                }

            }

    });

});