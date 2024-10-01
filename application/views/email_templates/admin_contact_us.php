<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 10px 0 30px 0;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="border: 1px solid #cccccc; border-collapse: collapse;">
                <tr>
                    <?php include('include_header.php'); ?>
                </tr>
                <tr>
                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 20px;">
                                    <b>Dear Admin,</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                    <table width="100%" border="0">                                 
  <tr>
    <td align="left" scope="col">Full Name</td>
    <td scope="col"><?php echo $full_name ?></td>
  </tr>
  <tr>
    <td align="left" scope="col">Email</td>
    <td scope="col"><?php echo $email ?></td>
  </tr>
  <tr>
    <td align="left" scope="col">Subject</td>
    <td scope="col"><?php echo $subject ?></td>
  </tr>
  <tr>
    <td align="left" scope="col">Message</td>
    <td scope="col"></td>
  </tr>
  <tr>
    <td scope="col" colspan="2"><?php echo nl2br($message) ?></td>
  </tr>
                                  </table>
 
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                    We'd be glad to assist you
                                    <br>
                                    My Coin Pay Team
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <?php include('include_footer.php'); ?>
                </tr>
            </table>
        </td>
    </tr>
</table>