<style>

.messaging img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%;
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>
<div class="container-fluid flex-grow-1 container-p-y">
  <h4 class="font-weight-bold py-3 mb-0">Users view</h4>
  <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo admin_url() ?>"><i class="feather icon-home"></i></a></li>
      <li class="breadcrumb-item"><a href="<?php echo admin_url('inbox') ?>">Users</a></li>
      <li class="breadcrumb-item active">Users view</li>
    </ol>
  </div>
  
  <div class="card mb-4">
    <div class="card-body">
    
    <div class="messaging">
      <div class="inbox_msg">
        
        <div class="mesgs">
          <div class="msg_history">
          
          <?php 
		  foreach($messages as $msg){
			  if($msg->from_user == 1){
			  ?>
              <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?php echo $msg->detail ?></p>
                <span class="time_date"> <?php echo date('h:i A', strtotime($msg->date)) ?> | <?php echo date('M d', strtotime($msg->date)) ?></span> </div>
            </div>
          <?php }elseif($msg->to_user == 1){?>
          <div class="incoming_msg">
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?php echo $msg->detail ?></p>
                  <span class="time_date"><?php echo date('h:i A', strtotime($msg->date)) ?> | <?php echo date('M d', strtotime($msg->date)) ?></span></div>
              </div>
            </div>
          <?php }?>
          <?php }?>
                    
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="feather icon-arrow-right" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
    
    </div>
    <hr class="border-light m-0">
  </div>
  
  
</div>


<script type="text/javascript">
$(document).ready(function(e) {

$('.msg_send_btn').click(function (e){
	e.preventDefault();
	
	var user_message = $('.write_msg').val();
	
	$.ajax({
  url: "<?php echo site_url('users/update_chat') ?>",
  type: "GET",
  data: {message: user_message, to_user:<?php echo $user_id ?>},
  context: document.body
}).done(function() {
	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes();
  	$('.msg_history').append('<div class="outgoing_msg"><div class="sent_msg"><p>'+user_message+'</p><span class="time_date"> '+time+' | Today</span> </div></div>').fadeIn(5000);
  	$('.write_msg').val('');
	
	$(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);
});
		
	
	});
	
	

});
</script>
