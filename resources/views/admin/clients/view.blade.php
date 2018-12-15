@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-32 pb-32">
		<div class="row">
			<div class="col-lg-10 mx-lg-auto col-md-10 mx-md-auto col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Company</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
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
										<a href="/admin/clients/edit/{{ $client->id }}" class="genric-btn small primary">Edit</a>
										<button type="button" class="genric-btn small danger" id="{{ $client->id }}">Delete</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection