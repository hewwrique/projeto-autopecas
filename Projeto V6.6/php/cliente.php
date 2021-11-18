<?php
    include '../header.php';
	include_once 'connect.php';
	session_start();


    if(isset($_POST['submit'])){
        switch($_POST['submit']){

            // Caso seja para cadastrar cliente
            case'cadastrar':
                if(!empty($_POST['nome']) && !empty($_POST['CPF']) && !empty($_POST['telefone']) && !empty($_POST['endereco']) && !empty($_POST['dtNasc'])){
                    $nome = $_POST['nome'];
                    $cpf = $_POST['CPF'];
                    $telefone = $_POST['telefone'];
                    $end = $_POST['endereco'];
                    $dtNasc = $_POST['dtNasc'];

                    $sql = "SELECT * FROM tb_cliente WHERE nm_cliente = '$nome'";
                    $dados = mysqli_query($conection, $sql);
                    $achou = mysqli_num_rows($dados);
                    if($achou >= 1){
                        header ("Location: ./purchase.php?cadastro=Cliente já cadastrado");
                        exit(); 
                    } else {
                        $sql ="INSERT INTO tb_cliente (nm_cliente, ds_cpf, ds_telefone, ds_endereco, dt_nascimento) VALUES ('$nome', '$cpf', '$telefone', '$end', '$dtNasc')";
                        mysqli_query($conection, $sql);
                        echo $sql;
                        $sql = "SELECT * FROM tb_cliente WHERE nm_cliente = '$nome'";
                        $dados = mysqli_query($conection, $sql);
                        $linha = mysqli_fetch_assoc($dados);
                        echo $sql;
                        $_SESSION['cliente'] = $linha['id_cliente'];

                        header ("Location: ../purchase.php?cadastro=Usuário cadastrado com sucesso, já adicionado a compra também");
                        exit();
                    }

                } else {
                    header ("Location: ./purchase.php?cadastro=um dos campos está vázio");
                    exit();
                }
                break;

            //Caso seja para apenas adicionar cliente a compra
            case 'add':
                if(!empty($_POST['cliente'])){

                    $cliente = $_POST['cliente'];

                    $sql = "SELECT * FROM tb_cliente WHERE id_cliente = '$cliente'";
                    $dados = mysqli_query($conection, $sql);
                    $achou = mysqli_num_rows($dados);
                    if($achou >= 1){
                        $linha = mysqli_fetch_assoc($dados);
                        $_SESSION['cliente'] = $linha['id_cliente'];
                        
                        header ("Location: ../purchase.php?estado=add&cadastro=Cliente adicionado a compra");
                        exit();
                    } else {
                        header ("Location: ./cliente.php?estado=add&cadastro=usuário não encontrado no banco de dados");
                        exit();
                    }
                } else {
                    header ("Location: ./cliente.php?estado=add&cadastro=Usuário cadastrado com sucesso, já adicionado a compra também");
                    exit();
                }
                
                break;
        }
        
    }
