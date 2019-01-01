<!DOCTYPE html>
<html>
<head>
	<title></title><!--[if !mso]><!== -->
	<meta content="IE=edge" http-equiv="X-UA-Compatible"><!--<![endif]-->
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<style type="text/css">
	 #outlook a { padding: 0; }  .ReadMsgBody { width: 100%; }  .ExternalClass { width: 100%; }  .ExternalClass * { line-height:100%; }  body { margin: 0; padding: 0; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }  table, td { border-collapse:collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }  img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }  p { display: block; margin: 13px 0; }
	</style><!--[if !mso]><!-->
	<style type="text/css">
	 @media only screen and (max-width:480px) {    @-ms-viewport { width:320px; }    @viewport { width:320px; }  }
	</style><!--<![endif]--><!--[if mso]><xml>  <o:OfficeDocumentSettings>    <o:AllowPNG/>    <o:PixelsPerInch>96</o:PixelsPerInch>  </o:OfficeDocumentSettings></xml><![endif]--><!--[if lte mso 11]><style type="text/css">  .outlook-group-fix {    width:100% !important;  }</style><![endif]--><!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
	<style type="text/css">
	       @import url(https://fonts.googleapis.com/css?family=Lato:300,400,500,700);  @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);    
	</style><!--<![endif]-->
	<style type="text/css">
	 @media only screen and (min-width:480px) {    .mj-column-per-100 { width:100%!important; }  }
	</style>
</head>
<body style="background: #FFFFFF;">
	<div class="mj-container" style="background-color:#FFFFFF;">
		<!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600" align="center" style="width:600px;">        <tr>          <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">      <![endif]-->
		<div style="margin:0px auto;max-width:600px;">
			<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="font-size:0px;width:100%;">
				<tbody>
					<tr>
						<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
							<!--[if mso | IE]>      <table role="presentation" border="0" cellpadding="0" cellspacing="0">        <tr>          <td style="vertical-align:top;width:600px;">      <![endif]-->
							<div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
								<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
									<tbody>
										<tr>
											<td align="center" style="word-wrap:break-word;font-size:0px;padding:32px 32px 32px 32px;">
												<table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
													<tbody>
														<tr>
															<td style="width:300px;">
																<a href="https://redwolfent.com" target="_blank"><img alt="Red Wolf Entertainment Logo" height="auto" src="{{ URL::asset('img/logo.png') }}" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;" title="" width="300"></a>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;">
												<p style="font-size: 1px; margin: 0px auto; border-top: 5px solid #A3A3A3; width: 100%;"></p><!--[if mso | IE]><table role="presentation" align="center" border="0" cellpadding="0" cellspacing="0" style="font-size:1px;margin:0px auto;border-top:5px solid #A3A3A3;width:100%;" width="600"><tr><td style="height:0;line-height:0;"> </td></tr></table><![endif]-->
											</td>
										</tr>
										<tr>
											<td align="left" style="word-wrap:break-word;font-size:0px;padding:15px 15px 15px 15px;">
												<div style="cursor:auto;color:#161616;font-family:Lato, Tahoma, sans-serif;font-size:16px;line-height:1.5;text-align:left;">
													<p style="font-size: 16px;">Hey {{ $first_name }},</p>
													<p style="font-size: 16px;">We noticed that your company, <b>{{ $company_name }}</b>, still has an open invoice that is overdue. Here are some details of the invoice:</p>
													<ul>
														<li><b>Original Due Date</b>: {{ $original_due_date }}</li>
														<li><strong>Amount</strong>: ${{ $amount }}</li>
													</ul>
													<p style="font-size: 16px;">You can visit and close this invoice by clicking the button below.</p>
												</div>
											</td>
										</tr>
										<tr>
											<td align="left" style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 15px;">
												<table align="left" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;width:auto;">
													<tbody>
														<tr>
															<td align="center" bgcolor="#000000" style="border:0px solid #000;border-radius:4px;color:#fff;cursor:auto;padding:11px 32px;" valign="middle">
																<a href="{{ $invoice_link }}" style="text-decoration:none;background:#000000;color:#fff;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:16px;font-weight:normal;line-height:120%;text-transform:none;margin:0px;" target="_blank">View Invoice</a>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td align="left" style="word-wrap:break-word;font-size:0px;padding:15px 15px 15px 15px;">
												<div style="cursor:auto;color:#161616;font-family:Lato, Tahoma, sans-serif;font-size:16px;line-height:1.5;text-align:left;">
													<p style="font-size: 16px;">If you have any questions about your services, please contact Luis (<a href="mailto:luis@redwolfent.com">luis@redwolfent.com</a>)</p>
													<p style="font-size: 16px;"></p>
													<p style="font-size: 16px;">Thanks,<br>
													Red Wolf Team</p>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>