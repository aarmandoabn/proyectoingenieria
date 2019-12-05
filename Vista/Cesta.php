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
                     <a class="nav-link" href="Cesta.php">Cesta</a>
                </li>
                <?php
                if(!isset($_SESSION['acceso']) || $_SESSION['acceso']<>true){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="Registro.php">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#LoginModal">Iniciar Sesión</a>
                </li>
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
        
        <div class="container">
        <h2 align="center" style="margin-top: 60px;">Cesta de Productos</h2>
        <table border="1" align="center" width="400" class="table">
            <tr style="background: skyblue">
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Costo</th>
            </tr>
        <?php
            if(isset($_SESSION['cesta'])){
                $total=0;
                foreach($_SESSION['cesta'] as $id=>$x){
                    $objMetodos=new MetodosDAO();
                    $lista=$objMetodos->ListarProductosCod($id);
                    foreach ($lista as $row){
                       $nombre = $row[1];
                       $precio = $row[2];
                    }
                    $costo=$x*$precio;
                    $total=$total+$costo;
                    ?>

            
            
            <tr>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $precio; ?></td>
                <td><?php echo $x; ?><a href="../DAO/TiendaDAO.php?id=<?php echo $id;?>&accion=eliminar" class="btn btn-secondary">Disminuir</td>
                <td><?php echo $costo; ?></td>
            </tr>
                    <?php
                }
                ?>
            <tr>
                <td colspan="3">Total: $</td>
                <td><?php echo $total; ?></td>
            </tr>
            
            <?php
            }
        ?>
            </table>
        
        <h6 align="center">
            <a href="Catalogo.php" class="btn btn-primary">Seguir comprando</a>
             <a href="../DAO/TiendaDAO.php?accion=vacio&op=2" class="btn btn-primary">Eliminar Carrito</a>
             <button class="btn btn-secondary" onclick="validar()"data-toggle="modal" data-target="#LoginModal">Realizar Pago</button>
        </h6>
        
        </div>
        
    <script>
    function validar(){
        <?php
        if($_SESSION['acceso']==true){
        ?>
        location.href='Pago.php?total=<?php echo $total; ?>&estado=pagar';
        <?php
        }
        ?>
    }
    </script>  
                
        <!-- Modal Login -->
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio de Sesión.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="Valida.php"> 
      <div class="modal-body" id="mostrar">
        
          <table border="0" align="center">
              <tr>
                  <td>Usuario: </td>
                  <td><input type="text" name="txtUsu"></td>
              </tr>
              <tr>
                  <td>Contraseña: </td>
                  <td><input type="password" name="txtPas"></td>
              </tr>
          </table>
      </div>
        <div class="modal-footer">
            <button class="btn btn-secondary">Cerrar</button>
            <button class="btn btn-primary" onclick="submit()">Iniciar Sesión</button>
        </div>
            <h6 align="center"><a href="Registro.php">Registrarse</a></h6>
        </form>
    </div>

  </div>
</div>
                
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
    </body>
</html>
