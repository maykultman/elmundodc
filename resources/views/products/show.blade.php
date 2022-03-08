<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content border-0">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="staticBackdropLabel">@{{producto.name}}</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  	</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-5">
						<ul class="list-group list-group-flush">
							<li class="list-group-item d-flex align-items-center">
								<label for="">Código: @{{producto.code}}</label>
							</li>
							<li class="list-group-item d-flex align-items-center">
								<label for="">Nombre: @{{producto.name}}</label>
							</li>
							<li class="list-group-item d-flex align-items-center">
								<label for="">Precio: @{{producto.price}}</label>
							</li>
							<li class="list-group-item d-flex align-items-center">
								<label for="">Stock: @{{producto.stock}}</label>
							</li>
							<li class="list-group-item d-flex align-items-center">
								<label for="">Proveedor: @{{producto.provider.name}}</label>
							</li>
							<li class="list-group-item d-flex align-items-center">
								<label for="">Contacto Proveedor: @{{producto.provider.phone}}</label>
							</li>
							<li class="list-group-item d-flex align-items-center">
								<label for="">Actualizado: @{{producto.updated_at}}</label>
							</li>
						</ul>
					</div>
					<div class="col-7">
						<div class="d-flex align-items-center justify-content-between">
							<span class="px-3">Sucursales</span>
							<span class="px-3">Existencias</span>
						</div>
						<template>
						<ul class="list-group list-group-flush">
							<li 
								class="list-group-item d-flex align-items-center justify-content-between"
								v-for="(sucursal, index) of sucursales" :key="sucursal.id">
								<label for="">@{{sucursal.name}}</label>
								<strong>@{{sucursal.stock||0}}</strong>
								
							</li>
							{{-- @foreach($branches as $br)
								<li class="list-group-item d-flex align-items-center justify-content-between">
									<label for="">{{$br->name}}:</label>
									<strong>{}</strong>
								</li>
							@endforeach --}}
						</ul>
						</template>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<a :href="'/productos/'+ producto.id +'/edit'" class="btn btn-primary text-white">Editar</a>
			</div>
		</div>
	</div>
</div>
