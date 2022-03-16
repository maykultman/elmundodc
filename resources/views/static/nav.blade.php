<?php 
	$links = [
		[
			'link'=>'Caja',
			'icon'=>'attach_money'
		],
		[
			'link'=>'Productos',
			'icon'=>'qr_code_2'
		],
		[
			'link'=>'Usuarios',
			'icon'=>'group'
		],
		[
			'link'=>'Proveedores',
			'icon'=>'local_shipping'
		],
		[
			'link'=>'Sucursales',
			'icon'=>'store'
		]
	];
	$name = '';
?>
<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 sideMenu bg-gradient">
	<img src="{{ asset('images/logo-mchiquitin.png')}}" class="img-fluid" width="150">
	<ul class="list-group list-group-flush">
		@foreach($links as $a)
			<?php $name = strtolower($a['link']); ?>
			<li class="list-group-item d-flex align-items-center">
				<a href="/{{ $name }}" class="nav-link {{ setActive( $name ) }}">
					<i class="material-icons mx-2">{{$a['icon']}}</i> {{$a['link']}}
				</a>
			</li>
		@endforeach
	</ul>
	<div class="text-center"><br>
		<a class="small" href="{{ url('/') }}">
		{{ config('app.name', 'Laravel') }}
	</a>
	</div>
</div>