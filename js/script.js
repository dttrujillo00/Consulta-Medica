(function(){
    document.addEventListener('DOMContentLoaded', function(){
        var navegacionSubHeader = document.querySelectorAll('.contenido-sub-header ul li');
        var flagbodyDesplegar = false;
        const btnColapsarForm = document.querySelector('.btn-desplegable'),
              buscar = document.querySelector('.nav-botones-header ul'),
              tablaResponsive = document.querySelector('.tabla-responsive');

        // OCULTAR Y MOSTRAR FILA EN DISEÑO MÓVIL
        tablaResponsive.addEventListener('click', e => {
          var filaActivada = e.target.parentElement.parentElement;
          if(e.target.classList.contains('fa-caret-down')){
                e.target.classList.add('rotar');
                setTimeout(() => {
                     e.target.classList.remove('fa-caret-down');
                     e.target.classList.add('fa-caret-up');
                     e.target.classList.remove('rotar');
                }, 200);
                filaActivada.style.maxHeight = '1000px';
            } else {
                e.target.classList.add('rotar');
                setTimeout(() => {
                    e.target.classList.remove('fa-caret-up');
                    e.target.classList.add('fa-caret-down');
                    e.target.classList.remove('rotar');
               }, 200);
               filaActivada.style.maxHeight = '70px';
            }
        });

        // COLAPSAR FORMULARIOS
        btnColapsarForm.addEventListener('click', function(){
            const bodyDesplegar = document.querySelector('.body-desplegable');
            if (!flagbodyDesplegar) {
                bodyDesplegar.style.maxHeight = 0;
                bodyDesplegar.style.padding = 0;
                flagbodyDesplegar = true;
            } else {
                bodyDesplegar.style.maxHeight = 2000 + 'px';
                bodyDesplegar.style.padding = 1 + 'rem';
                flagbodyDesplegar = false;
            }
            
        });

        buscar.addEventListener('click', function(e){
            e.preventDefault();
            console.log(e.target);
        });

        // MOSTRAR Y OCULTAR EL SCROLLUP
        const encabezadoVistas = document.querySelector('.encabezado-vista'),
              scrollUp = document.querySelector('.scroll-up i');

        window.addEventListener('scroll', function(){
            if(encabezadoVistas.getBoundingClientRect().top == 0){
                scrollUp.style.transform = 'scale(' + 1 + ')';
                encabezadoVistas.classList.add('encabezado-vista-scroll');
            } else {
                scrollUp.style.transform = 'scale(' + 0 + ')';
                encabezadoVistas.classList.remove('encabezado-vista-scroll');
            }
        });

        // HACER SCROLL ARRIBA AL PRESIONAR SCROLLUP
         const html = document.querySelector('body, html');

         scrollUp.addEventListener('click', function () {
            var counter = html.scrollTop;
            
            var interval = setInterval(()=>{
                html.scrollTop = counter;
                counter = counter - 40;
                if(encabezadoVistas.getBoundingClientRect().top > 0){
                    clearInterval(interval)
                }
            }, 0);

         })

         // NOTIFICACIONES
         const campana = document.querySelector('.campana'),
            panel = document.querySelector('.panel-de-notificaciones'),
            cerrarPanel = document.querySelector('.cerrar-panel');

         campana.addEventListener('click', function(){
            panel.classList.add('mostrar-panel-notificaciones');
         });

         cerrarPanel.addEventListener('click', function(){
            panel.classList.remove('mostrar-panel-notificaciones');
         });
    });
})();