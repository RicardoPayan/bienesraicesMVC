<main class="contenedor seccion">
    <h1>Actualizar Vendedor(a)</h1>
    <a href="/admin" class="boton-verde">Volver</a>

    <!--//Mostrando los mensajes de error-->
    <?php foreach ($errores as $error):?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach;?>

    <form class="formulario" method="POST" >
        <?php include __DIR__.'/formulario.php';?>
        <input type="submit" value="Guardar cambios" class="boton-verde">
    </form>
</main>