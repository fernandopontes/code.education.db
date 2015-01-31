<div class="container container-conteudo">

    <div class="blog-header">
        <h1 class="blog-title">Busca</h1>
        <p class="lead blog-description">Resultados encontrados para <?php print(htmlspecialchars($_GET['palavra'])); ?>.</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <?php
                $num_result = 0;

                // Procura na tabela site_sobre
                $consulta = $conexao->prepare("SELECT * FROM site_sobre WHERE texto LIKE :busca");
                $palavra = "%" . $_GET['palavra'] . "%";
                $consulta->bindParam(':busca', $palavra, PDO::PARAM_STR);
                $consulta->execute();

                $resultado = $consulta->fetchAll();

                if(count($resultado) > 0)
                {
                    print('<a href="empresa">Acesse a página <strong>Sobre a empresa</strong> para ver o resultado.</a><br>');
                    $num_result++;
                }

                // Procura na tabela site_produtos
                $consulta = $conexao->prepare("SELECT * FROM site_produtos WHERE texto LIKE :busca OR texto LIKE :busca2");
                $palavra = "%" . $_GET['palavra'] . "%";
                $palavra2 = "%" . $_GET['palavra'] . "%";
                $consulta->bindParam(':busca', $palavra, PDO::PARAM_STR);
                $consulta->bindParam(':busca2', $palavra2, PDO::PARAM_STR);
                $consulta->execute();

                $resultado = $consulta->fetchAll();

                if(count($resultado) > 0)
                {
                    print('<a href="produtos">Acesse a página <strong>Produtos</strong> para ver o resultado.</a><br>');
                    $num_result++;
                }

                // Procura na tabela site_servicos
                $consulta = $conexao->prepare("SELECT * FROM site_servicos WHERE texto LIKE :busca OR texto LIKE :busca2");
                $palavra = "%" . $_GET['palavra'] . "%";
                $palavra2 = "%" . $_GET['palavra'] . "%";
                $consulta->bindParam(':busca', $palavra, PDO::PARAM_STR);
                $consulta->bindParam(':busca2', $palavra2, PDO::PARAM_STR);
                $consulta->execute();

                $resultado = $consulta->fetchAll();

                if(count($resultado) > 0)
                {
                    print('<a href="servicos">Acesse a página <strong>Serviços</strong> para ver o resultado.</a><br>');
                    $num_result++;
                }
                ?>
            </div><!-- /.blog-post -->

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