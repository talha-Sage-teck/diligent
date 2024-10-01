<?php include('include_header.php'); ?>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 20px;"><b>Dear <?php echo $first_name.' '.$last_name ?>,</b></td>
              </tr>
              <tr>
                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> Thankyou for registering with us.<br />
                  "Please click on the following button or copy paste the link into your browser to activate your account for <?php echo $email ?>." </td>
              </tr>
              <tr>
                <td width="400" style="padding: 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;"><a href="<?php echo site_url('users/activate/'.$id.'/'.$activation_code) ?>" style="border:1px solid #F60; color:#FFF; border-radius:5px; width: 400px; background-color:#e91327; padding:5px 8px; margin:0 auto; text-align: center; display:block; text-decoration:none">Activate you email.</a><br />
                  <br /></td>
              </tr>
              <tr>
                <td>Copy link: <br />
				<?php echo site_url('users/activate/'.$id.'/'.$activation_code) ?></td>
              </tr>
            </table>
<?php include('include_footer.php'); ?>
