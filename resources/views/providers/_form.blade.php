<div style="position:absolute;top:-20px;">
	@if( isset( $provider->id ) )
		<small class="custom-file-label">Última actualización: {{$provider->updated_at->toFormattedDateString()}}</small>
	@endif
</div>
	<div class="row card-body  mb-2">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h4>Editar sucursal</h4>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2">
			<label class="custom-file-label">Código</label>
			<input name="code" type="text" class="form-control" value=" {{old('code',  $provider->code ) }}">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2">
			<label class="custom-file-label">Nombre</label>
			<input name="name" type="text" class="form-control" value=" {{old('name',  $provider->name ) }}">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2">
			<label class="custom-file-label">Teléfono</label>
			<input name="phone" type="text" class="form-control" value=" {{old( 'phone', $provider->phone ) }}">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2">
			<label class="custom-file-label">Dirección</label>
			<input name="address" type="text" class="form-control" value=" {{old( 'address', $provider->address ) }}">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br>
			<button class="btn btn-primary text-white">{{ $btnText }}</button>
			<a href="{{ route('sucursales.index') }}" class="btn btn-primary text-white">Cancelar</a>
		</div>
	</div>
