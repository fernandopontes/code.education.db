<div class="container container-conteudo ">

    <div class="blog-header">
        <h1 class="blog-title">Nossos produtos</h1>
        <p class="lead blog-description">Confira nosso portfolio.</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <?php
                // Retorna os produtos
                $consulta = $conexao->prepare("SELECT id, titulo, imagem, texto FROM site_produtos");
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

                        printf('<div class="col-lg-4">
                        <img class="img-circle" src="%s" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                        <h2>%s</h2>
                        %s
                        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                    </div>', $imagem, $item['titulo'], $item['texto']);
                    }
                }
                ?>
            </div><!-- /.row -->

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <?php
            include_once 'sidebar.php';
            ?>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->