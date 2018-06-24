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
		 <p>O presente trabalho almeja buscar meios de conseguir maior amplitude em relação ao conhecimento dos alunos, contudo o grupo WebTec teve a iniciativa de criar um site que contenham vídeo aula para cooperar com o aprendizado dos alunos passando para eles um conteúdo de fácil entendimento. Sendo assim os meios que foram utilizados como mais aptos, tido como fácil acesso foi à internet, ela é o tipo de conexão mais utilizada, em celulares, escolas, domicílios etc., no entanto, a proporção de alunos que teriam acesso a esse conteúdo seria grande. O vídeo aula é tido como acessível onde o aluno poderá ver a aula e ser vista repetidamente, até entender o conteúdo. Essas são algumas vantagens que pensamos que ele poderá trazer para os alunos.</p>

        <p>O que pensamos ao criar esse projeto foi à questão do tempo gasto, o apoio no aprendizado, duvida de alunos que não são perguntadas em salas de aulas, acessibilidade e por fim isso ajudará os alunos a reterem melhor o conteúdo.</p>

        <p>Ao término desse projeto constatamos que os professores consideram relevante à utilização do vídeo aula. Consequentemente consolidou que se o vídeo for utilizado de maneira coesiva e contextualizada pode influenciar muito no aprendizado do aluno.</p>

        <p>O nosso objetivo final é fazer com que os alunos consigam tirar uma abstração dos conceitos estudados que o ajude a ter uma perspectiva sobre o tópico.</p>
        </div>
      </div>
      </div>
      <hr>

      <footer>
      	<p>Todos os direitos reservados para WebTec</p>
      </footer>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>