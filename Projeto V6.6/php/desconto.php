<?php 

    include 'connect.php';
    session_start();

    if(isset($_POST['submit']) || isset($_GET['submit'])){
        
        if($_POST['submit'] != null){
            $com = $_POST['submit'];

        }
        else if($_GET['submit'] != null){
            $com = $_GET['submit'];
        } else {
            $com = "default";
        }

        switch ($com){
            case "add":

                $codigo = $_POST['cd'];
                $valor = $_POST['valor'];
                $validade = $_POST['dtValidade'];

                if(!empty($codigo) && !empty($valor) && !empty($validade) ){
                    
                    $dataHoje =  date('y-m-d');

                    if (strtotime($dataHoje) >= strtotime($validade)){
                        header("Location: ../discount.php?cadastro=a data de vencimento do desconto não pode ser menor que a data atual");
                        exit();
                    } else if ($valor >= 100){
                        header("Location: ../discount.php?cadastro=o valor do desconto não pode ser maior ou igual a 100%");
                        exit();
                    } else {
                        $sql = "INSERT INTO tb_desconto (cd_desconto, vl_desconto, dt_validade, ds_ativo) VALUES ('$codigo', $valor, '$validade', 1)";
                        mysqli_query($conection, $sql);
                        header("Location: ../discount.php?cadastro=desconto cadastrado no banco");
                        exit();
                    }
                } else {
                    header("Location: ../discount.php?cadastro=Um dos campos está vazio");
                    exit();
                }


                
                break;
            case "deactive":
                $idDesc = $_GET['descontoID'];

                $sql = "SELECT * FROM tb_desconto WHERE id_desconto = $idDesc";
                $dados = mysqli_query($conection, $sql);
                
                $achou = mysqli_num_rows($dados);

                if($achou >= 1){
                    $linha = mysqli_fetch_assoc($dados);

                        $sql = "UPDATE tb_desconto SET ds_ativo = 0 WHERE id_desconto = $idDesc";
                        mysqli_query($conection,$sql);

                        header("Location: ../discount.php?desconto desativado");
                        exit();
                    } else {
                    header("Location: ../discount.php?Desconto não encontrado no banco de dados");
                    exit();
                    }
                break;
            case "addCompra":
                if(!empty($_POST['desconto'])){
                    $idDesc = $_POST['desconto'];

                    $sql = "SELECT * FROM tb_desconto WHERE id_desconto = $idDesc";
                    $dados = mysqli_query($conection, $sql);
                    $achou = mysqli_num_rows($dados);

                    //echo $sql;

                    //echo $achou;

                    if($achou >= 1){
                        $linha = mysqli_fetch_assoc($dados);

                        if($linha['ds_ativo'] != 0){
                            $_SESSION['desconto'] = $linha['id_desconto'];
                            $_SESSION['vl_desconto'] = $linha['vl_desconto'];

                            echo $_SESSION['desconto'];

                            header ("Location: ../purchase.php?cadastro=Desconto de ". $linha['vl_desconto']. "% aplicado a compra");
                            exit();

                        } else {
                            header ("Location: ../purchase.php?cadastro=Cupom fora de validade ou desativado");
                            exit();
                        }


                    } else {
                        header ("Location: ../purchase.php?cadastro=Cupom inexistente no banco de dados");
                        exit();
                    }


                }else {

                    header ("Location: ../purchase.php?cadastro=Nenhum valor inserido");
                    exit();
                }
                break;
            default:
                header("Location: ../discount.php");
                exit();
                break;
        }



    } else {
        header("Location: ../discount.php");
        exit();
    }