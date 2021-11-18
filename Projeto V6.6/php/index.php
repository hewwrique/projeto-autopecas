<?php 	
	include_once 'connect.php';
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="POST" action="cadastroFunc.php">
            <label for="nameFunc">Nome do funcionário: </label></br>
            <input type="text" name="nameFunc">
            </br></br>
            <label for="rgFunc">RG do funcionário: </label></br>
            <input type="text" name="rgFunc">
            </br></br>
            <label for="cpfFunc">CPF do funcionário: </label></br>
            <input type="text" name="cpfFunc">
            </br></br>
            <label for="salFunc">Salario do funcionário: </label></br>
            <input type="number" name="salFunc">
            </br></br>
            <label for="endFunc">Endereço do funcionário: </label></br>
            <input type="text" name="endFunc">
            </br></br>
            <label for="dataNascFunc">Data de nascimento do funcionário: </label></br>
            <input type="date" name="dataNascFunc">
            </br></br>
            <label for="cargoFunc">Cargo do funcionário: </label></br>
            <input type="text" name="cargoFunc">
            </br></br>
            
            </br></br>
            <input type="submit" name="submit">

        </form>

        <form method="POST" action="cadastroProd.php">
            <label for="nameFunc">Nome do Produto: </label></br>
            <input type="text" name="nameProd">
            </br></br>
            <label for="rgFunc">Valor do Produto: </label></br>
            <input type="number" name="vlProd">
            </br></br>
            <label for="qtdProd">Qtd em estoque: </label></br>
            <input type="text" name="qtdProd">

            </br></br>
            <input type="submit" name="submit">

        </form>


    </body>
</html>