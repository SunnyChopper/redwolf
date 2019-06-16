@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.employees.modals.delete')

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
								<td style="vertical-align: middle;">{{ $e->first_name }}</td>
								<td style="vertical-align: middle;">{{ $e->last_name }}</td>
								<td style="vertical-align: middle;">{{ $e->email }}</td>
								<td style="vertical-align: middle;">{{ \App\Custom\EmployeesHelper::getCategoryTitle($e->category_id) }}</td>
								<td style="vertical-align: middle;">
									<a href="/admin/employees/edit/{{ $e->id }}" class="genric-btn info small rounded m-2" style="float: right;">Edit</a>
									<button class="genric-btn danger small rounded delete_employee_button m-2" id="{{ $e->id }}" style="float: right;">Delete</button>
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

@section('page_js')
	<script type="text/javascript">
		$(".delete_employee_button").on('click', function() {
			var button = $(this);
			var employee_id = button.attr('id');
			$("#delete_employee_id").val(employee_id);
			$("#delete_employee_modal").modal();
		});
	</script>
@endsection