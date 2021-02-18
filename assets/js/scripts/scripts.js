'use strict'

$(document).ready(function(){
    
    $('.btn-login').click(function(){
        $('#login').modal('show');
    });

    //Ocultar alertas de login
    $('#login-ok').hide();
    $('#login-error').hide();

    //Funcion login
    $('#btn_login').click(function(){
        var url_origin = window.location.href;
        var url_array = url_origin.split("/");
        var url_base = url_array[0]+"//"+url_array[2]+"/"+url_array[3]+"/"+url_array[4];
        var url_login = url_base+"/controllers/login.php";

        var datos = $('#form_login').serialize();

        $.ajax({
            type: "POST",
            url: url_login,
            data: datos,
            success: function(response){
                if(response == 1){
                    $('#login-ok').fadeTo(2000, 500).slideUp(500, function(){
                        $('#login-ok').slideUp(500);
                        window.location.href = url_base;
                    });
                }else if(response == 0){
                    $('#login-error').fadeTo(2000, 500).slideUp(500, function(){
                        $('#login-error').slideUp(500);
                    });
                }
            }
        });
    });

    //Mostrar archivo seleccionado en inputs tipo file
    bsCustomFileInput.init()

    //cerrar el spinner
    setInterval(() => {
        $('body').removeClass('barra');
        $('.spinner').addClass('hidden');
    }, 500);
    
    //Slider
    $("#slider-principal").owlCarousel({
    
        nav: false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        items: 1,
        loop: true,
        autoplay: true
    });

    $('#slider-marca').owlCarousel({
        nav: false,
        loop: true,
        dots: false,
        margin:10,
        autoplay: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:4
            },
            1000:{
                items:5
            }
        }
    })
    
    $('.slider-producto').owlCarousel({
        nav: false,
        loop: true,
        dots: false,
        margin:0,
        autoplay: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            900:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })

});

//Validar todos los dormularios a nivel de html
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
