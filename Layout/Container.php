<section id="banner">
        <div class="contenido-banner">
            <h3><span>Variedades Luz Pitty</span><br>Papeleria & Articulos escolares</h3>
            <a href="#MovProduc" class="boton-comprar">Comprar ahora</a>
        </div>
    </section>
    <section id="SobreNosotros">
        <h1 class="heading"> <span> Sobre </span> Nosotros </h1>
        <div class="row">

            <div class="video-container">
                <video src="Videos/suministros_escolares.mp4" loop autoplay muted></video>
                <h3>La mejor calidad y precio</h3>
            </div>

            <div class="contenido">
                <h3>¿Por qué elegirnos?</h3>
                <p>Sacamos adelante este local en familia buscando llevar a nuestro sector productos asequibles al entorno que nos rodea
                y que además de esto las personas tengan un lugar cerca de sus centros educativos y puedan acudir a nuestra pequeña esquinita
                para adquirir lo mejor para la educacion de los más pequeños de la familia.</p>
            </div>
        </div>
    </section>
    <section id="MovProduc">
        <h1 class="HeadProducto"> <span> Te podemos </span> Ofrecer </h1>
        <div id="productos" class="productos">
        <?php
        require_once './Model/db.php';
        $conn = Database::connect();
        $sqlcommand = $conn->query("SELECT * FROM productos");
        while ($row = $sqlcommand->fetch_assoc()) {
            echo "
            <div class='box'>
                <img src='./" . $row['image'] . "' alt='" . $row['name'] . "'>
                <h4>" . $row['name'] . "</h4>
                <h5>" . number_format($row['price'], 2) . " $</h5>
                <a href='./Controller/controllerCarrito.php?action=add&id=" . $row['id'] . "' class='boton-saber-mas'>Agregar al carrito</a>
            </div>";
        }
        ?>
        </div>
    </section>
    <section id="contacto">
        <h4> <span>Contacta con</span> nosotros</h4>
        <form action="./Controller/controllerContacto.php" method="post">
            <div class="datos-form">
                <div class="nombre">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
                </div>

                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="mensaje">
                    <label for="mensaje">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" placeholder="Mensaje" cols="40" rows="10" required></textarea>
                </div>

                <div class="boton-formulario">
                    <!-- <a href="#" class="boton-saber-mas">Enviar mensaje</a> -->
                    <input type="submit" class="boton-saber-mas" value="Enviar mensaje">
                </div>
            </div>
        </form>
    </section>