<?php 	
	include_once 'connect.php';
	session_start();

    $idProd = $_POST['prodId'];
    $nameProd = $_POST['prodName'];
    $valProd = $_POST['prodVal'];
	$brandProd = $_POST['prodBrand'];
	$modProd = $_POST['prodModel']; 


	switch($_POST['submit']){

		//código para cadastro de produtos.
		case "add":
			if(!empty($nameProd) && !empty($valProd) && !empty($brandProd) && !empty($modProd)){
				$sql = "SELECT * FROM tb_produto WHERE nm_produto = '$nameProd'";
				$dados = mysqli_query($conection, $sql);
				$achou = mysqli_num_rows($dados);

				if($achou > 0){
					header("Location: ../products.php?cadastro=Produto cadastrado com o mesmo nome");
					exit();
				} else {
					$sqlI = "INSERT INTO tb_produto (nm_produto, vl_produto, ds_marca, ds_modelo) VALUES ('$nameProd', '$valProd', '$brandProd', '$modProd');";
					mysqli_query($conection, $sqlI);

					$sqlI = "SELECT * FROM tb_produto WHERE nm_produto = '$nameProd'";
					$dados = mysqli_query($conection, $sqlI);
					$linha = mysqli_fetch_assoc($dados);

					$sqlI = "INSERT INTO tb_estoque (id_produto) VALUES (" .$linha['id_produto']. ");";
					mysqli_query($conection, $sqlI);

					header("Location: ../products.php?cadastro=Cadastrado com sucesso");
					exit();
				}
			} else {
				header("Location: ../products.php?cadastro=Um dos campos está vazio");
				exit();
			}	
			break;

		//código para procurar produtos no banco de dados
		case "search":
			if(empty($idProd) && empty($nameProd)){
				header("Location: ../products.php?cadastro=Favor inserir ID ou Nome do produto");
				exit();
			} else {
				$sql = "SELECT * FROM tb_produto WHERE nm_produto = '$nameProd' OR id_produto = '$idProd'";
				$dados = mysqli_query($conection, $sql);
				$achou = mysqli_num_rows($dados);
				
				if($achou <1){
					header("Location: ../products.php?cadastro=Não foi encontrado nenhum produto com o ID ou Nome digitados");
					exit();
				} else {
						$linha = mysqli_fetch_assoc($dados);
						$id = $linha['id_produto'];
						$nome = $linha['nm_produto'];
						$valor = $linha['vl_produto'];
						$marca = $linha['ds_marca'];
						$modelo = $linha['ds_modelo'];

						header("Location: ../products.php?id=$id &". "nome=$nome&" .  " valor=$valor&" .  "marca=$marca &" . "modelo=$modelo");
						exit();
						
					}
				}
				
			break;
		case "edit":
			if(!empty($idProd) && !empty($nameProd) && !empty($valProd) && !empty($brandProd) && !empty($modProd)){
				$sql = "UPDATE tb_produto SET nm_produto ='$nameProd', vl_produto = '$valProd', ds_marca = '$brandProd', ds_modelo = '$modProd' WHERE id_produto = '$idProd'";
				mysqli_query($conection, $sql);

				header("Location: ../products.php?cadastro=Edição concluida");
				exit();
			} else {
				header("Location: ../products.php?id=$idProd &". "nome=$nameProd&" .  " valor=$valProd&" .  "marca=$brandProd &" . "modelo=$modProd" . "&cadastro=Um dos campos está vazio");
				exit();
			}
			break;
		case "delete":
			if(!empty($idProd) && !empty($nameProd) && !empty($valProd) && !empty($brandProd) && !empty($modProd)){
				$sql = "DELETE FROM `tb_estoque` WHERE id_produto = '$idProd'";
				mysqli_query($conection, $sql);

				$sql = "DELETE FROM `tb_produto` WHERE id_produto = '$idProd'";
				mysqli_query($conection, $sql);

				header("Location: ../products.php?cadastro=Exclusão concluida");
				exit();
			} else {
				header("Location: ../products.php?id=$idProd &". "nome=$nameProd&" .  " valor=$valProd&" .  "marca=$brandProd &" . "modelo=$modProd" . "&cadastro=Um dos campos está vazio");
				exit();
			}
			break;
		case "cancel":
			header("Location: ../products.php");
			exit();
			break;
		default:
			header("Location: ../products.php");
			exit();
		break;
	}