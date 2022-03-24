const header_for_fetch =  {
   'Content-Type': 'application/json',
   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};

async function postData(url = '', data = {}, method) {
   try{
      let _response;
      await fetch(url, {
         method: 'POST', // or 'PUT'
         body: JSON.stringify(data), // data can be `string` or {object}!
         headers: header_for_fetch
      }).then(res => res.json())
      .catch(error=>error)
      .then(response=>{
         _response = response
      });
      return _response;
   }catch(e){
      return e;
   }
}
jQuery.fn.serializeFormJSON = function () {
	var t = {},
		e = this.serializeArray();
	return jQuery.each(e, (function () {
		t[this.name] ? (t[this.name].push || (t[this.name] = [t[this.name]]), t[this.name].push(this.value || "")) : t[this.name] = this.value || ""
	})), t
};
async function webPostData(url = '', data = {}, method) {
   
	const response = await fetch(`${site.url+url}`, {
	 	method: method,
	  	mode: 'cors',
	  	cache: 'no-cache',
	  	credentials: 'same-origin',
	  	headers:  header_for_fetch,
	  	redirect: 'follow',
	  	body: JSON.stringify(data) // body data type must match "Content-Type" header
	});
	return response.json(); // parses JSON response into native JavaScript objects
}
async function getData(url){
   const response = await fetch(`${site.api+url}`);
   return response.json();
}
const getListCheckboxes = () => document.querySelectorAll("input[type=checkbox][name=id]");
const isIndex = site.current.split('.');
if( isIndex[1] == 'index' ){
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
   