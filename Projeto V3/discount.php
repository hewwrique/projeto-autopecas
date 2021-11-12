<?php 	
	include_once 'php/connect.php';
	session_start();
    include 'header.php';
    include 'php/useFunctions.php';
    
?>
    <body class="container-inicial" onload="graphicDraw()">
            <?php include 'nav.php'; ?>

            <div class="bg-white mx-auto mt-3 rounded" style="width: 80vw;">
                <form method="POST" action="php/desconto.php">
                    <div class="row">
                        <div class="col-3" style="margin-left: 10px; margin-bottom: 10px;">
                            <label for="cd"> Código do desconto </label></br>
                            <input style="width: 100%;" type="text" name="cd" ></br>
                            </br>

                            <label for="valor"> Valor da porcentagem do desconto </label></br>
                            <input style="width: 100%;" type="number" name="valor"></br>

                            <label for="dtValidade">Data do fim da validade do desconto </label></br>
                            <input  style="width: 100%;" type="date" name="dtValidade"></br> </br>

                            <input style="width: 100%;" type="submit" name="submit" value="add">
                        </div>
                        <div class="col">
                            <table class="table">
                                <thead class="thead-dark border text-white bg-black mt-3">
                                    <tr>
                                        <th>Id desconto </th>
                                        <th>Código </th>
                                        <th>Valor em porcentagem </th>
                                        <th>Data de validade </th>
                                        <th>Estado de ativo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php listDescount(); ?>
                                </tbody>
                            </table>
                        </div>
                </div>
                <form>
                
            </div>
    </body>
</html>