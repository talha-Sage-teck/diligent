<div class="layout-content">
	<div class="container-fluid flex-grow-1 container-p-y">
		<h1>
			<?php echo $page_title ?> </h1>
		<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Dashboard</a>
				</li>
				<li class="breadcrumb-item">
					<?php echo anchor($pslug,$page_title) ?>
				</li>
				<li class="breadcrumb-item active">
					<?php echo $action.' '.$page_title ?>
				</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<?php if($this->session->userdata('error')) {?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->userdata('error') ?> </div>
				<?php } if($this->session->userdata('message')){?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?php echo $this->session->userdata('message') ?> </div>
				<?php }?>
			</div>
		</div>
		<h6 class="card-header"><a href="<?php echo site_url('users/'.'create') ?>" type="button" class="btn  btn-primary"><i class="fa fa-plus"></i> Add <?php echo $page_title ?></a></h6>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
					<div class="card-body">
						
						<div class="card-datatable table-responsive">
							<table class="table table-striped table-bordered dt-responsive nowrap first" id="mytable">
								<thead>
									<tr>
										<th></th>
										<th>Full name</th>
										<th>Email</th>
										<th>Username</th>
										<th>Created on</th>

										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$start = 0;
									foreach ( $users_data as $users ) {
										?>
									<tr>
										<td><img src="<?php echo (isset($users->avatar) && $users->avatar != '') ? base_url('uploads/userdoc/thumbs/'.$users->avatar) :  base_url('assets/img/avatars/no-user.png') ?>" alt="" class="ui-w-40 rounded-circle">
										</td>
										<td>
											<?php echo $users->first_name.' '.$users->last_name ?>
										</td>
										<td>
											<?php echo $users->email ?>
										</td>
										<td>
											<?php echo $users->username ?>
										</td>
										<td>
											<?php echo date(get_option('date_short'),$users->created_on) ?>
										</td>

										<td style="text-align:center">
											<div class="btn-group">
												<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span class="fa fa-cogs"></span> </button>
												<ul class="dropdown-menu pull-right">
													<li>
														<?php echo anchor(site_url('users/update/'.$users->id),'Update');?>
													</li>
													<li>
														<?php echo anchor(site_url('users/read/'.$users->id),'Details');?>
													</li>
													<?php if($users->id > 1){?>
													<li>
														<?php echo anchor(site_url('users/delete/'.$users->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?>
													</li>
													<?php }?>
												</ul>
											</div>
										</td>
									</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>