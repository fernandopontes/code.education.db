<div class="container container-conteudo ">

    <div class="blog-header">
        <h1 class="blog-title">Serviços</h1>
        <p class="lead blog-description">O que fazemos de melhor.</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php
            // Retorna os servicos
            $consulta = $conexao->prepare("SELECT id, titulo, imagem, texto FROM site_servicos");
            $consulta->execute();

            $resultado = $consulta->fetchAll();

            if(count($resultado) > 0)
            {
                foreach($resultado as $item)
                {
                    if($item['imagem'] != "")
                    {
                        $imagem = $item['imagem'];
                    }
                    else {
                        $imagem = 'data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==';
                    }

                    printf('<div class="blog-post"><h2>%s</h2> <img class="img-circle" src="%s" alt="Generic placeholder image" style="width: 140px; height: 140px;"> %s</div><!-- /.blog-post -->', $item['titulo'], $imagem, $item['texto']);
                }
            }
            ?>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <?php
            include_once 'sidebar.php';
            ?>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->