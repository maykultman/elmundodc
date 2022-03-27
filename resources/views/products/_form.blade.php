<div class="card-body">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="custom-file mb-2">
						<label class="custom-file-label">Nombre</label>
						<input name="name" type="text" class="form-control" value=" {{old('name',  $product->name ) }}">
					</div>
					<div class="custom-file mb-2">
						<label class="custom-file-label">Código</label>
						<input name="code" type="text" class="form-control" 
								value=" {{old('code',  $product->code ) }}">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<img src="{{ asset('images/download.png')}}" class="img-fluid">
				</div>
			</div>
			<div class="custom-file mb-2">
				<label class="custom-file-label">Precio</label>
				<input name="price" type="text" class="form-control" 
						value=" {{old( 'price', $product->price ) }}">
			</div>
			<div class="custom-file mb-2">
				<label class="custom-file-label">Stock</label>
				<input name="stock" type="text" class="form-control" 
					value=" {{old( 'stock', $product->stock ) }}">
			</div>
			<div class="custom-file mb-2">
				<label class="custom-file-label">Proveedor</label>
				<select name="provider_id" class="form-control">
					<option value=""></option>
					@foreach($providers as $provider)
						<option value="{{$provider->id}}" {{ $product->provider_id == $provider->id ? 'selected' : '' }}>
							{{$provider->name}}
						</option>
					@endforeach
				</select>
			</div>
			@if( isset( $product->id ) )
				<div class="custom-file mb-2">
					<label class="custom-file-label">Última actualización</label>
					<input disabled type="text" class="form-control" value="{{$product->updated_at}}">
				</div>
			@endif
			<div class="form-group">
				<button class="btn btn-primary text-white">{{ $btnText }}</button>
				<a href="{{ route('productos.index') }}" class="btn btn-primary text-white">Regresar</a>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="row gy-2 gx-3 py-1 align-items-center border-bottom">
				<div class="col-sm-6"><span class="py-1">Sucursales</span></div>
				<div class="col-sm"><span class="py-1">Existencias</span></div>
				<div class="col-sm"><span class="py-1">Devoluciones</span></div>
			</div>
			@include('products._listStock')
		</div>
	</div>
</div>