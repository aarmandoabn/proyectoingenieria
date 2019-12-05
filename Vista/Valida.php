<?php

include '../DAO/MetodosDAO.php';

$usu=$_REQUEST['txtUsu'];
$pas=$_REQUEST['txtPas'];

$objMetodos=new MetodosDAO();
$lista=$objMetodos->validarUsuario($usu, $pas);

if(sizeof($lista)>0){
    session_start();
    $_SESSION['acceso']=true;
    $_SESSION['codCli']=$lista[0];
    $_SESSION['nombre']=$lista[1];
    header("Location: Catalogo.php");
}else{
    header("Location: Catalogo.php");
}

?>
