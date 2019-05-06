@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="grey-box">
					<form id="request_task_form" action="/clients/dashboard/tasks/request/submit" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="client_id" value="{{ $client->id }}">
						<div class="form-group">
							<label>Title:</label>
							<input type="text" class="form-control" name="title" required>
						</div>

						<div class="form-group">
							<label>Description:</label>
							<textarea class="form-control" rows="6" name="description" form="request_task_form" required></textarea>
						</div>

						<div class="form-group">
							<label>Due Date:</label>
							<input type="date" name="due_date" class="form-control" required>
						</div>

						@if(session()->has('success'))
						<div class="form-group">
							<p class="mt-2 mb-2 text-center green">{{ session()->get('success') }}</p>
						</div>
						@endif

						<div class="form-group">
							<input type="submit" class="primary-btn centered" value="Submit Request">
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<h3 class="text-center">What We Will Do</h3>
				<hr />
				<p class="text-center">After you submit your task request, we will be immediately emailed regarding your request. After that, we will go into the system and approve your task request and get started working on it. Please allow us 24 hours to respond to your task request.</p>
			</div>
		</div>
	</div>
@endsection