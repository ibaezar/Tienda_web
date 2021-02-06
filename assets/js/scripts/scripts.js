//'use strict'

$(document).ready(function(){

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
})






