<div class="container-fluid  dashboard-content">
  <h1> <?php echo $page_title ?> </h1>
  <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Dashboard</a></li>
      <li class="breadcrumb-item"><?php echo anchor($pslug,$page_title) ?></li>
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
                <label for="description" class="col-sm-2 form-label">Description </label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="description"><?php echo $description; ?></textarea>
				<div class="help-block"><?php echo form_error('description') ?></div>
				</div>
            </div>
	    <div class="form-group">
                <label for="image" class="col-sm-2 form-label">Image </label>
				<div class="col-sm-10">
                <input type="file" class="form-control" name="image" id="image" placeholder="image" value="<?php echo $image; ?>" />
				<div class="help-block"><?php echo form_error('image') ?></div>
					<p>Maximum 2MB filesize</p>
            	</div>
			</div>
	    <div class="form-group">
                <label for="price" class="col-sm-2 form-label">Price </label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="price" id="price" placeholder="price" value="<?php echo $price; ?>" />
				<div class="help-block"><?php echo form_error('price') ?></div>
            	</div>
			</div>
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('expenses') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->