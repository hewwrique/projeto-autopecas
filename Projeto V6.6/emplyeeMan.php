<?php 	
	include_once 'php/connect.php';
	session_start();
    include 'header.php';
    include 'php/useFunctions.php'
?>

    <body class="container-inicial">
            <?php include 'nav.php' ?>
            <div class="d-flex justify-content-start">
              <div class="d-flex justify-content-center bg-white mx-auto mt-3 rounded" style="width: 30%;">
                <form class="m-3" method="POST" action="php/cadastroFunc.php">
                    <div class="row">

                        <div class="col">
                            <img src="Images/default-user.png" width="100px" height="100px">
                        </div>
                        <div class="col">
                            <label for="idFunc">Id</label>
                            </br>
                            <input type="text" name="idFunc" id="idFunc" value="<?php echo isset($_GET['id'])? $_GET['id']: '' ;?>">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="nomeFunc">Nome</label>
                            </br>
                            <input type="text" id="nomeFunc" name="nameFunc" data-required data-only-letters value="<?php echo isset($_GET['nome'])? $_GET['nome']: '' ;?>">
                        </div>
                        <div class="col">
                            <label for="rgFunc">RG</label></br>
                            <input type="text" id="rgFunc" name="rgFunc" data-required value="<?php echo isset($_GET['rg'])? $_GET['rg']: '' ;?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="cpfFunc">CPF</label></br>
                            <input type="text" id="cpfFunc" name="cpfFunc" data-required value="<?php echo isset($_GET['cpf'])? $_GET['cpf']: '' ;?>">
                        </div>
                        <div class="col">
                            <label for="salFunc">Salário</label></br>
                            <input type="number" id="salFunc" step="0.01"  name="salFunc" data-required value="<?php echo isset($_GET['sal'])? $_GET['sal']: '' ;?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="endFunc">Endereço</label></br>
                            <input type="text" id="endFunc" name="endFunc" data-required value="<?php echo isset($_GET['end'])? $_GET['end']: '' ;?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="cargoFunc">Cargo</label></br>
                            <select class="form-select" aria-label="Default select example" id="cargoFunc" name="cargoFunc">
                            <option selected = "selected"><?php echo isset($_GET['cargo'])? $_GET['cargo']: 'Vendedor' ;?></option>
                            <option value="vendedor">Vendedor</option>
                            <option value="estoquista">Estoquista</option>
                            <option value="diretor">Diretor</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="nascFunc">Data de nascimento</label></br>
                            <input type="date" id="nascFunc" name="nascFunc" data-required value="<?php echo isset($_GET['nasc'])? $_GET['nasc']: '' ;?>">
                        </div>
                        <!--<div class="col">
                            <label for="metaFunc">Meta de vendas</label></br>
                            <input type="number" id="metaFunc">
                        </div>-->
                    </div>
                </br>
                <div class="d-flex justify-content-center">
                <button id="btnSearchModProd" name="submit" value="search" class="btn-rounded bg-secondary text-white">Procurar</button>

                <button id="btnEditModProd" name="submit" value="edit" class="btn-rounded bg-secondary text-white">Editar</button>

                <button id="btnCancelModProd" name="submit" value="cancel" class="btn-rounded bg-secondary text-white" onclick="limpa()">Limpar</button>

                <button id="btnAddModProd" name="submit" value="add" class="btn-rounded bg-secondary text-white">Adicionar</button>

                </div>
                </form>
            </div>
            <script type="text/javascript" language="javascript">
                <?php 
                    if(isset($_GET['id'])){
                        echo "document.getElementById('idFunc').readOnly = true";
                    } else {
                        echo "document.getElementById('idFunc').readOnly = false";
                    }
                ?>
            </script>
            <div class=" bg-white mx-auto mt-3 rounded" style="width: 80vw;">
            <div class="m-1 border-bottom">

            <div class="" id="">
                <form>
                <h2>Lista de funcionários </h2>
                <table class="table">
                    <thead class="thead-dark border text-white bg-black mt-3">
                    <tr>
                        <th scope="col">ID funcionário</th>
                        <th scope="col">Nome</th>
                        <th scope="col">RG</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Salário</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Cargo</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php showEmployees(); ?> <!--Função qual mostra os funcionários, abrir o "php/useFunctions.php" para fazer modificações -->
                    
                    </tbody>
                </table>
                </form>
            </div>
            </div>
    </body>
</html>