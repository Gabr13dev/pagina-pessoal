<?php
/*
 *@author Gabriel. A
 *Classe de upload
 * Ao instaciar objeto deve-se passar a variavel $_FILE php do arquivo e um array com as extensoes aceitas
 * 
 */
class uploadFiles {

private $formatsAccept;
private $fileUp;

//construtor recebe o arquivo na variavel $file e um array com os formatos aceitos em $formats
function __construct($file,$formats) {
    $this->fileUp = $file;
    $this->formatsAccept = $formats;
}

//Retorna a extensão do arquivo
private function getExtension(){
    return pathinfo($this->fileUp['name'], PATHINFO_EXTENSION);
}
//Verifica se a extensão do arquivo é aceita
private function extensionIsValid(){
    return in_array($this->getExtension(), $this->formatsAccept);
}
//Gera um novo nome evitando nomes repitidos
private function generateNewName(){
    return uniqid().".".$this->getExtension();
}
//Retorna o nome temporario do arquivo
private function getTempName(){
    return $this->fileUp['tmp_name'];
}
//Realiza o upload do arquivo e retorna (1 - Arquivo movido com sucesso) (2 - falha ao mover arquivo) (3 - Extensão invalida)
public function uploadFile($destiny){
    if($this->extensionIsValid()){
        if(move_uploaded_file($this->getTempName(),$destiny.$this->generateNewName())){
            return 1;
        }else{
            return 2;
        }
    }else{
        return 3;
    }
}


}