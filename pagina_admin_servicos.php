<?php
if($_SESSION['logado'] == true)
{
?>
<div class="col-md-12">
    <h1 class="blog-title"><strong>Serviços</strong></h1>
    <br><br>
    <a href="admin?pagadmin=servicos&acao=cadastrar" class="btn btn-success">Cadastrar novo</a>
    <br><br>
    <?php
    if(!isset($_GET['acao']))
    {
        $consulta = $conexao->prepare('SELECT id, titulo, imagem, texto FROM site_servicos');
        $consulta->execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        if(count($resultado) > 0)
        {
            print('<div class="panel panel-default">
                      <div class="panel-heading">Registros:</div>
                      <div class="panel-body"></div>
                      <table class="table">
                        <tr>
                            <th>Título</th>
                            <th colspan="2">Ações</th>
                        </tr>');
            for($i=0; $i<count($resultado); $i++)
            {
                printf('<tr><td>%s</td><td><a href="admin?pagadmin=servicos&acao=editar&id=%d" class="btn btn-primary">Editar</a></td><td><a href="admin?pagadmin=servicos&acao2=excluir&id=%d" class="btn btn-danger">Excluir</a></td></tr>', $resultado[$i]['titulo'], $resultado[$i]['id'], $resultado[$i]['id']);
            }

            print('</table>
                </div>');
        }
    ?>

    <?php
    }
    elseif(isset($_GET['acao']) && $_GET['acao'] == "editar")
    {
    ?>
    <form action="admin?pagadmin=servicos" method="post">
        <?php
        $consulta = $conexao->prepare('SELECT id, titulo, texto FROM site_servicos WHERE id=:id');
        $id = $_GET['id'];
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if(count($resultado) > 0)
        {
        ?>
        <fieldset>
            <label>Título:</label>
            <input type="text" name="titulo" class="form-control" maxlength="255" value="<?php print($resultado['titulo']); ?>">
        </fieldset>
        <br>
        <fieldset>
            <label>Texto:</label>
            <textarea class="ckeditor" cols="80" id="editor" name="texto" rows="10"><?php print($resultado['texto']); ?></textarea>
        </fieldset>
        <input type="hidden" name="id" value="<?php print($resultado['id']); ?>">
        <input type="hidden" name="pagina_editada" value="servicos">
        <br>
        <p><input type="submit" name="submit" value="Salvar" class="btn btn-primary"></p>
        <?php
        }
        else {
            print('<p class="alert alert-danger">Identificador não encontrado!</p>');
        }
        ?>
    </form>
    <?php
    }
    elseif(isset($_GET['acao']) && $_GET['acao'] == "cadastrar")
    {
    ?>
    <form action="admin?pagadmin=servicos" method="post">
        <fieldset>
            <label>Título:</label>
            <input type="text" name="titulo" class="form-control" maxlength="255">
        </fieldset>
        <br>
        <fieldset>
            <label>Texto:</label>
            <textarea class="ckeditor" cols="80" id="editor" name="texto" rows="10"></textarea>
        </fieldset>
        <input type="hidden" name="pagina_cadastrar" value="servicos">
        <br>
        <p><input type="submit" name="submit" value="Salvar" class="btn btn-primary"></p>
    </form>
    <?php
    }
    ?>
</div>
<?php
}
else {
    include_once 'pagina_login.php';
}
?>

