<?php 	
    include 'header.php';
	include_once 'php/connect.php';
    include 'php/useFunctions.php';
	session_start();
    
?>
    <body class="container-inicial" onload="Purchase()">              
        <div class="d-flex justify-content-center purchase-master bg-white mx-auto">
            <div style="width: 75%" class="m-1">
                <div class="row  m-1" style="width: 99%; text-align: center;">
                    <h1  class="rounded border border-dark">Caixa Aberto</h1>
                </div>
                </br>
                <table class="purchase-table">
                    
                    <tr>
                        <th>Id </th>
                        <th>Descrição </th>
                        <th>Qtd </th>
                        <th>Valor unitário </th>
                        <th>Valor total </th>
                    </tr>
                    <?php isset($_SESSION['carrinho'])? listar(): ''; ?>
                </table>
            </div>
            <div class="m-2" style="width: 25%; text-align: center;">
                <div style="border: 1px solid black;">
                    <h4 class="bg-black text-white">Valor unitário</h4>
                    <?php isset($_SESSION['carrinho'])? ultimoAdd(): '0'; ?>
                </div>
            </br>
                <div style="border: 1px solid black;">
                    <h4 class="bg-black text-white">Valor total</h4>
                    <?php echo isset($_SESSION['carrinho'])? valTotal(): '0'; ?>
                </div>
            </br>
                <div style="border: 1px solid black;">
                    <h4 class="bg-black text-white">Valor recebido</h4>
                    <?php echo isset($_SESSION['valorRecebido'])? $_SESSION['valorRecebido']: '0'; ?>
                </div>
            </br>
                <div style="border: 1px solid black;">
                    <h4 class="bg-black text-white">Troco</h4>
                    <?php echo isset($_SESSION['troco'])? $_SESSION['troco']: '0'; ?>
                </div>
            </br>
                <div style="border: 1px solid black;">
                    <div class="row">
                        <div class = "col">
                            <p>ESC - para voltar a tela inicial</p>
                        </div>
                        <div class = "col">
                            <p>F4 - para cadastrar novo cliente na loja</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class = "col">
                            <p>F1 - adicionar produto</p>
                        </div>
                        <div class = "col">
                            <p>F5 - para adicionar cliente a compra</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class = "col">
                            <p>F2 - retirar produto</p>
                        </div>
                        <div class = "col">
                            <p>F6 - para atribuir um cupom de desconto</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class = "col">
                            <p>F3 - para receber o pagamento</p>
                        </div>
                        <div class = "col">
                            <p>F7 - para fechar a compra</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- adicionar ao carrinho --->
        <div class= "row purchase-child d-flex justify-content-center" style="background-color: 0,0,0;" id="purchase-screen" style="visibility: hidden;">
            <div class="col purchase-items" id="purchase-add" style="visibility: hidden;">
                <form action="php/purchase.php" method="GET" class="m-2">
                    
                    <label for="Produto"> Selecionar Produto a ser adicionado </label></br>
                    <input list="datalistAdd" name="produto">
                    <datalist id="datalistAdd" name="produto">
                    <?php showCadProduct(); ?>
                    </datalist>

                    </br>
                    <label>Quantidade do produto </label></br>
                    <input type="number" name="qtd"></br></br>

                    <button type="submit" name="submit" value="add"> Adicionar </button>
                </form>
            </div>
            <!-- retirar do carrinho -->
            <div class="col purchase-items" id="purchase-delete" style="visibility: hidden;">
                <form action="php/purchase.php" method="GET" class="m-2">
                    
                    <label for="Produto"> Selecionar Produto a ser retirado </label></br>
                    <?php echo isset($_SESSION['carrinho'])?listarRetirada() :'nenhum produto adicionado ao carrinho'; ?>


                    </br>
                    <label>Quantidade do produto a ser retirado</label></br>
                    <input type="number" name="delQtd"></br></br>

                    <button type="submit" name="submit" value="delete"> retirar </button>
                </form>
            </div>
            <!-- Finalizar compra -->
            <div class="col purchase-items" id="purchase-payMethod" style="visibility: hidden;">
                <form action="php/purchase.php" method="GET" class="m-2">
                
                    <h2>Forma de pagamento</h2>

                    <input type="radio" name="metodoPag" id="dinheiro" value="dinheiro" onclick="change('dinheiro')">
                    <label for="dinheiro"> Dinheiro </label></br>

                    <input type="radio" name="metodoPag" id="credito" value="credito" onclick="change('credito')">
                    <label for="credito"> Crédito </label></br>

                    <input type="radio" name="metodoPag" id="debito" value="debito" onclick="change('debito')">
                    <label for="debito"> Débito </label></br></br>


                    <label for="valorCliente" id="lblValCli"> Valor recebido </label></br>
                    <input type="number" step="0.01" id="valorCliente" name="valorCliente"></br></br>

                    <button type="submit" name="submit" value="payMethod"> receber </button>
                    
                </form>
            </div>
            <div class="col purchase-items" id="purchase-clientCad" style="visibility: hidden;">
                <form method="POST" action="./php/cliente.php">
                    <h2> Cadastro de novos clientes </h2>

                    <labe> Nome do cliente </label></br>
                    <input type="text" name="nome"></br></br>

                    <labe> CPF do cliente </label></br>
                    <input type="text" name="CPF"></br></br>

                    <labe> Telefone do cliente </label></br>
                    <input type="text" name="telefone"></br></br>

                    <labe> Endereço do cliente </label></br>
                    <input type="text" name="endereco"></br></br>

                    <labe> Data de nascimento do cliente </label></br>
                    <input type="date" name="dtNasc"></br></br>

                    <button type="submit" name="submit" value="cadastrar"> Cadastrar cliente </button>
                </form>
            </div>
            <div class="col purchase-items" id="purchase-clientAdd" style="visibility: hidden;">
                <form method="POST" action="./php/cliente.php">
                    <h2>Inserir cliente a compra </h2>
                    <input list="datalistClient" placeholder="Escreva para procurar" name="cliente">
                    <datalist id="datalistClient" name="cliente">
                    <?php listClient(); ?>
                    </datalist></br></br>

                    <button type="submit" name="submit" value="add"> Adicionar cliente </button>
                </form>
            </div>
            <div class="col purchase-items" id="purchase-discount" style="visibility: hidden;">
                <form method="POST" action="./php/desconto.php">
                    <h2>Inserir Cupom de desconto </h2>
                    <input list="datalistDiscount" placeholder="Escreva para procurar" name="desconto">
                    <datalist id="datalistDiscount" name="desconto">
                    <?php showDiscount(); ?>
                    </datalist></br></br>
                    <button type="submit" name="submit" value="addCompra"> Adicionar cupom </button>
                </form>
            </div>
        </div>        
    </body>
</html>