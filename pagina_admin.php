<?php
$status_login = verifica_login($conexao);

if($status_login == 1 || $_SESSION['logado'] == true)
{

    // Executa as atualizações das páginas

    if(isset($_POST['submit']))
    {
        // CADASTRO

        if(isset($_POST['pagina_cadastrar']))
        {
            $status_cadastro = 0;

            switch($_POST['pagina_cadastrar'])
            {
                case 'produtos':
                case 'servicos':

                    $consulta = $conexao->prepare("INSERT INTO site_{$_POST['pagina_cadastrar']} (titulo, texto) VALUES (:titulo, :texto)");

                    $titulo = $_POST['titulo'];
                    $texto = $_POST['texto'];

                    $consulta->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                    $consulta->bindParam(':texto', $texto, PDO::PARAM_STR);

                    if($consulta->execute())
                        $status_cadastro = 1;

                break;
            }
        }

        // EDIÇÃO

        if(isset($_POST['pagina_editada']))
        {
            $status_alteracao = 0;

            switch($_POST['pagina_editada'])
            {
                case 'empresa':

                    $consulta = $conexao->prepare("UPDATE site_sobre SET texto=:texto WHERE id=1");

                    $texto = $_POST['texto'];
                    $consulta->bindParam(':texto', $texto, PDO::PARAM_STR);
                    if($consulta->execute())
                        $status_alteracao = 1;

                    break;

                case 'produtos':
                case 'servicos':

                    $consulta = $conexao->prepare("UPDATE site_{$_POST['pagina_editada']} SET titulo=:titulo, texto=:texto WHERE id=:id");

                    $id = $_POST['id'];
                    $titulo = $_POST['titulo'];
                    $texto = $_POST['texto'];

                    $consulta->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                    $consulta->bindParam(':texto', $texto, PDO::PARAM_STR);
                    $consulta->bindParam(':id', $id, PDO::PARAM_INT);

                    if($consulta->execute())
                        $status_alteracao = 1;

                    break;
            }
        }
    }

    // Excluir registros

    if(isset($_GET['acao2']))
    {
        $status_excluir = 0;

        switch($_GET['acao2'])
        {
            case 'excluir':

                $consulta = $conexao->prepare("DELETE FROM site_{$_GET['pagadmin']} WHERE id=:id");

                $id = $_GET['id'];

                $consulta->bindParam(':id', $id, PDO::PARAM_INT);

                if($consulta->execute())
                    $status_excluir = 1;
            break;
        }
    }
?>
<div class="container container-conteudo">

    <div class="blog-header">
        <h1 class="blog-title">Painel administrativo</h1>
        <p class="lead blog-description">Utilize os menus abaixo para administrar o conteúdo do site.</p>
    </div>

    <div class="row">

        <div class="col-sm-12 blog-main">

            <div class="blog-post">
                <div class="col-md-12">
                    <p>Olá <strong><?php print($_SESSION['nome_user']); ?></strong>! Seja bem-vindo(a) ao painel administrativo.</p>
                    <ul class="nav nav-pills">
                        <li role="presentation"><a href="admin?pagadmin=empresa">Empresa</a></li>
                        <li role="presentation"><a href="admin?pagadmin=produtos">Produtos</a></li>
                        <li role="presentation"><a href="admin?pagadmin=servicos">Serviços</a></li>
                        <li role="presentation"><a href="logout">Sair da administração</a></li>
                    </ul>
                    <hr>
                    <?php
                    if(isset($_POST['submit']) && isset($status_cadastro))
                    {
                        switch($status_cadastro)
                        {
                            case 1:
                                print('<p class="alert alert-success">O texto foi cadastrado com sucesso!</p>');
                                break;

                            case 2:
                                print('<p class="alert alert-danger">O texto não foi cadastrado!</p>');
                                break;
                        }
                    }

                    if(isset($_POST['submit']) && isset($status_alteracao))
                    {
                        switch($status_alteracao)
                        {
                            case 1:
                                print('<p class="alert alert-success">O texto foi alterado com sucesso!</p>');
                            break;

                            case 2:
                                print('<p class="alert alert-danger">O texto não foi alterado!</p>');
                            break;
                        }
                    }

                    if(isset($_GET['acao2']) && isset($status_excluir))
                    {
                        switch($status_excluir)
                        {
                            case 1:
                                print('<p class="alert alert-success">O texto foi excluído com sucesso!</p>');
                                break;

                            case 2:
                                print('<p class="alert alert-danger">O texto não foi excluído!</p>');
                                break;
                        }
                    }
                    ?>
                </div>
                <div class="col-md-12">
                    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                    <?php
                    if(isset($_GET['pagadmin']))
                    {
                        switch(filter_var($_GET['pagadmin'], FILTER_SANITIZE_STRING))
                        {
                            case 'empresa':
                                include_once 'pagina_admin_empresa.php';
                            break;

                            case 'produtos':
                                include_once 'pagina_admin_produtos.php';
                            break;

                            case 'servicos':
                                include_once 'pagina_admin_servicos.php';
                            break;
                        }
                    }
                    ?>
                </div>
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->



    </div><!-- /.row -->

</div><!-- /.container -->
<?php
}
else {
    include_once 'pagina_login.php';
}
?>

