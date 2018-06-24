<?php
require_once '../conexao/conexao.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM conteudos WHERE idconteudo = '" . $id . "';";
    $query = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($query);

    if (empty($dados)) {
        header('Location: lis_Conteudos.php');
    }
}

include_once '../template/template_header.php';
?>
<div class="page-header">
    <h1>Excluir Conteudos </h1>
</div>
<div id="form" class="row">
    <form class="form-horizontal" method="POST" action="../DAO/conteudo.php">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">Código:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-center" id="id" name="id" readonly 
                       placeholder="Novo" value="<?= (isset($dados['idconteudo'])) ? $dados['idconteudo'] : null ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Descricao:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="descricao" placeholder="Descricao..."
                       readonly value="<?= (isset($dados['descricao'])) ? $dados['descricao'] : null ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="senha" class="col-sm-2 control-label">Senha:</label>
            <div class="col-4">
                <input type="conteudo" class="form-control" id="conteudo" name="conteudo" placeholder="Conteudo..."
                       readonly value="<?= (isset($dados['conteudo'])) ? $dados['conteudo'] : null ?>">
            </div>
        </div>     
        <div class="form-group">
            <label for="tipo_conteudo" class="col-sm-2 control-label">Tipo de Conteudo:</label>
            <div class="col-sm-10">
                <input type="tipo_conteudo" class="form-control" id="tipo_conteudo" name="tipo_conteudo" placeholder="Tipo de Conteudo..."
                       readonly value="<?= (isset($dados['tipo_conteudo'])) ? $dados['tipo_conteudo'] : null ?>">
            </div>
        </div> 
        <div class="form-group">
            <label for="imagens" class="col-sm-2 control-label">Imagem:</label>
            <div class="col-sm-10">
                <input type="imagens" class="form-control" id="tipo_conteudo" name="imagens" placeholder="Imagem..."
                       readonly value="<?= (isset($dados['imagens'])) ? $dados['imagens'] : null ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="list_Conteudos.php" class="btn btn-default btn-block">Voltar</a>
            </div>            
            <div class="col-sm-offset-4 col-sm-4 col-xs-12">
                <button type="submit" id="excluir" name="excluir" class="btn btn-primary btn-block">Excluir</button>
            </div>
        </div>
    </form>
</div>
<?php
include_once '../template/template_footer.php';
?>