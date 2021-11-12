<?php
    include_once 'connect.php';
    include 'useFunctions.php';
	session_start();

    if(isset($_GET['submit'])){
        $com = $_GET['submit'];

        switch($com){
            case 'add':
                $product = $_GET['produto'];
                $qtd = $_GET['qtd'];

                $exist == false;
                foreach($_SESSION['carrinho'] as $produto){
                    if($produto['id'] == $product){
                        $exist = true;
                    }
                }



                if($exist == true){
                    $i = -1;
                    foreach($_SESSION['carrinho'] as $produto){
                        $i++;
                        if($produto['id'] == $product){
                            $_SESSION['carrinho'][$i]['qtd'] = $produto['qtd'] + $qtd;

                            $_SESSION['carrinho'][$i]['total'] = (int)($_SESSION['carrinho'][$i]['qtd'])*(float)$produto['valor'];
                        }
                        header ("Location: ../purchase.php");
                        exit();
                    }
                } else {
                    $sql = "SELECT * FROM tb_produto WHERE id_produto = $product";
                    $dados = mysqli_query($conection, $sql);
                    $nProducts = mysqli_num_rows($dados);

                    if($nProducts >= 1){
                        $sql = "SELECT ds_quantidade FROM tb_estoque WHERE id_produto = $product ";
                        $dados = mysqli_query($conection, $sql);
                        $nProducts = mysqli_fetch_assoc($dados);

                        if($nProducts['ds_quantidade'] >= $qtd){
                            
                            $sql = "SELECT * FROM tb_produto WHERE id_produto = $product";
                            $dados = mysqli_query($conection, $sql);
                            $linha = mysqli_fetch_assoc($dados);

                            $nomeProduto = $linha['nm_produto'] . " " . $linha['ds_marca'] . " " . $linha['ds_modelo'];
                            $total = (int)$qtd*(float)$linha['vl_produto'];

                            $produto = ["id" => $linha['id_produto'],
                            "descProd" => $nomeProduto,
                            "qtd" => $qtd,
                            "valor" => $linha['vl_produto'],
                            "total" => $total
                            ];

                            $_SESSION['carrinho'][] = $produto;

                            header ("Location: ../purchase.php");
                            exit();
                        } else {
                            header ("Location: ../purchase.php?cadastro=não há o suficiente registrado em estoque");
                            exit();
                        }
                    } else {
                        header ("Location: ../purchase.php?cadastro=não encontrado");
                        exit();
                    } 
                }  
                break;
            case "delete":
                if(!empty($_GET['prodRetira']) && !empty($_GET['delQtd'])){
                    $i = -1;
                    foreach($_SESSION['carrinho'] as $produto){
                        $i++;
                        if($produto['id'] == $_GET['prodRetira']){
                            $_SESSION['carrinho'][$i]['qtd'] = $produto['qtd'] - $_GET['delQtd'];

                            $_SESSION['carrinho'][$i]['total'] = (int)($_SESSION['carrinho'][$i]['qtd'])*(float)$produto['valor'];

                            if($_SESSION['carrinho'][$i]['qtd'] <= 0){
                                unset($_SESSION['carrinho'][$i]);
                            }

                            
                            
                        }
                    } 
                    header ("Location: ../purchase.php");
                    exit();
                }else {
                    echo 'deu não';
                }
                break;
            case "payMethod":

                if($_SESSION['carrinho'] != null){
                    $metodoPag = $_GET['metodoPag'];
                    $valorCliente = $_GET['valorCliente'];

                    if($metodoPag == "dinheiro"){

                        $troco = $valorCliente - valTotal();

                        if($troco < 0){
                            header ("Location: ../purchase.php?cadastro=O valor recebido não pode ser menor que o valor a pagar");
                            exit();
                        } else {
                            
                            $_SESSION['metodoPag'] = $metodoPag;
                            $_SESSION['troco'] = $troco;
                            $_SESSION['valorRecebido'] = $valorCliente;
                        }
                        
                    } else if($metodoPag == "credito"){
                        $valParcel = $valorCliente;
                        if($valParcel < 1){
                            header ("Location: ../purchase.php?cadastro=O número de parcelas deve ser pelo menos igual a 1");
                            exit();
                        } else {
                            $_SESSION['metodoPag'] = $metodoPag;
                            $_SESSION['troco'] = 0;
                            $_SESSION['parcelas'] = $valParcel;
                            $_SESSION['valorRecebido'] = valTotal();
                        }

                    } else if($metodoPag = "debito"){
                        $_SESSION['metodoPag'] = $metodoPag;
                        $_SESSION['troco'] = 0;
                        $_SESSION['valorRecebido'] = valTotal();
                    } else {
                        header ("Location: ../purchase.php?cadastro=nenhum método válido de pagamento inserido");
                        exit();
                    }
                    header ("Location: ../purchase.php");
                    exit();


                } else {
                    header ("Location: ../purchase.php?cadastro=Favor inserir todos os produtos no carrinho primeiro");
                    exit();
                }

                break;
            case"close":
                //var_dump($_SESSION['carrinho']);
                //var_dump($_SESSION['troco']);
                //var_dump($_SESSION['valorRecebido']);
                //var_dump($_SESSION['metodoPag']);
                //var_dump($_SESSION['cliente']);
                if(!empty($_SESSION['parcelas'])){
                    $nParcel = $_SESSION['parcelas'];
                } else {
                    $nParcel = 0;
                }

                if(!empty($_SESSION['desconto'])){
                    $descount = $_SESSION['desconto'];
                } else {
                    $descount = 1;
                    
                }



                if( ($_SESSION['valorRecebido'] - valTotal()) < 0){

                    header ("Location: ../purchase.php?cadastro=Valor pago não pode ser menor que o valor total");
                    exit();

                } else {
                    $data = date('d/m/y');
                    $data = "'".  implode("-",array_reverse(explode("/",$data))). "'";
                    if($_SESSION['carrinho'] != NULL){
                        if(isset($_SESSION['cliente']) != NULL){

                            

                            $sql = "INSERT INTO tb_pedido(id_cliente, id_funcionario, vl_total, dt_pedido, forma_pagamento, qtd_parcelas, id_desconto) VALUES (". 
                            $_SESSION['cliente']. ",".
                            $_SESSION['u_id']. ",".
                            valTotal(). ",".
                            $data. ",".
                            $_SESSION['metodoPag']. ",".
                            $nParcel. ",".
                            $descount. ")";

                            echo $sql;
                            mysqli_query($conection, $sql);

                            $sql = "SELECT * FROM tb_pedido WHERE id_cliente = " . $_SESSION['cliente'] . " ORDER BY id_pedido DESC LIMIT 1";
                            $dados = mysqli_query($conection, $sql);

                            $idpedido = mysqli_fetch_assoc($dados);


                            foreach($_SESSION['carrinho'] as $produto){

                                $sql = "SELECT * FROM tb_estoque WHERE id_produto =". $produto['id'];
                                $dados = mysqli_query($conection, $sql);
                                $linha = mysqli_fetch_assoc($dados);
    
                                $sobra = $linha['ds_quantidade'] - $produto['qtd'];
    
    
                                $sql =  "UPDATE tb_estoque SET ds_quantidade = $sobra WHERE id_produto = ". $produto['id'] ;

                                mysqli_query($conection, $sql);

                                for($i = 0; $i < $produto['qtd']; $i++){
                                    $sql = "INSERT INTO tb_pedidoitem(id_pedido, id_produto) VAlUES (" . $idpedido['id_pedido'] . "," . $produto['id']. ")";
                                    mysqli_query($conection, $sql);
                                }                              

                            }
                            unset($_SESSION['carrinho'], $_SESSION['cliente'], $_SESSION['valorRecebido'], $_SESSION['metodoPag'], $_SESSION['troco'], $_SESSION['desconto'], $_SESSION['vl_desconto'], $_SESSION['parcelas']);
                            header ("Location: ../purchase.php?cadastro=Compra realizada com sucesso");
                            exit();

                        } else {
                            $sql = "INSERT INTO tb_pedido(id_cliente, id_funcionario, vl_total, dt_pedido, forma_pagamento, qtd_parcelas, id_desconto) VALUES (". 
                            1 . ",".
                            $_SESSION['u_id']. ",".
                            valTotal(). ",".
                            $data. ",'".
                            $_SESSION['metodoPag']. "',".
                            $nParcel. ",".
                            $descount. ")";

                            echo $sql;
                            mysqli_query($conection, $sql);

                            $sql = "SELECT * FROM tb_pedido WHERE id_cliente = " . 1 . " ORDER BY dt_pedido DESC LIMIT 1";
                            $dados = mysqli_query($conection, $sql);

                            $idpedido = mysqli_fetch_assoc($dados);

                            foreach($_SESSION['carrinho'] as $produto){

                                $sql = "SELECT * FROM tb_estoque WHERE id_produto =". $produto['id'];
                                $dados = mysqli_query($conection, $sql);
                                $linha = mysqli_fetch_assoc($dados);
    
                                $sobra = $linha['ds_quantidade'] - $produto['qtd'];
    
    
                                $sql =  "UPDATE tb_estoque SET ds_quantidade = $sobra WHERE id_produto = ". $produto['id'] ;

                                mysqli_query($conection, $sql);


                                for($i = 0; $i < $produto['qtd']; $i++){
                                    $sql = "INSERT INTO tb_pedidoitem(id_pedido, id_produto) VAlUES (" . $idpedido['id_pedido'] . "," . $produto['id']. ")";
                                    mysqli_query($conection, $sql);
                                }

                            }
                            unset($_SESSION['carrinho'], $_SESSION['cliente'], $_SESSION['valorRecebido'], $_SESSION['metodoPag'], $_SESSION['troco'], $_SESSION['desconto'], $_SESSION['vl_desconto'], $_SESSION['parcelas']);
                            header ("Location: ../purchase.php?cadastro=Compra realizada com sucesso");
                            exit();
                            
                        }
                        
                    } else {
                        unset($_SESSION['carrinho'], $_SESSION['cliente'], $_SESSION['valorRecebido'], $_SESSION['metodoPag'], $_SESSION['troco'], $_SESSION['desconto'], $_SESSION['vl_desconto'], $_SESSION['parcelas']);
                        header ("Location: ../purchase.php?cadastro=Nenhum produto adicionado ao carrinho");
                        exit();
                    }
                }

                unset($_SESSION['carrinho'], $_SESSION['cliente'], $_SESSION['valorRecebido'], $_SESSION['metodoPag'], $_SESSION['troco'], $_SESSION['desconto'], $_SESSION['vl_desconto'], $_SESSION['parcelas']);
                break;

        }
    } else{
        unset($_SESSION['carrinho'], $_SESSION['cliente'], $_SESSION['valorRecebido'], $_SESSION['metodoPag'], $_SESSION['troco'], $_SESSION['desconto'], $_SESSION['vl_desconto'], $_SESSION['parcelas']);
        header ("Location: ../purchase.php");
        exit();
    }
    



?>