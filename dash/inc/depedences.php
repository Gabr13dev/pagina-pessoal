<?php
//DEPENDENCIA SO FUNCIONA ATARVES DA TAG <LINK>
$files_array = ['css/font-awesome.min.css'];
foreach ($files_array as $archive) {
    $a = protocol.$_SERVER['SERVER_NAME']."/".pasta."/".$archive;
    print_r('<link rel="stylesheet" type="text/css" href="'.$a.'">');
}
//INJETA AS DEPENDENCIAS CSS INLINE PARA MELHOR CARREGAMAENTO
$files_array_insert = ['css/bootstrap.min.css','css/nouislider.min.css','css/bootstrap-datetimepicker.css','css/style.css','css/persona.css','css/pNnotify.css','css/summernote.min.css'];
echo '<style type="text/css">';
foreach ($files_array_insert as $archive) {
    $a = protocol.$_SERVER['SERVER_NAME']."/".pasta."/".$archive;
    echo file_get_contents($a);
}
echo '</style>';

//NECESSARIO PARA EXECUTAR jQUERY ANTES DA PAGINA
$files_arrayjs = ['js/jquery-3.3.1.min.js'];
echo '<script type="text/javascript">';
foreach ($files_arrayjs as $archivejs) {
    $a = protocol.$_SERVER['SERVER_NAME']."/".pasta."/".$archivejs;
    echo file_get_contents($a);
}
echo '</script>';