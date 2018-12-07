<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>NOVELAS</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shurt icon"  href="img/logo.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/fontawesome-all.min.css">
       <link rel="stylesheet"  href="jquery/jquery-3.3.1.min.js">
    <style >
   
    .fondo{
    		background: url('img/libritos.jpg');
    		height: 300px;
    		width: 100%
    		background-position: center;
    		background-size: contain;
    		opacity: 0.8;


    	}
    .texto{

    		font-size: 25px;
    		color: 	#001a4d;
    	}
/*
    .logo{
    	background: url('img/logo.png');

		background-position: center;
		height: 100px; 
  		width: 100px;
  		
        }*/
    </style>

</head>
<body>
<!-- NAVBAR-->
	<div class="container-fluid navbar-dark bg-dark fixed-top">
		<nav class="navbar navbar-expand-lg container">
		  <a class="navbar-brand" href="index.php"> TULIBROS.COM</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item ">
		        <a class="nav-link" href="libros.php">LIBROS <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="revistas.php">REVISTAS</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="novelas.php">NOVELAS</a>
		      </li>
		        <li class="nav-item">
		        <a class="nav-link" href="#CONTACTO">CONTACTO</a>
		      </li>
		      <!--menu extendible-->
		      <!-- <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          DESCARGAS
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

		          <a class="dropdown-item" href="#">LIBROS
		          </a>

		          <a class="dropdown-item" href="#">REVISTAS
		          </a>

		          <a class="dropdown-item" href="#">NOVELAS
		          </a>


		        <div class="dropdown-divider">
		        		
		        </div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>

		      </li> -->
		       <!--menu extendible-->
		      
		    </ul>
		    <!-- buscador-->
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Buscar algo..." aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
		    </form>
		  </div>
		</nav>
		<!--NAVbAR-->
	</div>

	<!--SLIDER-->
	<div class="container-fluid fondo texto">
		<div>
			<img src="img/logo2.png" class="rounded mx-auto d-block py-5" alt="" width="350px"> 
		</div>
	</div>
	<div class="container d-flex flex-column justify-content-center h-100 align-items-center py-3">
			<h1><b> NOVELAS</b></h1>
			<P><b>	Descarga la novela que quieras :D , son !GRATIS!</b></P>

	</div>
	<!-- MOSTRADO DE CARDS , DE LOS LIBROS -->
	<div class="container-fluid bg-dark ">
		<div class="container py-5">
			<div class="row">
				<?php

						include('conectbase.php');

						$consulta = mysqli_query($conn,'select nom_novel,descripcion,imagen FROM novelas');
						while ($fila = mysqli_fetch_array($consulta))
						{
						$name= $fila['nom_novel'];
						$desc = $fila['descripcion'];
						$image = $fila['imagen'];
						//echo "<h2>".$name."</h2>" ;
						
						

						echo '<div class="col-md-4">';
						echo '<div class="card center" style="width: 18rem;">';
						echo '<img class="card-img-top" src="' .$image .'"alt="Card image cap">';
						echo '<div class="card-body">';
						echo '<h5 class="card-title">' .$name.' </h5>';

						echo  '<p class="card-text">' .$desc. ' </p>';
						echo '<div class="row justify-content-center">';
						echo '<a href="#" class="btn btn-danger  btn-block col-md-6">Descargar</a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}

					?>	
			</div>
		</div>
	</div>
	<!-- MOSTRADO DE CARDS , DE LOS LIBROS -->
	


	<!--CONTACTO-->
	<div class="container">
		<div class="text-center">
			<a name="CONTACTO"></a>
			<h2 class="py-4">
				CONTACTANOS
			</h2>
			<h4 class="py-3">
				Buscas algo en especifico ? y no se encuentra aqui ? 
				<p>Envianos el nombre del libro, novela o revista y trataremos de subirlo :D</p>
			</h4>
		</div>


		<form action="envia.php" method="POST" class="row ">
			<!--Nombre-->
			<div class="form-group col-md-4">
				<input type="text" placeholder="Nombre" name="Nombre" class="form-control">
			</div>
			<!--email  -->
			<div class="form-group col-md-4">
				<input type="text" placeholder="Email" name="Email" class="form-control">
			</div>
			<!--comentario-->
			<div class="form-group col-md-12" >
				<!-- <input type="text" placeholder="Comentario" class="form-control"> -->
				<!-- <textarea name="comentario" rows="10'" cols="40">Escribe el nombre del libro, revista o novela.. </textarea> -->
				<label for="comment">Comentario. </label>
				<textarea class="form-control" rows="5" id="comment" name="comentario">Escribe el nombre del libro, revista o novela...</textarea>
			</div>

			<div class="col-md-12 py-4">
				<div class="row justify-content-center">
					<!-- <button class="btn btn-danger col-md-2" name="Enviar">Enviar</button> -->
					<input type="submit" value="Enviar" name="Enviar" class="col-md-2">
				</div>
			</div>
		</form>
	</div>



	
	<!-- banner -->
	<div class="container-fluid py-5 bg-dark text-center text-white">
		<div>
			<h2>REDES SOCIALES</h2>
			<div class="display-4">
				<a href="https://www.facebook.com/Tus-libroscom-174539876546197/" target="_blank"><i class="fab fa-facebook-square pr-3"></i></a>
				<a href="https://twitter.com/OscarZacota" target="_blank"><i class="fab fa-twitter pr-3"></i></a>
				<a href="https://www.twitch.tv/" target="_blank"><i class="fab fa-twitch"></i></a>
			</div>
		</div>	
	</div>
	<!--footer-->
	<footer class="container-fluid bg-light text-center text-dark py-2"><p>DESAROLLADO POR EL TEAM RECURSADORES HASTA EL FIN</p>
	</footer>

	<HEADER>
		

	</HEADER>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="jss/bootstrap.min.js"></script>
</body>
</html>