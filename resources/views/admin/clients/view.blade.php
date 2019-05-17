@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-32 pb-32">
		<div class="row">
			@if(count($clients) > 0)
				<div class="col-lg-10 mx-lg-auto col-md-10 mx-md-auto col-sm-12 col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Company</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email</th>
									<th>Services</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($clients as $client)
									<tr>
										<td>{{ $client->company_name }}</td>
										<td>{{ $client->first_name }}</td>
										<td>{{ $client->last_name }}</td>
										<td>{{ $client->email }}</td>
										<td>
											@if($client->website_dev != 0)
											Website Development, 
											@endif

											@if($client->marketing != 0)
											Marketing, 
											@endif

											@if($client->branding != 0)
											Branding, 
											@endif

											@if($client->content_curation != 0)
											Content Curation
											@endif

											@if($client->website_dev == 0 && $client->marketing == 0 && $client->branding == 0 && $client->content_curation == 0)
											None
											@endif

										</td>
										<td style="float: right;">
											<a href="/admin/clients/edit/{{ $client->id }}" class="genric-btn small primary">Edit</a>
											{{-- <button type="button" class="genric-btn small danger" id="{{ $client->id }}">Delete</button> --}}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@else
				<div class="col-lg-8 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
					<div class="grey-box">
						<h3 class="text-center">No Clients</h3>
						<p class="text-center">There are no clients in the system right now. Click below to get started on creating the first one.</p>
						<a href="/admin/clients/new" class="primary-btn center-button">Create New Client</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection