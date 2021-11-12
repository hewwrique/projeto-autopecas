<?php 	
	include_once 'php/connect.php';
	session_start();
    include 'header.php';
    include 'php/useFunctions.php';
?>

    <body>
            <?php include 'nav.php'; ?>
        <div class="container-inicial">
            <table class="table-inicial">
                <tr>
                    <td>
                        <button type="button" class="butao rounded" onclick="window.location.href = 'purchase.php'">Fazer compra</button>
                    </td>
                    <td>
                        <button type="button" class="butao rounded"  onclick="window.location.href = 'products.php'">Produtos</button>
                    </td>
                    <td>
                        <button type="button" class="butao rounded" onclick="window.location.href = 'alert.php'">
                         Alertas
                            <div class="rounded-circle" style="top: 0; background-color: red; width: 6%; float: right;">
                             <?php echo alert(); ?>
                            </div>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="button" class="butao rounded" style="width: 100%;" onclick="window.location.href = 'discount.php'">Gerenciar descontos</button>
                    </td>
                    <td>
                        <button type="button" class="butao rounded" style="width: 100%;" onclick="window.location.href = 'emplyeeMan.php'">Gerenciar funcionários</button>
                    </td>
                    <td>
                        <button type="button" class="butao rounded" style="width: 100%;" onclick="window.location.href = 'orders.php'">Verificar Pedidos</button>
                    </td>
                </tr>

            </table>
        </div>
    </body>
</html>