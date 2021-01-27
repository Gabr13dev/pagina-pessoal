<?php if(!isset($_GET['code'])){ ?> 
<div id="overlay">
  <div id="text">
      <center>
      <img width="60%" src="<?=BASE_URL?>/images/undraw_under_construction_46pa.svg"><br>Intranet em manutenção<Br><span id="smTxt"><?=VERSION?></span></center></div>
</div>
<script>
    document.getElementById("overlay").style.display = "block";
</script>
<?php } ?> 