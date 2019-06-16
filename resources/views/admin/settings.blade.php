@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
					<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">Update Password</a>
				</div>
			</div>

			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="tab-content" id="tab-content">
					<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<h3>Your Profile</h3>
						<hr />
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>First Name:</label>
								<input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-16-mobile">
								<label>Last Name:</label>
								<input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Email:</label>
								<input type="email" class="form-control" name="email" value="{{ $user->email }}">
								<p class="mb-0 red" id="email_feedback" style="display: none;"><small>Email already in use.</small></p>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-16-mobile">
								<label>Username:</label>
								<input type="text" class="form-control" name="username" value="{{ $user->username }}">
								<p class="mb-0 red" id="username_feedback" style="display: none;"><small>Username already in use.</small></p>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-12">
								<button class="genric-btn primary rounded centered update_profile_button" style="font-size: 15px;">Update Profile</button>

								<div>
									<p id="feedback" class="text-center centered mt-16" style="display: none;"></p>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3>Update Password</h3>
						<hr />
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Password:</label>
								<input type="password" class="form-control" name="password">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-16-mobile">
								<label>Password Again:</label>
								<input type="password" class="form-control" name="password_again">
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-12">
								<button class="genric-btn primary rounded centered update_password_button" style="font-size: 15px;">Update Password</button>
								<p id="password_feedback" class="text-center mt-16" style="display: none;"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		function validatePassword() {
			if ($("input[name=password]").val() != "" && $("input[name=password_again]").val() != "") {
				var password = $("input[name=password]").val();
				var password_again = $("input[name=password_again]").val();

				if (password != password_again) {
					$("input[name=password]").css('border', '1px solid red');
					$("input[name=password_again]").css('border', '1px solid red');

					$("#password_feedback").html("Passwords do not match.");
					$("#password_feedback").removeClass('green');
					$("#password_feedback").addClass('red');
					$("#password_feedback").show();

					$(".update_password_button").attr('disabled', true);
				} else {
					$("#password_feedback").hide();
					$("input[name=password]").css('border', '1px solid green');
					$("input[name=password_again]").css('border', '1px solid green');
					$(".update_password_button").attr('disabled', false);
				}
			}
		}

		$("input[name=password]").on('change', function() {
			validatePassword();
		});

		$("input[name=password_again]").on('change', function() {
			validatePassword();
		});

		$(".update_password_button").on('click', function() {
			var user_id = {{ $user->id }};
			var password = $("input[name=password]").val();

			$.ajax({
				url : '/api/password/update',
				type : 'POST',
				data : {
					'_token' : '{{ csrf_token() }}',
					'user_id' : user_id,
					'password' : password
				},
				success: function(data) {
					if ("success" in data) {
						$("#password_feedback").html(data["success"]);
						$("#password_feedback").removeClass('red');
						$("#password_feedback").addClass('green');
						$("#password_feedback").show();
					}
				}
			})
		});

		$("input[name=email]").on('change', function() {
			var field = $(this);
			var email = field.val();

			if (email != "{{ $user->email }}") {
				$.ajax({
					url : '/api/email/check', 
					type : 'POST',
					data : {
						'_token' : '{{ csrf_token() }}',
						'email' : email
					},
					success: function(data) {
						if ("success" in data) {
							$("#email_feedback").hide();
							field.css('border', '1px solid green');
							$(".update_profile_button").attr('disabled', false);
						} else {
							$("#email_feedback").show();
							field.css('border', '1px solid red');
							$(".update_profile_button").attr('disabled', true);
						}
					}
				});
			}
		});

		$("input[name=username]").on('change', function() {
			var field = $(this);
			var username = field.val();

			if (username != "{{ $user->username }}") {
				$.ajax({
					url : '/api/username/check', 
					type : 'POST',
					data : {
						'_token' : '{{ csrf_token() }}',
						'username' : username
					},
					success: function(data) {
						if ("success" in data) {
							$("#username_feedback").hide();
							field.css('border', '1px solid green');
							$(".update_profile_button").attr('disabled', false);
						} else {
							$("#username_feedback").show();
							field.css('border', '1px solid red');
							$(".update_profile_button").attr('disabled', true);
						}
					}
				});
			}
		});

		$(".update_profile_button").on('click', function() {
			console.log("Button click");

			var user_id = {{ $user->id }};
			var first_name = $("input[name=first_name]").val();
			var last_name = $("input[name=last_name]").val();
			var email = $("input[name=email]").val();
			var username = $("input[name=username]").val();

			$.ajax({
				url : '/api/profile/update',
				type : 'POST',
				data : {
					'_token' : '{{ csrf_token() }}',
					'user_id' : user_id,
					'first_name' : first_name,
					'last_name' : last_name,
					'email' : email,
					'username' : username
				},
				success: function(data) {
					console.log(data);
					if ("success" in data) {
						$("#feedback").html(data["success"]);
						$("#feedback").removeClass('red');
						$("#feedback").addClass('green');
						$("#feedback").show();
					}
				}
			});
		});
	</script>
@endsection