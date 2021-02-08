'use strict'

$(document).ready(function(){

    //Mostrar archivo seleccionado en inputs tipo file
    bsCustomFileInput.init()

    //cerrar el spinner
    setInterval(() => {
        $('body').removeClass('barra');
        $('.spinner').addClass('hidden');
    }, 500);
    
    //Slider
    $("#owl-demo").owlCarousel({
    
        navigation : true, // Show next and prev buttons

        slideSpeed : 300,
        paginationSpeed : 400,

        items : 1, 
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false,
        navigation: false,
        autoPlay: true
    });

    $('.carrusel2').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        autoPlay: true,
        navigation: false,
        pagination: false,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    })
    
    $('.carrusel-productos').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        autoPlay: true,
        navigation: false,
        pagination: false,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    })

});


window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
    });
}
, false);

/********************************************************/

// Validar ingreso de datos en formulario
const inputs = document.querySelectorAll('form input');

const validar = (e) => {
    var name = e.target.name;
    if(e.target.value.length >= 1){
        document.querySelector("form input[name='"+name+"']").classList.remove('is-invalid');
        document.querySelector("form input[name='"+name+"']").classList.add('is-valid');
    }else{
        document.querySelector("form input[name='"+name+"']").classList.add('is-invalid');
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validar);
    input.addEventListener('blur', validar);
});


