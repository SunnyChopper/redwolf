@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
				<div class="grey-box">
					<form id="update_task_form" action="/admin/tasks/update" method="POST">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $task->id }}" name="task_id">

						<div class="form-group">
							<h5 class="mb-2">Title:</h5>
							<input type="text" class="form-control" name="title" value="{{ $task->title }}" required>
						</div>

						<div class="form-group">
							<h5 class="mb-2">Description:</h5>
							<textarea form="update_task_form" class="form-control" rows="5" name="description">{{ $task->description }}</textarea>
						</div>

						<div class="form-group row">
							<div class="col-6">
								<h5 class="mb-2">Due Date:</h5>
								<input type="date" class="form-control" name="due_date" value="{{ substr($task->due_date, 0, 10) }}" required>
							</div>

							<div class="col-6">
								<h5 class="mb-2">Status:</h5>
								<select class="form-control" name="status" form="update_task_form">
									<option value="-1" <?php if($task->status == -1) { echo "selected"; } ?>>Unapproved</option>
									<option value="1" <?php if($task->status == 1) { echo "selected"; } ?>>Scheduled</option>
									<option value="2" <?php if($task->status == 2) { echo "selected"; } ?>>Requested</option>
									<option value="3" <?php if($task->status == 3) { echo "selected"; } ?>>In Progress</option>
									<option value="4" <?php if($task->status == 4) { echo "selected"; } ?>>Waiting on Client</option>
									<option value="5" <?php if($task->status == 5) { echo "selected"; } ?>>Done</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<h5 class="mb-2">Notes:</h5>
							<textarea form="update_task_form" class="form-control" rows="5" name="notes">{{ $task->notes }}</textarea>
						</div>

						<div class="form-group mt-32">
							<input type="submit" class="primary-btn centered" value="Update Task">
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
@endsection