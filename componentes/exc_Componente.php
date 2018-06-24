<?php
require_once '../conexao/conexao.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM componentes WHERE idcomponente = '" . $id . "';";
    $query = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($query);

    if (empty($dados)) {
        header('Location: lis_Componentes.php');
    }
}

include_once '../template/template_header.php';
?>
<div class="page-header">
    <h1>Excluir Componente </h1>
</div>
<div id="form" class="row">
    <form class="form-horizontal" method="POST" action="../DAO/componente.php">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">Código:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-center" id="id" name="id" readonly 
                       placeholder="Novo" value="<?= (isset($dados['idcomponente'])) ? $dados['idcomponente'] : null ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome..."
                       readonly value="<?= (isset($dados['nome'])) ? $dados['nome'] : null ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="senha" class="col-sm-2 control-label">Senha:</label>
            <div class="col-sm-10">
                <input type="senha" class="form-control" id="email" name="senha" placeholder="Senha..."
                       readonly value="<?= (isset($dados['senha'])) ? $dados['senha'] : null ?>">
            </div>
        </div>        
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="list_Componentes.php.php" class="btn btn-default btn-block">Voltar</a>
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