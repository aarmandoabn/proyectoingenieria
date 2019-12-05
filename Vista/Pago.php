<!DOCTYPE html>

<?php
session_start();
include '../DAO/MetodosDAO.php';
?>

<html>
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title></title>
    </head>
    <body>
        
        <!-- Menu Inicio -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="http://youtube.com">Sneaker Box</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" 
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../DAO/TiendaDAO.php?op=1">Catálogo</a>
                </li>
                <?php
                if(!isset($_SESSION['acceso']) || $_SESSION['acceso']<>true){
                ?>
                <?php
                }else{
                ?>
                <li class="nav-item">
                    <a class="nav-link">Bienvenido <?php echo $_SESSION['nombre'];?></a>
                </li>
                <li class="nav-item">
                    <a href="Cerrar.php" class="nav-link">Cerrar Sesión</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div> 
</nav>
        <h4 align="center" style="margin-top: 60px;">
        <?php
        if(isset($_REQUEST['total']))
            $total=$_REQUEST['total'];
        $estado=$_REQUEST['estado'];
        
        if($estado=='pagar'){
            echo 'El monto a pagar es: $'.$total;
        ?>
        
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            
        <input type="hidden" name="cmd" value="_ext-enter" />
        <input type="hidden" name="redirect_cmd" value="_xclick" />
        <input type="hidden" name="business" value="aarmandoabn@gmail.comr" />
        <input type="hidden" name="item_name" value="Productos Varios" />
        <input type="hidden" name="quantity" value="1" />
        <input type="hidden" name="amount" value="<?php echo $total; ?>" />
        <input type="hidden" name="currency_code" value="MXN" />
        <input type="hidden" name="return" value="http://localhost:8080/SneakerBox/Vista/Pago.php?estado=ok" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest" />
        <input type="image" src="http://www.paypal.com/es_XC/i/btn/x-click-but01.gif" border="0" name="sumbit" alt="Pagar para completar la compra." />
        
        
        </form>
        <?php
        }else if($estado=='ok'){
            
            $objMet=new MetodosDAO();
            
            if(isset($_SESSION['cesta'])){
                $codCli=$_SESSION['codCli'];
                $fecha=date("Y-m-d");
                $objPed=new Pedido(0, $codCli, $fecha);
                $objMet->RegistrarPedido($objPed);
                $ultimoPed=$objMet->numeroPed();
                foreach ($_SESSION['cesta'] as $id=>$x){
                    $objDetalle=new DetallePedido($ultimoPed[0], $id, $x);
                    $objMet->RegistrarDetallePedido($objDetalle);
                }
            }   
            unset($_SESSION['cesta']);
            
            echo 'Pago Realizado Correctamente. ';
        }
        ?>
        </h4>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
