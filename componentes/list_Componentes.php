<?php
include_once '../conexao/conexao.php';
include_once '../template/template_header.php';

$sql = "SELECT * FROM componentes ORDER BY idcomponente;";
$query = mysqli_query($con, $sql);
//$dados = mysqli_fetch_array($query);
?>
<div class="page-header">
    <h1>Lista de Componentes Cadastrados</h1>
</div>

<div id="acoes" class="text-right row" style="margin-bottom: 10px;">   
    <a href="iu_Componentes.php" class="btn btn-success">
        Novo <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>        
</div>
<div id="table" class="row">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Ano</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($dados = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?= $dados['idcomponente'] ?></td>
                    <td><?= $dados['nome'] ?></td>
                    <td><?= $dados['ano'] ?></td>
                    <td class="text-center">
                        <a href="iu_Componentes.php?id=<?= $dados['idcomponente'] ?>" class="btn btn-warning">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>

                        <a href="exc_Componente.php?id=<?= $dados['idcomponente'] ?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include_once '../template/template_footer.php';
?>