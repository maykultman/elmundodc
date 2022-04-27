@extends('layouts.app')
@section('title', 'Producto: '.$branch->name)
@section('content')
	<form action="{{ route('sucursales.update', $branch->id ) }}" method="post">
		@csrf @method('PATCH')   
		@include('branches._form',['btnText'=>'Actualizar'])
	</form>
@endsection