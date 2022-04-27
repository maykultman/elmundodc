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
				@foreach($roles as $r)
					<input 
						id="btnradio{{$r->id}}"
						type="radio" 
						class="btn-check" 
						name="rol_id" 
						value="{{$r->id}}"
						{{ isset($user->roles[0]->id) && ( $user->roles[0]->id == $r->id ) ? 'checked="checked"' : '' }}
					>
					<label class="btn btn-outline-primary" for="btnradio{{$r->id}}">{{$r->display_name}}</label>
				@endforeach
		  	</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 my-2">
			<h5 class="">Asignar sucursal</h5>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 my-2">
			<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
				@foreach($branches as $b)
					<input 
						id="btnBranch{{$b->id}}" 
						type="radio" 
						class="btn-check" 
						name="branch_id" 
						{{ isset($user->roles[0]->pivot) && ( $user->roles[0]->pivot->branch_id == $b->id ) ? 'checked="checked"' : '' }}
						value="{{$b->id}}"
					>
					<label class="btn btn-outline-primary" for="btnBranch{{$b->id}}">{{$b->name}}</label>
				@endforeach
		  	</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><br>
			<button class="btn btn-primary text-white">{{ $btnText }}</button>
			<a href="{{ route('usuarios.index') }}" class="btn btn-primary text-white">Regresar</a>
		</div>
	</div>
