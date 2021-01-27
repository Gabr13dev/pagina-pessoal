const base_url = 'https://sistemas.jhcgadvocacia.com.br/intranet/';

$('#btnLogInit').on('click',function(e){
	if(check_field('')){
	    e.preventDefault();
		auth();
	}else{
		msgLabel('#empty-fields');
	}
})

function check_field(type){
	let log = $('#email'+type).val();
	let pass = $('#pass'+type).val();
		if(log == ""){setClassError('email'+type);}
		if(pass == ""){setClassError('pass'+type);}
		if(log == "" || pass == ""){return false;}
	$('#email'+type).removeClass('input-error');
	$('#pass'+type).removeClass('input-error');
	return true;
}

function setClassError(id){
	$('#'+id).addClass('input-error');
}


function auth(){
	$('#btnLogInit').html('<i class="fa fa-spinner fa-spin"></i>');
	var data = 'email='+ $('#email').val();
	data += '&pass='+ $('#pass').val();
	var xhttp;
  	var resposta;
	  		xhttp = new XMLHttpRequest();
			xhttp.open("POST", base_url+"Action/auth/" , true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.onreadystatechange = function() {
		resposta = xhttp.response;
		if(resposta == 'NULL'){
			showStackTopCenter('error-server');
			$('#btnLogInit').html('Entrar');
		}
		if(resposta == "false"){
			$('#btnLogInit').html('Entrar');
			setClassError('email');
			setClassError('pass');
			msgLabel('#incorrect-data');
  		}
		if(resposta == "true"){
				$('#email').removeClass('input-error');
				$('#pass').removeClass('input-error');
				window.location.href = base_url;
		}
	}
		xhttp.send(data);
	}

	$('#openMsg').on('click',function(){
		openModal("modalMsg");
	})

	function msgLabel(reference){
		$(""+reference).show();
    	$(""+reference).delay(5000).fadeOut(800);
	}

	function openModal(idModal){
		$("#"+idModal).modal();
	}

	function closeModal(idModal){
		$("#"+idModal).modal('hide');
	}