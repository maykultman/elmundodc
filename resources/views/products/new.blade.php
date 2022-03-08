@extends('layouts.app')
@section('title', 'Producto: '.$product->name)
@section('content')
	<form action="{{route('productos.store',$product)}}" method="POST" class="card">
		@csrf
		@include('products/_form',['btnText'=>'Guardar'])
	</form>
@endsection