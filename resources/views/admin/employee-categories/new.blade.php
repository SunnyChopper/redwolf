@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<form id="create_employee_category_form" action="/admin/employee-categories/create" method="POST">
					{{ csrf_field() }}
					<div class="form-group row">
						<label>Title<span class="red">*</span>:</label>
						<input type="text" class="form-control" name="title" required>
					</div>

					@if(count($employees) > 0)
					<div class="form-group row">
						<label>Head Employee:</label>
						<select class="form-control" name="head_employee_id" form="create_employee_category_form">
							@foreach($employees as $employee)
								<option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
							@endforeach
						</select>
					</div>
					@endif

					<div class="form-group row">
						<label>Description:</label>
						<textarea class="form-control" name="description" rows="5" form="create_employee_category_form"></textarea>
					</div>

					<div class="form-group row">
						<input type="submit" class="btn btn-primary centered" value="Create Category">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection