@if(session('status'))
	<div class="row justify-content-end">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 lg-center">
			<div role="alert" class="alert alert-primary d-flex justify-content-between">
				<div>
					<svg width="24" height="24" role="img" aria-label="Info:" class="bi flex-shrink-0 me-2">
						<use xlink:href="#check-circle-fill"></use>
					</svg> {{ session('status') }}
				</div> 
				<button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close">
				</button>
			</div>
		</div>
	</div>
@endif