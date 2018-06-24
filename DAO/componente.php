<?php

require_once '../conexao/conexao.php';

//verifica se veio da pagina salvar ou excluir
if (isset($_POST['salvar'])) {
    //verifica se é inclusão ou alteração
    if ($_POST['id'] == "") {

        $nome = $_POST['nome'];
        $ano = $_POST['ano'];

        $sql = "INSERT INTO componentes (nome, ano) VALUES ('$nome', '$ano')";
        $ret = mysqli_query($con, $sql);

        //verifica se deu certo a inclusão
        if ($ret) {
            header('Location: ../componentes/list_Componentes.php');
        } else {
            //echo mysqli_error($con);
            header('Location: ../componentes/iu_Componentes.php?erro=salvar');
        }
    } else {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $ano = $_POST['ano'];

        $sql = "UPDATE componentes SET nome='$nome', ano='$ano'  WHERE idcomponente=$id";

        $ret = mysqli_query($con, $sql);

        if ($ret) {
            header('Location: ../componentes/list_Componentes.php');
        } else {
            header('Location: ../componentes/iu_Componentes.php?erro=alterar');
        }
    }
} else if (isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM componentes WHERE idcomponente=$id";

    $ret = mysqli_query($con, $sql);

    if ($ret) {
        header('Location: ../componentes/list_Componentes.php');
    } else {
        header('Location: ../componentes/exc_Componente.php?erro=alterar');
    }
}   