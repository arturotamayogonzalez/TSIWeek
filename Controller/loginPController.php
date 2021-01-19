<?php

require_once '../Conf/sql.php';

$loginUsr = $_POST["user"];
$loginPwd = $_POST["pass"];


$sql = new BaseDatos;

$query = "SELECT CASE WHEN COUNT(estatus) = 0 THEN 'C' ELSE estatus END estatus FROM poniente WHERE Cedula = '" . $loginUsr . "' AND Cedula = '" . $loginPwd . "'";

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
        echo 'OK';
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
