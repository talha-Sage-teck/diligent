<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1><?php echo $page_title ?><small><?php echo $action.' '.$page_title ?></small></h1>
      	<ol class="breadcrumb">
        	<li><a href="<?php echo site_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        	<li><?php echo anchor('admin/'.$pslug,$page_title) ?></li>
        	<li class="active"><?php echo $action.' '.$page_title ?></li>
      	</ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">
			  <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
			  <?php echo $this->session->flashdata('error');?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
		<div class="box-body">
	    <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">language name <?php echo form_error('language_name') ?></label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="language_name" id="language_name" placeholder="language name" value="<?php echo $language_name; ?>" />
            	</div>
			</div>
	    <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">language directory <?php echo form_error('language_directory') ?></label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="language_directory" id="language_directory" placeholder="language directory" value="<?php echo $language_directory; ?>" />
            	</div>
			</div>
	    <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">slug <?php echo form_error('slug') ?></label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="<?php echo $slug; ?>" />
            	</div>
			</div>
	    <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">language code <?php echo form_error('language_code') ?></label>
				<div class="col-sm-10">
                <input type="text" class="form-control" name="language_code" id="language_code" placeholder="language code" value="<?php echo $language_code; ?>" />
            	</div>
			</div>
	    <div class="form-group">
			<label for="default" class="col-sm-2 control-label">default <?php echo form_error('default') ?></label>
			<div class="col-sm-10">
			<select class="form-control">
				<option value="0" <?php if(0 == $default) echo 'selected';?>>Disabled</option>
				<option value="1" <?php if(1 == $default) echo 'selected';?>>Active</option>
			</select>
			</div>
		</div>
	    <div class="form-group">
                <label for="morevalues" class="col-sm-2 control-label">morevalues <?php echo form_error('morevalues') ?></label>
				<div class="col-sm-10">
                <select class="form-control">
					<option value="medium" <?php if('medium' == $morevalues) echo 'selected';?>>medium</option>
					<option value="large" <?php if('large' == $morevalues) echo 'selected';?>>large</option>
					<option value="high" <?php if('high' == $morevalues) echo 'selected';?>>high</option>
					<option value="challenge" <?php if('challenge' == $morevalues) echo 'selected';?>>challenge</option>
				</select>
				</div>
            </div>
	</div>
              <!-- /.box-body -->
			  <div class="box-footer">
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('languages') ?>" class="btn btn-default">Cancel</a>
    </div>
              <!-- /.box-footer -->
	</form>          </div>
          <!-- /.box -->
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->