@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="grey-box">
					<form id="update_category_form" action="/admin/employee-categories/update" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="category_id" value="{{ $category->id }}">

						<div class="form-group row">
							<div class="col-12">
								<label>Title<span class="red">*</span>:</label>
								<input type="text" class="form-control" name="title" value="{{ $category->title }}" required>
							</div>
						</div>

						@if(count($employees) > 0)
						<div class="form-group row">
							<div class="col-12">
								<label>Head Employee:</label>
								<select class="form-control" name="head_employee_id" form="update_category_form">
									<option value="" <?php if($category->head_employee_id == NULL) { echo "checked"; } ?>>None</option>
									@foreach($employees as $employee)
										<option value="{{ $employee->id }}" <?php if($employee->id == $category->head_employee_id) { echo "checked"; } ?>>{{ $employee->first_name }} {{ $employee->last_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						@endif

						<div class="form-group row">
							<div class="col-12">
								<label>Description:</label>
								<textarea class="form-control" name="description" rows="5" form="update_category_form">{{ $category->description }}</textarea>
							</div>
						</div>

						<div class="form-group row">
							<input type="submit" class="genric-btn primary rounded centered" style="font-size: 16px;" value="Update Category">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection