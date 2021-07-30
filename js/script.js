(function(){
    document.addEventListener('DOMContentLoaded', function(){
        const navegacionSubHeader = document.querySelectorAll('.contenido-sub-header ul li'),
              btnColapsarForm = document.querySelector('.btn-desplegable'),
              buscar = document.querySelector('.nav-botones-header ul'),
              tablaResponsive = document.querySelector('.tabla-responsive');
        var flagbodyDesplegar = false;

        // OCULTAR Y MOSTRAR FILA EN DISEÑO MÓVIL
        tablaResponsive.addEventListener('click', e => {
          console.log(e.target);
          var filaActivada = e.target.parentElement.parentElement;
          if(e.target.classList.contains('fa-caret-down')){
                e.target.classList.add('rotar');
                setTimeout(() => {
                     e.target.classList.remove('fa-caret-down');
                     e.target.classList.add('fa-caret-up');
                     e.target.classList.remove('rotar');
                }, 200);
                filaActivada.style.maxHeight = '1000px';
            } else if(e.target.classList.contains('fa-caret-up')){
                e.target.classList.add('rotar');
                setTimeout(() => {
                    e.target.classList.remove('fa-caret-up');
                    e.target.classList.add('fa-caret-down');
                    e.target.classList.remove('rotar');
               }, 200);
               filaActivada.style.maxHeight = '65px';
            }
        });

        // COLAPSAR FORMULARIOS
        btnColapsarForm.addEventListener('click', () =>{
            const bodyDesplegar = document.querySelector('.body-desplegable');
            if (!flagbodyDesplegar) {
                bodyDesplegar.style.maxHeight = 0;
                bodyDesplegar.style.padding = 0;
                flagbodyDesplegar = true;
                btnColapsarForm.classList.add('mostrar');                
            } else {
                bodyDesplegar.style.maxHeight = 2000 + 'px';
                bodyDesplegar.style.padding = 1 + 'rem';
                flagbodyDesplegar = false;
                btnColapsarForm.classList.remove('mostrar');
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
         const campana = document.querySelector('.nav-botones-header ul li:last-child'),
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