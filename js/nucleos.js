// Seleccionar los botones de editar y ponerles un eventlistener de CLICK

const botonesEditar = document.querySelectorAll('table tbody .icono-editar');
const botonesEliminar = document.querySelectorAll('table tbody .icono-eliminar');
const contFormEdit = document.querySelector('.cont-form-edit-nuc');
const formEditNucleo = document.querySelector('#form-editar');
const camposFormEdit = document.querySelectorAll('#form-editar input');
const selectEvaluacionForm = document.querySelector('#select-evaluacion');


/************************
 *   EDITAR NUCLEO      *		
 ************************/
botonesEditar.forEach((boton) => {
	boton.addEventListener('click', (e) => {
		let idNucleo = e.target.parentElement.parentElement.parentElement.getAttribute('data-id');
		obtenerNucleoUnic(idNucleo);//Esta funcion se hace otra llamada a otra funcion
									//Que rellena los campos del formulario
	});
});

/************************
 *   ELIMINAR NUCLEO    *		
 ************************/
 botonesEliminar.forEach((boton)=>{
 	boton.addEventListener('click', (e) =>{
 		Swal.fire({
            title: '¿Está seguro?',
            text: '¡Esta acción no se puede revertir!',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, borrar!'
        }).then((result) => {
        	if(result.value){
        		let filaActual = e.target.parentElement.parentElement.parentElement;
		 		let idNucleo = filaActual.getAttribute('data-id');
		 		fetch(`../modelos/nuceleos/eliminar_nucleo.php?id_nuc=${idNucleo}`)
		 		.then(res => res.json())
		 		.then(data => {
		 			if (data.respuesta == 'Correcto') {
		 				Swal.fire({
		                    type: 'success',
		                    title: 'Paciente eliminado',
		                    showConfirmButton: false,
		                    timer: 2000
		                });
		 				filaActual.remove();
		 			}
		 		})
        	}
        })
 	});
 });


/************************
 *   GUARDAR NUCLEO      *		
 ************************/
 formEditNucleo.addEventListener('submit', function(e) {
 	e.preventDefault();

 	let datos = new FormData();

 	datos.append('direccion', camposFormEdit[0].value);
 	datos.append('manzana', camposFormEdit[1].value);

 	let inputActive = document.querySelector('#condiciones input:checked');
	datos.append('condiciones', inputActive.getAttribute('data-value'));

	inputActive = document.querySelector('#hacinamiento input:checked');
 	datos.append('indice', inputActive.getAttribute('data-value'));

 	inputActive = document.querySelector('#equipamiento input:checked');
 	datos.append('equipamiento', inputActive.getAttribute('data-value'));

 	inputActive = document.querySelector('#funcionamiento input:checked');
 	datos.append('funcionamiento', inputActive.getAttribute('data-value'));

 	inputActive = document.querySelector('#satisfaccion input:checked');
 	datos.append('satisfaccion', inputActive.getAttribute('data-value'));

 	inputActive = document.querySelector('#evaluacion input:checked');
 	if(inputActive.getAttribute('data-value') != 1){
 		datos.append('evaluacion', selectEvaluacionForm.value);
 	}else{
 		datos.append('evaluacion', 1);
 	}

 	fetch('../modelos/nuceleos/modelo_nucleo.php', {
 		method: 'POST',
 		body: datos
 	})
 	.then(response => response.json())
 	.then(data => {
 		if(data.respuesta == 'Existente' || data.respuesta == 'Correcto'){
 			Swal.fire({
                title: 'OK',
                text: 'Núcleo guardado exitosamente',
                type: 'success',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            }).then(() => {
                window.location.href = 'nucleos.php';
            });
 		}
 	});
 });

/************************
 *       FUNCIONES      *		
 ************************/
const obtenerNucleoUnic = (id) => {
	fetch(`../modelos/nuceleos/obtener_nucleo_unic.php?id=${id}`)
	.then(response => response.json())
	.then(data => {
		if(data.respuesta == 'Correcto'){
			contFormEdit.classList.remove('smallDot');
			window.scroll(0, 100);
			const nucleo = data.datos;
			rellenarCamposFormEdit(nucleo);
	
		} else {
			console.log("ERROR OBTENIENDO EL NUCLEO.");
		}
	});

}

const rellenarCamposFormEdit = (nucleo) => {
	camposFormEdit[0].value = nucleo['dirNuc'];
	camposFormEdit[1].value = nucleo['manzana'];

	console.log(nucleo);
	console.log(camposFormEdit);

	if (nucleo['califCondEstrucViv']) {
		switch (nucleo['califCondEstrucViv']){
			case 'Bien':
			camposFormEdit[2].checked = true;
			break;
			case 'Regular':
			camposFormEdit[3].checked = true;
			break;
			case 'Mal':
			camposFormEdit[4].checked = true;
			break;
		}
	}

	if (nucleo['califIndicHac']) {
		switch (nucleo['califIndicHac']){
			case 'Bien':
			camposFormEdit[5].checked = true;
			break;
			case 'Regular':
			camposFormEdit[6].checked = true;
			break;
			case 'Mal':
			camposFormEdit[7].checked = true;
			break;
		}
	}

	if (nucleo['califEqDomBas']) {
		switch (nucleo['califEqDomBas']){
			case 'Bien':
			camposFormEdit[8].checked = true;
			break;
			case 'Regular':
			camposFormEdit[9].checked = true;
			break;
			case 'Mal':
			camposFormEdit[10].checked = true;
			break;
		}
	}

	if (nucleo['funcFam']) {
		switch (nucleo['funcFam']){
			case 'Funcional':
			camposFormEdit[11].checked = true;
			break;
			case 'Riesgo de Disfunción':
			camposFormEdit[12].checked = true;
			break;
			case 'Disfuncional':
			camposFormEdit[13].checked = true;
			break;
		}
	}

	if (nucleo['satisIngr']) {
		switch (nucleo['satisIngr']){
			case 'Satisfecho':
			camposFormEdit[14].checked = true;
			break;
			case 'M/Satisfecho':
			camposFormEdit[15].checked = true;
			break;
			case 'Insatisfecho':
			camposFormEdit[16].checked = true;
			break;
		}
	}

	if (nucleo['eval']) {
		switch (nucleo['eval']){
			case 1:
				camposFormEdit[17].checked = true;
				break;
			case 2:
				camposFormEdit[18].checked = true;
				selectEvaluacionForm.selectedIndex = 0;
				break;
			case 3:
				camposFormEdit[18].checked = true;
				selectEvaluacionForm.selectedIndex = 1;
				break;
			case 4:
				camposFormEdit[18].checked = true;
				selectEvaluacionForm.selectedIndex = 2;
		}
	}
}