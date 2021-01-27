<script>
function loadOptions(url,elemId){
  $('#'+elemId).attr('disabled', false);
     fetch(url).then(function(response) {
        response.text().then(function(data){
           var cmd = JSON.parse(data);
           $("#"+elemId).find('option').remove().end();
           $.each(cmd,function(key, value) {
               $("#"+elemId).append('<option value="' + value.nome + '">' + value.nome + '</option>');
            });
        }); 
     });
}

$('#category').on('change', function(){
  loadOptions('<?=BASE_URL?>/action/getProfile?name='+this.value,'profile');
})

$('#btnView').on('click', function(){
   window.location.href = '<?=BASE_URL?>/ViewProfile/'+encodeURI($('#profile').val());
})
</script>