<div class="layout-content">
<div class="container-fluid flex-grow-1 container-p-y">
  <h1> <?php echo $page_title ?> </h1>
  <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo admin_url() ?>"><i class="feather icon-home"></i></a></li>
      <li class="breadcrumb-item"><?php echo anchor($this->url_prefix.$pslug,$page_title) ?></li>
      <li class="breadcrumb-item active"><?php echo $action.' '.$page_title ?></li>
    </ol>
  </div>
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
  </div><div class="card mb-4">
<div class="card-body">
<?php 
		  $attributes = array('class' => 'form-horizontal',
		  						'role' => 'form',
								'enctype' => 'multipart/form-data');
		  echo form_open($frm_action, $attributes) ?> 
		  
		<div class="box-body">
	    <div class="form-group">
                <label for="header_heading" class="col-sm-2 form-label">Header heading </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="header_heading" id="header_heading" placeholder="header heading"><?php echo $header_heading; ?></textarea>
				<div class="help-block"><?php echo form_error('header_heading') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="header_text" class="col-sm-2 form-label">Header text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="header_text" id="header_text" placeholder="header text"><?php echo $header_text; ?></textarea>
				<div class="help-block"><?php echo form_error('header_text') ?></div>
				</div>
            </div>
            
            <div class="card my-3">
  <div class="card-header bg-light">
    Services Section
  </div>
  <div class="card-body">
    <div class="form-group">
                <label for="service1_heading" class="col-sm-2 form-label">Service1 heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="service1_heading" id="service1_heading" placeholder="service1 heading" value="<?php echo $service1_heading; ?>" />
				<div class="help-block"><?php echo form_error('service1_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="service1_text" class="col-sm-2 form-label">Service1 text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="service1_text" id="service1_text" placeholder="service1 text"><?php echo $service1_text; ?></textarea>
				<div class="help-block"><?php echo form_error('service1_text') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="service2_heading" class="col-sm-2 form-label">Service2 heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="service2_heading" id="service2_heading" placeholder="service2 heading" value="<?php echo $service2_heading; ?>" />
				<div class="help-block"><?php echo form_error('service2_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="service2_text" class="col-sm-2 form-label">Service2 text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="service2_text" id="service2_text" placeholder="service2 text"><?php echo $service2_text; ?></textarea>
				<div class="help-block"><?php echo form_error('service2_text') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="service3_heading" class="col-sm-2 form-label">Service3 heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="service3_heading" id="service3_heading" placeholder="service3 heading" value="<?php echo $service3_heading; ?>" />
				<div class="help-block"><?php echo form_error('service3_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="service3_text" class="col-sm-2 form-label">Service3 text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="service3_text" id="service3_text" placeholder="service3 text"><?php echo $service3_text; ?></textarea>
				<div class="help-block"><?php echo form_error('service3_text') ?></div>
				</div>
            </div>
  </div>
</div>
            
      <div class="card my-3">
  <div class="card-header bg-light">
    Why hcoose us sections
  </div>
  <div class="card-body">
    <div class="form-group">
                <label for="choose_heading" class="col-sm-2 form-label">Choose heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="choose_heading" id="choose_heading" placeholder="choose heading" value="<?php echo $choose_heading; ?>" />
				<div class="help-block"><?php echo form_error('choose_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="choose_text" class="col-sm-2 form-label">Choose text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="choose_text" id="choose_text" placeholder="choose text"><?php echo $choose_text; ?></textarea>
				<div class="help-block"><?php echo form_error('choose_text') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="choose1_heading" class="col-sm-2 form-label">Choose1 heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="choose1_heading" id="choose1_heading" placeholder="choose1 heading" value="<?php echo $choose1_heading; ?>" />
				<div class="help-block"><?php echo form_error('choose1_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="choose1_text" class="col-sm-2 form-label">Choose1 text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="choose1_text" id="choose1_text" placeholder="choose1 text"><?php echo $choose1_text; ?></textarea>
				<div class="help-block"><?php echo form_error('choose1_text') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="choose2_heading" class="col-sm-2 form-label">Choose2 heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="choose2_heading" id="choose2_heading" placeholder="choose2 heading" value="<?php echo $choose2_heading; ?>" />
				<div class="help-block"><?php echo form_error('choose2_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="choose2_text" class="col-sm-2 form-label">Choose2 text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="choose2_text" id="choose2_text" placeholder="choose2 text"><?php echo $choose2_text; ?></textarea>
				<div class="help-block"><?php echo form_error('choose2_text') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="choose3_heading" class="col-sm-2 form-label">Choose3 heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="choose3_heading" id="choose3_heading" placeholder="choose3 heading" value="<?php echo $choose3_heading; ?>" />
				<div class="help-block"><?php echo form_error('choose3_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="choose3_text" class="col-sm-2 form-label">Choose3 text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="choose3_text" id="choose3_text" placeholder="choose3 text"><?php echo $choose3_text; ?></textarea>
				<div class="help-block"><?php echo form_error('choose3_text') ?></div>
				</div>
            </div>
  </div>
</div>      
	    
	   <div class="card my-3">
  <div class="card-header bg-light">
    Choose Plan section
  </div>
  <div class="card-body">
    <div class="form-group">
                <label for="plan_subheading" class="col-sm-2 form-label">Plan subheading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="plan_subheading" id="plan_subheading" placeholder="plan subheading" value="<?php echo $plan_subheading; ?>" />
				<div class="help-block"><?php echo form_error('plan_subheading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="plan_heading" class="col-sm-2 form-label">Plan heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="plan_heading" id="plan_heading" placeholder="plan heading" value="<?php echo $plan_heading; ?>" />
				<div class="help-block"><?php echo form_error('plan_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="plan_text" class="col-sm-2 form-label">Plan text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="plan_text" id="plan_text" placeholder="plan text"><?php echo $plan_text; ?></textarea>
				<div class="help-block"><?php echo form_error('plan_text') ?></div>
				</div>
            </div>
  </div>
</div>

 
 <div class="card my-3">
  <div class="card-header bg-light">
    Feedback Section -  <a href="<?php echo admin_url('testimonials') ?>">Add testimonials</a> 
  </div>
  <div class="card-body">
    <div class="form-group">
                <label for="feedback_subheading" class="col-sm-2 form-label">Feedback subheading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="feedback_subheading" id="feedback_subheading" placeholder="feedback subheading" value="<?php echo $feedback_subheading; ?>" />
				<div class="help-block"><?php echo form_error('feedback_subheading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="feedback_heading" class="col-sm-2 form-label">Feedback heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="feedback_heading" id="feedback_heading" placeholder="feedback heading" value="<?php echo $feedback_heading; ?>" />
				<div class="help-block"><?php echo form_error('feedback_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="feedback_text" class="col-sm-2 form-label">Feedback text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="feedback_text" id="feedback_text" placeholder="feedback text"><?php echo $feedback_text; ?></textarea>
				<div class="help-block"><?php echo form_error('feedback_text') ?></div>
				</div>
            </div>
  </div>
</div>
	    
	    
	    <div class="form-group">
                <label for="calculate_subheading" class="col-sm-2 form-label">Calculate subheading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="calculate_subheading" id="calculate_subheading" placeholder="calculate subheading" value="<?php echo $calculate_subheading; ?>" />
				<div class="help-block"><?php echo form_error('calculate_subheading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="calculate_heading" class="col-sm-2 form-label">Calculate heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="calculate_heading" id="calculate_heading" placeholder="calculate heading" value="<?php echo $calculate_heading; ?>" />
				<div class="help-block"><?php echo form_error('calculate_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="calculate_text" class="col-sm-2 form-label">Calculate text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="calculate_text" id="calculate_text" placeholder="calculate text"><?php echo $calculate_text; ?></textarea>
				<div class="help-block"><?php echo form_error('calculate_text') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="referral_subheding" class="col-sm-2 form-label">Referral subheding </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="referral_subheding" id="referral_subheding" placeholder="referral subheding" value="<?php echo $referral_subheding; ?>" />
				<div class="help-block"><?php echo form_error('referral_subheding') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="referral_heading" class="col-sm-2 form-label">Referral heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="referral_heading" id="referral_heading" placeholder="referral heading" value="<?php echo $referral_heading; ?>" />
				<div class="help-block"><?php echo form_error('referral_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="referral_text" class="col-sm-2 form-label">Referral text </label>
				<div class="col-sm-10">
                <textarea class="form-control textarea" rows="3" name="referral_text" id="referral_text" placeholder="referral text"><?php echo $referral_text; ?></textarea>
				<div class="help-block"><?php echo form_error('referral_text') ?></div>
				</div>
            </div>
	    
        <div class="card my-3">
  <div class="card-header bg-light">
    Counters Section
  </div>
  <div class="card-body">
    <div class="card-group">
	<?php for($i=1; $i<=4; $i++){?>
    
  <div class="card">
    <div class="card-body">
      <div class="form-group">
                <label for="counter_title_<?=$i?>" class="col-sm-12 form-label">Title <?php echo $i ?> </label>
				<div class="col-sm-12">
                <input type="text" class="form-control" name="counter_title_<?=$i?>" id="counter_title_<?=$i?>" placeholder="title" value="<?php echo ${'counter_title_'.$i}; ?>" />
            	</div>
			</div>
            <div class="form-group">
                <label for="counter_limit_<?=$i?>" class="col-sm-12 form-label">Max count <?php echo $i ?> </label>
				<div class="col-sm-12">
                <input type="number" class="form-control" name="counter_limit_<?=$i?>" id="counter_limit_<?=$i?>" placeholder="Max numbers" value="<?php echo ${'counter_limit_'.$i}; ?>" />
            	</div>
			</div>
    </div>
  </div>
    <?php }?>
    </div>
  </div>
</div>
            
            <div class="card my-3">
  <div class="card-header bg-light">
    Misssion Section
  </div>
  <div class="card-body">
   
   <div class="form-group">
                <label for="mission_subheading" class="col-sm-2 form-label">Mission subheading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="mission_subheading" id="mission_subheading" placeholder="mission subheading" value="<?php echo $mission_subheading; ?>" />
				<div class="help-block"><?php echo form_error('mission_subheading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="mission_heading" class="col-sm-2 form-label">Mission heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="mission_heading" id="mission_heading" placeholder="mission heading" value="<?php echo $mission_heading; ?>" />
				<div class="help-block"><?php echo form_error('mission_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="mission_text" class="col-sm-2 form-label">Mission text </label>
				<div class="col-sm-10">
                <textarea class="form-control textarea" rows="3" name="mission_text" id="mission_text" placeholder="mission text"><?php echo $mission_text; ?></textarea>
				<div class="help-block"><?php echo form_error('mission_text') ?></div>
				</div>
            </div>
  </div>
</div>

<div class="card my-3">
  <div class="card-header bg-light">
    SEO Options
  </div>
  <div class="card-body">
    <div class="form-group">
                <label for="meta_keywords" class="col-sm-2 form-label">Meta keywords </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="meta keywords" value="<?php echo $meta_keywords; ?>" />
				<div class="help-block"><?php echo form_error('meta_keywords') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="meta_description" class="col-sm-2 form-label">Meta description </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="meta_description" id="meta_description" placeholder="meta description"><?php echo $meta_description; ?></textarea>
				<div class="help-block"><?php echo form_error('meta_description') ?></div>
				</div>
            </div>
  </div>
</div>
            
	    
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo admin_url('page_home') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->