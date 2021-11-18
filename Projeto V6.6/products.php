<?php 	
	include_once 'php/connect.php';
  include 'php/useFunctions.php';
	session_start();
  include 'header.php';
?>

<body class="container-inicial" onload="start();">
  <?php include 'nav.php' ?>
  <div class="row bg-white mx-auto mt-3 rounded" style="width: 80vw;">
    <div class="col">
      <button type="button" class="products-button rounded bg-secondary text-white m-1"
        onclick="productsShow('search')">Verificar disponibilidade de produtos</button>
    </div>
    <div class="col">
      <button type="button" class="products-button rounded bg-secondary text-white m-1"
        onclick="productsShow('addInventory')">Adicionar ao estoque</button>
    </div>
    <div class="col">
      <button type="button" class="products-button rounded bg-secondary text-white m-1"
        onclick="productsShow('addProduct')">Modificar produtos</button>
    </div>
    <div class="products-master m-1 border-bottom">

      <div class="row products-child" id="searchProd">
        <form>
          <label>Procurar por?</label>
          <button type="button" class="rounded bg-secondary text-white m-1" style="float: right;"><img
              src="Images/lupa.png" width="20px" height="20px"></button>
          <input type="text" style="float: right;" class="mt-1">
          <select class="form-select" aria-label="Default select example" id="cargoFunc" name="cargoFunc" style="float: right;">
            <option value="vendedor">Nome produto</option>
            <option value="estoquista">Valor do produto</option>
            <option value="diretor">ID do Produto</option>
          </select>
          <table class="table">
            <thead class="thead-dark border text-white bg-black mt-3">
              <tr>
                <th scope="col">ID produto</th>
                <th scope="col">Nome produto</th>
                <th scope="col">Modelo produto</th>
                <th scope="col">Marca produto</th>
                <th scope="col">Valor produto</th>
                <th scope="col">Qtd em estoque</th>
                
              </tr>
            </thead>
            <tbody>
              
              <?php showProducts(); ?> <!--Função qual mostra os produtos, abrir o "php/useFunctions.php" para fazer modificações -->

            </tbody>
          </table>
        </form>
      </div>

      <!-- Fim de verificar disponibilidade inicio de modificar produto-->

      <div class="row products-child mt-0 pb-1" id="modProducts">
        <form method="POST" action="php/productProdCad.php">
          <div class="row">
            <div class="col">
              <label>ID Produto </label></br>
              <input type="text" name="prodId" id="prodId" value="<?php echo isset($_GET['id'])? $_GET['id']: '' ;?>">
            </div>
            <div class="col">
              <label>Nome produto </label></br>
              <input type="text" name="prodName" id="prodName" value="<?php echo isset($_GET['nome'])? $_GET['nome']: '' ; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label>Modelo do produto</label></br>
              <input type="text" name="prodModel" id="prodModel" value="<?php echo isset($_GET['modelo'])? $_GET['modelo']: '' ; ?>">
            </div>
            <div class="col">
              <label>Marca do produto</label></br>
              <input type="text" name="prodBrand" id="prodBrand" value="<?php echo isset($_GET['marca'])? $_GET['marca']: '' ; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label>Valor produto </label></br>
              <input type="number" step="0.01" name="prodVal" id="prodVal" value="<?php echo isset($_GET['valor'])? $_GET['valor']: '' ; ?>">
            </div>
          </div>
          <script type="text/javascript" language="javascript">
            <?php 
                if(isset($_GET['id'])){
                  echo "document.getElementById('prodId').readOnly = true";
                } else {
                  echo "document.getElementById('prodId').readOnly = false";
                }
            ?>
          </script>
          </br>
          <div class="row">
            <div class="col">
              <button id="btnSearchModProd" name="submit" value="search" class="btn-rounded bg-secondary text-white">Procurar</button>

              <button id="btnEditModProd" name="submit" value="edit" class="btn-rounded bg-secondary text-white">Editar</button>

              <!--<button id="btnAddModProd" name="submit" value="delete" class="btn-rounded bg-secondary text-white">Excluir</button>-->

              <button id="btnAddModProd" name="submit" value="add" class="btn-rounded bg-secondary text-white">Adicionar</button>

              <button id="btnCancelModProd" name="submit" value="cancel" class="btn-rounded bg-secondary text-white" onclick="limpa()">Limpar</button>

            </div>
          </div>
        </form>
      </div>

      <!-- Começo da página de adicionar ao estoque-->
      <div class="row products-child mt-0 pb-1" id="addInventory">
        <form method="post" action="php/addToStock.php">
          <div class="row">
            <div class="col">
              <label>Produto a ser adicionado:</label></br>
            </div>
            <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Escreva para procurar" name="produto">
            <datalist id="datalistOptions" name="produto">
            <?php showCadProduct(); ?>
            </datalist>
            <div class="col">
            </br>
              <label>Quantidade a ser adicionada: </label></br>
              <input type="number" name="addOnStock">
            </div>
          </div>
          </br>
          <div class="row">
            <div class="col">
              <input type="submit" class="btn-rounded bg-secondary text-white" value="Adicionar ao estoque" name="submit">
            </div>
          </div>
        </form>
      </div>

  </div>

</body>

</html>