<div class="container container-conteudo">

    <div class="blog-header">
        <h1 class="blog-title">Identifique-se</h1>
        <p class="lead blog-description">Utilize o formulário abaixo para acessar a área administrativa do site.</p>
    </div>

    <div class="row">

        <div class="col-sm-12 blog-main">

            <div class="blog-post">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-4">
                    <?php
                    if(isset($status_login))
                    {
                        switch($status_login)
                        {
                            case 2:
                                print('<p class="alert alert-danger">Digite um email válido!</p>');
                            break;

                            case 3:
                                print('<p class="alert alert-danger">Email ou senha inválidos!</p>');
                            break;

                            case 4:
                                print('<p class="alert alert-danger">Este usuário está bloqueado!</p>');
                            break;
                        }
                    }
                    ?>
                    <form action="admin" method="post" class="form-signin">
                        <h1 class="form-signin-heading">Painel administrativo</h1><br>
                        <input type="email" name="email" class="form-control" placeholder="Email"><br>
                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                        <br><br>
                        <input type="submit" name="submit" class="btn btn-primary" value="Entrar">
                    </form>
                </div>
                <div class="col-md-4">&nbsp;</div>
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->



    </div><!-- /.row -->

</div><!-- /.container -->



