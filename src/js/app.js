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