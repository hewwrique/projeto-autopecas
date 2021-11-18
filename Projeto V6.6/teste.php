<?php
    session_start();
    include_once 'php/connect.php';
    include 'php/useFunctions.php';

    #showCadProduct();

    #showProducts();

    #numberOfProduct();
    #include 'header.php';
    
    
?>
    
    <body>
    <form method="POST">
        <input type="text" name="astolfo" value="77"></br>
        <button name="submit" value="add" onclick="confirma()"> add </button>
        <button name="submit" value="edit"> edit </button>
        <button name="submit" value="save"> save </button>
        <button name="submit" value="cancel"> cancel </button>
    </form>

<?php
    /*$roberto = $_POST['astolfo'];
    
    switch($_POST['submit']){
        case 'add':
            echo "add";
            echo $roberto;
            break;
        

        case 'edit':
            echo "edit";
            echo $roberto;
            break;
        
        case 'save':
            echo "save";
            echo $roberto;
            break;
        
        case 'cancel':
            echo "cancel";
            echo $roberto;
            break;
        }*/
    ?>
    

    <!--<script type="text/javascript" language="javascript">
        $(document).ready(function(){
            $('#salvar').click(function(){
                $('#div').load('php/logout.php');
            })
        })
    </script>
    <button type="button" id="salvar">sla bixo </button>
    <div id="div"> </div> -->

            <div class="col purchase-items" id="purchase-discount" style="visibility: visible;">
                <form method="POST" action="./php/desconto.php">
                    <h2>Inserir Cupom de desconto </h2>
                    <input list="datalistOptions" placeholder="Escreva para procurar" name="desconto">
                    <datalist id="datalistOptions" name="desconto">
                    <?php showDiscount(); ?>
                    </datalist></br></br>
                    <button type="submit" name="submit" value="addCompra"> Adicionar cupom </button>
                </form>
            </div>
    </body>
</html>