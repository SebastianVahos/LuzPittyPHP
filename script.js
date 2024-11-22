//esto es un evento para cuando se haga scroll
window.addEventListener("scroll", function(){
    var header = document.querySelector("header");//guardamos en la variable header lo que capture en el header del index
    header.classList.toggle("abajo", window.scrollY > 0); //Se activa con el toggle verdadero o falso 
    /* el "abajo" es un nombre cualquiera que se le asigna a class de la etiqueta header cuando se funciona el scroll, 
    y el scrolly cuando la ventana baje en el eje y*/
})
