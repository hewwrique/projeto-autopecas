<?php
    include 'connect.php';

    $produto = $_POST['produto'];
    $quantidade = $_POST['addOnStock'];

    if(isset($_POST['submit']) && !empty($produto) && !empty($quantidade)){

        $sql = "SELECT* FROM tb_estoque WHERE id_produto = '$produto'";
        $dados = mysqli_query($conection, $sql);
        $linha = mysqli_fetch_assoc($dados);

        if($linha['ds_quantidade'] == null){
            $sql = "SELECT * FROM tb_estoque WHERE id_produto = '$produto'";
            $dados = mysqli_query($conection, $sql) or die ('erro');
            $verificaResultado = mysqli_num_rows($dados);

            if($verificaResultado >= 1){
                $sql = "UPDATE tb_estoque SET ds_quantidade = '$quantidade' where id_produto = '$produto'";
                mysqli_query($conection, $sql);

                header('Location: ../products.php?cadastro=Atualização realizada com sucesso');
                exit();

            
            } else {
                header('Location: ../products.php?cadastro=Produto não encontrado');
                exit();
            }
        } else {
            $nStock = $linha['ds_quantidade'] + $quantidade;
            $sql = "UPDATE tb_estoque SET ds_quantidade = '$nStock' where id_produto = '$produto'";
            $dados = mysqli_query($conection, $sql);

            header('Location: ../products.php?cadastro=Atualização realizada com sucesso');
            exit();
        }

        
        
    }else {
        header('Location: ../products.php?cadastro=Favor preencher todos os campos');
        exit();
    }