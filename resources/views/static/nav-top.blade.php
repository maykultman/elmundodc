<div class="d-flex my-3 justify-content-between align-items-center">
    @if( request()->route()->getName() == 'caja.index' )
        <div class="col">
            <h3>Caja</h3>
        </div>
    @endif
    
	@include('static/tab-login')
</div>
