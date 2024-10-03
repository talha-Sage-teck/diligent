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
                <label for="question" class="col-sm-2 control-label">question <?php echo form_error('question') ?></label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="question" id="question" placeholder="question"><?php echo $question; ?></textarea>
				</div>
            </div>
	    <div class="form-group">
                <label for="answer" class="col-sm-2 control-label">answer <?php echo form_error('answer') ?></label>
				<div class="col-sm-10">
                <textarea class="form-control" rows="3" name="answer" id="answer" placeholder="answer"><?php echo $answer; ?></textarea>
				</div>
            </div>
	    <div class="form-group">
                <label for="int" class="col-sm-2 control-label">Faq Category <?php echo form_error('faq_cat_id') ?></label>
				<div class="col-sm-10">
                <select class="form-control select2" name="faq_cat_id" id="faq_cat_id" style="width: 100%;">
                  <?php options($faq_cat,$row,"faq_cat_id",$action); ?>
                </select>
            	</div>
			</div>
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo admin_url('faq') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>  </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card --> 
</div>
<!-- /.container-fluid -->