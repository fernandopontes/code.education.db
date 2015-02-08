<div class="container container-conteudo">

    <div class="blog-header">
        <h1 class="blog-title">Busca</h1>
        <p class="lead blog-description">Resultados encontrados para: <strong><?php print(htmlspecialchars($_GET['palavra'])); ?></strong></p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <?php
                if($_GET['palavra'] != "")
                {
                    $num_result = 0;

                    // Procura na tabela site_sobre
                    $consulta = $conexao->prepare("SELECT * FROM site_sobre WHERE texto LIKE :busca");
                    $palavra = "%" . $_GET['palavra'] . "%";
                    $consulta->bindParam(':busca', $palavra, PDO::PARAM_STR);
                    $consulta->execute();

                    $resultado = $consulta->fetchAll();

                    if(count($resultado) > 0)
                    {
                        print('<p><a href="empresa">Acesse a página <strong>Sobre a empresa</strong> para ver o resultado.</a></p>');
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
                        print('<p><a href="produtos">Acesse a página <strong>Produtos</strong> para ver o resultado.</a></p>');
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
                        print('<p><a href="servicos">Acesse a página <strong>Serviços</strong> para ver o resultado.</a></p>');
                        $num_result++;
                    }

                    if($num_result == 0)
                    {
                        print('<p class="alert alert-warning">Nenhum resultado encontrado para o termo procurado!</p>');
                    }
                }
                else {
                    print('<p class="alert alert-danger">Digite algo no campo busca!</p>');
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