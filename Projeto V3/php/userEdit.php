<?php
session_start();
if(isset($_POST['submit'])){
	include_once 'connect.php';

    $senha = sha1($_POST['senha']);

    $confirma = sha1($_POST['senhaconfirm']);

    if($senha == $confirma){
        $sql = "SELECT * FROM tb_funcionario WHERE id_funcionario = '" .$_SESSION['u_id'] . "'";
        $dados = mysqli_query($conection, $sql);
        $nLinha = mysqli_num_rows($dados);

        if($nLinha >= 1){
            $sql = "UPDATE tb_funcionario SET ds_senha = '$senha' WHERE id_funcionario = '" .$_SESSION['u_id'] . "'";
            mysqli_query($conection, $sql);
            header("Location: ../userPanel.php?cadastro=Senha atualizada");
            exit();
        } else {
            header("Location: ../index.php");
            session_unset();
            exit();
        }
    } else {
        header("Location: ../userPanel.php?cadastro=As senhas não conferem");
        exit();
    }
}