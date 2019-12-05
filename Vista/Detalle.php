<!DOCTYPE html>
<?php

include '../DAO/MetodosDAO.php';

$cod=$_REQUEST['cod'];

$objMetodos = new MetodosDAO();
$lista = $objMetodos->ListarProductosCod($cod);

foreach ($lista as $row){
    $nombre = $row[1];
    $precio = $row[2];
    $detalle = $row[5];
    $imagen = $row[6];
}
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
        <form action="../DAO/TiendaDAO.php"> 
    <table border="0">
        <tr>
            <th rowspan="4"><img src="../Imagenes/<?php echo $imagen;?>" width="300" height="250" class="rounded-lg"></th>
            <th><?php echo $nombre; ?></th>
        </tr>
        <tr>
            <td align="justify"><?php echo $detalle; ?></td>
        </tr>
        <tr>
            <td align="right">$ <?php echo $precio; ?></td>
        </tr>
        <tr>
            <td align="right">Ingrese Cantidad: <input type="number" min="1" max="10" value="1" name="txtCan"</td>
        </tr>
        <tr>
            <th align="right" colspan="2">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="submit()">Agregar al Carrito</button>
            </th>
        </tr>
    </table>
        
        <input type="hidden" name="id" value="<?php echo $cod; ?>">
        <input type="hidden" name="accion" value="agregar">
        <input type="hidden" name="op" value="2">
    </form>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
