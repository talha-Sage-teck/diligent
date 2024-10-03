<?php 
$missing_fields = profile_mendatory_fields();
$missingtxt = '';
if(!empty($missing_fields)){
	foreach($missing_fields as $k => $mf_txt){
		$missingtxt .= '<p class="text-danger">- '.$k.' is required. '.$mf_txt.'</p>';
		}
	}
?>
<?php if($missingtxt != ''){?>
<div class="alert alert-danger"><p class="text-danger"><strong>Profile information required!</strong></p><?php echo $missingtxt?></div>
<?php }?>