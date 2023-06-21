<!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Contacto - Tienda de Mascotas</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #0f2772;
            color: #fff;
            padding: 20px;
        }
        
        h1 {
            margin: 0;
        }
        
        nav {
            background-color: #f4f4f4;
            padding: 10px;
        }
        
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        
        li {
            display: inline;
            margin-right: 10px;
        }
        
        a {
            color: #333;
            text-decoration: none;
        }
        
        .banner {
            background-image: url(banner.jpg);
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 100px;
            color: #000000;
        }
        
        .btn {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }
        
        .destacados {
            padding: 20px;
        }
        
        h2 {
            text-align: center;
        }
        
        .mascota {
            display: inline-block;
            width: 300px;
            margin: 10px;
            text-align: center;
        }
        
        img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }
        
        footer {
            background-color: #0f2772;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        
        /* Modificación para mostrar un banner de animales */
        .banner {
            background-image: url(banner.jpg);
        }
        
        .banner h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }
        
        .banner .btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            font-size: 18px;
        }
        
        /* Estilos responsive */
        
        @media (max-width: 768px) {
            .mascota {
                width: 100%;
            }
        
            img {
                width: 100%;
                height: auto;
            }
        }
        
        /* Estilos adicionales para la página de contacto */
        
        .contacto {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }
        
        .info-contacto {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
            margin-right: 10px;
            max-width: 400px;
        }
        
        .formulario {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 50px;
            max-width: 500px;
            max-height: 400px;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        
        input[type="submit"] {
            background-color: #0b890b;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            width: 100%;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Tienda de Mascotas</h1>
    </header>
    <nav>
    <ul>
        <li><a href="Tienda.php">Inicio</a></li>
        <li><a href="Alimento.php">Alimentos</a></li>
        <li><a href="Ropa.php">Ropa</a></li>
        <li><a href="todosa.php">Otros</a></li>
        <li><a href="Contacto.php">Contacto</a></li> 
        </ul>
    </nav>
    <section class="banner">
        <h2>Contacto</h2>
        <p>¡Contáctanos para cualquier consulta!</p>
    </section>
    <section class="contacto">
        <div class="info-contacto">
            <h3>Información de Contacto</h3>
            <p><strong>Dirección:</strong> Calle Principal, Número 123</p>
            <p><strong>Teléfono:</strong> +1 234 567 890</p>
            <p><strong>Email:</strong> info@tiendademascotas.com</p>
        </div>
        <div class="formulario">
            <h3>Envíanos un Mensaje</h3>
            <form method="POST" action="guardar_mensaje.php">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" required></textarea>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </section>
    <footer>
        <p>Tienda de Mascotas &copy; 2023</p>
        <div id="contador">
            <?php include "contador.php"; ?>
        </php
    </footer>
</body>
</html>
