@extends('layouts.app')
@section('title', 'Productos')
@section('content')
	<div class="d-flex mt-2 mb-3 justify-content-between">
		<div>
			<form action="{{ route('buscar.producto') }}" method="GET" class="input-group mb-2">
				<label class="input-group-text">Nombre / Código: </label>
				{{-- <input type="search" name="search" class="form-control" required/> --}}

				{{-- <button type="submit" class="btn btn-primary">Buscar</button> --}}
			</form>
		</div>
		<div>
			@if( request()->routeIs('papelera') )
				<a href="{{ route('productos.index') }}" class="btn btn-primary material-icons"
					data-bs-toggle="tooltip" data-bs-placement="top" title="Ir a todos los productos">list</a>
				<div class="btn btn-primary" onclick="removeProducts('restore')">Restaurar seleccionados</div>
			@else
				<a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar Producto</a>
				<div class="btn btn-primary" onclick="removeProducts('trash')">Eliminar seleccionados</div>
				
				@if( request()->route()->getName() == 'productos.index' )
					<a href="{{ route('papelera') }}" class="btn btn-primary material-icons"
					data-bs-toggle="tooltip" data-bs-placement="top" title="Ir a papelera de reciclaje">recycling</a>
				@endif
				@if( request()->route()->getName() == 'buscar.producto' )
					<a href="{{ route('productos.index') }}" class="btn btn-primary material-icons"
					data-bs-toggle="tooltip" data-bs-placement="top" title="Ir a todos los productos">list</a>
				@endif
			@endif
		</div>
	</div>
	<div class="table table-flex small rounded-3">
		<div class="table-row-flex table-flex-header gradient">
			<div class="item-rf text-center" style="flex:0.5">
				<div class="form-check form-switch shadow-none">
					<input 
						style="margin: 0 auto;"
						class="form-check-input" 
						type="checkbox" 
						onchange="triggerChange(this.checked)"
					>
				</div>
			</div>
			<div class="item-rf">Nombre</div>
			<div class="item-rf">Teléfono</div>
			<div class="item-rf">Correo</div>
			{{-- <div class="item-rf">Dirección</div> --}}
			<div class="item-rf">Actualizado</div>
			<div class="item-rf text-center">Acciones</div>
		</div>
		<div class="table-flex-body">
			@foreach($providers as $p)
				@include('providers._item')
			@endforeach
		</div>
	</div>
	<div class="pagination justify-content-center mt-3">
		{{ $providers->links() }}
	</div> 
@endsection