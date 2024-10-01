<div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Update <?php echo $pslug?> </h2>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="<?php echo site_url()?>" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Update <?php echo $pslug?></li>
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
													<option value='JAN' <?php echo ($month == "JAN") ? "selected" : "" ?>>Janaury</option>
													<option value='FEB' <?php echo ($month == "FEB") ? "selected" : "" ?>>February</option>
													<option value='MAR' <?php echo ($month == "MAR") ? "selected" : "" ?>>March</option>
													<option value='APR' <?php echo ($month == "APR") ? "selected" : "" ?>>April</option>
													<option value='MAY' <?php echo ($month == "MAY") ? "selected" : "" ?>>May</option>
													<option value='JUN' <?php echo ($month == "JUN") ? "selected" : "" ?>>June</option>
													<option value='JUL' <?php echo ($month == "JUL") ? "selected" : "" ?>>July</option>
													<option value='AUG' <?php echo ($month == "AUG") ? "selected" : "" ?>>August</option>
													<option value='AUG' <?php echo ($month == "AUG") ? "selected" : "" ?>>September</option>
													<option value='OCT' <?php echo ($month == "OCT") ? "selected" : "" ?>>October</option>
													<option value='NOV' <?php echo ($month == "NOV") ? "selected" : "" ?>>November</option>
													<option value='DEC' <?php echo ($month == "DEC") ? "selected" : "" ?>>December</option>
                                                </select>
												
											
											<select class="form-control form-control-sm" name="year">
												<?php for($n = date('Y')-1; $n< date('Y')+5; $n++){?>
												<option value='<?=$n?>' <?php echo ($year == $n) ? "selected" : "" ?>><?php echo $n?></option>
												<?php }?>
												</select>
                                            </div>											
											
											
                                            </div>
                                            
                                            <div class="form-group">
												<label for="for_building" class="col-form-label">For: (Building Name)</label>
                                                <input id="for_building" name="for_building" type="text" class="form-control" value="<?php echo $for_building?>">
                                            </div>
                                            <div class="form-group">
												<label for="office" class="col-form-label">Office Name</label>
                                                <input id="office" name="office" type="text" class="form-control" value="<?php echo $office?>">
                                            </div>
                                            <div class="form-group">
												<label for="phone" class="col-form-label">Phone</label>
                                                <input id="phone" name="phone" type="text" class="form-control" value="<?php echo $phone?>">									
                                            </div>
                                            <div class="form-group">
												<label for="trn_number" class="col-form-label">TRN (Number)</label>
                                                <input id="trn_number" name="trn_number" type="number" class="form-control" value="<?php echo $trn_number?>">									
                                            </div>
                                            <div class="form-group">
												<label for="ref_number" class="col-form-label">Reference Number</label>
                                                <input id="ref_number" name="ref_number" type="text" class="form-control" value="<?php echo $ref_number?>">									
                                            </div>
											<div class="services_block">
												<?php 
											if(!empty($services)){
												$n = 1;
											foreach($services as $service){
												$uniqid = uniqid();?>
												<div class="card"  id="<?=$uniqid?>">
													<h5 class="card-header">
														Service <?php echo $n?>
													</h5>
													<div class="card-body border-top">
													<div class="form-group">
														<textarea class="form-control form-control-sm" name="services[]" rows="1"><?php echo $service->title?></textarea>
													</div>
													<div class="form-group">
														<label for="rate" class="col-form-label">Rate</label>
														<input id="rate-<?=$uniqid?>" name="rate[]" type="number" class="form-control inv_rate" value="<?php echo $service->rate?>">
													</div>
													<div class="form-group">
														<label for="sqty" class="col-form-label">Quantity</label>
														<input id="sqty-<?=$uniqid?>" name="qty[]" value="1" type="number" class="form-control inv_qty" min="1" value="<?php echo $service->qty?>">
													</div>
													<div class="form-group">
														<label for="tax_amount" class="col-form-label">Tax Amount</label>
														<div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text"><?php echo VAT_TEXT?></span></span>
														<input type="hidden" class="tax_value" value="<?php echo VAT_VALUE?>">
														<input id="tax_amount-<?=$uniqid?>" name="tax_amount[]" type="number" class="form-control inv_tax_amount" value="<?php echo $service->tax_amount?>">
														</div>
													</div>
													<div class="form-group">
														<label for="total_amount" class="col-form-label">Amount</label>
														<input id="total_amount-<?=$uniqid?>" name="total_amount[]" type="number" readonly class="form-control inv_total_amount" value="<?php echo $service->total_amount?>">
													</div>
													</div>
												</div>
												<?php $n++; } 
											}?>

											</div>
											<div class="form-group">
												<button type="button" class="btn btn-warning" id="addservicesblock" data-ajax_url="<?php echo site_url("invoice/ajax_service_block")?>" data-counter="<?php echo count($services)?>"><i class="fa fa-fw fa-plus text-success"></i> Add More Services</button>
											</div>
										
										
											<div class="form-group">
												<label for="grand_total" class="col-form-label">Grand Total</label>
												<input id="grand_total" name="grand_total" type="number" readonly class="form-control"  value="<?php echo $grand_total?>">
											</div>
											
											<input type="hidden" value="<?php echo $quotation_id?>" name="quotation_id">
											<div class="form-group">
												<input type="hidden" name="id" value="<?php echo $id?>">
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
            