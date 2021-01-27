<?php if(!$Security->isLogged()){ ?>
              <li class="nav-item">
                <span> FATAL ERRO STACK - CODE 5399 - AVISAR A TI</span>
              </li>
              <?php }else{
                  //Gestores e administradores
                  if($Security->getTypeLogin() < 3){
                ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=BASE_URL?>/areaGestor/Home">área do gestor<span class="sr-only"></span></a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="<?php //BASE_URL ?>/areaGestor/Prazos">Prazos<span class="sr-only"></span></a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="<?=BASE_URL?>/areaGestor/Vagas">Vagas<span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=BASE_URL?>/areaGestor/Reuniao">Sala de Reunião<span class="sr-only"></span></a>
              </li>
            <?php }
                //usuarios normais
              if($Security->getTypeLogin() == 3){
                  
              ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=BASE_URL?>/areaColab/Home">área do colaborador<span class="sr-only"></span></a>
              </li>
            <?php  
                
                  }
                }
              ?>
              <li class="nav-item">
                <a class="nav-link" href="<?=BASE_URL?>/Reconhecimento">Reconhecimento<span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled not-upper" href="#" tabindex="-1" aria-disabled="true">Bem-vindo(a), <?=$_SESSION['nome']?></a>
              </li>
              