<?php
include_once '../conexao/conexao.php';
include_once '../template/template_header.php';

$sql = "SELECT * FROM conteudos ORDER BY idconteudo;";
$query = mysqli_query($con, $sql);
//$dados = mysqli_fetch_array($query);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">   
        <meta name="description" content="Webtec">
        <meta name="author" content="Anderson">
        <link rel="icon" href="img/system/w1.ico">

        <title>WebTec</title>

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/jumbotron.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">WebTec</a>
                </div>
        </nav>
        <div class="page-header">
            <h1>Lista de Conteudos</h1>
        </div>

        <div id="acoes" class="text-right row" style="margin-bottom: 10px;">   

        </div>
        <div id="table" class="row">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Conteudo</th>
                        <th class="text-center">Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($dados = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?= $dados['idconteudo'] ?></td>
                            <td><?= $dados['descricao'] ?></td>
                            <td><?= $dados['conteudo'] ?></td>
                            <td class="actions">
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?= $dados['idconteudo'] ?>">Visualizar</button>
                            </td>
                        </tr>

                        <!-- Modal -->
                    <div class="modal fade" id="myModal<?= $dados['idconteudo'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-primary" id="myModalLabel"><?= $dados['descricao'] ?></h4>
                                </div>
                                <div class="modal-body">
                              <!--<p><?= $dados['descricao'] ?></p>-->
                                    <p><?= $dados['conteudo'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div id="bottom" class="row">
            <div class="col-md-12">


            </div>
        </div> <!-- /#bottom -->
        <?php
        include_once '../template/template_footer.php';
        ?>