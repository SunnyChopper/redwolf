@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-32 pb-32">
		@if($invoice->status == 0)
			<form action="/invoices/pay" id="checkout_form" method="POST">
				{{ csrf_field() }}
				<input type="hidden" value="{{ $invoice->id }}" name="invoice_id">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-12">
						<div class="grey-box">
							<h3>Step 1: Contact Information</h3>
							<hr />
							<div class="row mb-32">
								<div class="col-lg-6 col-md-6 col-sm-12 col-12 form-group">
									<h5 class="mb-2">First Name:</h5>
									<input type="text" value="{{ $client_helper->get_first_name() }}" name="first_name" class="form-control" required>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 col-12 form-group">
									<h5 class="mb-2">Last Name:</h5>
									<input type="text" value="{{ $client_helper->get_last_name() }}" name="last_name" class="form-control" required>
								</div>

								<div class="col-12">
									<h5 class="mb-2">Email:</h5>
									<input type="email" value="{{ $client_helper->get_email() }}" name="email" class="form-control" required>
								</div>
							</div>

							<h3>Step 2: Billing Information</h3>
							<hr />
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-12 col-12">
									<div class="form-group">
										<h5 class="mb-2">Card Number<span class="red">*</span>:</h5>
										<input type="text" name="card_number" value="{{ old('card_number') }}" class="form-control" required>
										@if ($errors->has('card_number'))
											<span class="help-block">
												<strong>{{ $errors->first('card_number') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-6 col-6">
									<div class="form-group">
										<h5 class="mb-2">Expiry Month<span class="red">*</span>:</h5>
										<select id="ccExpiryMonth" form="checkout_form" name="ccExpiryMonth" class="form-control">
											<option value="01">01 - Jan</option>
											<option value="02">02 - Feb</option>
											<option value="03">03 - Mar</option>
											<option value="04">04 - Apr</option>
											<option value="05">05 - May</option>
											<option value="06">06 - Jun</option>
											<option value="07">07 - Jul</option>
											<option value="08">08 - Aug</option>
											<option value="09">09 - Sep</option>
											<option value="10">10 - Oct</option>
											<option value="11">11 - Nov</option>
											<option value="12">12 - Dec</option>
										</select>

										@if ($errors->has('ccExpiryMonth'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('ccExpiryMonth') }}</strong>
		                                    </span>
		                                @endif
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-6 col-6">
									<div class="form-group">
										<h5 class="mb-2">Expiry Year<span class="red">*</span>:</h5>
										<select id="ccExpiryYear" form="checkout_form" name="ccExpiryYear" class="form-control">
											<option value="18">2018</option>
											<option value="19">2019</option>
											<option value="20">2020</option>
											<option value="21">2021</option>
											<option value="22">2022</option>
											<option value="23">2023</option>
											<option value="24">2024</option>
											<option value="25">2025</option>
											<option value="26">2026</option>
											<option value="27">2027</option>
											<option value="28">2028</option>
											<option value="29">2029</option>
											<option value="30">2030</option>
											<option value="31">2031</option>
											<option value="32">2032</option>
											<option value="33">2033</option>
											<option value="34">2034</option>
											<option value="35">2035</option>
										</select>

										@if ($errors->has('ccExpiryYear'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('ccExpiryYear') }}</strong>
		                                    </span>
		                                @endif
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="form-group">
										<h5 class="mb-2">CVV Number<span class="red">*</span>:</h5>
										<input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="{{ old('card_number') }}" required>
										@if ($errors->has('cvvNumber'))
											<span class="help-block">
												<strong>{{ $errors->first('cvvNumber') }}</strong>
											</span>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-12">
						<div class="grey-box">
							<h4 class="text-center">Red Wolf Entertainment</h4>
							<hr />
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
									<h5 style="float: left;">Today's Total:</h5>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
									<h5 style="float: right;">${{ $invoice->amount }}</h5>
								</div>
							</div>
							<hr />
							@if(session()->has('error'))
								<p class="text-center mt-2 mb-2">{{ session()->get('error') }}</p>
							@endif
							<input id="checkout_button" type="submit" value="Checkout" class="primary-btn center-button">
						</div>
					</div>
				</div>
			</form>
		@elseif($invoice->status == 1)
			<div class="row mt-32 mb-32">
				<div class="col-lg-6 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
					<div class="grey-box">
						<h4 class="text-center">Hooray! This invoice is already paid for.</h4>
						<p class="text-center mb-0">This invoice was paid on {{ $invoice->updated_at->format('M jS, Y') }}.</p>
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$("#checkout_form").on('submit', function() {
			// Disable the button
			$("#checkout_button").prop('disabled', true);
			$("#checkout_button").val('Processing...');
		});
	</script>
@endsection