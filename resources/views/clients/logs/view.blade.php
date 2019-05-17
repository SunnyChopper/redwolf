@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($logs) > 0)
			<div class="col-lg-9 col-md-10 col-sm-12 col-12">
				<ul class="list-group-item">
				</ul>
			</div>
			@else
			<div class="col-lg-6 col-md-7 col-sm-10 col-12">
				<div class="grey-box">
					<h3 class="text-center">No Logs</h3>
					<p class="text-center mb-0">There are no logs in the system.</p>
				</div>
			</div>
			@endif
		</div>
	</div>
@endsection