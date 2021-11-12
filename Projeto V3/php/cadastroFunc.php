<?php
session_start();

include_once 'connect.php';

$idFunc = $_POST['idFunc'];
$nameFunc = $_POST['nameFunc'];
$rgFunc = $_POST['rgFunc'];
$cpfFunc = $_POST['cpfFunc'];
$salFunc = $_POST['salFunc'];
$endFunc = $_POST['endFunc'];
$nascFunc = $_POST['nascFunc'];
$cargoFunc = $_POST['cargoFunc'];
$emailFunc = $_POST['emailFunc'];

switch($_POST['submit']){
	
	case "add":
		if(empty($nameFunc) || empty($rgFunc) || empty($cpfFunc) || empty($salFunc) || empty($endFunc) || empty($nascFunc) || empty($cargoFunc) || empty($emailFunc)){
			header("Location: ../emplyeeMan.php?cadastro=Um dos campos está vazio");
			exit();
		
		} else {
				$sqlU = "SELECT * FROM tb_funcionario where nm_funcionario ='$nameFunc'";
				$resultado = mysqli_query($conection, $sqlU);
				$resultadoVerifica = mysqli_num_rows($resultado);
		
		
			if($resultadoVerifica > 0){
				header("Location: ../emplyeeMan.php?cadastro=Usuário já cadastrado");
				exit();
			} else{
				
				//inserindo o usuário no banco de dados
				$sqlI = "INSERT INTO tb_funcionario (nm_funcionario, ds_rg, ds_cpf, vl_salario, ds_endereco, dt_nascimento, ds_cargo, ds_email) VALUES ('$nameFunc', '$rgFunc', '$cpfFunc','$salFunc', '$endFunc', '$nascFunc', '$cargoFunc', '$emailFunc');";
				mysqli_query($conection, $sqlI);
				header("Location: ../emplyeeMan.php?cadastro=Funcionário cadastrado com sucesso");
				exit();
				}
		}
		break;
	

	case "search":
		if(!empty($idFunc) || !empty($nameFunc)){
			$sql = "SELECT * FROM tb_funcionario WHERE id_funcionario = '$idFunc' OR nm_funcionario = '$nameFunc'";
			$dados = mysqli_query($conection, $sql);
			$achou = mysqli_num_rows($dados);

			if($achou >= 1){
				$linha = mysqli_fetch_assoc($dados);

				$id = $linha['id_funcionario'];
				$nome = $linha['nm_funcionario'];
				$rg = $linha['ds_rg'];
				$cpf = $linha['ds_cpf'];
				$sal = $linha['vl_salario'];
				$end = $linha['ds_endereco'];
				$nasc = $linha['dt_nascimento'];
				$cargo = $linha['ds_cargo'];
				$email = $linha['ds_email'];

				header("Location: ../emplyeeMan.php?id=$id&nome=$nome&rg=$rg&cpf=$cpf&sal=$sal&end=$end&nasc=$nasc&cargo=$cargo&email=$email");
				exit();


			} else {
				header("Location: ../emplyeeMan.php?cadastro=Nenhum funcionário encontrado com esse ID ou nome");
				exit();
			}
		} else {
			header("Location: ../emplyeeMan.php?cadastro=Favor inserir id ou nome do funcionário a ser pesquisado");
			exit();
		}
		break;
	
	case "edit":
		if(empty($idFunc) || empty($nameFunc) || empty($rgFunc) || empty($cpfFunc) || empty($salFunc) || empty($endFunc) || empty($nascFunc) || empty($cargoFunc) || empty($emailFunc)){
			header("Location: ../emplyeeMan.php?id=$idFunc&nome=$nameFunc&rg=$rgFunc&cpf=$cpfFunc&sal=$salFunc&end=$endFunc&nasc=$nascFunc&cargo=$cargoFunc&email=$emailFunc&cadastro=Nenhum campo pode ficar vazio");
			exit();
		} else {
			$sql = "UPDATE tb_funcionario SET
			 nm_funcionario = '$nameFunc',
			 ds_rg = '$rgFunc',
			 ds_cpf = '$cpfFunc',
			 vl_salario = '$salFunc',
			 ds_endereco = '$endFunc',
			 dt_nascimento = '$nascFunc',
			 ds_cargo = '$cargoFunc',
			 ds_email = '$emailFunc'
			 WHERE id_funcionario ='$idFunc'";
			 mysqli_query($conection, $sql);
			header("Location: ../emplyeeMan.php?cadastro=atualizado com sucesso");
			exit();
		}
		break;

	case "delete":
		if(!empty($idFunc)){
			$sql = "DELETE FROM tb_funcionario WHERE id_funcionario = $idFunc";
			mysqli_query($conection, $sql);

			header("Location: ../emplyeeMan.php?cadastro=Funcionário excluido com sucesso");
		exit();

		}else {
			header("Location: ../emplyeeMan.php?cadastro=Funcionário não encontrado");
			exit();
		}
		break;
	
	case "cancel":
		header("Location: ../emplyeeMan.php");
		exit();
		break;
	default:
		header("Location: ../emplyeeMan.php");
		exit();
		break;
}


