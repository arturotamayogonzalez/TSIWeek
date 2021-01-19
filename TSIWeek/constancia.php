
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
<title>Constancia</title>
<link rel="stylesheet" href="css/normalize.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="css/main.css?<?php echo date('l js \of F Y h:i:s A'); ?>"/> 
<style type="text/css">

	p {margin: 0; padding: 0;}	.ft00{font-size:46px;font-family:Times;color:#000000;}
	.ft01{font-size:53px;font-family:Times;color:#000000;}
	.ft02{font-size:34px;font-family:Times;color:#000000;}
	.ft03{font-size:34px;font-family:Times;color:#000000;}

</style>
</head>
<body bgcolor="#A0A0A0" vlink="blue" link="blue">


<?php
	try{
		require_once('includes/funciones/bd_conexion.php');
		$sql = " SELECT registro.Nombre_R, registro.Apellido_P_R, registro.Apellido_M_R, registro.Id_Eventos, eventos.Id_Eventos, eventos.Nombre, eventos.Fecha_Inicio, eventos.Fecha_Fin, eventos.Id_CategoriaEvento FROM registro INNER JOIN eventos ON registro.Id_Eventos=eventos.Id_Eventos WHERE eventos.Id_CategoriaEvento = 2 LIMIT 1";
		$resultado = $conexion->query($sql);
	} catch(\Exception $e){
		echo $e->getMessage();
	}
?>

<div id="page1-div" style="position:relative;width:1535px;height:1151px;">
	<img width="1535" height="1151" src="Constancia001.png" alt="background image"/>
	<?php while($alumno = $resultado->fetch_assoc()){?>
		<p style="position:absolute;top:318px;margin-right:auto;margin-left:auto;right:0;left:0;text-align:center;white-space:nowrap;" class="ft00">La Coordinación de&#160;la Licenciatura&#160;en&#160;Tecnologías&#160;y&#160;</p>
		<p style="position:absolute;top:375px;margin-right:auto;margin-left:auto;right:0;left:0;text-align:center;white-space:nowrap;" class="ft00">Sistemas&#160;de&#160;la&#160;Información&#160;tiene&#160;el&#160;agrado&#160;de certificar que&#160;</p>
		<p style="position:absolute;top:433px;margin-right:auto;margin-left:auto;right:0;left:0;text-align:center;white-space:nowrap;" class="ft00">el alumno:&#160;</p>
		<p style="position:absolute;top:535px;margin-right:auto;margin-left:auto;right:0;left:0;text-align:center;white-space:nowrap;" class="ft01"><b><?php echo $alumno['Nombre_R'] . " " . $alumno['Apellido_P_R'] . " " . $alumno['Apellido_M_R'];?></b></p>
		<p style="position:absolute;top:647px;margin-right:auto;margin-left:auto;right:0;left:0;text-align:center;white-space:nowrap;" class="ft00">Acreditó&#160;con éxito&#160;el&#160;curso:&#160;</p>
		<p style="position:absolute;top:750px;margin-right:auto;margin-left:auto;right:0;left:0;text-align:center;white-space:nowrap;" class="ft01"><b><?php echo $alumno['Nombre'];?></b></p>
		<p style="position:absolute;top:850px;margin-right:auto;margin-left:auto;right:0;left:0;text-align:center;white-space:nowrap;" class="ft00">Llevado&#160;a cabo del <?php echo $alumno['Fecha_Inicio'] . " al " . $alumno['Fecha_Fin'];?></p>
		<p style="position:absolute;top:1024px;margin-right:auto;margin-left:auto;right:0;left:0;text-align:center;white-space:nowrap;" class="ft02"><b>Dr.&#160;Francisco&#160;De&#160;Asís&#160;López&#160;Fuentes</b></p>
		<p style="position:absolute;top:1060px;margin-right:auto;margin-left:auto;right:0;left:0;text-align:center;white-space:nowrap;" class="ft03">Coordinador&#160;de&#160;la&#160;Licenciatura</p>
	<?php } ?>
</div>

<?php
        $conexion->close();
?>
</body>
</html>



