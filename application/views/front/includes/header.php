<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="<?php echo $meta_keywords ?>">
	<meta name="description" content="<?php echo $meta_description ?>">
	<!-- Bootstrap CSS -->


	<link rel="stylesheet" href="<?php assets('vendor/bootstrap/css/bootstrap.min.css')?>">
	<link href="<?php assets('vendor/fonts/circular-std/style.css')?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php assets('libs/css/style.css')?>">
	<link rel="stylesheet" href="<?php assets('vendor/fonts/fontawesome/css/fontawesome-all.css')?>">
	<link rel="stylesheet" href="<?php assets('vendor/charts/chartist-bundle/chartist.css')?>">
	<link rel="stylesheet" href="<?php assets('vendor/charts/morris-bundle/morris.css')?>">
	<link rel="stylesheet" href="<?php assets('vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')?>">
	<link rel="stylesheet" href="<?php assets('vendor/charts/c3charts/c3.css')?>">
	<link rel="stylesheet" href="<?php assets('vendor/fonts/flag-icon-css/flag-icon.min.css')?>">
	<link rel="stylesheet" href="<?php assets('vendor/summernote/css/summernote-bs4.css')?>">
	
	
    <link rel="stylesheet" href="<?php assets('vendor/datepicker/tempusdominus-bootstrap-4.css')?>" />

	<link rel="stylesheet" type="text/css" href="<?php assets('vendor/datatables/css/dataTables.bootstrap4.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php assets('vendor/datatables/css/buttons.bootstrap4.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php assets('vendor/datatables/css/select.bootstrap4.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php assets('vendor/datatables/css/fixedHeader.bootstrap4.css')?>">

<link
  rel="stylesheet"
  href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css"
  type="text/css"
/>

	<title>
		<?=$page_title ?>
	</title>
	<?php add_css($css_files)?>

	<script type="text/javascript">
		var siteUrl = '<?php echo site_url() ?>';
		var baseUrl = '<?php echo base_url() ?>';
	</script>
	<?php echo $before_head ?>
</head>

<body>

	<!-- ============================================================== -->
	<!-- main wrapper -->
	<!-- ============================================================== -->
	<div class="dashboard-main-wrapper">

		<!-- ============================================================== -->
		<!-- navbar -->
		<!-- ============================================================== -->
		<div class="dashboard-header">
			<nav class="navbar navbar-expand-lg bg-white fixed-top">
				<a class="navbar-brand" href="#">Diligent Energy</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="navbar-toggler-icon"></span>
	            </button>
			
				<div class="collapse navbar-collapse " id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto navbar-right-top">
						<li class="nav-item">
							<div id="custom-search" class="top-search-bar">
								<input class="form-control" type="text" placeholder="Search..">
							</div>
						</li>
						<li class="nav-item dropdown notification">
							<a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
							<ul class="dropdown-menu dropdown-menu-right notification-dropdown">
								<li>
									<div class="notification-title"> Notification</div>
									<div class="notification-list">
										<div class="list-group">
											<a href="#" class="list-group-item list-group-item-action active">
												<div class="notification-info">
													<div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle">
													</div>
													<div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
														<div class="notification-date">2 min ago</div>
													</div>
												</div>
											</a>
											<a href="#" class="list-group-item list-group-item-action">
												<div class="notification-info">
													<div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle">
													</div>
													<div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now following you
														<div class="notification-date">2 days ago</div>
													</div>
												</div>
											</a>
											<a href="#" class="list-group-item list-group-item-action">
												<div class="notification-info">
													<div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle">
													</div>
													<div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
														<div class="notification-date">2 min ago</div>
													</div>
												</div>
											</a>
											<a href="#" class="list-group-item list-group-item-action">
												<div class="notification-info">
													<div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle">
													</div>
													<div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.
														<div class="notification-date">2 min ago</div>
													</div>
												</div>
											</a>
										</div>
									</div>
								</li>
								<li>
									<div class="list-footer"> <a href="#">View all notifications</a>
									</div>
								</li>
							</ul>
						</li>
						
						<li class="nav-item dropdown nav-user">
							<a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php assets("images/avatar-1.jpg")?>" alt="" class="user-avatar-md rounded-circle"></a>
							<div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
								<div class="nav-user-info">
									<h5 class="mb-0 text-white nav-user-name"><?php echo $this->user_info->first_name.' '.$this->user_info->last_name ?></h5>
								</div>
								<a class="dropdown-item" href="<?php echo site_url("users/update/".$this->user_id)?>"><i class="fas fa-user mr-2"></i>Edit Profile</a>
								<a class="dropdown-item" href="<?php echo site_url("users/logout")?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<!-- ============================================================== -->
		<!-- end navbar -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- left sidebar -->
		<!-- ============================================================== -->
		<div class="nav-left-sidebar sidebar-dark">
			<div class="menu-list">
				<nav class="navbar navbar-expand-lg navbar-light">
					<a class="d-xl-none d-lg-none" href="#">Dashboard</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	                    <span class="navbar-toggler-icon"></span>
	                </button>
				
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav flex-column">
							<li class="nav-divider">
								Menu
							</li>
							<li class="nav-item ">
                                <a class="nav-link" href="<?php echo site_url()?>" aria-expanded="false"><i class="fa fa-fw fa-user-circle"></i>Dashboard </a>
                            </li>
							<?php if ( $this->ion_auth->in_group( ['admin', 'agent'] ) ) {?>
                            <li class="nav-item ">
								
								<a class="nav-link <?php menu_active('quotation')?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="far fa-comments"></i>Quotation</a>
								<div id="submenu-2" class="collapse submenu <?php echo menu_active('quotation', false) ? 'show' : ''?>" style="">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link <?php menu_active('quotationlist')?>" href="<?php echo site_url('quotation/quotationlist')?>"><i class="fa fa-fw fa-list"></i> All List</a>
										</li>
										<li class="nav-item">
											<a class="nav-link " href="<?php echo site_url('quotation/quotationlist?filter=accepted')?>"><i class="fa fa-fw fa-list"></i> Accepted</a>
										</li>
										<li class="nav-item">
											<a class="nav-link " href="<?php echo site_url('quotation/quotationlist?filter=rejected')?>"><i class="fa fa-fw fa-list"></i> Rejected</a>
										</li>
										<li class="nav-item">
											<a class="nav-link " href="<?php echo site_url('quotation/quotationlist?filter=reprice')?>"><i class="fa fa-fw fa-list"></i> Counter Offers</a>
										</li>
										
									</ul>
								</div>
                            </li>
							<?php }?>
														
							<li class="nav-item ">
								
								<a class="nav-link <?php menu_active('inspection')?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-clipboard-list"></i>Inspections 
									<?php $pending_insp = inspections_pending();
									if($pending_insp > 0){?>
									<span class="badge badge-danger"><?php echo $pending_insp?></span>
									<?php }?>
</a>
								<div id="submenu-4" class="collapse submenu <?php echo menu_active('inspection', false) ? 'show' : ''?>" style="">
									<ul class="nav flex-column">
										<?php if ( $this->ion_auth->in_group( ['inspector'] ) ) {?>
										<li class="nav-item">
											<a class="nav-link <?php menu_active('create|create_action')?>" href="<?php echo site_url('inspection/addinspection')?>"><i class="fa fa-fw fa-plus"></i> Add Inspection </a>
										</li>
										<?php }?>
										<li class="nav-item">
											<a class="nav-link <?php menu_active('inspection')?>" href="<?php echo site_url('inspection')?>"><i class="fa fa-fw fa-list"></i> List</a>
										</li>
										
										<li class="nav-item">
											<a class="nav-link <?php menu_active('maintenanceinspections')?>"  href="<?php echo site_url('maintenanceinspections')?>"><i class="far fa-clipboard"></i> Maintenance Inspections </a>
										</li>
									</ul>
								</div>
                            </li>		
							
							<li class="nav-item ">
								
								<a class="nav-link <?php menu_active('work|certificate|report')?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-certificate"></i> Work Completion </a>
								<div id="submenu-5" class="collapse submenu <?php echo menu_active('work', false) ? 'show' : ''?>" style="">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link <?php menu_active('report')?>" href="<?php echo site_url('work/report')?>"><i class="fas fa-cubes"></i> Add Report</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" <?php menu_active('report_list')?> href="<?php echo site_url('work/report_list')?>"><i class="fa fa-fw fa-list"></i> Report List</a>
										</li>
										
									</ul>
								</div>
                            </li>
							
							<li class="nav-item ">
								
								<a class="nav-link <?php menu_active('expenses')?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-shopping-basket "></i>Expenses
</a>
								<div id="submenu-6" class="collapse submenu <?php echo menu_active('expenses', false) ? 'show' : ''?>" style="">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link" <?php menu_active('create|create_action')?> href="<?php echo site_url('expenses/create')?>"><i class="fa fa-fw fa-plus"></i> Add Expense </a>
										</li>
										<li class="nav-item">
											<a class="nav-link <?php menu_active('expenses')?>" href="<?php echo site_url('expenses')?>"><i class="fa fa-fw fa-list"></i> List</a>
										</li>
										<li class="nav-item">
											<a class="nav-link <?php menu_active('summary')?>" href="<?php echo site_url('expenses/summary')?>"><i class="fas fa-chart-line"></i> Summary</a>
										</li>
										
									</ul>
								</div>
                            </li>		
							
							
							<?php if ( $this->ion_auth->in_group( 'admin' ) ) {?>
							<li class="nav-item ">
								
								<a class="nav-link <?php menu_active('services')?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-handshake"></i>Services</a>
								<div id="submenu-3" class="collapse submenu <?php echo menu_active('services', false) ? 'show' : ''?>" style="">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link" <?php menu_active('create|create_action')?> href="<?php echo site_url('services/create')?>"><i class="fa fa-fw fa-plus"></i> Add Service </a>
										</li>
										<li class="nav-item">
											<a class="nav-link <?php menu_active('services')?>" href="<?php echo site_url('services')?>"><i class="fa fa-fw fa-list"></i> List</a>
										</li>
										
									</ul>
								</div>
                            </li>

							<li class="nav-item ">
								
								<a class="nav-link <?php menu_active('items')?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-box"></i>Items</a>
								<div id="submenu-7" class="collapse submenu <?php echo menu_active('items', false) ? 'show' : ''?>" style="">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link" <?php menu_active('create|create_action')?> href="<?php echo site_url('items/create')?>"><i class="fa fa-fw fa-plus"></i> Add Items </a>
										</li>
										<li class="nav-item">
											<a class="nav-link <?php menu_active('items')?>" href="<?php echo site_url('items')?>"><i class="fa fa-fw fa-list"></i> List</a>
										</li>
										
									</ul>
								</div>
                            </li>


							<li class="nav-item ">
							<a class="nav-link" href="<?php echo site_url("invoice/invoicelist")?>" aria-expanded="false" ><i class="far fa-list-alt"></i>Invoices</a>
							</li>
							<li class="nav-item ">
							<a class="nav-link" href="<?php echo site_url("users")?>" aria-expanded="false" ><i class="fas fa-users"></i>Users</a>
							</li>
							<?php }?>
							
							
							<li class="nav-item ">
							<a class="nav-link" href="<?php echo site_url("users/logout")?>" aria-expanded="false" ><i class="fas fa-power-off"></i>Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end left sidebar -->

		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- wrapper  -->
		<!-- ============================================================== -->
		<div class="dashboard-wrapper">
			<div class="dashboard-influence">