<?php 	
	include_once 'php/connect.php';
	session_start();
    include 'header.php';
    include 'php/useFunctions.php';
?>
    <body class="container-inicial" onload="start();">
  <?php include 'nav.php' ?>
  <div class="row bg-white mx-auto mt-3 rounded" style="width: 80vw;">
    <div class="m-1 border-bottom">

      <div class="row" id="">
        <form>
          <table class="table">
            <thead class="thead-dark border text-white bg-black mt-3">
              <tr>
                <th scope="col">ID Produto</th>
                <th scope="col">Nome</th>
                <th scope="col">Modelo</th>
                <th scope="col">Marca</th>
                <th scope="col">Valor</th>
                <th scope="col">Qtd. Em Estoque</th>
              </tr>
            </thead>
            <tbody>
              
              <?php showLowItens(); ?> <!--Função qual mostra os funcionários, abrir o "php/useFunctions.php" para fazer modificações -->

            </tbody>
          </table>
        </form>
      </div>
</body>