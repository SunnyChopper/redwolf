@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-9 col-sm-10 col-12">
				<div class="grey-box">
					<form id="create_task_form" action="/admin/tasks/create" method="POST">
						{{ csrf_field() }}

						<div class="form-group">
							<h5 class="mb-2">Client:</h5>
							<select class="form-control" name="client_id" form="create_task_form">
								@foreach($clients as $c)
								<option value="{{ $c->id }}">{{ $c->company_name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<h5 class="mb-2">Title<span class="red">*</span>:</h5>
							<input type="text" class="form-control" name="title" required>
						</div>

						<div class="form-group">
							<h5 class="mb-2">Description<span class="red">*</span>:</h5>
							<textarea class="form-control" name="description" form="create_task_form" rows="5" required></textarea>
						</div>

						<div class="form-group row">
							<div class="col-6">
								<h5 class="mb-2">Due Date<span class="red">*</span>:</h5>
								<input type="date" name="due_date" class="form-control" required>
							</div>

							<div class="col-6">
								<h5 class="mb-2">Status<span class="red">*</span>:</h5>
								<select form="create_task_form" name="status" class="form-control">
									<option value="1">Scheduled</option>
									<option value="3">In Progress</option>
									<option value="4">Waiting on Client</option>
									<option value="5">Done</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<h5 class="mb-2">Notes:</h5>
							<textarea form="create_task_form" name="notes" class="form-control" rows="5"></textarea>
						</div>

						<div class="form-group">
							<input type="submit" class="primary-btn centered" value="Create Task">
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
@endsection