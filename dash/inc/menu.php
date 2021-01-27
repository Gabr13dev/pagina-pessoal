<?php
  $structure = new Structure();
  echo '<title>'.$structure->getNamepage($site).'</title>';
?>
 <nav class="navbar  px-4 navbar-expand-lg navbar-dark bg-success mb-4">
          <a class="navbar-brand" href="<?=BASE_URL?>">Dashboard</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" id="ul-menu">
              <li class="nav-item">
                <a class="nav-link" href="<?=BASE_URL?>/">home <span class="sr-only">(current)</span></a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto" id="explore">
                <span class="fa fa-th font-white sz-20 hv-dark" data-toggle="modal" data-target="#exampleModalCenter"></span>
            </ul>
          </div>
        </nav>
    <?php
            include_once "inc/modal/modal_menu.php";
    ?>