<div style="padding: 24px;">
	<img src="{{ URL::asset('img/logo.png') }}" style="background-color: black; display: block; width: 50%; margin-left: auto; margin-right: auto;">
	<h1 style="margin-top: 32px;">Invoice Created</h1>
	<p>Hey {{ $email_data["recipient_first_name"] }},</p>
	<p>The Red Wolf team has created an invoice for the services requested. Click below to view and pay.</p>
	<a href="{{ $invoice_link }}" style="padding-left: 16px; padding-right: 16px; padding-top: 8px; padding-bottom: 8px; text-align: center; background-color: black; color: white; margin-top: 16px; margin-bottom: 16px;">View Invoice</a>
	<p>If you have any questions or concerns about the services, please contact Luis (luis@redwolfent.com).</p>
	<p>Thanks,<br>Red Wolf Entertainment</p>
</div>