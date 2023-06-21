<!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Tienda de Mascotas - Alimentos</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <style>#lista-carrito {
    list-style: none;
    padding: 0;
    margin: 0;
}

#lista-carrito li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

#lista-carrito li:last-child {
    border-bottom: none;
}

#lista-carrito li button {
    background-color: #ff0000;
    color: #fff;
    border: none;
    padding: 5px 10px;
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
    <h2>Variedad De Alimentos</h2>
</section>
<section class="destacados">
    <!-- Contenido destacado de mascotas -->
</section>
<section class="galeria">
    <h2>Productos para Animales</h2>
    <?php
    // Array de alimentos con información
    $alimentos = array(
        array(
            "imagen" => "animal1.jpg",
            "titulo" => "Ave",
            "precio" => 100
        ),
        array(
            "imagen" => "animal2.jpg",
            "titulo" => "Buho",
            "precio" => 200
        ),
        array(
            "imagen" => "animal3.jpg",
            "titulo" => "Zorro",
            "precio" => 2000
        ),
        array(
            "imagen" => "animal4.jpg",
            "titulo" => "Tigre",
            "precio" => 100
        ),
        array(
            "imagen" => "animal5.jpg",
            "titulo" => "Puercoespín",
            "precio" => 200
        ),
        array(
            "imagen" => "animal6.jpg",
            "titulo" => "Chita",
            "precio" => 2000
        ),
        array(
            "imagen" => "animal7.jpg",
            "titulo" => "Venado",
            "precio" => 100
        ),
        array(
            "imagen" => "animal8.jpg",
            "titulo" => "Lobo",
            "precio" => 200
        ),
        array(
            "imagen" => "animal9.jpg",
            "titulo" => "Cizne",
            "precio" => 2000
        ),
        array(
            "imagen" => "animal10.jpg",
            "titulo" => "Conejo",
            "precio" => 100
        ),
        array(
            "imagen" => "animal11.jpg",
            "titulo" => "Pez",
            "precio" => 200
        ),
        array(
            "imagen" => "animal12.jpg",
            "titulo" => "Leon",
            "precio" => 2000
        )
    );
    ?>

    <div id="carrito">
        <h3>Carrito de Compras</h3>
        <ul id="lista-carrito"></ul>
        <p id="total-carrito">Total: $0</p>
        <button onclick="finalizarCompra()">Finalizar Compra</button>
    </div>

    <?php
    // Iterar sobre el array de alimentos y mostrar cada producto
    foreach ($alimentos as $index => $alimento) {
        echo '<div class="producto">';
        echo '<img src="' . $alimento["imagen"] . '" alt="' . $alimento["titulo"] . '">';
        echo '<h3>' . $alimento["titulo"] . '</h3>';
        echo '<p>Precio: $' . $alimento["precio"] . '</p>';
        echo '<button class="btn" onclick="agregarAlCarrito(' . $index . ')">Agregar al Carrito</button>';
        echo '</div>';
    }
    ?>

    <script>
        // Lógica del carrito de compras
        let carrito = [];

        // Función para agregar un producto al carrito
        function agregarAlCarrito(index) {
            const producto = <?php echo json_encode($alimentos); ?>[index];
            carrito.push(producto);
            mostrarCarrito();
            calcularTotal();
        }

        // Función para mostrar los productos en el carrito
        function mostrarCarrito() {
            const listaCarrito = document.getElementById("lista-carrito");
            listaCarrito.innerHTML = "";

            carrito.forEach((producto, index) => {
                const itemCarrito = document.createElement("li");
                itemCarrito.textContent = producto.titulo + " - $" + producto.precio;
                listaCarrito.appendChild(itemCarrito);

                const botonEliminar = document.createElement("button");
                botonEliminar.textContent = "Eliminar";
                botonEliminar.addEventListener("click", () => eliminarDelCarrito(index));
                itemCarrito.appendChild(botonEliminar);
            });
        }

        // Función para eliminar un producto del carrito
        function eliminarDelCarrito(index) {
            carrito.splice(index, 1);
            mostrarCarrito();
            calcularTotal();
        }

        // Función para calcular el total de la compra
        function calcularTotal() {
            const totalCarrito = document.getElementById("total-carrito");
            const total = carrito.reduce((accumulator, producto) => accumulator + producto.precio, 0);
            totalCarrito.textContent = "Total: $" + total;
        }

        // Función para finalizar la compra
        function finalizarCompra() {
            const nombreEmpresa = "Tienda de Mascotas";
            const direccionCompra = "123 Calle Principal, Ciudad";
            const totalCompra = carrito.reduce((accumulator, producto) => accumulator + producto.precio, 0);
            const horaImpresion = obtenerHoraImpresion();

            const ticket = "Nombre de Empresa: " + nombreEmpresa + "\n" +
                "Dirección de Compra: " + direccionCompra + "\n\n" +
                "Productos:\n" +
                carrito.map((producto) => producto.titulo + " - $" + producto.precio).join("\n") +
                "\n\n" +
                "Total: $" + totalCompra + "\n\n" +
                "Hora de Impresión: " + horaImpresion;

            const filename = "ticket_compra.txt";

            // Crear un enlace temporal para descargar el archivo
            const link = document.createElement("a");
            link.href = "data:text/plain;charset=utf-8," + encodeURIComponent(ticket);
            link.download = filename;
            link.style.display = "none";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // Función para obtener la hora de impresión
        function obtenerHoraImpresion() {
            const now = new Date();
            const hora = now.getHours().toString().padStart(2, '0');
            const minutos = now.getMinutes().toString().padStart(2, '0');
            const segundos = now.getSeconds().toString().padStart(2, '0');
            return hora + ":" + minutos + ":" + segundos;
        }
    </script>
</section>
<footer>
    <p>Tienda de Mascotas &copy; 2023</p>
    <div id="contador">
        <?php include "contador.php"; ?>
    </div>
</footer>
</body>
</html>
