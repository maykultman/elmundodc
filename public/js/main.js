
const header_for_fetch =  {
   'Content-Type': 'application/json',
   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};


async function postData(url = '', data = {}, method) {
	// Opciones por defecto estan marcadas con un *
	const response = await fetch(`${site.api+url}`, {
	 	method: method, // *GET, POST, PUT, DELETE, etc.
	  	mode: 'cors', // no-cors, *cors, same-origin
	  	cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
	  	credentials: 'same-origin', // include, *same-origin, omit 
	  	headers:  header_for_fetch,
	  	redirect: 'follow', // manual, *follow, error
	  	// referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
	  	body: JSON.stringify(data) // body data type must match "Content-Type" header
	});
	return response.json(); // parses JSON response into native JavaScript objects
}

const getListCheckboxes = () => document.querySelectorAll("input[type=checkbox][name=id]");
if( site.current == 'productos.index'){
   let checkboxes = getListCheckboxes();
   function triggerChange(isChecked) {
      checkboxes.forEach(function(cbx, index) {
         document.getElementById(checkboxes[index].id).checked = isChecked;
      });
   }
}
function removeProducts(action){
   var checkedValue = []; 
   var inputElements = getListCheckboxes();
   for(var i=0; inputElements[i]; ++i){
         if(inputElements[i].checked){
            checkedValue.push( inputElements[i].value );
         }
   }
   if( action == 'trash' ){
      if(confirm('¿Seguro que desea eliminar, estos registros?')){
         postData('/products/batchDelete', checkedValue, 'POST');
         window.location.reload();
      }
   }else{
      if(confirm('¿Seguro que desea restaurar, estos registros?')){
         postData('/products/batchRestore', checkedValue, 'POST');
         window.location.reload();
      }
   }
}

