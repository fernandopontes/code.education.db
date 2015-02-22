<!DOCTYPE html>
<html lang="en">
<head>
    <title>Site exemplo Code.education</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site para code.education">
    <meta name="author" content="Fernando Pontes">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="css/carousel.css" rel="stylesheet">
</head>

<body>
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home">Code.education</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li <?php (isset($pagina['uri']) && $pagina['uri'] == "home") ? print('class="active"') : NULL; ?>><a href="home">Home</a></li>
                        <li <?php (isset($pagina['uri']) && $pagina['uri'] == "empresa") ? print('class="active"') : NULL; ?>><a href="empresa">Empresa</a></li>
                        <li <?php (isset($pagina['uri']) && $pagina['uri'] == "produtos") ? print('class="active"') : NULL; ?>><a href="produtos">Produtos</a></li>
                        <li <?php (isset($pagina['uri']) && $pagina['uri'] == "servicos") ? print('class="active"') : NULL; ?>><a href="servicos">Serviços</a></li>
                        <li <?php (isset($pagina['uri']) && $pagina['uri'] == "contato") ? print('class="active"') : NULL; ?>><a href="contato">Contato</a></li>
                        <li <?php (isset($pagina['uri']) && $pagina['uri'] == "painel") ? print('class="active"') : NULL; ?>><a href="painel">Painel administrativo</a></li>
                    </ul>
                    <form action="busca" method="get" class="navbar-form navbar-right">
                        <div class="input-group">
                            <input type="text" name="palavra" class="form-control" placeholder="Buscar por...">
                          <span class="input-group-btn">
                            <input type="submit" name="submit" class="btn btn-default" value="Buscar">
                          </span>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>