<?php

function carregar_pagina($config, $rotas)
{
    $pagina = array();

    // Utilizado para recuperar o nome do arquivo do script que está executando, relativa à raiz do documento
    $diretorio_atual = explode('/', $_SERVER['PHP_SELF']);
    $arquivo_index = array_pop($diretorio_atual); // Retira o último elemento do array $diretorio_atual

    $url_atual = ltrim(str_replace(ltrim(implode('/', $diretorio_atual), '/'), "", ltrim($_SERVER['REQUEST_URI'], '/')), '/');

    if($url_atual != "")
    {
        if(strpos($url_atual, '?') !== FALSE)
        {
            $url = explode('?', $url_atual);
            $url_atual = $url[0];
        }

        if(array_key_exists($url_atual, $rotas))
        {
            if(file_exists($rotas[$url_atual]))
            {
                $pagina = array('pagina' => $rotas[$url_atual], 'status-rota' => TRUE, 'uri' => $url_atual);
            }
            else {
                header('Location:'. $config['erro-404']);
            }
        }
        else {
            header('Location:'. $config['erro-404']);
        }
    }
    else {
        $pagina = array('pagina' => $rotas['home'], 'status-rota' => TRUE, 'uri' => 'home');
    }

    return $pagina;
}

function conexao_db($config)
{
    try {
        if( ! isset($config['db-host']) || ! isset($config['db-nome']) || ! isset($config['db-user']) || ! isset($config['db-pass']))
            throw new \InvalidArgumentException("Configuração do banco de dados não existe.");

        $host   =   $config['db-host'];
        $db     =   $config['db-nome'];
        $user   =   $config['db-user'];
        $pass   =   $config['db-pass'];

        return new \PDO("mysql:host={$host};dbname={$db}", $user, $pass);

    }
    catch (\PDOException $e)
    {
        print($e->getMessage()."\n");
        print($e->getTraceAsString()."\n");

    }
}