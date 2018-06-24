<?php
require_once './conexao/conexao.php';

//verifica se veio um e-mail por formulário
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //gera o SQL de consulta ao banco de dados para ver se o email fornecido existe.
    $sql = "SELECT * FROM usuarios WHERE email = '" . $email . "';";

    //executa o SQL e guarda o resultado na variavel $query    
    $query = mysqli_query($con, $sql);

    //coloca o resultado da variavel em um array
    $dados = mysqli_fetch_array($query);

    //verifica se voltou resultado
    if (isset($dados)) {
        //confere se a senha que veio do banco de dados é igual a informada no formulário
        // o comando decode, descriptografa a senha que veio do banco de dados
        if (base64_decode($dados['senha']) == $senha) {
            //se a senha conferir manda o usuário para o painel
            header('Location: painel/painel.php');
        } else {
            //caso a senha não confira retorna para a tela de inicio com erro
            header('Location: index.php?erro=login');
        }
    } else {
        //caso não retorna resultado do email, retorna para a tela de inicio com erro
        header('Location: index.php?erro=login');
    }
}
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
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/jumbotron.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="js/ie-emulation-modes-warning.js"></script>

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
                    <a class="navbar-brand" href="index.php">WebTec</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" action="index.php" method="POST">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="senha" placeholder="Senha" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Entrar</button>
                    </form>
                </div><!--/.navbar-collapse -->
                <?php
                //verifica se a pagina possui algum erro e exibe
                if (isset($_GET['erro'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Erro!</strong> Usuário e/ou senha inválidos..
                    </div>
                <?php } ?>
            </div>
        </nav>
        <div class="jumbotron">
            <div class="container">
                <h1>Webtec</h1>
                <div class="tab-pane active" id="Continue">
                    <p>O presente trabalho almeja buscar meios de conseguir maior amplitude em relação ao conhecimento dos alunos, contudo o grupo WebTec teve a iniciativa de criar um site que contenham vídeo aula para cooperar com o aprendizado dos alunos passando para eles um conteúdo de fácil entendimento.</p>
                    <p>
                        <a  class="btn btn-primary btn-lg" href="continue.php" role="button">Continue</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>1º - Módulo</h2>
                    <p>O AUXILIAR DE INFORMÁTICA PARA INTERNET é o profissional que opera, dá suporte
                        a componentes de computadores em ambientes de Internet, a websites básicos e edição,
                        correção de imagens.</p>
                    <p><a class="btn btn-default" href="modolus/listarComponentesAluno.php?ano=1" role="button">Continue &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>2º - Módulo</h2>
                    <p>O AUXILIAR EM DESIGN DE WEBSITES é o profissional que elabora a interface gráfica,
                        desenvolve e documenta websites. Fornece suporte técnico e treinamento aos usuários.</p>
                    <p><a class="btn btn-default" href="modolus/listarComponentesAluno.php?ano=2" role="button">Continue &raquo;</a></p>
                </div>
                <div class="col-md-4">
                    <h2>3º - Módulo</h2>
                    <p>O TÉCNICO EM INFORMÁTICA PARA INTERNET é o profissional que desenvolve e
                        realiza manutenções em websites, portais na Internet e Intranet. Utiliza ferramentas de
                        desenvolvimento de projetos para construir soluções que auxiliam o processo de criação
                        de interfaces e aplicativos empregados no comércio e marketing eletrônicos.
                    </p>
                    <p><a class="btn btn-default" href="modolus/listarComponentesAluno.php?ano=3" role="button">Continue &raquo;</a></p>
                </div>
            </div>

            <hr>

            <footer>
                <p>Todos os direitos reservados para WebTec</p>
            </footer>

            <!-- JavaScript-->
            <script src="js/jquery-1.12.4.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>