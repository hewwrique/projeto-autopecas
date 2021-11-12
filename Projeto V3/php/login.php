<?php

session_start();

	if(isset($_POST['submit']))
	{
		include 'connect.php';
		
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		
		//em caso de erro
			//vendo se os formulários estão vazios
		if(empty($user) || empty($pass))
		{
			header ("Location: ../index.php?login=camposVazios");
			exit();
		} else {
			$difPass = sha1($pass);
			$sql = "SELECT * FROM tb_funcionario WHERE ds_cpf = '$pass' OR ds_senha = '$difPass'";
			$resultado = mysqli_query($conection, $sql);
			$verificaResultado = mysqli_num_rows ($resultado);
			if ($verificaResultado <1) {
				header ("Location: ../index.php?login=senhas não correspondente");
				exit();
			} else {
                $sql = "SELECT * FROM tb_funcionario WHERE nm_funcionario = '$user'";
                $resultado = mysqli_query($conection, $sql);
                $verificaResultado = mysqli_num_rows ($resultado);
                if ($verificaResultado <1) {
                    header ("Location: ../index.php?login=user não encontrado");
                    exit();
                } else{
                    if($verificaResultado >= 1){
						$sql = "SELECT * FROM tb_funcionario WHERE nm_funcionario = '$user'";
						$dados = mysqli_query($conection, $sql);
						$linha = mysqli_fetch_assoc($dados);
						$_SESSION['u_id'] = $linha['id_funcionario'];
						$_SESSION['u_user'] = $linha['nm_funcionario'];
						header ("Location: ../telaInicial.php?login=logado com sucesso");
						exit();
					}
                }







					
				}
			}
		
	} else {
			header ("Location: ../index.php?login=error");
			exit();
	}