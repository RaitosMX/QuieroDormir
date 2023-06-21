<!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Tienda de Mascotas</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<header>
    <h1>Tienda de Mascotas</h1>
</header>
<nav>
    <ul>
    <ul>
        <li><a href="Tienda.php">Inicio</a></li>
        <li><a href="Alimento.php">Alimentos</a></li>
        <li><a href="Ropa.php">Ropa</a></li>
        <li><a href="todosa.php">Otros</a></li>
        <li><a href="Contacto.php">Contacto</a></li> 
        </ul>
</nav>
<section class="banner">
    <h2>¡Animales exoticos aqui!</h2>
    <a href="todosa.php" class="btn">Ver Mascotas</a>
</section>
<section class="destacados">
    <h2>Mascotas Destacadas</h2>
    <div class="mascota">
        <img src="perro1.jpg" alt="perro1">
        <h3>Perros</h3>
        <p>Precio: $400-$2600</p>
        <a href="perros.php" class="btn">Ver Detalles</a>
    </div>
    <div class="mascota">
        <img src="gato1.jpeg" alt="gato1">
        <h3>Gatos</h3>
        <p>Precio: $400-$2600</p>
        <a href="gatos.php" class="btn">Ver Detalles</a>
    </div>
    <div class="mascota">
        <img src="ave1.jpeg" alt="ave1">
        <h3>Aves</h3>
        <p>Precio: $400-$2600</p>
        <a href="aves.php" class="btn">Ver Detalles</a>
    </div>
    <div class="mascota">
        <img src="reptil1.jpg" alt="reptil1">
        <h3>Reptiles</h3>
        <p>Precio: $400-$2600</p>
        <a href="reptiles.php" class="btn">Ver Detalles</a>
    </div>
    <div class="mascota">
        <img src="insectos1.jpg" alt="insectos1">
        <h3>Insectos</h3>
        <p>Precio: $400-$2600</p>
        <a href="insectos.php" class="btn">Ver Detalles</a>
    </div>
</section>
<section class="galeria">
    <h2>Productos para Animales</h2>
    <div class="producto">
        <img src="alimento.jpg" alt="alimento">
        <h3>Alimento</h3>
        <p>Precio: $10-$50</p>
        <a href="Alimento.php" class="btn">Ver Detalles</a>
    </div>
    </div>
    <div class="producto">
        <img src="adornos.jpg" alt="adornos">
        <h3>Ropa</h3>
        <p>Precio: $5-$20</p>
        <a href="Ropa.php" class="btn">Ver Detalles</a>
    </div>
</section>
<footer>
    <p>Tienda de Mascotas &copy; 2023</p>
    <div id="contador">
        <?php include "contador.php"; ?>
    </div>
    
</footer>
</body>
</html>
