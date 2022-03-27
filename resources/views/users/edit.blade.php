@extends('layouts.app')
@section('title', 'Usuario: '.$user->name)
@section('content')
	@include('static/validation-errors')
	@include('static/session-status')
	<form action="{{route('usuarios.update',$user)}}" method="post" class="card">
		@method('PUT')
		@include('users._form',['btnText'=>'Actualizar'])
	</form>
@endsection