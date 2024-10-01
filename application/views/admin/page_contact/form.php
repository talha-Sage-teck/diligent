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
                <label for="form_heading" class="col-sm-2 form-label">Form heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="form_heading" id="form_heading" placeholder="form heading" value="<?php echo $form_heading; ?>" />
				<div class="help-block"><?php echo form_error('form_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="office_phone" class="col-sm-2 form-label">Office phone </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="office_phone" id="office_phone" placeholder="office phone" value="<?php echo $office_phone; ?>" />
				<div class="help-block">Accepts comma separated values</div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="office_email" class="col-sm-2 form-label">Office email </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="office_email" id="office_email" placeholder="office email" value="<?php echo $office_email; ?>" />
				<div class="help-block">Accepts comma separated values</div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="office_address" class="col-sm-2 form-label">Office address </label>
				<div class="col-sm-10">
                <textarea name="office_address" class="form-control" id="office_address" placeholder="office address"><?php echo $office_address; ?></textarea>
				<div class="help-block"></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="office_working_hours" class="col-sm-2 form-label">Office working hours </label>
				<div class="col-sm-10">
                <textarea name="office_working_hours" class="form-control" id="office_working_hours" placeholder="office working hours"><?php echo $office_working_hours; ?></textarea>
				<div class="help-block"><?php echo form_error('office_working_hours') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="support_heading" class="col-sm-2 form-label">Support heading </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="support_heading" id="support_heading" placeholder="support heading" value="<?php echo $support_heading; ?>" />
				<div class="help-block"><?php echo form_error('support_heading') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="support_text" class="col-sm-2 form-label">Support text </label>
				<div class="col-sm-10">
                <textarea class="form-control textarea" rows="3" name="support_text" id="support_text" placeholder="support text"><?php echo $support_text; ?></textarea>
				<div class="help-block"><?php echo form_error('support_text') ?></div>
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
	    <a href="<?php echo admin_url('page_contact') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->