const destino = JSON.parse(document.getElementById('listProducts').innerHTML);
const storage = localStorage.getItem('carrito');
let carrito = storage ?? [];
const print = (arg) => console.log(arg);
function formatPrice(amount, decimals) {
	amount += ''; // por si pasan un numero en vez de un string
	amount = parseFloat(amount.replace(/[^0-9.]/g, '')); // elimino cualquier cosa que no sea numero o punto
	decimals = decimals || 0; // por si la variable no fue fue pasada
	// si no es un numero o es igual a cero retorno el mismo cero
	if (isNaN(amount) || amount === 0){
	   	return parseFloat(0).toFixed(decimals);
	}
	// si es mayor o menor que cero retorno el valor formateado como numero
	amount = '' + amount.toFixed(decimals);
	var amount_parts = amount.split('.'),
	regexp = /(\d+)(\d{3})/;

	while (regexp.test(amount_parts[0])){
		amount_parts[0] = amount_parts[0].replace(regexp, '$1 , $2');
	}
	return amount_parts.join('.');
}
function _subtotal(){
	let subtotal = 0;
	carrito.forEach(value=>{
		subtotal =  subtotal + ( value.price * value.qty );
	});
	return { string : formatPrice(subtotal,2), decimal : subtotal };
}
function getTotal(){
	const subtotal = _subtotal();
	$('#subtotal').val( subtotal.string );
	$('#total').val( subtotal.decimal );
}
function _descuento(e){
	const subtotal = _subtotal();
	if(e.value>0){
		const descuento = subtotal.decimal - e.value;
		$('#total').val( formatPrice(descuento,2) );
	}else{
		$('#total').val(subtotal.string);
	}
	if( $('#pagoCon').val() > 0 ){
		calcularCambio();
	}
}

function calcularCambio(){
	const subtotal = _subtotal();
	let pagoCon = $('#pagoCon').val()??0;
	let descuento = $('#descuento').val() ?? 0;
	if( pagoCon > 0){
		pagoCon = Number(pagoCon);
		descuento = Number(descuento);
		const cambio = pagoCon - ( subtotal.decimal - descuento );
		$('#cambio').val( cambio );
	}
}

function addCart(data){
	carrito.push(data);
	$('#cart').append(template(data));
	getTotal();
	sugerencias.innerHTML = '';
}
function autoComplete(item) {
	return destino.filter((valor) => {
		const valorMinuscula = valor.name.toLowerCase()
	   	const itemMinuscula = item.toLowerCase()
	   	return valorMinuscula.includes(itemMinuscula)
	})
}
const template = (data) => { 
	const price = formatPrice(data.price,2);
	const importe = formatPrice( (data.price * data.qty), 2);
	return `
		<div id="row-${data.code}" class="table-row-flex">
			<div class="item-rf">${data.code}</div>
			<div class="item-rf">${data.name}</div>
			<div class="item-rf">${price}</div>
			<div class="item-rf"><input id="${data.code}" type="number" min="1" class="form-control" value="${data.qty}"></div>
			<div class="item-rf">${importe}</div>
			<div class="item-rf text-center">
				<button 
					data-id="#row-${data.code}"
					class="material-icons btn delete"
					data-bs-toggle="tooltip" data-bs-placement="top" 
					title="Eliminar producto">
					clear
				</button>
			</div>
		</div>
	`;
}

const campo = document.querySelector('.campo');
const sugerencias = document.querySelector('.sugerencias');
if(campo){
	campo.addEventListener('input', write);
    function write({target}){
    	sugerencias.innerHTML = '';
        const datosDelCampo = target.value;
        if(datosDelCampo.length) {
        	const autoCompleteValores = autoComplete(datosDelCampo);
            autoCompleteValores.forEach((item, index)=>{
            	const newElement = document.createElement('li');
				newElement.setAttribute('data-info', JSON.stringify(item));
               	newElement.textContent = item.name;
               	newElement.classList = 'list-group-item'+(index===0?' active':'');
               	sugerencias.appendChild(newElement);
        	});
        }else{
        	sugerencias.removeEventListener("click", autoComplete, true);  
        }
    }
    sugerencias.addEventListener('click', ({target})=>{
    	const data = JSON.parse(target.dataset.info);
		data['qty'] = 1;
		addCart(data)
    	
    })
}
var currentTarget = null;
$(document).on("keyup", function(e) {
	if (e.which == 40) {
    	//Keydown
        //Buscamos los links con clase active
        var active = $('.sugerencias').find("li.active");
        var storeTarget;
        if (active.length != 0 ) {
        	//Si existe alguno, borramos la clase y seleccionamos el siguiente link (vamos hacia abajo)
            active.removeClass("active");
            storeTarget = active.next();
            currentTarget = storeTarget;
        } else {
        	//Si no existe, seleccionamos el primer elemento
            const firstLi = $('.sugerencias li');
            storeTarget = $(firstLi[0]);
        }
        //Le asignamos la clase active
        storeTarget.addClass("active");
    } else if (e.which == 38) {
    	//Key up. Lo mismo pero empezando desde abajo
        var active = $('.sugerencias').find("li.active");
        var storeTarget;
        if (active.length != 0  ) {
        	active.removeClass("active");
            storeTarget = active.prev();
            currentTarget = storeTarget;
        } else {
            const lastLi = $('.sugerencias li');
            storeTarget = $(lastLi[lastLi.length-1]);
        }
        storeTarget.addClass("active");
    }
      
    if( e.key == 'Enter' ){
    	let data = $(currentTarget).data('info');
		data['qty'] = 1;
		addCart(data);
    }
});

$('#cart').on('click','button',function(e){
	let code = $(this).data('id');
	code = code.split('-');
	console.log(code);
	carrito = carrito.filter(item=>item.code!=code[1]);
	$($(this).data('id')).remove()
	getTotal()
});
$('#cart').on('change','input',function(){
	const code = $(this).attr('id');
	const cantidad = $(this).val();
	$('#cart').html('');
	carrito.map(item=>{
		if(item.code===code){
			item.qty = cantidad;
		}
		return item;
	});
	getTotal();
	carrito.forEach(item=>$('#cart').append(template(item)));
});


$('#sale').submit(function(event){
	event.preventDefault();
	if( $('#pagoCon').val() !== '' && ( $('#pagoCon').val() >= $('#total').val() ) ){
		let form = $('#sale').serializeFormJSON();
		
		form['cart'] = carrito;
		const response = webPostData('/sales', form, 'POST');
		console.log(response);
	}
});

$('#corteCaja').click(function(event){
	event.preventDefault();
	const response = getData('/boxCut/1');
	console.log(response);
})