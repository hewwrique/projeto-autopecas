<?php 	
	include_once 'php/connect.php';
	session_start();
    include 'header.php';
    include 'php/useFunctions.php';
?>

    <body>
        <?php include 'nav.php'; ?>
        <div class="container-inicial" style="height: fit-content(100%);">
            <div class="bg-white mx-auto rounded" style="width: 80vw;">
                <h2>Lista de pedidos </h2>
                <table class="table">
                    <thead class="thead-dark border text-white bg-black mt-3">
                    <tr>
                        <th scope="col">id pedido</th>
                        <th scope="col">id do cliente</th>
                        <th scope="col">id funcionario</th>
                        <th scope="col">valor total do pedido</th>
                        <th scope="col">Forma de pagamento</th>
                        <th scope="col">Data do pedido</th>
                        <th scope="col">Qtd de parcelas</th>
                        <th scope="col">id do desconto</th>
                        <th scope="col">Valor em porcentagem do desconto</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php showOrders(); ?> <!--Função qual mostra os funcionários, abrir o "php/useFunctions.php" para fazer modificações -->
                    
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>