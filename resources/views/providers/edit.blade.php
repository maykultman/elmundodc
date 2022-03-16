@extends('layouts.app')
@section('title', 'Producto: '.$provider->name)
@section('content')
	@include('static/validation-errors')
	@include('static/session-status')
	<form action="{{route('proveedores.update',$provider)}}" method="post" class="card">
		@csrf
		@method('PUT')
		@include('providers/_form',['btnText'=>'Actualizar'])
	</form>
@endsection