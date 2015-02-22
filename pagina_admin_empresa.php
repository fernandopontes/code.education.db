<?php
if($_SESSION['logado'] == true)
{
?>
<div class="col-md-12">
    <h1 class="blog-title">Editar dados da página <strong>Empresa</strong></h1>
    <br><br>
    <form action="admin?pagadmin=empresa" method="post">
        <?php
        $texto = "";

        $consulta = $conexao->prepare('SELECT texto FROM site_sobre WHERE id=1');
        $consulta->execute();

        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if(count($resultado) > 0)
            $texto = $resultado['texto'];
        ?>

        <textarea class="ckeditor" cols="80" id="editor" name="texto" rows="10"><?php print($texto); ?></textarea>
        <input type="hidden" name="pagina_editada" value="empresa">
        <br>
        <p><input type="submit" name="submit" value="Salvar" class="btn btn-primary"></p>
    </form>
</div>
<?php
}
else {
    include_once 'pagina_login.php';
}
?>

