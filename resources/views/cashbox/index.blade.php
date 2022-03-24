@extends('layouts.app')
@section('title', 'Productos')
@section('content')
<div class="row">
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<div class="input-group mb-2">
			<label class="input-group-text">Nombre / Código: </label>
			<input class="form-control campo" type="text" value="">
			<ul class="sugerencias list-group"></ul>
			<button type="submit" class="btn btn-primary">Buscar</button>
		</div>
		<div class="table table-flex small rounded-3">
			<div class="table-row-flex table-flex-header gradient">
				<div class="item-rf">Código</div>
				<div class="item-rf">Nombre</div>
				<div class="item-rf">Precio</div>
				<div class="item-rf">Cantidad</div>
				<div class="item-rf">Importe</div>
				<div class="item-rf text-center">#</div>
			</div>
			<div id="cart" class="table-flex-body">
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="card">
			<form id="sale" class="card-body">
				<table class="table table-striped">
					<thead>
						<tr><th>Fecha</th><th><?=date('Y-m-d')?></th></tr>
					</thead>
					<tbody>
						<tr>
							<th>Transacción:</th>
							<td>
								<select class="form-control" name="transacción" id="transacción">
									<option value="venta">Venta</option>
									<option value="cambio">Cambio</option>
								</select>
							</td>
						</tr>
						<tr><th>Subtotal</th><td>
							<span class="disabled">
								<input id="subtotal" type="text" class="form-control" name="subtotal" value="">
							</span>
						</td></tr>
						<tr><th>Descuento</th><td>
							<input id="descuento" type="text" onkeyup="_descuento(this)" name="descuento" class="form-control" value="">
						</td></tr>
						<tr><th>Total a pagar</th><td>
							<span class="disabled">
								<input id="total" type="text" class="form-control" name="total" value="">
							</span>
						</td></tr>
						<tr><th>Paga con</th><td>
							<input id="pagoCon" type="text" class="form-control" name="pagoCon" onkeyup="calcularCambio()" value="">
						</td></tr>
						<tr><th>Cambio</th><td>
							<input id="cambio" type="text" class="form-control"  value="" disabled>
						</td></tr>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="2">
								<div class="d-flex justify-content-between">
									<a id="corteCaja" class="btn btn-primary gbuttons">Realizar corte</a>
									<button type="submit" class="btn btn-primary gbuttons">Cobrar</button>
									<div id="gloading" style="display: none">
										<div class="spinner-border" role="status">
									</div>
								</div>
							</th>
						</tr>
					</tfoot>
				</table>
			</form>
		</div>
	</div>
</div>
<div id="listProducts" hidden>
	{{ $products }}
</div>
@include('cashbox._ticket')
@endsection
<div class="toast">        <div class="body warning">...</div> </div>
