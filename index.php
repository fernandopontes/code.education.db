<?php
///// Define as configurações do site //////
include_once 'config.php';

///// Define as rotas do site //////
include_once 'rotas.php';

///// Funções para o site //////
include_once 'funcoes.php';

$conexao = conexao_db($config);

include_once 'header.php';

$pagina = carregar_pagina($config, $rotas);

if($pagina['status-rota'])
{
    include_once $pagina['pagina'];
}
else {
    include_once 'pagina_home.php';
}

include_once 'footer.php';

?>

