<div style="padding: 24px;">
	<img src="{{ URL::asset('img/logo.png') }}" style="background-color: black; display: block; width: 50%; margin-left: auto; margin-right: auto;">
	<h1 style="text-align: center; margin-top: 32px;">Invoice Paid</h1>
	<p style="text-align: center;">You have a new order from {{ $company_name }} on Red Wolf Entertainment.</p>
	<p style="text-align: center;"><b>Amount: </b> ${{ $amount }}</p>
	<p style="text-align: center;">Click <a href="https://www.redwolfent.com/admin">here</a> to login into admin backend.</p>
</div>