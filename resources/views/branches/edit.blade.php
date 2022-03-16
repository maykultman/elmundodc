@extends('layouts.app')
@section('title', 'Producto: '.$branch->name)
@section('content')
	@include('branches._form',['btnText'=>'Actualizar'])
@endsection