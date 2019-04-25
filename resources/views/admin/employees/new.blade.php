@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				@if(count($categories) > 0)
				<div class="gray-box">
					<form id="create_employee_form" action="/admin/employees/create" method="POST">
						{{ csrf_field() }}
						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>First Name<span class="red">*</span>:</label>
								<input type="text" name="first_name" class="form-control" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Last Name<span class="red">*</span>:</label>
								<input type="text" name="last_name" class="form-control" required>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-12">
								<label>Category<span class="red">*</span>:</label>
								<select form="create_employee_form" class="form-control" name="category_id">
									<option value=""></option>
									@foreach($categories as $c)
									<option value="{{ $c->id }}">{{ $c->title }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Email<span class="red">*</span>:</label>
								<input type="email" name="email" class="form-control" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Password<span class="red">*</span>:</label>
								<input type="password" name="password" class="form-control" required>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Phone:</label>
								<input type="text" name="phone" class="form-control">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Title:</label>
								<input type="text" name="title" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-12">
								<input type="submit" class="btn btn-primary centered" value="Create Employee">
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