<div style="position:absolute;top:-20px;">
	@if( isset( $branch->id ) )
		<small class="custom-file-label">Última actualización: {{$branch->updated_at}}</small>
	@endif
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="card mb-2">
		<div class="row card-body">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h4>Editar sucursal</h4>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2">
				<label class="custom-file-label">Código</label>
				<input name="code" type="text" class="form-control" value=" {{old('code',  $branch->code ) }}">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2">
				<label class="custom-file-label">Nombre</label>
				<input name="name" type="text" class="form-control" value=" {{old('name',  $branch->name ) }}">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2">
				<label class="custom-file-label">Teléfono</label>
				<input name="phone" type="text" class="form-control" value=" {{old( 'phone', $branch->phone ) }}">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-2">
				<label class="custom-file-label">Dirección</label>
				<input name="address" type="text" class="form-control" value=" {{old( 'address', $branch->address ) }}">
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br>
				<button class="btn btn-primary text-white">{{ $btnText }}</button>
				<a href="{{ route('sucursales.index') }}" class="btn btn-primary text-white">Regresar</a>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
	@include('branches._products')
</div>
</div>