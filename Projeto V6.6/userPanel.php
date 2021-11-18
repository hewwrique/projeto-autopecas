<?php 	
	include_once 'php/connect.php';
	session_start();
                            $sql = "SELECT * FROM tb_funcionario WHERE id_funcionario = '". $_SESSION['u_id']. "'";
                            $dados = mysqli_query($conection, $sql);
                            $linha = mysqli_fetch_assoc($dados);
                            #var_dump($linha);
    include 'header.php'
                        
                        
?>
    <body class="container-inicial">
            <?php include 'nav.php' ?>

              <div class="d-flex justify-content-center bg-white mx-auto mt-3 rounded" style="width: 45vw;">
                <form class="m-3" method="POST" action="php/userEdit.php">
                    <div class="row">
                        
                        <div class="col">
                            <img src="Images/default-user.png" width="100px" height="100px">
                        </div>

                        <div class="col">
                            <label for="idFunc">Id</label>
                            </br>
                            <input type="text" disabled id="idFunc" value="<?php echo $linha['id_funcionario']; ?>">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="nomeFunc">Nome</label>
                            </br>
                            <input type="text" disabled id="1Func" name="name" value="<?php echo $linha['nm_funcionario']; ?>">
                        </div>
                        <div class="col">
                            <label for="rgFunc">RG</label></br>
                            <input type="text" disabled id="2Func" name="rg" value="<?php echo $linha['ds_rg']; ?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="cpfFunc">CPF</label></br>
                            <input type="text" disabled id="3Func" name="cpf" value="<?php echo $linha['ds_cpf']; ?>">
                        </div>
                        <div class="col">
                            <label for="salFunc">Salário</label></br>
                            <input type="number" step="0.01" disabled id="4Func" name="salario" value="<?php echo $linha['vl_salario']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="endFunc">Endereço</label></br>
                            <input type="text" disabled id="5Func" name="endereco" value="<?php echo $linha['ds_endereco']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="senha">Nova Senha</label></br>
                            <input type="password" disabled id="7Func" name="senha">
                        </div>
                        <div class="col">
                            <label for="senhaconfirm"> Confimar nova Senha </label>
                            <input type="password" disabled id="8Func" name="senhaconfirm">
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col">
                            <label for="nascFunc">Data de nascimento</label></br>
                            <input type="date" disabled id="9Func" name="dtNasc" value="<?php echo $linha['dt_nascimento']; ?>">
                        </div>
                        <div class="col">
                            <label for="cargoFunc">Cargo</label></br>
                            <input type="text" disabled id="10Func" value="<?php echo $linha['ds_cargo']; ?>">
                        </div>
                    </div>
                </br>
                <div class="d-flex justify-content-center">
                    <button type="button" class="rounded bg-secondary text-white" onclick="editUserPanel()">Mudar senha</button>

                    <input type="submit" class="rounded bg-secondary text-white" name="submit" value="Salvar">

                </div>
                </form>
              </div>
    </body>
</html>