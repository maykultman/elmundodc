@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
	<div class="d-flex mt-2 mb-3 justify-content-between">
		<div>
			@if( request()->routeIs('papelera') )
				<a href="{{ route('usuarios.index') }}" class="btn btn-primary material-icons"
					data-bs-toggle="tooltip" data-bs-placement="top" title="Ir a todos los usuarios">list</a>
			@else
				<a href="{{ route('usuarios.create') }}" class="btn btn-primary">Agregar usuario</a>
				<div class="btn btn-primary" onclick="removeProducts('trash')">Eliminar seleccionados</div>
				@if( request()->route()->getName() == 'buscar.producto' )
					<a href="{{ route('usuarios.index') }}" class="btn btn-primary material-icons"
					data-bs-toggle="tooltip" data-bs-placement="top" title="Ir a todos los usuarios">list</a>
				@endif
			@endif
		</div>
		@if(session('status'))
			@include('static/just-alert')
		@endif
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
			<div class="item-rf">Correo</div>
			<div class="item-rf">Sucursal</div>
			<div class="item-rf">Rol</div>
			<div class="item-rf">Actualizado</div>
			<div class="item-rf text-center">Acciones</div>
		</div>
		<div class="table-flex-body">
			@foreach($users as $p)
				@include('users._item')
			@endforeach
		</div>
	</div>
	<div class="pagination justify-content-center mt-3">
		{{ $users->links() }}
	</div> 
@endsection