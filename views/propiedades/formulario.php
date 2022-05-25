<fieldset>
    <legend>Informacion general</legend>

    <label for="titulo">Titulo</label>
    <input name="propiedad[titulo]" type="text" id="titulo" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo) ; ?>">

    <label for="precio">Precio</label>
    <input name="propiedad[precio]" type="number" id="precio" placeholder="Precio de la propiedad" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">IMAGEN:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">
    <?php if($propiedad->imagen):?>
        <img src="/imagenes/<?php echo $propiedad->imagen?>" class="imagen-small">
    <?php endif;?>

    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="propiedad[descripcion] " > <?php echo s($propiedad->descripcion); ?> </textarea>
</fieldset>

<fieldset>
    <legend>Informacion de la propiedad</legend>

    <label for="habitaciones" >Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value= "<?php echo s($propiedad->habitaciones); ?>" >

    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->wc); ?>" >

    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento); ?>" >
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor</label>
    <select name="propiedad[vendedorId]" id="vendedor">
        <option selected value=""> >--SELECCIONE--< </option>
        <?php foreach ($vendedores as $vendedor){ ?>
            <option <?php echo $propiedad->vendedorId===$vendedor->id ? 'selected':" "; ?>
                value="<?php echo s($vendedor->id)?>">
                <?php echo s($vendedor->nombre). " ". s($vendedor->apellido);?>
            </option>
        <?php } ?>
    </select>


</fieldset>