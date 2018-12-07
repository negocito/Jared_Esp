<?php 
$name = $_POST['Nombre'];
$email = $_POST['Email'];
$comentario = $_POST['comentario'];


$para = 'luis_243_xd@hotmail.com';
$titulo = 'comentarios';
$header = 'From '. $email;

 $cuerpo = "Nombre : " . $_POST["Nombre"] . "\r\n"; 
 $cuerpo .= "Email: " . $_POST["Email"] . "\r\n";
 $cuerpo .= "Comentario: " . $_POST["comentario"] . "\r\n";
//$msjcorreo = 'Nombre : '.$name \n 'Email : '.$email 'Comentario :'. $comentario;
//$msjcorreo = 'Nombre : '. $_POST["Nombre"] . "\r\n" "Email". $_POST["Email"] . "\r\n" "Comnetario". $_POST["comentario"] . "\r\n";

if($_POST['Enviar']){
if (mail($para,$titulo,$cuerpo,$header)) 
	 echo "<script language='javascript'>
	alert('Mensaje enviado.');
	window.location.href = 'index.html';
	</script>";

	# code...
}else{
	echo "fallo envio";
}


 ?>