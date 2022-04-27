@extends('layouts.app')
@section('title', 'Producto: '.$branch->name)
@section('content')
	<form action="{{ route('sucursales.store' ) }}" method="post">
		@csrf
		@include('branches._form',['btnText'=>'Guardar'])
	</form>
@endsection