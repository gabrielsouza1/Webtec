<?php
require_once '../conexao/conexao.php';

//verifica se tem ID para alterar, caso vazio ser� inserido um novo registro
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //consulta se possui o registro com o ID
    $sql = "SELECT * FROM conteudos WHERE idconteudo = '" . $id . "';";
    $query = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($query);

    //caso n�o possua o registro, retorna para a lista
    if (empty($dados)) {
        header('Location: list_Conteudos.php');
    }
}

$sqlC = "SELECT * FROM componentes ORDER BY nome;";
$queryC = mysqli_query($con, $sqlC);
//inclui a parte de cima do template
include_once '../template/template_header.php';
?>
<div class="page-header">
    <h1>Cadastrar Conteudo </h1>
</div>
<div id="form" class="row">
    <form class="form-horizontal" method="POST" action="../DAO/conteudo.php">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">Código:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-center" id="id" name="id" readonly 
                       placeholder="Novo" value="<?= (isset($dados['idconteudo'])) ? $dados['idconteudo'] : null ?>">
                <!-- Verificase veio uma informação do campo e coloca como valor para altera��o-->
            </div>
        </div>
        <div class="form-group">
            <label for="descricao" class="col-sm-2 control-label">Descrição:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="descricao" placeholder="Descrição..."
                       value="<?= (isset($dados['descricao'])) ? $dados['descricao'] : null ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="conteudo" class="col-sm-2 control-label">Conteudo:</label>
            <div class="col-sm-10">                
                       <textarea id="conteudo" name="conteudo" class="form-control" rows="5"><?= (isset($dados['conteudo'])) ? $dados['conteudo'] : null ?></textarea>
            </div>
        </div>
<!--        <div class="form-group">
            <label for="tipo_conteudo" class="col-sm-2 control-label">Tipo de Conteudo:</label>
            <div class="col-sm-10">
                <input type="tipo_conteudo" class="form-control" id="conteudo" name="tipo_conteudo" placeholder="Tipo de Conteudo..."
                       value="<?= (isset($dados['tipo_conteudo'])) ? $dados['tipo_conteudo'] : null ?>"> 
            </div>
        </div>-->
        <div class="form-group">
            <label for="componente" class="col-sm-2 control-label">Componente:</label>
            <div class="col-sm-10">
                <select name="componente" class="form-control">
                    <?php
                    while ($dados = mysqli_fetch_array($queryC)) {
                        ?>
                        <option value="<?= $dados['idcomponente'] ?>"><?= $dados['nome'] . " - " . $dados['ano'] ?></option>
                        <?php
                    }
                    ?>

                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="list_Conteudos.php" class="btn btn-default btn-block">Voltar</a>
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
        if ($("#tipo_conteudo").val() !== $("#confirma").val()) {
            return false;
            $("#erro").removeClass("hide");
        } else {
            $("#erro").addClass("hide");
        }
    });

    //verifica se as senhas sao iguais quando sai do campo de confirma��o.
    function verificaAno() {
        if ($("#tipo_conteudo").val() !== $("#confirma").val()) {
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