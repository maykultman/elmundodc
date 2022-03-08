@foreach($branches as $br) 
	<?php $branch = getBranchStock($product->branches, $br->id) ?>
	<input type="hidden" name="sucursales[id][]" value="{{$br->id}}" />
	<div class="row gy-2 gx-3 py-1 align-items-center border-bottom">
		<div class="col-sm-6">
			<label for="">{{$br->name}}:</label>
		</div>
    	<div class="col-sm">
			<input 
				type="number"
				class="form-control"
				name="sucursales[stock][]"
				id="sucursales"
				min="0"
				value="{{ $branch['stock'] }}"
			/>
        </div>
        <div class="col-sm">
			<div class="form-control bg-gray-300 bg-gradient" disabled>{{ $branch['devolution'] ?? 0 }}</div>
        </div>
    </div>
@endforeach
