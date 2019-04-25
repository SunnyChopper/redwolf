@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				@if(count($categories) > 0)
				<div class="gray-box">
					<form id="update_employee_form" action="/admin/employees/update" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="employee_id" value="{{ $employee->id }}">
						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>First Name<span class="red">*</span>:</label>
								<input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Last Name<span class="red">*</span>:</label>
								<input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-12">
								<label>Category<span class="red">*</span>:</label>
								<select form="update_employee_form" class="form-control" name="category_id">
									<option value=""></option>
									@foreach($categories as $c)
									<option value="{{ $c->id }}" <?php if ($c->id == $employee->category_id) { echo "selected"; } ?> >{{ $c->title }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Phone:</label>
								<input type="text" name="phone" value="{{ $employee->phone }}" class="form-control">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Title:</label>
								<input type="text" name="title" value="{{ $employee->title }}" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-12">
								<input type="submit" class="btn btn-primary centered" value="Update Employee">
							</div>
						</div>
					</form>
				</div>
				@else
				<div class="gray-box">
					<h3 class="text-center">No Employee Categories</h3>
					<p class="text-center">In order to create an employee, you must have at least one employee category. Click below to get started.</p>
					<a href="/admin/employee-categories/new" class="btn btn-primary centered">Create Employee Category</a>
				</div>
				@endif
			</div>
		</div>
	</div>
@endsection