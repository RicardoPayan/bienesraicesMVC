<fieldset>

        <legend>Informacion general</legend>

        <label for="nombre">Nombres</label>
        <input name="vendedores[nombre]" type="text" id="nombre" placeholder="Nombres del vendedor" value="<?php echo s($vendedor->nombre) ; ?>">

        <label for="apellido">Apellidos</label>
        <input name="vendedores[apellido]" type="text" id="apellido" placeholder="Apellidos del vendedor" value="<?php echo s($vendedor->apellido) ; ?>">


</fieldset>

<fieldset>
    <legend>Informacion extra</legend>
    <label for="telefono">Telefono</label>
    <input name="vendedores[telefono]" type="number" id="telefono" placeholder="telefono" value="<?php echo s($vendedor->telefono) ; ?>">
</fieldset>
