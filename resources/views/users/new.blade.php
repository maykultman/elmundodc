@extends('layouts.app')
@section('title', 'Producto: '.$user->name)
@section('content')
	@include('static/validation-errors')
	@include('static/session-status')
	<form action="{{route('usuarios.store',$user)}}" method="post" class="card">
		@include('users._form',['btnText'=>'Guardar'])
	</form>
@endsection