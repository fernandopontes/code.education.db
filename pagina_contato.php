<div class="container container-conteudo ">

    <div class="blog-header">
        <h1 class="blog-title">Fale conosco</h1>
        <p class="lead blog-description">Nossa equipe está pronta para atendê-lo</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">
            <?php
            if(isset($_POST['submit']))
            {
                if($_POST['nome'] != "" && $_POST['email'] != "" && $_POST['assunto'] != "" &&  $_POST['mensagem'] != "")
                {
                    print('<p class="alert alert-success">Dados enviados com sucesso, abaixo seguem os dados que você enviou:</p>');

                    printf('<fieldset><lengend><strong>Nome:</strong></lengend>%s</fieldset>
                            <fieldset><lengend><strong>Email:</strong></lengend>%s</fieldset>
                            <fieldset><lengend><strong>Assunto:</strong></lengend>%s</fieldset>
                            <fieldset><lengend><strong>Mensagem:</strong></lengend>%s</fieldset><br><br>', $_POST['nome'], $_POST['email'], $_POST['assunto'], $_POST['mensagem']);
                }
                else {
                    print('<p class="alert alert-danger">Todos os campos são obrigatórios!</p>');
                }
            }
            ?>
            <form action="contato" method="post" role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome:</label>
                    <input type="text" class="form-control" name="nome" placeholder="Digite seu nome">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Digite seu email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Assunto</label>
                    <input type="text" class="form-control" name="assunto" placeholder="Digite o assunto">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mensagem</label>
                    <textarea class="form-control" name="mensagem" rows="3"></textarea>
                </div>
                <input type="submit" class="btn btn-default" name="submit" value="Enviar">
            </form>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <?php
            include_once 'sidebar.php';
            ?>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->