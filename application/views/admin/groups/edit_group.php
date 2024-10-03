<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_title ?>
        <small><?php echo $action.' '.$page_title ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><?php echo anchor('admin/'.$pslug,$ptitle) ?></li>
        <li class="active"><?php echo $action.' '.$page_title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">
			  <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
			  <?php echo $this->session->flashdata('error');?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Group</label>

                  <div class="col-sm-10">
                    <input name="group_name" type="text" class="form-control" id="group_name" placeholder="Group" required="required" value="<?php echo set_value('group_name',$group->name) ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <input name="group_description" type="text" required="required" class="form-control" id="group_description" placeholder="Description" value="<?php echo set_value('group_description',$group->description) ?>">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <?php echo form_hidden('group_id',set_value('group_id',$group->id));?>
                <a href="<?php echo admin_url($pslug) ?>" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right"><?php echo $action ?></button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->