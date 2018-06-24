<?php

require_once '../conexao/conexao.php';

//verifica se veio da pagina salvar ou excluir
if (isset($_POST['salvar'])) {
    //verifica se é inclusão ou alteração
    if ($_POST['id'] == "") {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = base64_encode($_POST['senha']);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        $ret = mysqli_query($con, $sql);

        //verifica se deu certo a inclusão
        if ($ret) {
            header('Location: ../usuarios/list_Usuarios.php');
        } else {
            //echo mysqli_error($con);
            header('Location: ../usuarios/iu_Usuario.php?erro=salvar');
        }
    } else {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = base64_encode($_POST['senha']);

        $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha' WHERE idusuario=$id";

        $ret = mysqli_query($con, $sql);

        if ($ret) {
            header('Location: ../usuarios/list_Usuarios.php');
        } else {
            header('Location: ../usuarios/iu_Usuario.php?erro=alterar');
        }
    }
} else if (isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM usuarios WHERE idusuario=$id";

    $ret = mysqli_query($con, $sql);

    if ($ret) {
        header('Location: ../usuarios/list_Usuarios.php');
    } else {
        header('Location: ../usuarios/exc_Usuario.php?erro=alterar');
    }
}