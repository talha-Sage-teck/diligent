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
                <label for="name" class="col-sm-2 form-label">Name </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?php echo $name; ?>" />
				<div class="help-block"><?php echo form_error('name') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="designation" class="col-sm-2 form-label">Designation </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="designation" id="designation" placeholder="designation" value="<?php echo $designation; ?>" />
				<div class="help-block"><?php echo form_error('designation') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="testimonial_text" class="col-sm-2 form-label">Testimonial text </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="testimonial_text" id="testimonial_text" placeholder="testimonial text"><?php echo $testimonial_text; ?></textarea>
				<div class="help-block"><?php echo form_error('testimonial_text') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="image" class="col-sm-2 form-label">Image </label>
				<div class="col-sm-10">
                <input type="file" class="form-control" name="image" id="image" placeholder="image" value="<?php echo $image; ?>" />
				<div class="help-block"><?php echo form_error('image') ?></div>
            	</div>
			</div>
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo admin_url('testimonials') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->