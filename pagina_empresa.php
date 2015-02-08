<div class="container container-conteudo">

    <div class="blog-header">
        <h1 class="blog-title">A empresa</h1>
        <p class="lead blog-description">Tudo sobre a empresa.</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <?php
                // Retorna o texto sobre a empresa
                $consulta = $conexao->prepare("SELECT texto FROM site_sobre");
                $consulta->execute();

                $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

                if(count($resultado) > 0)
                {
                    print($resultado['texto']);
                }
                ?>
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <?php
            include_once 'sidebar.php';
            ?>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->