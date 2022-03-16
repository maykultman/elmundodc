<div class="table table-flex small rounded-3">
	<div class="table-flex-header">
		<div class="table-row-flex">
			<div class="item-rf">Productos</div>
			<div class="item-rf">Existencias</div>
			<div class="item-rf">Devoluciones</div>
		</div>
	</div>
	<div class="table-flex-body">
		@foreach($products as $br) 
			<?php //$branch = getBranchStock($product->branches, $br->id) ?>
			<div class="table-row-flex">
				<div class="item-rf px-4" style="justify-content:flex-start;">
					<label for="">{{$br->name}}:</label>
					<input type="hidden" name="sucursales[id][]" value="{{$br->id}}"/>
				</div>
				<div class="item-rf">
					<input 
						type="number"
						class="form-control"
						name="sucursales[stock][]"
						id="sucursales"
						min="0"
						value="1"
					/>
				</div>
				<div class="item-rf">
					<div class="form-control bg-gray-300 bg-gradient" disabled>1</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="table-flex-body">
		<div class="table-row-flex">
			<div class="item-rf align-items-end">
				<button class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>		
</div>
