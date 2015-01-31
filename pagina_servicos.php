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
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            </div>
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->