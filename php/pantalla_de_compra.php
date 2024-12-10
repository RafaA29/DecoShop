<?php
require_once("../config/config.php");
session_start();
if (!isset($_SESSION['sesion_personal'])) {
    header("Location: ./iniciar_sesion.php");
}
$id_usuario=$_SESSION['sesion_personal']['id'];
$vaciar_carrito=$_GET['v'];
$arreglo=array(); // arreglo de productos con sus cantidad y id pe [0]=1, 2
foreach ($_GET['datos'] as $value) {
    $subarreglo=explode(",",$value);
    array_push($arreglo,$subarreglo);
}

$con = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
if (mysqli_connect_errno()) :
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
else:
    $usuario=[];
    $result = mysqli_query($con, "SELECT * FROM usuario WHERE id_usuario=".$id_usuario.";");
    while ($row = mysqli_fetch_array($result)):
        array_push($usuario, array(
            "correo"=>$row['correo'],
            "n_tarjeta"=>$row['numero_tarjeta'],
            "direccion"=>$row['direccion']
        ));
    endwhile;

    // recorrer el arreglo de productos para hacer un arreglo de productos mas detallado
    $producto=[];
    foreach ($arreglo as $indice => $valor) {
        $cantidad=$valor[0];  //  el primer [0] es el primero producto
        $id_producto=$valor[1];
        /// AQUI
        $result = mysqli_query($con, "SELECT * FROM producto WHERE id_producto=".$id_producto.";");
        while ($row = mysqli_fetch_array($result)) {
            array_push($producto, array(
                "nombre"=>$row['nombre_producto'],
                "precio"=>$row['precio_producto'],
                "cantidad"=>$cantidad,
                "id_producto"=>$id_producto
            ));
        }
    }
    
    mysqli_close($con);
endif;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "head_html.php"?>
    <title>Pantalla de compra</title>
    <!-- icono -->
    <link rel="shortcut icon" href="../img/logo.jpg">
    <!-- normalize -->
    <link rel="preload" href="../css/normalize.css" as="style">
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- estilos -->
    <link rel="preload" href="../css/estilo_generico.css" as="style">
    <link rel="stylesheet" href="../css/estilo_generico.css">
    <link rel="preload" href="../css/styles-pantalla_compra.css" as="style">
    <link rel="stylesheet" href="../css/styles-pantalla_compra.css">
    <!-- JavaScript -->
    <script type="text/javascript" src="../js/comprar_agregarcarrito.js"></script>
    <!-- SDK de PayPal -->
    <script src="https://www.paypal.com/sdk/js?client-id=TU_CLIENT_ID&currency=USD"></script> <!-- Reemplaza TU_CLIENT_ID con tu ID de cliente de PayPal -->
</head>
<!-- barra de navegación -->
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- marca -->
                <a class="navbar-brand" href="../index.php">DecoShop</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Lista de productos</a></li>
                    <li class="active"><a href="#">Comprar</a></li>
                    <li><span class="navbar-text">Sesión iniciada como <a href="../php/perfil.php"
                                class="navbar-link"><u><?=$_SESSION['sesion_personal']['nombre']?></u></a></span></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($_SESSION['sesion_personal']['super']==1): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Modo dios 😎 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../php/consultar_historial.php"><span class="glyphicon glyphicon-list"></span>
                                    Consultar historial</a></li>
                            <li><a href="../php/modificar_productos.php"><span class="glyphicon glyphicon-cog"></span>
                                    Modificar productos</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="../php/cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar
                            sesión</a>
                    </li>
                    <li>
                        <a href="../php/carrito.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito
                            de compras</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body class="container">
<div id="pdfContent">
    <h1>Pantalla de compra</h1>
    <h4>Información de facturación</h4>
    <div class="info-producto"><br>
    <div class="centrar-texto">
    <p><b>Dirección:</b> <?= $usuario[0]['direccion'];?></p>
    <p><b>Número de tarjeta:</b> <?= $usuario[0]['n_tarjeta'];?></p>
    <p><b>Correo:</b> <?= $usuario[0]['correo'];?></p>
    </div></div>
    <hr>
    <h4>Confirmación de compra</h4>
    <?php
    $total = 0;
    foreach ($producto as $value) {
        $subtotal = $value['cantidad'] * $value['precio'];
        $total += $subtotal;
    ?>
    <div class="info-producto">
        <div class="ancho-minimo">
            <p><b>Nombre:</b> <?= $value['nombre'];?></p>
            <p><b>Precio:</b> $<?= number_format($value['precio'], 2, '.', ',');?></p>
            <p><b>Cantidad:</b> <?= $value['cantidad'];?></p>
            <p><b>Total:</b> $<?= number_format($subtotal, 2, '.', ',');?></p>
        </div>
        <div>
            <img src="../img/productos/<?= $value['id_producto']?>.png" alt="<?= $value['nombre']?>"> 
        </div>
    </div>
    <br><br>
    <?php } ?>
    <h4>Total de la compra: $<?= number_format($total, 2, '.', ','); ?></h4>
</div>

<!-- Botón de PayPal -->
<div id="paypal-button-container">pago s</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        console.log("PayPal button loading...");
        paypal.Buttons({
            createOrder: function(data, actions) {
                console.log("Creating order...");
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?= number_format($total, 2, '.', '') ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                console.log("Payment approved.");
                return actions.order.capture().then(function(details) {
                    alert('Pago completado por ' + details.payer.name.given_name);
                    console.log("Payment details:", details);
                    window.location.replace("../php/completar_compra.php");
                });
            },
            onError: function(err) {
                console.error("Error during payment:", err);
            }
        }).render('#paypal-button-container');
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    document.getElementById("downloadPdfBtn").addEventListener("click", function () {
        const element = document.getElementById("pdfContent");
        const options = {
            margin: 0.5,
            filename: 'confirmacion-compra.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
        };
        html2pdf().set(options).from(element).save();
    });
</script>

</body>
</html>
