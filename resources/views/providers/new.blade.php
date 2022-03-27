@extends('layouts.app')
@section('title', 'Producto: '.$provider->name)
@section('content')
	@include('static/validation-errors')
	@include('static/session-status')
	<form action="{{route('proveedores.store',$provider)}}" method="post" class="card">
		@csrf
		@include('providers/_form',['btnText'=>'Guardar'])
	</form>
@endsection