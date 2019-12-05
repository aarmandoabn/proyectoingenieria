<!DOCTYPE html>
<?php
session_start();
$lista=$_SESSION['lista'];

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
            <h1 align="center" style="margin-top: 60px;">Catálogo</h1>
        <table border="0" width="700" align="center" class="table">
            <tr align="center">
            <?php
            $num=0;
            foreach($lista as $reg){
                if($num==3){
                    echo "<tr align='center'>";
                    $num=1;
                }else{
                    $num++;
                }
                ?>
                <th><img src="../Imagenes/<?php echo $reg[6];?>"width="150" height="120" class="rounded-lg">
            
                <br>
                <button type ="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal" onclick="enviar(<?php echo $reg[0];?>)">Agregar</button>
                
            </th>
            <?php
            }
            ?>
        </table>
        </div>
        
        <!-- Modal Detalle -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles del Producto.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mostrar">
        ...
      </div>
    </div>
  </div>
</div>

        
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
        
        <script>
            var resultado = document.getElementById("mostrar");
            function enviar(c){
                var xmlhttp;
                if(window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
                }else{
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                
                xmlhttp.onreadystatechange=function(){
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){
                        resultado.innerHTML=xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "Detalle.php?cod="+c, true);
                xmlhttp.send();
            }
        </script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
























