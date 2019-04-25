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
								<td>{{ $c->title }}</td>
								@if($c->head_employee_id != NULL)
								<td>{{ \App\Custom\EmployeesHelper::getEmployeeName($c->head_employee_id) }}</td>
								@else
								<td>N/A</td>
								@endif

								@if($c->description != NULL)
								<td>{{ $c->description }}</td>
								@else
								<td>N/A</td>
								@endif
								<td>
									<a href="/admin/employee-categories/edit/{{ $c->id }}" class="btn btn-warning">Edit</a>
									<button class="btn btn-danger" class="delete_category_button" id="{{ $c->id }}">Delete</button>
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