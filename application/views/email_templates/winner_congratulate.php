<?php include('include_header.php'); ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td><img src="<?php echo base_url('assets/public/images/email_images/edited48365.jpg') ?>" width="600" /></td>
  </tr>
  <tr>
    <td align="center" style="color: #153643; font-family: 'Times New Roman', Times, serif; font-size: 20px;"><br /><br /><b>Congratulations! <?php echo $first_name.' '.$last_name ?>,</b></td>
  </tr>
  <?php if($win_position < 4 ){ // show message to top 3 winners?>
  <tr>
  <td align="center" style="color: #153643; font-family: Arial, sans-serif; font-size: 20px;">You won on <?php echo $win_position ?> position.</td>
  </tr>
  <?php }?>
  <tr>
    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> 
    We congratulate you on winning the gift. <br />
    
    You have won "<strong><?php echo $title ?></strong>" in the raffle. 
    </td>
  </tr>
  <tr>
    <td style="padding: 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;">
    
    Please check the address entered in the profile is correct, otherwise you will miss the gift. If you want to change the address within 1 day of winning, you can also do so. After the gift is processed, address can not be changed.
    <br /><br />
    <br />
    <center><strong style="color:#C30">New scheme will be coming soon, keep in touch with the raffle panel. Now you will be able to enroll in new schemes. Good Luck!</strong></center> </td>
  </tr>
  
</table>
<?php include('include_footer.php'); ?>
