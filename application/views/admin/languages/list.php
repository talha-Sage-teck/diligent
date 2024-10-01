<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<h1>
	  <?php echo $page_title ?>
	  <small><?php echo $action.' '.$page_title ?></small>
	</h1>
	<ol class="breadcrumb">
	  <li><a href="<?php admin_url(TRUE) ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li><?php echo anchor('admin/'.$pslug,$page_title) ?></li>
	</ol>
  </section>
  <!-- Main content -->
    <section class="content">
      <div class="row">
	   <div class="col-md-4 text-center">
		  <div style="margin-top: 4px"  id="message">
			  <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
		  </div>
        </div>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="<?php echo site_url('admin/languages/'.'create') ?>" type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add <?php echo $page_title ?></a></h3>
	 </div>
            <!-- /.box-header -->
            <div class="box-body">
        <table class="table table-striped table-bordered dt-responsive nowrap" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
				    <th>language name</th>
				    <th>language directory</th>
				    <th>slug</th>
				    <th>language code</th>
				    <th>default</th>
				    <th>morevalues</th>
				    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($languages_data as $languages)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $languages->language_name ?></td>
		    <td><?php echo $languages->language_directory ?></td>
		    <td><?php echo $languages->slug ?></td>
		    <td><?php echo $languages->language_code ?></td>
		    <td><?php echo $languages->default ?></td>
		    <td><?php echo $languages->morevalues ?></td>
		    <td style="text-align:center">
			<div class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<span class="fa fa-cogs"></span>
				</button>
				<ul class="dropdown-menu pull-right">
					<li><?php echo anchor(site_url('admin/languages/read/'.$languages->id),'Read');  ?></li>
					<li><?php echo anchor(site_url('admin/languages/update/'.$languages->id),'Update');?></li>
					<li><?php echo anchor(site_url('admin/languages/delete/'.$languages->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?></li>
				</ul>
			</div>
		    </td>
	        </tr>
                <?php
            }
            ?>
             </tbody>
        	</table>
		   </div>
		  <!-- /.box-body -->
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