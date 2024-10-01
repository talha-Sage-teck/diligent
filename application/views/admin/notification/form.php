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
        <form action="<?php echo $frm_action; ?>" method="post" class="form-horizontal"  enctype="multipart/form-data">
		<div class="box-body">
	    <div class="form-group">
                <label for="type" class="col-sm-2 form-label">Type </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="type" id="type" placeholder="type" value="<?php echo $type; ?>" />
				<div class="help-block"><?php echo form_error('type') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="description" class="col-sm-2 form-label">Description </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="description"><?php echo $description; ?></textarea>
				<div class="help-block"><?php echo form_error('description') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="subject" class="col-sm-2 form-label">Subject </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="subject" value="<?php echo $subject; ?>" />
				<div class="help-block"><?php echo form_error('subject') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="user_id" class="col-sm-2 form-label">User id </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="user id" value="<?php echo $user_id; ?>" />
				<div class="help-block"><?php echo form_error('user_id') ?></div>
            	</div>
			</div>
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo admin_url('notification') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->