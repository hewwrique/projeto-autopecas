<?php

session_start();
unset($_SESSION['carrinho'], $_SESSION['cliente'], $_SESSION['valorRecebido'], $_SESSION['metodoPag'], $_SESSION['troco'], $_SESSION['desconto'], $_SESSION['vl_desconto'], $_SESSION['parcelas']);
header("Location:../telaInicial.php");
	exit();