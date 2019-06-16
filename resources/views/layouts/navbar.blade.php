<!-- Start Header Area -->
<header class="default-header">
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a class="navbar-brand" href="/">
			  	<img src="{{ URL::asset('img/logo.png') }}" class="site-logo" alt="Red Wolf Entertainment">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_menu" aria-controls="navbar_menu" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbar_menu">
				@if(Auth::guest() && (Session::has('active_client_id') == false))
				  	<ul class="navbar-nav">
						<li><a href="/">Home</a></li>
						<li><a href="/mission">Our Mission</a></li>
						<li><a href="/services">Our Services</a></li>
						<li><a href="/portfolio">Portfolio</a></li>
						<li><a href="/contact">Contact Us</a></li>
				    </ul>
			    @elseif(Session::has('backend_auth'))
			    	@if(Session::get('backend_auth') != 0)
			    		<ul class="navbar-nav">
							<li><a href="/admin/dashboard">Dashboard</a></li>
							<li class="dropdown"><a class="dropdown-toggle" href="/admin/clients/view" data-toggle="dropdown">Clients</a>
								<div class="dropdown-menu">
							    	<a class="dropdown-item" href="/admin/clients/view">View Clients</a>
							    	<a class="dropdown-item" href="/admin/clients/new">New Client</a>
							    </div>
							</li>
							<li class="dropdown"><a class="dropdown-toggle" href="/admin/invoices/view" data-toggle="dropdown">Invoices</a>
								<div class="dropdown-menu">
							    	<a class="dropdown-item" href="/admin/invoices/view">View Invoices</a>
							    	<a class="dropdown-item" href="/admin/invoices/new">New Invoice</a>
							    </div>
							</li>
							<li class="dropdown"><a class="dropdown-toggle" href="/admin/employees/view" data-toggle="dropdown">Employees</a>
								<div class="dropdown-menu">
							    	<a class="dropdown-item" href="/admin/employees/view">View Employees</a>
							    	<a class="dropdown-item" href="/admin/employees/new">New Employee</a>
							    	<a class="dropdown-item" href="/admin/employee-categories/view">View Categories</a>
							    	<a class="dropdown-item" href="/admin/employee-categories/new">New Category</a>
							    </div>
							</li>
							<li class="dropdown"><a class="dropdown-toggle" href="/admin/employees/view" data-toggle="dropdown">Tasks</a>
								<div class="dropdown-menu">
							    	<a class="dropdown-item" href="/admin/tasks/requested">View Requested <span class="badge badge-primary ml-2">{{ App\Custom\ClientDashboardHelper::numberRequestedTasks() }}</span></a>
							    	<a class="dropdown-item" href="/admin/tasks/view">View Tasks</a>
							    	<a class="dropdown-item" href="/admin/tasks/new">New Task</a>
							    </div>
							</li>
							<li class="dropdown"><a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">{{ Auth::user()->first_name }}</a>
								<div class="dropdown-menu">
							    	<a class="dropdown-item" href="/admin/settings">Admin Settings</a>
							    	<a class="dropdown-item" href="/admin/logout">Logout</a>
							    </div>
							</li>	
					    </ul>
			    	@endif
			    @elseif(Session::has('active_client_id'))
			    	<ul class="navbar-nav">
			    		<li><a href="/clients/dashboard">Dashboard</a></li>

			    		<li class="dropdown"><a class="dropdown-toggle" href="/clients/dashboard/tasks" data-toggle="dropdown">Tasks</a>
							<div class="dropdown-menu">
						    	<a class="dropdown-item" href="/clients/dashboard/tasks">View All Tasks</a>
						    	<a class="dropdown-item" href="/clients/dashboard/tasks/request">Request New Task</a>
						    </div>
						</li>

						<li class="dropdown"><a href="/clients/dashboard/logs">Logs</a></li>

					{{-- 	<li class="dropdown"><a class="dropdown-toggle" href="/clients/dashboard/documents" data-toggle="dropdown">Documents</a>
							<div class="dropdown-menu">
						    	<a class="dropdown-item" href="/clients/dashboard/documents">View Documents</a>
						    	<a class="dropdown-item" href="/clients/dashboard/contracts">View Contracts</a>
						    </div>
						</li> --}}
							

			    		<li><a href="/clients/dashboard/invoices">Invoices</a></li>
						<li class="dropdown"><a href="/clients/logout">Logout</a></li>
			    	</ul>
			    @endif
			</div>
		</div>
	</nav>
</header>
<!-- End Header Area -->