<?php 	
	include_once 'php/connect.php';
	session_start();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dmk Inc</title>
        
        <!--bootstrap CSS e Javascript-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script><!--Jquery-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <!------------->
        <!--Progress Bar-->
        <script src="javascript/progressbar.min.js"></script>
        <!--Parallax-->
        <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
        <link href="Styles/main.css" rel="stylesheet">
        <script type="text/Javascript" src="Javascript/main.js"></script>
    </head>
    <body>
        <div class="container-login">
            <div class="bg-white border border-dark rounded ">
                <form method="post" action="php/login.php">
                    <div class="form-group m-3">
                        <label for="user">Usuário </label>
                        <input type="text" class="form-control" id="user" name="user">
                        </br></br>
                        <label for="pass">Senha</label>
                        <input type="password" class="form-control" id="pass" name="pass">
                        </br>
                        <div class="">
                            <input type="submit" class="btn btn-dark btn-block" aling="center" value="Entrar" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <img src="./Images/logo.png" class="img-topo">
    </body>
</html>
<?php include 'php/footer.php'; ?>   
    