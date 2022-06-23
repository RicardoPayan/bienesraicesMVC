document.addEventListener('DOMContentLoaded', function (){
   eventListeners();
   darkmode();
});

/*Funcion para cambiar el tema de la pagina a darkmode*/
function darkmode(){

    const prefiereDarkMode= window.matchMedia('(prefers-color-scheme: darka)');
    /*console.log(prefiereDarkMode.matches);*/

    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function (){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else {
            document.body.classList.remove('dark-mode');
        }
    });

  const botonDarkMode= document.querySelector('.dark-mode-boton');

  botonDarkMode.addEventListener('click', function (){
     document.body.classList.toggle('dark-mode');
  });
};



/*Funcion para escuchar el click en el logotipo*/
function eventListeners(){
   const mobileMenu = document.querySelector('.mobile-menu');

   /*Funcion navegacionResponsive es la que se encargare de lo que pasar en la pagina cuando se de click*/
   mobileMenu.addEventListener('click', navegacionResponsive);

   //Muestra campo condicionales
    const metodoContacto= document.querySelectorAll('input[name="contacto[contacto]"] ');

    metodoContacto.forEach(input => input.addEventListener('click',mostrarMetodosContacto));


}

function navegacionResponsive(){
   const navegacion = document.querySelector('.navegacion');


   /*Quitar y poner una clase con toggle*/
   navegacion.classList.toggle('mostrar');

   /*Manera con IF de quitar y poner la clase mostrar*/
   /*  if (navegacion.classList.contains('mostrar')){
      navegacion.classList.remove('mostrar')
   }else{
      navegacion.classList.add("mostrar");
   }*/

};

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value=== 'telefono'){
        contactoDiv.innerHTML=`
            
            <label for="telefono"></label>
            <input data-cy="input-telefono" type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]" >

            <p>Elija la fecha y la hora para la llamada</p>

            <label for="fecha">Fecha</label>
            <input data-cy="input-fecha" type="date"  id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input data-cy="input-hora" type="time"  id="hora" min="9:00" max="18:00" name="contacto[hora]">
        `
    }else{
        contactoDiv.innerHTML=`
            <label  for="email">E-mail</label>
            <input data-cy="input-email" type="email" placeholder="Tu email" id="email" name="contacto[email]" required>
        `
    }
}