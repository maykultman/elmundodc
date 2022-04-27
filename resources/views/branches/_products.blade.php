<div class="table table-flex small rounded-3">
	<div class="table-flex-header">
		<div class="table-row-flex">
			<div class="item-rf">Productos</div>
			<div class="item-rf">Existencias</div>
			<div class="item-rf">Devoluciones</div>
		</div>
	</div>
	<div class="table-flex-body">
		@isset($branch->id)
			@foreach($products as $product)
				<?php $branchProduct = getProductStock($branch->products, $product->id); ?>
				<div class="table-row-flex">
					<div class="item-rf px-4" style="justify-content:flex-start;">
						<label for="">{{$product->name}}:</label>
						<input type="hidden" name="sucursales[id][]" value="{{$product->id}}"/>
					</div>
					<div class="item-rf">
						<input 
							type="number"
							class="form-control"
							name="sucursales[stock][]"
							id="sucursales"
							min="0"
							value="{{$branchProduct['stock']}}"
						/>
					</div>
					<div class="item-rf">
						<div class="form-control bg-gray-300 bg-gradient" disabled>1</div>
					</div>
				</div>
			@endforeach
		@else
			@foreach($products as $product)
				<div class="table-row-flex">
					<div class="item-rf px-4" style="justify-content:flex-start;">
						<label for="">{{$product->name}}:</label>
						<input type="hidden" name="sucursales[id][]" value="{{$product->id}}"/>
					</div>
					<div class="item-rf">
						<input 
							type="number"
							class="form-control"
							name="sucursales[stock][]"
							id="sucursales"
							min="0"
							value="0"
						/>
					</div>
					<div class="item-rf">
						<div class="form-control bg-gray-300 bg-gradient" disabled>1</div>
					</div>
				</div>
			@endforeach
		@endif
	</div>
	<div class="table-flex-body">
		<div class="table-row-flex">
			<div class="item-rf align-items-end">
				<button class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>		
</div>
