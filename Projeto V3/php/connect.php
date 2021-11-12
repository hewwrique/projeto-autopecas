<?php

//definindo o nome do server
$bdServer = "localhost";
$bdUsername = "root";
$bdSenha = "";
$bdNome = "autopecas";

$conection = mysqli_connect($bdServer, $bdUsername, $bdSenha,$bdNome);

//criando a conexão com o servidor
//$conection = mysqli_connect($bdServer, $bdUsername, $bdSenha, $bdNome);

/*if($conection -> connect_error){
    include_once('database.php');
    bdCreate($bdServer, $bdUsername, $bdSenha);

    $conection = mysqli_connect($bdServer, $bdUsername, $bdSenha, $bdNome) or die ("erro na conexao com o banco de dados!");
}*/

/*try {

    $conection = mysqli_connect($bdServer, $bdUsername, $bdSenha, $bdNome);

    if($conection -> connect_errno){

        throw new Exception('erro de conexão');
    }

} catch(Exception $e){
    echo 
    include_once('database.php');
    bdCreate($bdServer, $bdUsername, $bdSenha);

    $conection = mysqli_connect($bdServer, $bdUsername, $bdSenha, $bdNome) or die ("erro na conexao com o banco de dados!");
}*/
