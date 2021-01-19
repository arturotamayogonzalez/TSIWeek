<?php

require_once '../Conf/sql.php';

$loginUsr = $_POST["user"];
$loginPwd = $_POST["pass"];


$sql = new BaseDatos;

$query = "SELECT CASE WHEN COUNT(estatus) = 0 THEN 'C' ELSE estatus END estatus, Rol FROM usuario WHERE Matricula = '" . $loginUsr . "' AND Contrasena = '" . $loginPwd . "'";

if($sql->conectar())
{
    $resultado = $sql->consulta($query);
    while($fila = mysqli_fetch_row($resultado))
    {
        $valor = $fila[0];
        $rol = $fila[1];
    }

    if($valor == "A")
    {
        echo $rol;
    }
    elseif($valor == "B")
    {
        echo 'Usuario inactivo.';
    }
    else    
    {
        echo 'Datos ingresados inválidos.';
    }

    $sql->desconectar();
}
