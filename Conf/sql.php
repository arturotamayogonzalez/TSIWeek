<?php
require_once 'config.php';

class BaseDatos
{
    protected $conexion;
    protected $db;
    private $tablasMod;

    public function get_TablasMod()
    {
        return $this->tablasMod;
    }

    public function conectar()
    {
        $this->conexion = mysqli_connect(HOST, USER, PASS, DBNAME);
        if ($this->conexion == 0) {
            die("Lo sentimos, no se ha podido conectar con MySQL: " . mysqli_connect_error());
        }

        return true;
    }

    public function desconectar()
    {
        if ($this->conectar->conexion) {
            mysqli_close($this->conexion);
        }
    }

    public function consulta($qry)
    {
        $resultado = mysqli_query($this->conexion, $qry) or die("Algo ha ido mal en la consulta a la base de datos" . mysqli_error($this->conexion));
        $this->tablasMod = mysqli_affected_rows($this->conexion);
        return $resultado;
    }
}
