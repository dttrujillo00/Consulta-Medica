const bodyTable = document.querySelector('.table tbody');
const contFormEdit = document.querySelector('.cont-form-edit-nuc');
const formEditNucleo = document.querySelector('#form-editar');
const camposFormEdit = document.querySelectorAll('#form-editar input');
const selectEvaluacionForm = document.querySelector('#select-evaluacion');

/************************
 *       FUNCIONES      *		
 ************************/
 const obtenerNucleos = () => {
	fetch('../modelos/nucleos/obtener_nucleo.php')
	.then(res => res.json())
	.then(data => {
		// let contenidoTabla;
		while(bodyTable.firstChild){
			bodyTable.removeChild(bodyTable.firstChild);
		}
		data.datos.forEach((nucleo) => {
			// console.log(nucleo);
			var fila = document.createElement('tr');
			fila.classList.add('grupo1');
			fila.setAttribute('data-id', nucleo.idNuc);
			fila.innerHTML = `
				<td>${nucleo.dirNuc}</td>
				<td>${nucleo.manzana}</td>
				<td>${nucleo.califCondEstrucViv}</td>
				<td>${nucleo.califIndicHac}</td>
				<td>${nucleo.califEqDomBas}</td>
				<td>${nucleo.funcFam}</td>
				<td>${nucleo.satisIngr}</td>
				<td>${nucleo.eval}</td>
				<td>
					<span class="icono-editar">
						<i class="fa fa-pencil"></i>
					</span>
				</td>
				<td>
					<span class="icono-eliminar">
						<i class="fa fa-trash-o"></i>
					</span>
				</td>
			`;

			bodyTable.appendChild(fila);
		});

		const botonesEditar = document.querySelectorAll('table tbody .icono-editar');
		const botonesEliminar = document.querySelectorAll('table tbody .icono-eliminar');
		habilitarBotonesEditar(botonesEditar);
		habilitarBotonesEliminar(botonesEliminar);
	})
}
const obtenerNucleoUnic = (id) => {
	fetch(`../modelos/nucleos/obtener_nucleo_unic.php?id=${id}`)
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

	camposFormEdit[0].value = nucleo['idNuc']
	camposFormEdit[1].value = nucleo['dirNuc'];
	camposFormEdit[2].value = nucleo['manzana'];

	// console.log(nucleo);
	// console.log(camposFormEdit);

	if (nucleo['califCondEstrucViv']) {
		switch (nucleo['califCondEstrucViv']){
			case 'Bien':
			camposFormEdit[3].checked = true;
			break;
			case 'Regular':
			camposFormEdit[4].checked = true;
			break;
			case 'Mal':
			camposFormEdit[5].checked = true;
			break;
		}
	}

	if (nucleo['califIndicHac']) {
		switch (nucleo['califIndicHac']){
			case 'Bien':
			camposFormEdit[6].checked = true;
			break;
			case 'Regular':
			camposFormEdit[7].checked = true;
			break;
			case 'Mal':
			camposFormEdit[8].checked = true;
			break;
		}
	}

	if (nucleo['califEqDomBas']) {
		switch (nucleo['califEqDomBas']){
			case 'Bien':
			camposFormEdit[9].checked = true;
			break;
			case 'Regular':
			camposFormEdit[10].checked = true;
			break;
			case 'Mal':
			camposFormEdit[11].checked = true;
			break;
		}
	}

	if (nucleo['funcFam']) {
		switch (nucleo['funcFam']){
			case 'Funcional':
			camposFormEdit[12].checked = true;
			break;
			case 'Riesgo de Disfunción':
			camposFormEdit[13].checked = true;
			break;
			case 'Disfuncional':
			camposFormEdit[14].checked = true;
			break;
		}
	}

	if (nucleo['satisIngr']) {
		switch (nucleo['satisIngr']){
			case 'Satisfecho':
			camposFormEdit[15].checked = true;
			break;
			case 'M/Satisfecho':
			camposFormEdit[16].checked = true;
			break;
			case 'Insatisfecho':
			camposFormEdit[17].checked = true;
			break;
		}
	}

	if (nucleo['eval']) {
		switch (nucleo['eval']){
			case 'Sin Problemas':
				camposFormEdit[18].checked = true;
				selectEvaluacionForm.disabled = true;
				break;
			case 'Dificultades c/ condiciones materiales':
				camposFormEdit[19].checked = true;
				selectEvaluacionForm.disabled = false;
				selectEvaluacionForm.selectedIndex = 0;
				break;
			case 'Dificultades c/ la salud de los integrantes':
				camposFormEdit[19].checked = true;
				selectEvaluacionForm.disabled = false;
				selectEvaluacionForm.selectedIndex = 1;
				break;
			case 'Dificultades c/ el funcionamiento de la familia':
				camposFormEdit[19].checked = true;
				selectEvaluacionForm.disabled = false;
				selectEvaluacionForm.selectedIndex = 2;
		}
	}
}

 	/************************
 	 *   EDITAR NUCLEO      *		
 	 ************************/

const habilitarBotonesEditar = (array) => {
	array.forEach((boton) => {
		boton.addEventListener('click', (e) => {
			// console.log(e.target);
			formEditNucleo.reset();
			let idNucleo = e.target.parentElement.parentElement.parentElement.getAttribute('data-id');
			obtenerNucleoUnic(idNucleo);//Esta funcion se hace otra llamada a otra funcion
									//Que rellena los campos del formulario
		});
	});
}

/************************
 *   ELIMINAR NUCLEO    *		
 ************************/

const habilitarBotonesEliminar = (array) => {
 array.forEach((boton)=>{
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
		 		fetch(`../modelos/nucleos/eliminar_nucleo.php?id_nuc=${idNucleo}`)
		 		.then(res => res.json())
		 		.then(data => {
		 			if (data.respuesta == 'Correcto') {
		 				Swal.fire({
		                    type: 'success',
		                    title: 'Núcleo eliminado',
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
}

/************************
 *     LEER NUCLEOS     *		
 ************************/
obtenerNucleos();
//  fetch('../modelos/nucleos/obtener_nucleo.php')
//  .then(res => res.json())
//  .then(data => {
//  	// let contenidoTabla;
//  	data.datos.forEach((nucleo) => {
//  		console.log(nucleo);
//  		var fila = document.createElement('tr');
//  		fila.classList.add('grupo1');
//  		fila.setAttribute('data-id', nucleo.idNuc);
// 	 	fila.innerHTML = `
// 			<td>${nucleo.dirNuc}</td>
// 			<td>${nucleo.manzana}</td>
// 			<td>${nucleo.califCondEstrucViv}</td>
// 			<td>${nucleo.califIndicHac}</td>
// 			<td>${nucleo.califEqDomBas}</td>
// 			<td>${nucleo.funcFam}</td>
// 			<td>${nucleo.satisIngr}</td>
// 			<td>${nucleo.eval}</td>
// 			<td>
// 				<span class="icono-editar">
// 					<i class="fa fa-pencil"></i>
// 				</span>
// 			</td>
// 			<td>
// 				<span class="icono-eliminar">
// 					<i class="fa fa-trash-o"></i>
// 				</span>
// 			</td>
// 	 	`;

// 	 	bodyTable.appendChild(fila);
//  	});

//  	const botonesEditar = document.querySelectorAll('table tbody .icono-editar');
//  	const botonesEliminar = document.querySelectorAll('table tbody .icono-eliminar');
//  	habilitarBotonesEditar(botonesEditar);
//  	habilitarBotonesEliminar(botonesEliminar);
//  })

/************************
 *   GUARDAR NUCLEO      *		
 ************************/
 formEditNucleo.addEventListener('submit', function(e) {
 	e.preventDefault();

 	let datos = new FormData();

 	datos.append('idNuc', camposFormEdit[0].value);
 	datos.append('direccion', camposFormEdit[1].value);
 	datos.append('manzana', camposFormEdit[2].value);

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

 	// console.log(datos.get('funcionamiento'));

 	fetch('../modelos/nucleos/modelo_nucleo.php', {
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
                // window.location.href = 'nucleos.php';
				contFormEdit.classList.add('smallDot');
				obtenerNucleos();
            });
 		}
 	});
 });

