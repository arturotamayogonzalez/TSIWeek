(function(){

    "use strict";

    document.addEventListener('DOMContentLoaded', function(){

        //Campos Datos Usuario
        var nombre = document.getElementById('nombre');
        var apellidoP = document.getElementById('apellidoP');
        var apellidoM = document.getElementById('apellidoM')
        var email = document.getElementById('email');
        var alumno = document.getElementById('alumno');
        var externo = document.getElementById('externo');
        var matricula = document.getElementById('matricula');
        var procedencia = document.getElementById('procedencia');
        var matriculavalor = document.getElementById('matriculavalor');
        var procedenciavalor = document.getElementById('procedenciavalor');
        var eventos= document.getElementById('eventos');
        var botonRegistro = document.getElementById('btnRegistro');

        alumno.addEventListener('change', function(){
            document.getElementById('eventos').style.display = 'block';
            document.getElementById('talleres').style.display = 'block';
            document.getElementById('caja').style.display = 'block';
            document.getElementById('titulo').style.display = 'block';
            procedencia.style.display='none';
            matricula.style.display="block";
        });

        externo.addEventListener('change', function(){
            document.getElementById('eventos').style.display = 'block';
            document.getElementById('talleres').style.display = 'none';
            document.getElementById('titulo').style.display = 'none';
            document.getElementById('caja').style.display = 'none';
            procedencia.style.display='block';
            matricula.style.display="none";
        });
    
        var lunes = document.getElementById('lunes');
        
    }); //DOM CONTENT LOADED

})();

    $(function(){

        
        //Letering
        $('.nombre-sitio').lettering();

        //Agregar clase a menu
        $('body.galeria .navegacion-principal a:contains("Galeria")').addClass('activo');
        $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo');
        $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
        
        //Menu fijo
        var windowHeight= $(window).height();
        var barraAltura = $('.barra').innerHeight();
    
        $(window).scroll(function(){
            var scroll= $(window).scrollTop();
            if(scroll > windowHeight){
                $('.barra').addClass('fixed');
                $('body').css({'margin-top':barraAltura+'px'});
            }else{
                $('.barra').removeClass('fixed');
                $('body').css({'margin-top':'0px'});
    
            }
        })


        //Menu Responsive
        $('.menu-movil').on('click', function(){
            $('.navegacion-principal').slideToggle();
        })
        $('.titulo-lunes').click(function() {
            $('.lunes').slideToggle( "slow" );
        });
        $('.titulo-martes').click(function() {
            $('.martes').slideToggle( "slow" );
        });
        $('.titulo-miercoles').click(function() {
            $('.miercoles').slideToggle( "slow" );
        });
        $('.titulo-jueves').click(function() {
            $('.jueves').slideToggle( "slow" );
        });
        $('.titulo-viernes').click(function() {
            $('.viernes').slideToggle( "slow" );
        });
        
    
    
        //Programa de Conferencias
        $('.programa-evento .info-curso:first').show();
        $('.menu-programa a:first').addClass('activo');
    
        $('.menu-programa a').on('click', function(){
            $('.menu-programa a').removeClass('activo');
            $(this).addClass('activo');
            $('.ocultar').hide();
            var enlace = $(this).attr('href');
            $(enlace).fadeIn(1000);
    
            return false;
    
        });
    
        //Animaciones para los numeros
        var resumenLista = jQuery('.resumen-evento');
        if(resumenLista.length > 0){
            $('.resumen-evento').waypoint(function(){
                $('.resumen-evento li:nth-child(1) p').animateNumber({number:9}, 1200);
                $('.resumen-evento li:nth-child(2) p').animateNumber({number:8}, 1200);
                $('.resumen-evento li:nth-child(3) p').animateNumber({number:5}, 1500);
                $('.resumen-evento li:nth-child(4) p').animateNumber({number:7}, 1500);
            }, {
                offset: '60%'
            })
        }
    
        //Cuenta regresiva
        $('.cuenta-regresiva').countdown('2019/07/15 09:00:00', function(event){
            $('#dias').html(event.strftime('%D'));
            $('#horas').html(event.strftime('%H'));
            $('#minutos').html(event.strftime('%M'));
            $('#segundos').html(event.strftime('%S'));
        })

        //ColorBox
        $('.invitado-info').colorbox({inline:true, width:"50%"});

        var map = L.map('mapa').setView([19.353279, -99.282094], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([19.353279, -99.282094]).addTo(map)
        .bindPopup('TSIWeek 2019')
        .openPopup();

});
    
