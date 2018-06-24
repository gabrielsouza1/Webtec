<?php
require_once '../conexao/conexao.php';

//verifica se tem ID para alterar, caso vazio será inserido um novo registro
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //consulta se possui o registro com o ID
    $sql = "SELECT * FROM usuarios WHERE idusuario = '" . $id . "';";
    $query = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($query);

    //caso não possua o registro, retorna para a lista
    if (empty($dados)) {
        header('Location: list_Usuarios.php');
    }
}

//inclui a parte de cima do template
include_once '../template/template_header.php';
?>
<div class="page-header">
    <h1>Cadastradar Usuário </h1>
</div>
<div id="form" class="row">
    <form class="form-horizontal" method="POST" action="../DAO/usuario.php">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">Código:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-center" id="id" name="id" readonly 
                       placeholder="Novo" value="<?= (isset($dados['idusuario'])) ? $dados['idusuario'] : null ?>">
                <!-- Verificase veio uma informação do campo e coloca como valor para alteração-->
            </div>
        </div>
        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome..."
                       value="<?= (isset($dados['nome'])) ? $dados['nome'] : null ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">E-mail:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail..."
                       value="<?= (isset($dados['email'])) ? $dados['email'] : null ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="senha" class="col-sm-2 control-label">Senha:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha...">
            </div>
            <label for="confirma" class="col-sm-2 control-label">Confirmar Senha:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" onblur="verificaSenha()"
                       id="confirma" name="confirma" placeholder="Confirmar...">
            </div>            
        </div>
        <div id="erro" class="alert alert-danger text-center hide" role="alert">                        
            <strong>Erro!</strong> Senhas não conferem...
        </div>
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="list_Usuarios.php" class="btn btn-default btn-block">Voltar</a>
            </div>
            <div class="col-sm-4 col-xs-12">
                <button type="reset" class="btn btn-info btn-block">Limpar</button>
            </div>
            <div class="col-sm-4 col-xs-12">
                <button type="submit" id="salvar" name="salvar" class="btn btn-primary btn-block">Salvar</button>
            </div>
        </div>
    </form>
</div>
<script>
    //verifica se as senhas são iguais antes de enviar o formulário
    $("form").submit(function () {
        if ($("#senha").val() !== $("#confirma").val()) {
            return false;
            $("#erro").removeClass("hide");
        } else {
            $("#erro").addClass("hide");
        }
    });
    
    //verifica se as senhas são iguais quando sai do campo de confirmação.
    function verificaSenha() {
        if ($("#senha").val() !== $("#confirma").val()) {
            $("#erro").removeClass("hide");
        } else {
            $("#erro").addClass("hide");
        }
    }
</script>
<?php
//inclui a parte de baixo do template
include_once '../template/template_footer.php';
?>