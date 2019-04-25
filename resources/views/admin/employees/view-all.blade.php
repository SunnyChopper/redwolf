@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($employees) > 0)
			<div class="col-12">
				<div style="overflow: auto;">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Category</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($employees as $e)
							<tr>
								<td>{{ $e->first_name }}</td>
								<td>{{ $e->last_name }}</td>
								<td>{{ $e->email }}</td>
								<td>{{ \App\Custom\EmployeesHelper::getCategoryTitle($e->category_id) }}</td>
								<td>
									<a href="/admin/employees/edit/{{ $e->id }}" class="btn btn-primary">Edit</a>
									<button class="btn btn-danger" class="delete_employee_button" id="{{ $e->id }}">Delete</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@else
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<div class="gray-box">
					<h3 class="text-center">No Employees</h3>
					<p class="text-center">There are no employees in the system. Click below to get started.</p>
					<a href="/admin/employees/new" class="btn btn-primary centered">Create New Employee</a>
				</div>
			</div>
			@endif
		</div>
	</div>
@endsection