@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-12">
				<div style="overflow: auto;">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Head Employee</th>
								<th>Description</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($categories as $c)
							<tr>
								<td style="vertical-align: middle;">{{ $c->title }}</td>
								@if($c->head_employee_id != NULL)
									<td style="vertical-align: middle;">{{ \App\Custom\EmployeesHelper::getEmployeeName($c->head_employee_id) }}</td>
								@else
									<td style="vertical-align: middle;">N/A</td>
								@endif

								@if($c->description != NULL)
									<td style="vertical-align: middle;">{{ $c->description }}</td>
								@else
									<td style="vertical-align: middle;">N/A</td>
								@endif
								<td style="vertical-align: middle;">
									<a href="/admin/employee-categories/edit/{{ $c->id }}" class="genric-btn info rounded small m-2" style="float: right;">Edit</a>
									<button class="genric-btn danger small rounded delete_category_button m-2" style="float: right;" id="{{ $c->id }}">Delete</button>
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