<!DOCTYPE html>
<?php
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
        
        <!-- As a link -->
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

        
        <h3 align="center" style="margin-top: 60px;">Registro De Usuario</h3>
        
        <form class="form-group" action="" method="get">
            <table border="0" width="300" align="center">
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="txtNom"></td>
                </tr>
                <tr>
                    <td>Correo: </td>
                    <td><input type="text" name="txtCor"></td>
                </tr>
                <tr>
                    <td>Contraseña: </td>
                    <td><input type="text" name="txtPas"></td>
                </tr>
                <tr>
                    <th colspan="2"><input class="btn btn-primary" type="submit" name="btnEnviar" value="Guardar Datos"></th>
                </tr>
            </table>
        </form>
        
        <?php
        if(isset($_REQUEST['btnEnviar'])){
            $nom=$_REQUEST['txtNom'];
            $cor=$_REQUEST['txtCor'];
            $pas=$_REQUEST['txtPas'];
            
            $objCli=new Cliente(0, $nom, $cor, $pas);
            
            $metodos=new MetodosDAO();
            $i=$metodos->RegistrarCliente($objCli);
            
            if($i==1)
                header("Location: Catalogo.php");
            else
                echo"<h4 align=center>Registro no se Insertó</h4>";
        }
        ?>
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
