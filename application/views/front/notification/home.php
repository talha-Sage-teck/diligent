<div class="container flex-grow-1 container-p-y default-style">
  <h1 class="font-weight-bold py-3 mb-0">Your Notifications</h1>
  <?php if($this->session->flashdata('success')){?>
  <div class="row">
    <div class="col">
      <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
    </div>
  </div>
  <?php }?>
  <?php if($this->session->flashdata('error')){?>
  <div class="row">
    <div class="col">
      <div class="alert alert-success"><?php echo $this->session->flashdata('error') ?></div>
    </div>
  </div>
  <?php }?>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
      
        <div class="card-datatable table-responsive">
          <table class="datatables-demo table table-striped table-bordered">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th>Title</th>
                <th>Description</th>
                <th>Dated</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($list)){
					$i=1;
					foreach($list as $n){
						
					switch($n->typeid){
					  case NTYPE_WARNING:
					  $ntype = 'badge-warning';
					  $ttype = 'text-warning';
					  break;
					  case NTYPE_ERROR:
					  $ntype = 'badge-danger';
					  $ttype = 'text-danger';
					  break;
					  case NTYPE_NOTICE:
					  $ntype = 'badge-secondary';
					  $ttype = 'text-secondary';
					  break;
					  case NTYPE_SUCCESS:
					  $ntype = 'badge-success';
					  $ttype = 'text-success';
					  break;
					  case NTYPE_INFO:
					  $ntype = 'badge-info';
					  $ttype = 'text-info';
					  break;
					}
					?>
              <tr class="<?php echo ($i%2==0) ? 'even' : 'odd' ?> <?php echo ($n->read_status == 1) ? '' : 'font-weight-bold' ?> gradeX">
                <td><span class="badge badge-dot <?php echo $ntype ?> mr-1"></span></td>
                <td class="<?php echo $ttype ?>"><a href="<?php echo site_url('notifications/read/'.$n->id) ?>" class="<?php echo $ttype ?>"><?php echo $n->subject ?></a></td>
                <td class=""><?php echo word_limiter($n->description, 14); ?></td>
                <td class=""><?php echo date(DATETIME_SHORT, $n->date) ?></td>
              </tr>
              <?php $i++;}
				}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="Voucher" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document"> </div>
</div>
