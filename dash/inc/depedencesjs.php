<?php
$files_arrayjs = ['js/popper.min.js','js/bootstrap.min.js','js/moments.min.js','js/bootstrap-datetimepicker.js','js/nouislider.min.js','js/main.js','js/notify.js','js/intra.js','js/summernote.min.js'];
foreach ($files_arrayjs as $archivejs) {
$b = protocol.$_SERVER['SERVER_NAME']."/".pasta."/".$archivejs;
echo '<script type="text/javascript" src="'.$b.'"></script>';
}

  //script for show messages
  if(isset($_GET['action'])){
    if($_GET['action'] == 'success'){
      echo '<script> msgLabel("#certoMsg");</script>';
    }
    if($_GET['action'] == 'fail'){
      echo '<script> msgLabel("#erroMsg");</script>';
    }
  }
?>
<script type="text/javascript">
  //NOMEAR ELEMENTO PAI <li> DO MENU COM ID lista_menu
  var tag_li = document.getElementById('ul-menu');
  var tag_a = tag_li.getElementsByTagName('a');
  for (i=0; i < tag_a.length; i++ )
  {
    vars = tag_li.getElementsByTagName("a")[i].getAttribute("href");
     var url = window.location.href;
     //var path = url.split("/");
     //vars2 = "/" + path[1] + "/" + path[2];
    if (vars == url){
      tag_li.getElementsByTagName("li")[i].classList.add("active");
    }
  }
  
    $('.rej').on('click',function(e){
        $('#id_key').val(e.target.id.replace('reject_',''));
        $('#modalReject').modal(); 
    })
  
  $('#btnVideos').on('click',function(){
      $('#btnFotos').removeClass("active").addClass("inactive");
      $('#btnTreina').removeClass("active").addClass("inactive");
      $('#btnVideos').addClass("active").removeClass("inactive");
      $('#galleryPictures').hide();
      $('#galleryTreina').hide();
      $('#galleryVideos').show();
  })
  
   $('#btnTreina').on('click',function(){
      $('#btnFotos').removeClass("active").addClass("inactive");
      $('#btnTreina').addClass("active").removeClass("inactive");
      $('#btnVideos').removeClass("active").addClass("inactive");
      $('#galleryVideos').hide();
      $('#galleryPictures').hide();
      $('#galleryTreina').show();
  })
  
  $('#btnFotos').on('click',function(){
      $('#btnVideos').removeClass("active").addClass("inactive");
      $('#btnTreina').removeClass("active").addClass("inactive");
      $('#btnFotos').addClass("active").removeClass("inactive");
      $('#galleryVideos').hide();
      $('#galleryTreina').hide();
      $('#galleryPictures').show();
  })
  
  function hideAll(){
       $('#myKeys').hide();
       $('#admKeys').hide();
       $('#addKey').hide();
  }
  
  $('#adk').on('click',function(){
      $('#mk').removeClass("active").addClass("inactive");
      $('#keyadm').removeClass("active").addClass("inactive");
      $('#adk').addClass("active").removeClass("inactive");
      hideAll();
      $('#addKey').show();
  })
  
  $('#mk').on('click',function(){
      $('#adk').removeClass("active").addClass("inactive");
      $('#keyadm').removeClass("active").addClass("inactive");
      $('#mk').addClass("active").removeClass("inactive");
      hideAll();
      $('#myKeys').show();
  })
  
  $('#keyadm').on('click',function() {
      $('#keyadm').addClass("active").removeClass("inactive");
      $('#mk').removeClass("active").addClass("inactive");
      $('#adk').removeClass("active").addClass("inactive");
      hideAll();
      $('#admKeys').show();
  })
  
   function viewPicture(index){
            $('#pictureBox').attr('src',"/midia/gallery ("+index+").jpeg");
            $('#modalDetail').modal();
        }
        
  function limite_textarea(valor) {
    quant = 300;
    total = valor.length;
    if(total <= quant) {
        resto = quant - total;
        document.getElementById('caracLimit').innerHTML = resto;
    } else {
        document.getElementById('ComentTxtArea').value = valor.substr(0,quant);
    }
}
  
  
  
  function selectpage(btnId,divID,prefixClassDiv,prefixClassBtn){
    let collectionDiv = $("."+prefixClassDiv);
    for(var i = 0;i < collectionDiv.Lenght;i++){ 
        collectionDiv[i].hide();
    }
    let collectionBtn = $('.'+prefixClassBtn);
    for(var i = 0;i < collectionBtn.Lenght;i++){
        collectionBtn[i].removeClass('active').addClass('inactive');
    }
    $("#"+divID).show();
    $("#"+btnId).addClass('active').removeClass('inactive');
}
  
var arrSelect = [];
  
  function selectKey(id){
    let index = arrSelect.indexOf(id);
    if(index == -1){
         arrSelect.push(id);
         $('#'+id).addClass('selected');
         $('#listKeys').val(arrSelect.join('/'));
      }else{
        arrSelect.splice(index, 1);
        $('#'+id).removeClass('selected');
        $('#listKeys').val(arrSelect.join('/'));
      }
  }
 
  
  

  $(document).ready(function() {
    //$('#summernote').summernote();
    $("#summernote").summernote({
    lang: 'pt-BR',
    height: 500,
    minHeight: 500,
    maxHeight: null,
    }); 
    $('.note-editor').css('border-radius','30px');
     });
</script>