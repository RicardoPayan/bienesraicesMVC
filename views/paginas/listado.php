<div class="contenedor-anuncios" >
    <?php foreach ($propiedades as $propiedad){?>
        <div class="anuncio" data-cy="anuncio">

            <img src="imagenes/<?php echo $propiedad->imagen;?>" loading="lazy" alt="anuncio">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo;?></h3>
                <p><?php echo $propiedad->descripcion;?></p>
                <p class="precio"><?php echo "$". $propiedad->precio;?></p>

                <div class="abajo">
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img  class="icono" src="build/img/icono_wc.svg" loading="lazy" alt="icono wc">
                            <p><?php echo $propiedad->wc;?></p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_estacionamiento.svg" loading="lazy" alt="icono estacionamiento">
                            <p><?php echo $propiedad->estacionamiento;?></p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_dormitorio.svg" loading="lazy" alt="icono habitaciones">
                            <p><?php echo $propiedad->habitaciones;?></p>
                        </li>
                    </ul>

                    <!--Pasando id a la url-->
                    <a data-cy="enlace-propiedad" href="propiedad?id=<?php echo $propiedad->id;?>"
                       class=" boton-amarillo-block">Ver propiedad</a>
                </div>
            </div> <!-.contenido-anuncio-->
        </div> <!--.anuncio-->
    <?php } ?>
</div> <!--.contenedor-anuncios-->
