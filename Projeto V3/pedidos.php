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

                <h2>Lista de Produtos vendidos no pedido <?php echo $_GET['id_pedido'] ?> </h2>

                <table class="table">
                    <thead class="thead-dark border text-white bg-black mt-3">
                    <tr>
                        <th scope="col">id produto</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Valor do produto</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php showOrdersProducts($_GET['id_pedido']); ?> <!--Função qual mostra os funcionários, abrir o "php/useFunctions.php" para fazer modificações -->
                    
                    </tbody>
                </table>
                <button type="button" onclick="window.location.assign('orders.php');"> Voltar </button>
            </div>
        </div>
    </body>
</html>