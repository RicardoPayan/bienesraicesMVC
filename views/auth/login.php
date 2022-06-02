<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>


    <?php foreach ($errores as $error): //Forma de mostrar los errores en el hmtl?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach;?>

    <form method="post" class="formulario" action="/login">
        <fieldset> <!--Campos relacionados-->
            <legend>Email y password</legend>



            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu password" id="password" required>

            <input type="submit" value="Iniciar Sesión" class="boton-verde">

        </fieldset>
    </form>
</main>