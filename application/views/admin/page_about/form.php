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
                <label for="title" class="col-sm-2 form-label">Title </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="<?php echo $title; ?>" />
				<div class="help-block"><?php echo form_error('title') ?></div>
            	</div>
			</div>
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
	    <div class="form-group">
                <label for="vision_subheading" class="col-sm-2 form-label">Vision subheading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="vision_subheading" id="vision_subheading" placeholder="vision subheading" value="<?php echo $vision_subheading; ?>" />
				<div class="help-block"><?php echo form_error('vision_subheading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="vision_heading" class="col-sm-2 form-label">Vision heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="vision_heading" id="vision_heading" placeholder="vision heading" value="<?php echo $vision_heading; ?>" />
				<div class="help-block"><?php echo form_error('vision_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="vision_text" class="col-sm-2 form-label">Vision text </label>
				<div class="col-sm-10">
                <textarea class="form-control textarea" rows="3" name="vision_text" id="vision_text" placeholder="vision text"><?php echo $vision_text; ?></textarea>
				<div class="help-block"><?php echo form_error('vision_text') ?></div>
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
                <textarea class="form-control" rows="3" name="referral_text" id="referral_text" placeholder="referral text"><?php echo $referral_text; ?></textarea>
				<div class="help-block"><?php echo form_error('referral_text') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="chairman_heading" class="col-sm-2 form-label">Chairman heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="chairman_heading" id="chairman_heading" placeholder="chairman heading" value="<?php echo $chairman_heading; ?>" />
				<div class="help-block"><?php echo form_error('chairman_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="chairman_text" class="col-sm-2 form-label">Chairman text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="chairman_text" id="chairman_text" placeholder="chairman text"><?php echo $chairman_text; ?></textarea>
				<div class="help-block"><?php echo form_error('chairman_text') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="chairman_name" class="col-sm-2 form-label">Chairman name </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="chairman_name" id="chairman_name" placeholder="chairman name" value="<?php echo $chairman_name; ?>" />
				<div class="help-block"><?php echo form_error('chairman_name') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="chairman_designation" class="col-sm-2 form-label">Chairman designation </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="chairman_designation" id="chairman_designation" placeholder="chairman designation" value="<?php echo $chairman_designation; ?>" />
				<div class="help-block"><?php echo form_error('chairman_designation') ?></div>
            	</div>
			</div>
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
                <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="meta description" value="<?php echo $meta_description; ?>" />
				<div class="help-block"><?php echo form_error('meta_description') ?></div>
            	</div>
			</div>
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo admin_url('page_about') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->