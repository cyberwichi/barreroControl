<!DOCTYPE html>
<html lang="es">



<head>
	<!--<script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>-->
	<meta charset="UTF-8">
	<title>Bar Barbacoa Barrero</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="stylesheet" href="/css/fontello.css">
	<link rel="stylesheet" href="/css/estilo.css">
	<link rel="shortcut icon" href="/imagenes/cerveza%20(1).png" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Rubik+Mono+One&display=swap" rel="stylesheet">	


</head>

<body>
	<header class="">
		<div class="">
			<div class="text-center">
				<h2 class="icon-emo-beer text-white"> Bar Barbacoa Barrero</h2>
				<span class="badge badge-danger" data-toggle="modal" data-target="#exampleModal">Cumpleaños</span>
				<span class="badge badge-warning" data-toggle="modal" data-target="#exampleModal2">Meriendas</span>
				<span class="badge badge-success" data-toggle="modal" data-target="#exampleModal3">Carta</span>
					<span class="badge badge-primary" data-toggle="modal" data-target="#exampleModal4">Estamos....</span>


			</div>


		</div>
	</header>

	<main class="principal">
		<section>
			<div class="contenedor" id="banner">
				<h2>Disfrute de un gran dia en nuestro parque</h2>
				<p>Descanse y relajese junto a los suyos , solo o acompañado .... nosotros nos ocupamos de lo demás</p>

			</div>
		</section>
		<section class="page" id="bienvenidos">
			<h2>Bienvenidos al restaurante del Parque del Barrero</h2>
			<p>Bar Restaurante en el conocido Parque del Barrero hoy llamado Parque de la Constitución de 1812.</p>
			<p>Un bello parque que constituye junto con el cercano Parque Almirante Lahule el pulmón verde del centro de nuestra ciudad Justo aquí en este idílico ambiente le ofrecemos nuestros servicios de restauración y cafetería, con nosotros podrá celebrar desde el cumpleaños de sus hijos su primera comunión , comida de empresa o cualquier otra celebración.</p>


		</section>
		<section id="info" class="container">
			<h3>Algunos servicios que le ofrecemos</h3>
			<div class="contenedor">
				<a href="#">
					<div class="info-servicio" data-toggle="modal" data-target="#exampleModal">

						<img src="imagenes/VOLANTE%20A5%20CUMPLEAOSWEB2.jpg" alt="">
						<h4>Cumpleaños</h4>
					</div>
				</a>
				<a href="#">
					<div class="info-servicio" data-toggle="modal" data-target="#exampleModal2">
						<img src="imagenes/IMG_20161008_132907.jpg" alt="">
						<h4>Meriendas</h4>
					</div>
				</a>
				<a href="#carta">
					<div class="info-servicio" data-toggle="modal" data-target="#exampleModal3">
						<img src="imagenes/20151004_150814.jpg" alt="">
						<h4>Nuestra carta</h4>
					</div>
				</a>

				<div class="info-servicio">
					<img src="imagenes/IMG_20160213_222825.jpg" alt="">
					<h4>Menu para Celebraciones</h4>
				</div>
			</div>

		</section>
		<div class="footer">
			<p class="copy text-center">Cyberwichi 2019</p>
		</div>
	</main>

	
		
	


	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title mx-auto" id="exampleModalLabel">Menu Infantil para Cumpleaños</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-auto">
					<img id="cumples" class="img-fluid" src="imagenes/volante-a5-cumpleaos-final-2.jpg" alt="menu de cumpleaños a 5€">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title mx-auto" id="exampleModalLabel">Meriendas en el Barrero</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-auto">

					<img id="meriendas" class="img-fluid" src="imagenes/merienda.gif" alt="distintas opciones para celebrar una merienda en El Barrero">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title mx-auto" id="exampleModalLabel">Nuestra Carta</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-auto">

					<img id="carta" class="img-fluid" src="imagenes/IMG-20180530-WA0015.jpg" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title mx-auto" id="exampleModalLabel">Como LLegar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-auto">

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1907.9424978951388!2d-6.204453051027937!3d36.463258906843244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8cf932b91ce71ac0!2sBar+Barbacoa+Barrero!5e0!3m2!1ses!2ses!4v1562588390158!5m2!1ses!2ses" height="400" frameborder="0" style="border:0" ></iframe>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/parallax.js"></script>
</body>

</html>
