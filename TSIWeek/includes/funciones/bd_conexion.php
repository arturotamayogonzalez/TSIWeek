<?php
    $conexion = new mysqli('localhost', 'root', '*Admin123', 'bd_tsiweek');

    if($conexion->connect_error){
        echo $error -> $conexion->connect_error;
    }
?>