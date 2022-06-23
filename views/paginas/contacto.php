<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>

    <?php
        if($mensaje){ ?>
            <p data-cy="alerta-envio-formulario" class='alerta exito'><?php  echo $mensaje;  ?></p>
    <?php }?>


    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" loading="lazy" alt="Imagen  contacto">
    </picture>

    <h2 data-cy="heading-formulario">Llene el Formulario de Contacto</h2>
    <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="post">
        <fieldset> <!--Campos relacionados-->
            <legend>Informacion personal</legend>
            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>
            <label data-cy="input-mensaje" for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la propiedad</legend>
            <label for="opciones">Vende o compra</label>
            <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected> --Seleccione-- </option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input data-cy="input-precio" type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>

            <div class="forma-contacto">

                <label for="contacto-telefono">Telefono</label>
                <input data-cy="forma-contacto" type="radio" value="telefono" id="contacto-telefono" name="contacto[contacto]" required>

                <label for="contacto-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" value="email" id="contacto-email" name="contacto[contacto]" required> <!--El name funciona para que solo se pueda seleccionar una opcion en un radiobutton-->
            </div>

            <div id="contacto"></div>


        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">

    </form>
</main>