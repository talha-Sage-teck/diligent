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
                <label for="title" class="col-sm-2 control-label">Title </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="<?php echo $title; ?>" />
				<div class="help-block"><?php echo form_error('title') ?></div>
            	</div>
			</div>
	    
	    <div class="form-group">
                <label for="teaser" class="col-sm-2 control-label">Teaser </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="teaser" id="teaser" placeholder="teaser" value="<?php echo $teaser; ?>" />
				<div class="help-block"><?php echo form_error('teaser') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="content" class="col-sm-2 control-label">Content </label>
				<div class="col-sm-10">
                <textarea name="content" class="form-control textarea" id="content" placeholder="content"><?php echo $content; ?></textarea>
				<div class="help-block"><?php echo form_error('content') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="meta_title" class="col-sm-2 control-label">Meta title </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="meta title" value="<?php echo $meta_title; ?>" />
				<div class="help-block"><?php echo form_error('meta_title') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="meta_description" class="col-sm-2 control-label">Meta description </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="meta description" value="<?php echo $meta_description; ?>" />
				<div class="help-block"><?php echo form_error('meta_description') ?></div>
            	</div>
			</div>
	    <div class="form-group">
                <label for="meta_keywords" class="col-sm-2 control-label">Meta keywords </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="meta keywords" value="<?php echo $meta_keywords; ?>" />
				<div class="help-block"><?php echo form_error('meta_keywords') ?></div>
            	</div>
			</div>
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo admin_url('pages') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form> </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->