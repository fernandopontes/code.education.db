<?php

function carregar_pagina($config, $rotas)
{
    $pagina = array();

    // Utilizado para recuperar o nome do arquivo do script que está executando, relativa à raiz do documento
    $diretorio_atual = explode('/', $_SERVER['PHP_SELF']);

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
                header('Location:' . $config['erro-404']);
            }
        }
        else {
            header('Location:' . $config['erro-404']);
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

function verifica_login($conexao)
{
    $status = 0;

    // Valida o email
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $consulta = $conexao->prepare("SELECT nome, email, senha, situacao FROM site_usuarios WHERE email=:email");
        $email = $_POST['email'];
        $consulta->bindParam(':email', $email, PDO::PARAM_STR);
        $consulta->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if(count($resultado) > 0)
        {
            // Valida a senha
            if(password_verify($_POST['senha'], $resultado['senha']))
            {
                // Verifica se o usuário está ativo
                if($resultado['situacao'] == 'Ativo')
                {
                    $status = 1;
                    $_SESSION['logado'] = true;
                    $_SESSION['nome_user'] = $resultado['nome'];
                    $_SESSION['email_user'] = $resultado['email'];
                }
                else {
                    $status = 4;
                }
            }
            else {
                $status = 3;
            }

        }
        else {
            $status = 3;
        }
    }
    else {
       $status = 2;
    }

    return $status;
}