<?php

require 'admin/config.php';


function conexion($bd_config){
	try {
		$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}



function limpiarDatos($datos){
	$datos = trim($datos);
	$datos = stripslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}


$videos_por_pagina = '9';
$usuarios_por_pagina = '9';

function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function obtener_videos($videos_por_pagina, $conexion){
	$inicio = (pagina_actual() > 1) ? pagina_actual() * $videos_por_pagina - $videos_por_pagina: 0;
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM videos ORDER BY fecha DESC LIMIT $inicio, $videos_por_pagina");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

function obtener_tags($conexion){
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tags ORDER BY tag");
	$sentencia->execute();
	return $sentencia->fetchAll();
}


function obtener_recientes($conexion){
	$sentencia = $conexion->query("SELECT * FROM videos ORDER BY fecha DESC LIMIT 4");
	$sentencia->execute();
	return $sentencia->fetchAll();

}

function obtener_usuarios($usuarios_por_pagina, $conexion){
	$inicio = (pagina_actual() > 1) ? pagina_actual() * $usuarios_por_pagina - $usuarios_por_pagina: 0;
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM usuarios LIMIT $inicio, $usuarios_por_pagina");
	$sentencia->execute();
	return $sentencia->fetchAll();
}


function numero_paginas($videos_por_pagina, $conexion){
	$total_clip = $conexion->prepare('SELECT FOUND_ROWS() as total');
	$total_clip->execute();
	$total_clip = $total_clip->fetch()['total'];

	$numero_paginas = ceil($total_clip / $videos_por_pagina);
	return $numero_paginas;
}

function id_articulo($id){
	return (int)limpiarDatos($id);
}



function obtener_video_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM videos WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}


function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = "$dia de " . $meses[$mes] . " del $year";
	return $fecha;
}

function comprobarSession(){
	if (!isset($_SESSION['usuario'])) {
		header('Location: ' .  RUTA);
	}
}

function quitar_tildes($cadena) {
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹","ñ","¿","?","¡","!","[","]","'");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","n","_");
$texto = str_replace($no_permitidas, $permitidas ,$cadena);
return $texto;
}


?>
