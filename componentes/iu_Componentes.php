<?php
require_once '../conexao/conexao.php';

//verifica se tem ID para alterar, caso vazio ser� inserido um novo registro
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //consulta se possui o registro com o ID
    $sql = "SELECT * FROM componentes WHERE idcomponente = '" . $id . "';";
    $query = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($query);

    //caso n�o possua o registro, retorna para a lista
    if (empty($dados)) {
        header('Location: list_Componentes.php');
    }
}

//inclui a parte de cima do template
include_once '../template/template_header.php';
?>
<div class="page-header">
    <h1>Cadastrar Componentes </h1>
</div>
<div id="form" class="row">
    <form class="form-horizontal" method="POST" action="../DAO/componente.php">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">Código:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-center" id="id" name="id" readonly 
                       placeholder="Novo" value="<?= (isset($dados['idcomponente'])) ? $dados['idcomponente'] : null ?>">
                <!-- Verificase veio uma informa��o do campo e coloca como valor para altera��o-->
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
            <label for="ano" class="col-sm-2 control-label">Ano:</label>
            <div class="col-sm-2">
                <select name="ano" class="form-control">
                    <option value="1">1º</option>
                    <option value="2">2º</option>
                    <option value="3">3º</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="list_Componentes.php" class="btn btn-default btn-block">Voltar</a>
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
    //verifica se as senhas sao iguais antes de enviar o formulorio
    $("form").submit(function () {
        if ($("#ano").val() !== $("#confirma").val()) {
            return false;
            $("#erro").removeClass("hide");
        } else {
            $("#erro").addClass("hide");
        }
    });
    
    //verifica se as senhas sao iguais quando sai do campo de confirma��o.
    function verificaAno() {
        if ($("#ano").val() !== $("#confirma").val()) {
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