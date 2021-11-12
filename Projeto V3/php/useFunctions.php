<?php

/*Funções para produtos ------------------------------------------------------------------------------------------------------------------------------------------------------------ */
function showCadProduct(){
    include 'connect.php';

    for($i = 0; $i <= numberOfProduct(); $i++){
        $sql = "SELECT * FROM tb_produto WHERE id_produto = '$i'";
        $dados = mysqli_query($conection, $sql);
        $linha = mysqli_fetch_assoc($dados);

        if($linha != null){
            $sql = "SELECT * FROM tb_estoque WHERE id_produto = '$i'";
            $dados = mysqli_query($conection, $sql);
            $stock = mysqli_fetch_assoc($dados);

            echo '<option value="'. $linha['id_produto']. '">' .$linha['id_produto']. " - " . $linha['nm_produto']. " - ".$linha['ds_marca']. " - ".$linha['ds_modelo'] ." - ". $stock['ds_quantidade'] ."</option>";
            echo "</br>";
        }   
    }
}

function showProducts(){
    include 'connect.php';

    for($i = 0; $i <= numberOfProduct(); $i++){
        $sql = "SELECT p.id_produto, e.ds_quantidade, p.nm_produto, p.vl_produto, p.ds_marca, p.ds_modelo FROM tb_estoque as e 
        INNER JOIN tb_produto as p on e.id_produto = p.id_produto where p.id_produto = $i;";

        $dados = mysqli_query($conection, $sql);
        $linha = mysqli_fetch_assoc($dados);

        if($linha != null){
            echo
            "<tr>
                <td>
                  <p>".$linha['id_produto']."</p>
                </td>

                <td>
                  <p>".$linha['nm_produto']."</p>
                </td>

                <td>
                  <p>".$linha['ds_modelo']."</p>
                </td>
                <td>
                  <p>".$linha['ds_marca']."</p>
                </td>
                <td>
                  <p> R$".$linha['vl_produto']."</p>
                </td>
                <td>
                  <p>".$linha['ds_quantidade']."</p>
                </td>
              </tr>";

        }
        
    }
}

function numberOfProduct(){
  include 'connect.php';
  
  $sql = "SELECT * FROM tb_produto ORDER BY id_produto DESC LIMIT 1";

  $dados = mysqli_query($conection, $sql);

  $linha = mysqli_fetch_assoc($dados);

  return $linha['id_produto'];
    
}

/*Funções do carrinho ----------------------------------------------------------------------------------------------------------------------------------*/
function listar(){
  foreach($_SESSION['carrinho'] as $produto) {
    echo"
    <tr>
      <td><p>" .$produto['id']."</p></td>
      <td><p>" .$produto['descProd']."</p></td>
      <td><p>" .$produto['qtd']."</p></td>
      <td><p>" .$produto['valor']."</p></td>
      <td><p>" .$produto['total']."</p></td>
    </tr>
    ";
  }
}

function listarRetirada(){
  foreach($_SESSION['carrinho'] as $produto){
    echo "<p><input type='radio' name='prodRetira' value=".$produto['id'].">  ". $produto['id'] . " - ".$produto['descProd']." - ".$produto['qtd']. " - " .$produto['valor']. " - " .$produto['total']."</p>";
  }
}

function ultimoAdd(){
  if(!empty($_SESSION['carrinho'])){
    $last = count($_SESSION['carrinho']) - 1;
    echo $_SESSION['carrinho'][$last]['valor'];
  } else {
    echo '0';
  }
}

function valTotal(){
  $total = 0;
  foreach($_SESSION['carrinho'] as $produto){
    $total += $produto['total'];
  }
  if($total > 500 && empty($_SESSION['vl_desconto'])){
    $total =  $total - ($total * (15/100));
  } else if (isset($_SESSION['vl_desconto']) && ($_SESSION['vl_desconto'] > 15)){
    $total = $total * ($_SESSION['vl_desconto']/100);
  } else if(isset($_SESSION['vl_desconto']) && $_SESSION['vl_desconto'] > 0 ){
    $total = $total * ($_SESSION['vl_desconto']/100);
  }


  return $total;
}

/*Funções funcionário------------------------------------------------------------------------------------------------------------------------------------------------------------*/

function numberOfEmployees(){
  include 'connect.php';

  $sql = "SELECT * FROM tb_funcionario ORDER BY id_funcionario DESC LIMIT 1";

  $dados = mysqli_query($conection, $sql);

  $linha = mysqli_fetch_assoc($dados);

  return $linha['id_funcionario'];

}
function showEmployees(){
  include 'connect.php';

  for($i = 0; $i <= numberOfEmployees(); $i++){
      $sql = "SELECT id_funcionario, nm_funcionario, ds_rg, ds_cpf, vl_salario, ds_endereco, dt_nascimento, ds_cargo, ds_senha, ds_email FROM tb_funcionario where id_funcionario = $i;";

      $dados = mysqli_query($conection, $sql);
      $linha = mysqli_fetch_assoc($dados);

      if($linha != null){
          echo
          "<tr>
              <td>
                <p>".$linha['id_funcionario']."</p>
              </td>

              <td>
                <p>".$linha['nm_funcionario']."</p>
              </td>
              <td>
                <p>".$linha['ds_rg']."</p>
              </td>
              <td>
                <p>".$linha['ds_cpf']."</p>
              </td>
                <td>
                <p>".$linha['vl_salario']."</p>
              </td>
              <td>
                <p>".$linha['ds_endereco']."</p>
              </td>
              <td>
                <p>".$linha['dt_nascimento']."</p>
              </td>
              <td>
                <p>".$linha['ds_cargo']."</p>
              </td>
              <td>
                <p>".$linha['ds_email']."</p>
              </td>
            </tr>";

      }

  }
}

/*Funções para clientes ---------------------------------------------------------------------------------------------------------------------------------------------- */

function listClient(){
  include 'connect.php';

  $sql = "SELECT * FROM tb_cliente ORDER BY id_cliente DESC LIMIT 1";
  $dados = mysqli_query($conection,$sql);
  $linha = mysqli_fetch_assoc($dados);

  $n = $linha['id_cliente'];

  for($i = 0; $i <= $n; $i++){
      $sql = "SELECT * FROM tb_cliente WHERE id_cliente = '$i'";
      $dados = mysqli_query($conection,$sql);
      $linha = mysqli_fetch_assoc($dados);

      if($linha != null){
          echo'<option value="'
              . $linha['id_cliente']. '">'
              . $linha['nm_cliente'] . " - "
              . $linha['ds_cpf'] . " - "
              . $linha['ds_telefone'] . " - "
              . $linha['ds_endereco'] . " - "
              . $linha['dt_nascimento']
              . "</option>";
      }
  }
}

/*Funções de alerta -------------------------------------------------------------------------------------------------------------------------------------------------- */
function showLowItens(){
  include 'connect.php';

  for($i = 0; $i <= numberOfProduct(); $i++){
      $sql = "SELECT p.id_produto, e.ds_quantidade, p.nm_produto, p.vl_produto, p.ds_marca, p.ds_modelo FROM tb_estoque as e 
      INNER JOIN tb_produto as p on e.id_produto = p.id_produto where p.id_produto = $i and e.ds_quantidade < 5;";

      $dados = mysqli_query($conection, $sql);
      $linha = mysqli_fetch_assoc($dados);

      if($linha != null){
          echo
          "<tr>
              <td>
                <p>".$linha['id_produto']."</p>
              </td>

              <td>
                <p>".$linha['nm_produto']."</p>
              </td>

              <td>
                <p>".$linha['ds_modelo']."</p>
              </td>
              <td>
                <p>".$linha['ds_marca']."</p>
              </td>
              <td>
                <p> R$".$linha['vl_produto']."</p>
              </td>
              <td>
                <p>".$linha['ds_quantidade']."</p>
              </td>
            </tr>";

      }

  }
}
function alert(){
  include 'connect.php';
  $sql = "SELECT p.id_produto, e.ds_quantidade, p.nm_produto, p.vl_produto, p.ds_marca, p.ds_modelo FROM tb_estoque as e 
  INNER JOIN tb_produto as p on e.id_produto = p.id_produto where e.ds_quantidade < 5;";
  $dados = mysqli_query($conection, $sql);
  $nAlertas = mysqli_num_rows($dados);

  return $nAlertas;
}

/*Funções para Desconto ----------------------------------------------------------------------------------------------------------------------------------------------------------- */
function numberOfDescount(){
  include 'connect.php';

  $sql = "SELECT * FROM tb_desconto ORDER BY id_desconto DESC LIMIT 1";

  $dados = mysqli_query($conection, $sql);

  $linha = mysqli_fetch_assoc($dados);

  return $linha['id_desconto'];

}

function listDescount(){
  include 'connect.php';

  $state = '';
  for($i = 0; $i <= numberOfDescount(); $i++){

      $sql = "SELECT * FROM tb_desconto WHERE id_desconto = $i";

      $dados = mysqli_query($conection, $sql);
      $linha = mysqli_fetch_assoc($dados);

      
      
      if(!empty($linha['ds_ativo']) == false){
        $state = 'Desativado';
      } else {
        $state = 'Desativar';
      }

      if($linha != null){
          $result = 
          "<tr>
            <td>
              <p>".$linha['id_desconto']."</p>
            </td>

            <td>
              <p>".$linha['cd_desconto']."</p>
            </td>

            <td>
              <p>".$linha['vl_desconto']."</p>
            </td>
            <td>
              <p>".$linha['dt_validade']."</p>
            </td>
            <td>";
          if($state == "Desativado"){
            $result = $result . "<a disabled href = 'php/desconto.php?submit=deactive&descontoID=".$linha['id_desconto']."'>$state </a>";
          } else {
            $result = $result . "<a href = 'php/desconto.php?submit=deactive&descontoID=".$linha['id_desconto']."'>$state </a>";
          }
          $result = $result . "
          </td>
        </tr>";
        echo $result;

      }
  }
}

function showDiscount(){
  include 'connect.php';

  $sql = "SELECT * FROM tb_desconto ORDER BY id_desconto DESC LIMIT 1";
  $dados = mysqli_query($conection,$sql);
  $linha = mysqli_fetch_assoc($dados);

  $n = $linha['id_desconto'];

  for($i = 0; $i <= $n; $i++){
      $sql = "SELECT * FROM tb_desconto WHERE id_desconto = '$i'";
      $dados = mysqli_query($conection,$sql);
      $linha = mysqli_fetch_assoc($dados);

      echo $sql;
      var_dump($linha);

      if($linha != null && $linha['ds_ativo'] != 0){
        echo'<option value="'
        . $linha['id_desconto']. '">'
        . $linha['cd_desconto'] . " - "
        . $linha['vl_desconto'] . " - "
        . $linha['dt_validade'] . " - "
        . $linha['ds_ativo'] . "</option>";
      }
  }
}

/* Funções de pedido -------------------------------------------------------------------------------------------------------------------------------------------------------------- */
function showOrders(){
  include 'connect.php';

  for($i = 0; $i <= numberOfOrders(); $i++){
    $sql = "SELECT * FROM tb_pedido WHERE id_pedido = $i";
    $dados = mysqli_query($conection, $sql);
    $linha = mysqli_fetch_assoc($dados);

    if($linha != null){
      $sql = "SELECT * FROM tb_desconto WHERE id_desconto =" . $linha['id_desconto'];
      $dados = mysqli_query($conection, $sql);
      $discount = mysqli_fetch_assoc($dados);

      echo "
      <tr>
        
          <td><a href ='./pedidos.php?id_pedido=".$linha['id_pedido']."'>" .$linha['id_pedido'] ."</a></td>
          <td>". $linha['id_cliente']."</td>
          <td>". $linha['id_funcionario']."</td>
          <td>". $linha['vl_total']."</td>
          <td>". $linha['forma_pagamento']."</td>
          <td>". $linha['dt_pedido']."</td>
          <td>". $linha['qtd_parcelas']."</td>
          <td>". $linha['id_desconto']."</td>
          <td>". (int)$discount['vl_desconto']."%</td>
        
      </tr>
      ";
    }
  }

}

function numberOfOrders(){

  include 'connect.php';

  $sql = "SELECT * FROM tb_pedido ORDER BY id_pedido DESC LIMIT 1";
  $dados = mysqli_query($conection, $sql);
  $nProd = mysqli_fetch_assoc($dados);

  return $nProd['id_pedido'];

}

function showOrdersProducts($idPedido){

    include 'connect.php';

    $sql = "SELECT * FROM tb_pedido WHERE id_pedido = $idPedido";
    $dados = mysqli_query($conection, $sql);
    $achou = mysqli_num_rows($dados);

    if($achou >= 1){

      $sql = "SELECT * FROM tb_pedidoitem WHERE id_pedido = $idPedido";
      $dados = mysqli_query($conection, $sql);
      $linha = mysqli_fetch_assoc($dados);

      $nProdutos = mysqli_num_rows($dados);

      for($i = 0; $i <= $nProdutos ;$i++){
        //Pesquisa no banco cada produto por pedido
        $sql = "SELECT * FROM tb_pedidoitem WHERE id_pedido = $idPedido AND id_pedidoitem =". (int)$linha['id_pedidoitem'] + $i;
        $dados = mysqli_query($conection, $sql);
        $produto = mysqli_fetch_assoc($dados);

        //pesquisa as informações do produto no banco

        if($produto != null){
          //pesquisa as informações do produto no banco
          $sql = "SELECT * FROM tb_produto where id_produto = " . $produto['id_produto'];
          $dados = mysqli_query($conection, $sql);
          $produto = mysqli_fetch_assoc($dados);

          echo "
            <tr>
          
              <td>". $produto['id_produto']."</td>
              <td>". $produto['nm_produto']."</td>
              <td>". $produto['vl_produto']."</td>
              <td>". $produto['ds_marca']."</td>
              <td>". $produto['ds_modelo']."</td>
          
            </tr>";
        }
      }      
    } else {

    }

}

