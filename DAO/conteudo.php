<?php

require_once '../conexao/conexao.php';

//verifica se veio da pagina salvar ou excluir
if (isset($_POST['salvar'])) {
    //verifica se é inclusão ou alteração
    if ($_POST['id'] == "") {

        $descricao = $_POST['descricao'];
        $conteudo = $_POST['conteudo'];
        $tipo_conteudo = 'T';
        $imagens = 'N';
        $idcomponente = $_POST['componente'];

        $sql = "INSERT INTO conteudos (descricao, conteudo, tipo_conteudo, idcomponente) VALUES ('$descricao', '$conteudo', '$tipo_conteudo', '$idcomponente')";
        
        $ret = mysqli_query($con, $sql);

        //verifica se deu certo a inclusão
        if ($ret) {
            header('Location: ../conteudos/list_Conteudos.php');
        } else {
            //echo mysqli_error($con);
            header('Location: ../conteudos/iu_Conteudos.php?erro=salvar');
        }
    } else {
        $id = $_POST['id'];
        $descricao = $_POST['descricao'];
        $conteudo = $_POST['conteudo'];
        $tipo_conteudo = $_POST['tipo_conteudo'];
        $imagens = $_POST['imagens'];

        $sql = "UPDATE conteudos SET descricao='$descricao', $conteudo='$conteudo', $tipo_conteudo='tipo_conteudo', $imagens='imagens'  WHERE idconteudo=$id";

        $ret = mysqli_query($con, $sql);

        if ($ret) {
            header('Location: ../conteudos/list_Conteudos.php');
        } else {
            header('Location: ../conteudos/iu_Conteudos.php?erro=alterar');
        }
    }
} else if (isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM conteudos WHERE idconteudo=$id";

    $ret = mysqli_query($con, $sql);

    if ($ret) {
        header('Location: ../conteudos/list_Conteudos.php');
    } else {
        header('Location: ../conteudos/exc_Conteudo.php?erro=alterar');
    }
}   