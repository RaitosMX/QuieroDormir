<!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <title>Tienda de Mascotas - Ropa</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <style>
        #lista-carrito {
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
    <h2>Variedad De Ropa</h2>
</section>
<section class="destacados">
    <!-- Contenido destacado de mascotas -->
</section>
<section class="galeria">
    <h2>Productos para Animales</h2>
    <?php
    // Array de ropa con información
    $ropa = array(
        array(
            "imagen" => "insectos1.jpg",
            "titulo" => "insectos",
            "precio" => 150
        ),
        array(
            "imagen" => "insectos2.jpg",
            "titulo" => "insectos",
            "precio" => 180
        ),
        array(
            "imagen" => "insectos3.jpg",
            "titulo" => "insectos",
            "precio" => 120
        ),
        array(
            "imagen" => "insectos4.jpg",
            "titulo" => "insectos",
            "precio" => 200
        ),
        array(
            "imagen" => "insectos5.jpg",
            "titulo" => "insectos",
            "precio" => 180
        ),
        array(
            "imagen" => "insectos6.jpg",
            "titulo" => "insectos",
            "precio" => 180
        ),
    );
    ?>

    <div id="carrito">
        <h3>Carrito de Compras</h3>
        <ul id="lista-carrito"></ul>
        <p id="total-carrito">Total: $0</p>
        <button onclick="solicitarDatosCompra()">Finalizar Compra</button>
    </div>

    <?php
    // Iterar sobre el array de ropa y mostrar cada producto
    foreach ($ropa as $index => $prenda) {
        echo '<div class="producto">';
        echo '<img src="' . $prenda["imagen"] . '" alt="' . $prenda["titulo"] . '">';
        echo '<h3>' . $prenda["titulo"] . '</h3>';
        echo '<p>Precio: $' . $prenda["precio"] . '</p>';
        echo '<button class="btn" onclick="agregarAlCarrito(' . $index . ')">Agregar al Carrito</button>';
        echo '</div>';
    }
    ?>

    <script>
        // Lógica del carrito de compras
        let carrito = [];

        // Función para agregar un producto al carrito
        function agregarAlCarrito(index) {
            const producto = <?php echo json_encode($ropa); ?>[index];
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
                itemCarrito.innerHTML = `
                    <div>
                        <img src="${producto.imagen}" alt="${producto.titulo}">
                        <span>${producto.titulo}</span>
                    </div>
                    <div>
                        <span>Precio: $${producto.precio}</span>
                        <button onclick="eliminarDelCarrito(${index})">Eliminar</button>
                    </div>
                `;
                listaCarrito.appendChild(itemCarrito);
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

        // Función para solicitar datos de compra
        function solicitarDatosCompra() {
            const direccion = prompt("Ingrese su dirección:");
            const forma_pago = prompt("Ingrese su forma de pago:");

            if (direccion && forma_pago) {
                finalizarCompra(direccion, forma_pago);
            } else {
                alert("Por favor, ingrese su dirección y forma de pago.");
            }
        }

        // Función para finalizar la compra
        function finalizarCompra(direccion, forma_pago) {
            const nombreEmpresa = "Tienda de Mascotas";
            const direccionCompra = direccion;
            const formaPagoCompra = forma_pago;
            const totalCompra = carrito.reduce((accumulator, producto) => accumulator + producto.precio, 0);
            const horaImpresion = obtenerHoraImpresion();

            const ticket = "Nombre de Empresa: " + nombreEmpresa + "\n" +
                "Dirección de Compra: " + direccionCompra + "\n" +
                "Numero de Tarjeta de Credito: " + formaPagoCompra + "\n\n" +
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
