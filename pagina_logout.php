<?php
// Atualiza a data do login
$consulta = $conexao->prepare("UPDATE site_usuarios SET data_login=:data_login WHERE email=:email");
$data_login = date('Y-m-d H:i:s');
$consulta->bindParam(':data_login', $data_login, PDO::PARAM_STR);
$consulta->bindParam(':email', $_SESSION['email_user'], PDO::PARAM_STR);
$consulta->execute();

session_destroy();

include_once 'pagina_login.php';
?>