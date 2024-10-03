
<div class="container-fluid  dashboard-content">
	<!-- ============================================================== -->
	<!-- pageheader -->
	<!-- ============================================================== -->
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h2 class="pageheader-title"><?php echo ucfirst("expenses")?> List</h2>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo admin_url() ?>" class="breadcrumb-link">Dashboard</a></li>
							<li class="breadcrumb-item"><?php echo anchor($pslug, $page_title, array("class=" => "breadcrumb-link")) ?></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $action." ".$page_title ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- end pageheader -->
	<!-- ============================================================== -->

	<div class="row">
		<div class="col-md-12 text-center">
			<?php if(validation_errors() != ""){?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo validation_errors(); ?>
			</div>
			<?php }?>
			<?php if($this->session->userdata("error")) {?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $this->session->userdata("error") ?> </div>
			<?php } if($this->session->userdata("message")){?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $this->session->userdata("message") ?> </div>
			<?php }?>
		</div>
	</div>
	<div class="row">
		<div class="col mb-2">
			<form class="form-inline">
				<label class="sr-only" for="selectfilter">Choose Dates</label>
				<div class="form-group mr-2">
                                        <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                            <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#datetimepicker7" placeholder="click icon for start date" />
                                            <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mr-2">
                                        <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                                            <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#datetimepicker8" placeholder="click icon for end date" />
                                            <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
				<button type="submit" class="btn btn-primary ">Submit</button>
			</form>
			<?php if($start_date || $end_date){?>
			<h4>Showing records between "<?php echo date(DATE_SHORT, strtotime($start_date))?>" and "<?php echo date(DATE_SHORT, strtotime($end_date))?>"</h4>
			<?php }?>
		</div>
	</div>
	<div class="row">
		<!-- ============================================================== -->
		<!-- data table  -->
		<!-- ============================================================== -->
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-head card-header">
				<strong>Total Expenses</strong>
				</div>
				<div class="card-body">
					<strong class="display-6"><?php show_price($summary);?></strong>
					
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end data table  -->
		<!-- ============================================================== -->
	</div>
	<div class="row">
		<!-- ============================================================== -->
		<!-- data table  -->
		<!-- ============================================================== -->
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-head card-header">
				<strong>Total Vat (<?php echo VAT_TEXT?>)</strong>
				</div>
				<div class="card-body">
					<strong class="display-6"><?php show_price($summary * VAT_VALUE);?></strong>
					
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end data table  -->
		<!-- ============================================================== -->
	</div>
</div>
