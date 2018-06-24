<?php
require_once '../conexao/conexao.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE idusuario = '" . $id . "';";
    $query = mysqli_query($con, $sql);
    $dados = mysqli_fetch_array($query);

    if (empty($dados)) {
        header('Location: list_Usuarios.php');
    }
}

include_once '../template/template_header.php';
?>
<div class="page-header">
    <h1>Excluir Usuário </h1>
</div>
<div id="form" class="row">
    <form class="form-horizontal" method="POST" action="../DAO/usuario.php">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">Código:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control text-center" id="id" name="id" readonly 
                       placeholder="Novo" value="<?= (isset($dados['idusuario'])) ? $dados['idusuario'] : null ?>">
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
            <label for="email" class="col-sm-2 control-label">E-mail:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail..."
                       readonly value="<?= (isset($dados['email'])) ? $dados['email'] : null ?>">
            </div>
        </div>        
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="list_Usuarios.php" class="btn btn-default btn-block">Voltar</a>
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