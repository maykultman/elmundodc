	@csrf
	<div style="position:absolute;top:-20px;">
		@if( isset( $user->id ) )
			<small class="custom-file-label">Última actualización: {{$user->updated_at->toFormattedDateString()}}</small>
		@endif
	</div>
	<div class="row card-body  mb-2">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h4>
				@if( request()->route()->getName() == 'usuarios.edit' )
					Editar usuario
				@else
					Registrar nuevo usuario
				@endif
			</h4><br>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-2">
			<label class="custom-file-label">Nombre</label>
			<input name="name" type="text" class="form-control" value="{{old('name', $user->name ) }}">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-2">
			<label class="custom-file-label">Nombre de usuario</label>
			<input name="email" type="text" class="form-control" value="{{old( 'email', $user->email ) }}">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-2">
			<label class="custom-file-label">Contraseña</label>
			<input name="password" type="password" class="form-control" value="">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-2">
			<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
				<input type="radio" class="btn-check" name="role" id="btnradio1" value="user" autocomplete="off"
					{{ printCheked( $user->rol->rol, 'cajero' ) }}
				>
				<label class="btn btn-outline-primary" for="btnradio1">Cajero</label>
				<input type="radio" class="btn-check" name="role" id="btnradio2" value="admin" autocomplete="off"
				  	{{ printCheked($user->rol->rol, 'admin' ) }}
			  	>
			  	<label class="btn btn-outline-primary" for="btnradio2">Admin</label>
		  	</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br>
			<button class="btn btn-primary text-white">{{ $btnText }}</button>
			<a href="{{ route('usuarios.index') }}" class="btn btn-primary text-white">Regresar</a>
		</div>
	</div>
