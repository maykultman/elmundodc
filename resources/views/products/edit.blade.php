@extends('layouts.app')
@section('title', 'Producto: '.$product->name)
@section('content')
	@include('static/validation-errors')
	@include('static/session-status')
	<form action="{{route('productos.update',$product)}}" method="post" class="card">
		@csrf
		@method('PUT')
		@include('products/_form',['btnText'=>'Actualizar'])
	</form>
@endsection