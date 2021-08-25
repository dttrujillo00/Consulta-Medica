document.addEventListener('DOMContentLoaded', function () {
	const cerrarSesion = document.getElementById('cerrar-sesion');
    const infoUsuario = document.querySelector('#info-usuario .info');
    const infoUsuarioBtn = document.querySelector('#info-usuario i');

    // INFO USUARIO ANIMATION
    infoUsuarioBtn.addEventListener('click', function(e) {
    infoUsuario.classList.toggle('mostrar');
    });

    infoUsuario.classList.add('mostrar');
    setTimeout(() => infoUsuario.classList.remove('mostrar'), 2000);

	const actualizarAnchoGrafico = (graficos) => {
		var height = window.innerWidth;
		var width = window.innerHeight / 2;

		graficos[0].style.height = height + 'px';
		graficos[1].style.height = height + 'px';
		graficos[0].style.width = width + 'px';
		graficos[1].style.width = width + 'px';
	}
	
	//  GRAFICOS
	var graficos = document.querySelectorAll('.grafico');

	actualizarAnchoGrafico(graficos);

	window.addEventListener("resize", function(){
		actualizarAnchoGrafico(graficos);
	});

	// CÓDIGO DE LOS GRÁFICOS
    var consultasPorMeses = [40, 100, 80, 60, 90, 90, 100, 70, 90, 100, 90, 90, 40, 100, 80, 60, 90, 90, 100, 70, 90, 100, 90, 90];
    const barrasMeses = document.querySelectorAll('.grafico ul li');
    var count = 0;

    setTimeout(() => {
    	for (var i = barrasMeses.length - 1; i >= 0; i--) {
	    	barrasMeses[i].style.width = 2*(consultasPorMeses[i]) + "px";
	    	while(count <= consultasPorMeses[i]){
	    		barrasMeses[i].dataset.content = count;
	    		count++;
	    	}
	    	count = 0;
    	}


    }, 500);

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

// CERRAR SESION
cerrarSesion.addEventListener('click', (e) => {
    Swal.fire({
        title: 'Cerrar sesión',
        text: '¿Desea cerrar ls sesión?',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, cerrar!'
    })
    .then(result => {
        if(result.value){
            fetch('modelos/Sesion/cerrarSesion.php')
            .then(() => {
                window.location.href = 'pages/login.php';
            }); 
        }
    });
});

});