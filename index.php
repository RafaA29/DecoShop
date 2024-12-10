<?php
session_start();
include_once("./config/config.php");
?>

<!DOCTYPE html>
<html lang="es">

	<head>
    	<?php include("./php/head_html.php"); ?>
    	<title>DecoShop-Inicio</title>
    	<!-- icono -->
    	<link rel="shortcut icon" href="img/img/loggo.png">
    	<!-- normalize -->
    	<link rel="preload" href="./css/normalize.css" as="style">
    	<link rel="stylesheet" href="./css/normalize.css">
    	<!-- estilos -->
    	<link rel="preload" href="./css/styles.css" as="style">
    	<link rel="stylesheet" href="./css/styles.css">
    	<link rel="preload" href="./css/estilo_generico.css" as="style">
    	<link rel="stylesheet" href="./css/estilo_generico.css">
  
	</head>

	<body>
		<header>
    		<!-- Encabezado principal con opciones de sesión 
    
        		<div class="container-fluid">
            	Marca y botón de menú para dispositivos móviles 
            	<div class="navbar-header">
                	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
                    	<span class="icon-bar"></span>
                    	<span class="icon-bar"></span>
                    	<span class="icon-bar"></span>
                	</button>

            	</div>-->

            	<!-- Menú de opciones -->
			<?php if (!isset($_SESSION['sesion_personal'])):?>
				<div class="container-hero">
					<div class="container hero">
						<div class="customer-support">
							<i class="fa-solid fa-headset"></i>
							<div class="content-customer-support">
								<span class="text">Soporte al cliente</span>
								<span class="number">800-596-8963</span>
							</div>
						</div>

						<div class="container-logo">
							<i class="fa-solid fa-couch"></i>
							<h1 class="logo"><a href="/">DecoShop</a></h1>
						</div>
						<div class="container-sesion">
							<div class="sesion">
								<a href="./php/registro.php"><span class="glyphicon glyphicon-user"></span>Registrarse</a>
								<a href="./php/iniciar_sesion.php"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a>
							</div>
						</div>
					</div>
				</div>

    		<?php else: ?>
		
				<div class="container hero">
				
					<div class="container-sesion">
            			<li class="sesion">
                			<a href="./php/perfil.php" class="navbar-link">
                			Sesión iniciada como <u><?=$_SESSION['sesion_personal']['nombre']?></u></a>
            			</li>
					</div>
					<div class="container-logo">
						<i class="fa-solid fa-couch"></i>
						<h1 class="logo"><a href="/">DecoShop</a></h1>
					</div>
        			<ul class="nav navbar-nav navbar-right">
            			<?php if($_SESSION['sesion_personal']['super']==1): ?>
            			<li class="dropdown">
                			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"aria-expanded="false">Modo dios 😎 <span class="caret"></span></a>
                			<ul class="dropdown-menu">
                    			<li><a href="./php/consultar_historial.php"><span class="glyphicon glyphicon-list"></span> Consultar historial</a></li>
                    			<li><a href="./php/modificar_productos.php"><span class="glyphicon glyphicon-cog"></span> Modificar productos</a></li>
                			</ul>
            			</li>
            			<?php endif; ?>
						<div class="container-sesion">
							<div class="sesion">
								<a href="./php/cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a>
												
								<a href="./php/carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito de compras</a>
							</div>
						</div>
        			</ul>
				</div>
		
    		<?php endif ?>

    		<!-- Barra de navegación secundaria -->
    		<section>
    			<div class="container-navbar">
        		<nav class="navbar container">
            		<!-- <i class="fa-solid fa-bars"></i>-->
            		<ul class="menu">
                		<li><a href="/index.php">INICIO</a></li>
                		<li><a href="./paginas/WISHLIST/index.html">LISTA DE DESEOS</a></li>
                		<li><a href="./paginas/hogar/index.html">HOGAR</a></li>
                		<li><a href="./paginas/OFICINA/index.html">OFICINA</a></li>
                		<li><a href="./paginas/Credito/index.html">MI CRÉDITO DECO</a></li>
                		<li><a href="#">SOBRE NOSOTROS</a></li>
            		</ul>

            	<!-- Formulario de búsqueda -->
            	<!-- <form class="search-form">
                	<input type="search" placeholder="Buscar..." />
                	<button class="btn-search">
                   	<i class="fa-solid fa-magnifying-glass"></i>
                	</button>
            	</form>-->
        		</nav>
    			</div>
			</section>

		</header>
    	<!-- carrusel -->
		<section class="banner">
				<div class="content-banner">
					<p> DecoShop</p>
					<h2> Las ofertasde otoño <br />ya estan aqui</h2>
					<a href="#">Comprar ahora</a>
				</div>
		</section>
	
    	<main class="main-content">
			<section class="container container-features">
				<div class="card-feature">
					<i class="fa-solid fa-plane-up"></i>
					<div class="feature-content">
						<span>Envío gratuito a todo el pais</span>
						<p>En pedido superior a $2500</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-wallet"></i>
					<div class="feature-content">
						<span>Politica de reembolso</span>
						<p>100% garantía de devolución de dinero</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-gift"></i>
					<div class="feature-content">
						<span>Tarjeta regalo especial</span>
						<p>Ofrece bonos especiales con regalo</p>
					</div>
				</div>
				<div class="card-feature">
					<i class="fa-solid fa-headset"></i>
					<div class="feature-content">
						<span>Servicio al cliente 24/7</span>
						<p>LLámenos 24/7 al 4447056185</p>
					</div>
				</div>
			</section>

			<section class="container top-categories">
				<h1 class="heading-1">Mas Categorías</h1>
				<div class="container-categories">
					<div class="card-category category-moca">
						<p>Hogar</p>
						<span>Ver más</span>
					</div>
					<div class="card-category category-expreso">
						<p>Para la oficina</p>
						<span>Ver más</span>
					</div>
					<div class="card-category category-capuchino">
						<p>Linea Blanca y Electronica</p>
						<span>Ver más</span>
					</div>
				</div>
			</section>

			<section class="container top-products">
				<h1 class="heading-1">Lo mejor para el otoño </h1>

				<div class="container-options">
					<span class="active">Destacados</span>
					<span>Más recientes</span>
					<span>Mejores Vendidos</span>
				</div>

				<div class="container-products">
					<!-- Producto 1 -->
					<div class="card-product">
						<div class="container-img">
							<img src="./img/img/cafe-irish.jpg" alt="Cafe Irish" />
							<span class="discount">-13%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Sofá de 2 plazas Grimaldi</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$4,589 <span>$6,458</span></p>
						</div>
					</div>
					<!-- Producto 2 -->
					<div class="card-product">
						<div class="container-img">
							<img
								src="./img/img/cafe-ingles.jpeg"
								alt="Cafe incafe-ingles.jpg"
							/>
							<span class="discount">-22%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Cajonera Kavil - Blanco y Negro</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$8,772 <span>$9,247</span></p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img
								src="./img/img/cafe-australiano.avif"
								alt="Cafe Australiano"
							/>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<h3>Escritorio Corato</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$5,434</p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="./img/img/cafe-helado.avif" alt="Cafe Helado" />
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Sombrilla Kenia con base</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$12,999</p>
						</div>
					</div>
				</div>
			</section>

			<section class="gallery">
				<img
					src="./img/img/gallery1.jpg"
					alt="Gallery Img1"
					class="gallery-img-1"
				/><img
					src="./img/img/gallery2.jpg"
					alt="Gallery Img2"
					class="gallery-img-2"
				/><img
					src="./img/img/gallery3.png"
					alt="Gallery Img3"
					class="gallery-img-3"
				/><img
					src="./img/img/gallery4.jpg"
					alt="Gallery Img4"
					class="gallery-img-4"
				/><img
					src="./img/img/gallery5.jpeg"
					alt="Gallery Img5"
					class="gallery-img-5"
				/>
			</section>

			<section class="container specials">
				<h1 class="heading-1">Ultimas Piezas </h1>

				<div class="container-products">
					<!-- Producto 1 -->
					<div class="card-product">
						<div class="container-img">
							<img src="./img/img/cafe-irish.jpg" alt="Cafe Irish" />
							<span class="discount">-13%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Sofá de 2 plazas Grimaldi</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$4,589 <span>$6,458</span></p>
						</div>
					</div>
					<!-- Producto 2 -->
					<div class="card-product">
						<div class="container-img">
							<img
								src="./img/img/cama.jpg"
								alt="Cafe incafe-ingles.jpg"
							/>
							<span class="discount">-22%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>Cama matrimonial Neil - Blanco y Madera</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$2,499 <span>$3,199</span></p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="./img/img/mesa.jpg" alt="Cafe Viena" />
							<span class="discount">-30%</span>
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
							</div>
							<h3>Mesa 4 sillas rustic/imperial madera</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$5,899<span>$6,999</span></p>
						</div>
					</div>
					<!--  -->
					<div class="card-product">
						<div class="container-img">
							<img src="./img/img/TV.jpg" alt="Cafe Liqueurs" />
							<div class="button-group">
								<span>
									<i class="fa-regular fa-eye"></i>
								</span>
								<span>
									<i class="fa-regular fa-heart"></i>
								</span>
								<span>
									<i class="fa-solid fa-code-compare"></i>
								</span>
							</div>
						</div>
						<div class="content-card-product">
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
							</div>
							<h3>CMueble para TV Bergen- Roble y Negro</h3>
							<span class="add-cart">
								<i class="fa-solid fa-basket-shopping"></i>
							</span>
							<p class="price">$ 8,138</p>
						</div>
					</div>
				</div>
			</section>

			
		

    <!-- panel del titulo -->
    

    <!-- lista de productos -->
	<section class="container specials">
	<h3 class="container text-center" style="margin-bottom: .6em; margin-top: .5em;">Lista de articulos</h3>
    <div class="container-products">
        <!-- lista de productos automatica -->
        <?php
        // Crear una conexión
        $con = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
            
        // verificar connection con la BD
        if (mysqli_connect_errno()) :
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        else:
            $result = mysqli_query($con, "SELECT * FROM producto;");
            $vacios=0;
            while ($row = mysqli_fetch_array($result)): 
                if($row['cantidad_disponible']==0){
                    $vacios++;
                    continue;
                }
                ?>
			<div class="card-product">
				<div class="container-img">
                <img  src="./img/productos/<?= $row['id_producto'] ?>.png" alt="Card image cap">
				<div class="content-card-product">
				
							<div class="stars">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-regular fa-star"></i>
								 
							</div>
						</div>
                    <hr class="solid">
                    
                    <div id="altura_caja">
                        <p class="card-text">
                            <?= $row['nombre_producto'] ?><br>
                            <?= $row['descripcion_producto'] ?>
                        </p>
                    </div>

                    <hr class="solid">
                    <p class="card-text">$
                        <?= number_format(floatval($row['precio_producto']), 2, '.', ',') ?>
                    </p>
                </div>
                <?php if (isset($_SESSION['sesion_personal'])):?>
                    <a href="./php/info_producto.php?id=<?= $row['id_producto'] ?>" class="btn btn-sm comprar">Comprar</a>
                    <?php else: ?>
                        <a href="./php/iniciar_sesion.php" class="btn btn-sm comprar">Comprar</a>
                        <?php endif ?>
                    </div>
                    <?php
            endwhile;
            $n_relleno=(((int)mysqli_num_rows($result))-$vacios)%5;
            if($n_relleno != 0):
                for ($x=0; $x < 5-$n_relleno; $x++):?>
                <div class="card" style="border: solid 1px transparent;">
                </div>
                <?php
                endfor;
            endif;
            // cerrar conexión
            mysqli_close($con);
        endif;
        ?>
    </div>
	</section>
    <section class="container blogs">
				<h1 class="heading-1">Conocenos
				</h1>

				<div class="container-blogs">
					<div class="card-blog">
						<div class="container-img">
							<img src="img/img/expertos.jpg" alt="Imagen Blog 1" />
							<div class="button-group-blog">
								<span>
									<i class="fa-solid fa-magnifying-glass"></i>
								</span>
								<span>
									<i class="fa-solid fa-link"></i>
								</span>
							</div>
						</div>
						<div class="content-blog">
							<h3>Mision </h3>
							<span>A donde queremos llegar</span>
							<p>
								Lorem ipsum dolor sit amet consectetur adipisicing
								elit. Iste, molestiae! Ratione et, dolore ipsum
								quaerat iure illum reprehenderit non maxime amet dolor
								voluptas facilis corporis, consequatur eius est sunt
								suscipit?
							</p>
							
						</div>
					</div>
					<div class="card-blog">
						<div class="container-img">
							<img src="img/img/mini.jpeg" alt="Imagen Blog 2" />
							<div class="button-group-blog">
								<span>
									<i class="fa-solid fa-magnifying-glass"></i>
								</span>
								<span>
									<i class="fa-solid fa-link"></i>
								</span>
							</div>
						</div>
						<div class="content-blog">
							<h3>Vision</h3>
							<span>Como mejoramos juntos</span>
							<p>
								Lorem ipsum dolor sit amet consectetur adipisicing
								elit. Iste, molestiae! Ratione et, dolore ipsum
								quaerat iure illum reprehenderit non maxime amet dolor
								voluptas facilis corporis, consequatur eius est sunt
								suscipit?
							</p>
							
						</div>
					</div>
					<div class="card-blog">
						<div class="container-img">
							<img src="img/img/otoño.jpg" alt="Imagen Blog 3" />
							<div class="button-group-blog">
								<span>
									<i class="fa-solid fa-magnifying-glass"></i>
								</span>
								<span>
									<i class="fa-solid fa-link"></i>
								</span>
							</div>
						</div>
						<div class="content-blog">
							<h3>Valores</h3>
							<span>Que nos motiva</span>
							<p>
								Lorem ipsum dolor sit amet consectetur adipisicing
								elit. Iste, molestiae! Ratione et, dolore ipsum
								quaerat iure illum reprehenderit non maxime amet dolor
								voluptas facilis corporis, consequatur eius est sunt
								suscipit?
							</p>
							
						</div>
					</div>
				</div>
			</section>
		</main>
    <!-- footer -->
    <footer class="footer">
			<div class="container container-footer">
				<div class="menu-footer">
					<div class="contact-info">
						<p class="title-footer">Información de Contacto</p>
						<ul>
							<li>
								Valentin Amador 120a Zona centro San Luis Potosi
								San Luis Potosi 78000
							</li>
							<li>Teléfono: 444-708-6185</li>
						
							<li>EmaiL: contacto@decoshop.com.mx</li>
						</ul>
						<div class="social-icons">
							<span class="facebook">
								<i class="fa-brands fa-facebook-f"></i>
							</span>
							<span class="twitter">
								<i class="fa-brands fa-twitter"></i>
							</span>
							<span class="youtube">
								<i class="fa-brands fa-youtube"></i>
							</span>
							<span class="pinterest">
								<i class="fa-brands fa-pinterest-p"></i>
							</span>
							<span class="instagram">
								<i class="fa-brands fa-instagram"></i>
							</span>
						</div>
					</div>

					<div class="information">
						<p class="title-footer">Información</p>
						<ul>
							<li><a href="#">Acerca de Nosotros</a></li>
							<li><a href="#">Devoluciones</a></li>
							<li><a href="#">Politicas de Privacidad</a></li>
							<li><a href="#">Términos y condiciones</a></li>
							<li><a href="#">Sucursales</a></li>
						</ul>
					</div>

					<div class="my-account">
						<p class="title-footer">Mi cuenta</p>

						<ul>
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="#">Historial de compras</a></li>
							<li><a href="#">Lista de deseos</a></li>
							<li><a href="#">Mi credito Deco</a></li>
							<li><a href="#">Tarjeta de regalo</a></li>
						</ul>
					</div>

					<div class="newsletter">
						<p class="title-footer">Politica de Privacidad</p>

						<div class="content">
							<p>
								Danos tu opinion
							</p>
							<input type="email" placeholder="En que puedo mejorar">
							<button>Enviar</button>
						</div>
					</div>
				</div>

				<div class="copyright">
					<p>
						Developed by HAWK|INC  &copy;
						<span class="game-icons--hawk-emblem"></span>
					</p>

					<img src="img/img/payment.png" alt="Pagos">
				</div>
			</div>
		</footer>

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
	</body>

</html>

