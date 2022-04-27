<div class="table-row-flex">
	<div class="item-rf text-center" style="flex:0.5">
		<div class="form-check form-switch">
			<input id="cbx{{$p->code}}" class="form-check-input" name="id" type="checkbox" value="{{$p->code}}">
		</div>
	</div>
	<div class="item-rf">{{$p->code}}</div>
	<div class="item-rf justify-content-start">{{$p->name}}</div>
	<div class="item-rf">{{$p->price}}</div>
	<div class="item-rf">{{$p->stock}}</div>
	<div class="item-rf">{{$p->updated_at->toFormattedDateString()}}</div>
	<div class="item-rf text-center d-flex aling-items-center actions">
		@if( request()->routeIs('papelera') )
			<form method="POST"
				onsubmit="return confirm('¿Desea restaurar este producto?');"
				class="d-inline" action="{{route('productos.restore', $p)}}">
				@csrf @method('PATCH')
				<button class="material-icons btn recycling"
				data-bs-toggle="tooltip" data-bs-placement="top" title="Restaurar">recycling</button>
			</form>
			
			<form method="POST"
			onsubmit="return confirm('¿Esta seguro de querer eliminar este producto?');"
			class="d-inline" action="{{route('productos.forceDelete', $p)}}">
				@csrf @method('DELETE')
				<button class="material-icons btn delete" 
					data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar producto">clear</button>
			</form>
		@else
			<a class="material-icons info btn" @click="getInfoProduct({{$p->id}})" 
				data-bs-toggle="tooltip" data-bs-placement="top" title="Ver información">
				info
			</a>
			<a href="{{ route('productos.edit', $p ) }}" class="material-icons edit btn" 
				data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
				edit
			</a>
			<form method="POST"
				onsubmit="return confirm('¿Esta seguro de querer eliminar este producto?');"
				class="d-inline" action="{{route('productos.destroy', $p)}}">
				@csrf @method('DELETE')
				<button class="material-icons btn delete"
				data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar producto">delete</button>
			</form>
		@endif
	</div>
</div>