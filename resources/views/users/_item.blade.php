<div class="table-row-flex">
	<div class="item-rf text-center" style="flex:0.5">
		<div class="form-check form-switch">
			<input id="cbx{{$p->id}}" class="form-check-input" name="id" type="checkbox" value="{{$p->id}}">
		</div>
	</div>
	<div class="item-rf justify-content-start">{{$p->name}}</div>
	<div class="item-rf">{{$p->email}}</div>
	<div class="item-rf">
		{{ $p->branch() }}
	</div>
	<div class="item-rf">
		{{ isset($p->roles[0])?$p->roles[0]->display_name:''}}
	</div>
	<div class="item-rf">{{$p->updated_at->toFormattedDateString()}}</div>
	<div class="item-rf text-center d-flex aling-items-center actions">
		@if( request()->routeIs('papelera') )
			<form method="POST"
				onsubmit="return confirm('¿Desea restaurar este usuario?');"
				class="d-inline" action="{{route('usuarios.restore', $p)}}">
				@csrf
				<button class="material-icons btn recycling"
				data-bs-toggle="tooltip" data-bs-placement="top" title="Restaurar">recycling</button>
			</form>
			
			<form method="POST"
			onsubmit="return confirm('¿Esta seguro de querer eliminar este usuario?');"
			class="d-inline" action="{{route('usuarios.forceDelete', $p)}}">
				@csrf @method('DELETE')
				<button class="material-icons btn delete" 
					data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar usuario">clear</button>
			</form>
		@else
			
			<a href="{{ route('usuarios.edit', $p ) }}" class="material-icons edit btn" 
				data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
				edit
			</a>
			<form method="POST"
				onsubmit="return confirm('¿Esta seguro de querer eliminar este usuario?');"
				class="d-inline" action="{{route('usuarios.destroy', $p)}}">
				@csrf @method('DELETE')
				<button class="material-icons btn delete"
				data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar usuario">delete</button>
			</form>
		@endif
	</div>
</div>