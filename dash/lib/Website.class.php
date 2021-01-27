<?php
/*
 *
 * @author Gabriel. Almeida
 */
class Website
{
	//EXECUTA OS INCLUDES PRINCIPAIS COMO MODEL E CONTROLLER DEFAULT
    public function run(){
        //$this->forceSslLink();
        $rotas = $this->getRotas();
        $this->isAction($rotas[1]);
		$arquivo = $rotas[1].".php";
		include_once "inc/padrao.php";
	    if(file_exists("view/".$arquivo)){
	  		include_once "controller/".$rotas[1]."Ctl.class.php";
	  		include_once "model/".$rotas[1]."Model.class.php";
	  		include_once 'inc/Head.php';
	  		$the_page = $arquivo;
 		 }else{
             $the_page = '404.php';
         }
		 $this->render($the_page); 
    }
    
    //OBTEM O NOME DA PAGINA A SER ACESSADA
    private function getRotas(){
        $url = ltrim(parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH ) , '/' );
        $rota = explode( '/' , $url );
        empty($rota[1]) ? $rota[1] = 'Home' : '';
        return $rota;
    }

    //VERIFICA SE O LINK ACESSADO É UMA AÇÃO A SER EXECUTADA
    private function isAction($route){
        if($route == 'Action' || $route == 'action'){
            include_once "lib/Action.class.php";
            $Action = new Action();
            $Action->exec();
            die();
        }
    }
    
    //RENDERIZA A PAGINA ACESSADA E REALIZA OS INCLUDES PROPIOS
    //REALIZA OS INCLUDE E INJEÇÕES DAS DEPENDENCIAS (CSS,JS)
    private function render($site){
        //$this->loggedIn();
        $Control = new Controller();
        if($site != '404.php'){
            $PageControl = $this->getRotas()[1].'Ctl';
            $objSite = new $PageControl;
            extract($objSite->main());
        }
        include_once "inc/depedences.php";
        echo '<title>'.Structure::getNamepage($site).'</title>';
        !$this->isHome() ? include_once "inc/menu.php" : '';
        include_once "view/".$site;
        !$this->isHome() ? include_once "inc/footer.php" : '';
        include_once "inc/depedencesjs.php";
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
        
    }

    //VERIFICA SE O USUARIO ESTÁ LOGADO
    private function loggedIn(){
        if(!$this->isHome()){
            $userBool = isset($_SESSION['comum']);
                if($userBool){
                    if($_SESSION['ativo'] == 0){
                        echo '<script> window.location.replace("'.BASE_URL.'/changePassword"); </script>';
                        die("Redirect to new Password");
                    }
                }
                if(!$userBool){
                    echo '<script> window.location.replace("'.BASE_URL.'/Login"); </script>';
                    die("Redirect to Login");
                }
            }
    }

    //VERIFICA SE NÃO É UMA PAGINA PROTEGIDA
    public function isHome(){
        $notProtected_Pages = [''];
        $key = array_search($this->getRotas()[1], $notProtected_Pages);
        return is_integer($key) ? true : false;    
    }

    //OBTEM UM PARAMETRO ESPECIFICADO ($i) PASSADO PELA URL
    public function getParameter($i){
        $rotas = $this->getRotas();
            if(count($rotas) > $i){
                return $rotas[$i];
            }else{
                return false;
            }
    }

    //OBTEM TODOS PARAMETROS PASSADOS PELA URL
    public function getArrayParam(){
        $rotas = $this->getRotas();
        return $rotas;
    }

    //OBTEM O NUMERO DE PARAMETROS PASSADOS PELA URL
    public function countArrayParam(){
        return count($this->getRotas());
    }
    
    //FORÇA A ENTRADA NO SISTEMA USANDO HTTPS
    private function forceSslLink(){
        $uri = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $arrayUrl = parse_url($uri);
        if($arrayUrl["scheme"] != 'https'){
            echo "<script>window.location.href = '".BASE_URL."';</script>";
        }
    }

}
