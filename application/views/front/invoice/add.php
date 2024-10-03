<div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Add <?php echo $pslug?> </h2>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="<?php echo site_url()?>" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Add <?php echo $pslug?></li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <div class="page-section" id="overview">
                            <!-- ============================================================== -->
                            <!-- overview  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    &nbsp;
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end overview  -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
						<div class="row">
							<div class="col-md-12 text-center">
								<?php if(validation_errors() != ''){?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo validation_errors(); ?>
								</div>
								<?php }?>
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
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
											<?php $attributes = array('class' => 'form-horizontal',
		  						'role' => 'form',
								'enctype' => 'multipart/form-data');
		  echo form_open($frm_action, $attributes) ?>
											<div class="form-group">
                                                <label for="clientname" class="col-form-label">Client Name</label>
                                                <input id="clientname" name="clientname" type="text" value="<?php echo $clientname; ?>" class="form-control">
                                            </div>
										<div class="form-group">
                                                <label for="invdate" class="col-form-label">Invoice For date</label>
											<div class="input-group mb-3">
                                                <select class="form-control form-control-sm" name="month">
                                                    <option selected value=''>--Select Month--</option>
													<option value='JAN'>Janaury</option>
													<option value='FEB'>February</option>
													<option value='MAR'>March</option>
													<option value='APR'>April</option>
													<option value='MAY'>May</option>
													<option value='JUN'>June</option>
													<option value='JUL'>July</option>
													<option value='AUG'>August</option>
													<option value='SEP'>September</option>
													<option value='OCT'>October</option>
													<option value='NOV'>November</option>
													<option value='DEC'>December</option>
                                                </select>
												
											
											<select class="form-control form-control-sm" name="year">
												<?php for($n = date('Y')-1; $n< date('Y')+5; $n++){?>
												<option value='<?=$n?>'><?php echo $n?></option>
												<?php }?>
												</select>
                                            </div>
												
											
											
                                            </div>
                                            
                                            <div class="form-group">
												<label for="for_building" class="col-form-label">For: (Building Name)</label>
                                                <input id="for_building" name="for_building" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
												<label for="office" class="col-form-label">Office Name</label>
                                                <input id="office" name="office" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
												<label for="phone" class="col-form-label">Phone</label>
                                                <input id="phone" name="phone" type="text" class="form-control">									
                                            </div>
                                            <div class="form-group">
												<label for="trn_number" class="col-form-label">TRN (Number)</label>
                                                <input id="trn_number" name="trn_number" type="number" class="form-control">									
                                            </div>
                                            <div class="form-group">
												<label for="ref_number" class="col-form-label">TRN (Number)</label>
                                                <input id="ref_number" name="ref_number" type="number" class="form-control">									
                                            </div>
											<div class="services_block">
												

											</div>
											<div class="form-group">
												<button type="button" class="btn btn-warning" id="addservicesblock" data-ajax_url="<?php echo site_url("invoice/ajax_service_block")?>" data-counter="0"><i class="fa fa-fw fa-plus text-success"></i> Add More Services</button>
											</div>
											
										
											<div class="form-group">
												<label for="grand_total" class="col-form-label">Grand Total</label>
												<input id="grand_total" name="grand_total" type="number" readonly class="form-control">
											</div>
										
											<input type="hidden" value="<?php echo $quotation_id?>" name="quotation_id">
											<div class="form-group">
												<button class="btn btn-primary btn-block">Submit</button>
											</div>
											
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                      
                    </div>
                </div>
            </div>
            