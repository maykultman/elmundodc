<div class="d-flex my-3 justify-content-between align-items-center">
    <div class="col">
        <strong>
            @if( Auth::user()->roles )
                Sucursal {{ Auth::user()->branch() }} | 
                {{ Auth::user()->roles[0]->display_name }}
            @endif
        </strong>
    </div>
	@include('static/tab-login')
</div>
