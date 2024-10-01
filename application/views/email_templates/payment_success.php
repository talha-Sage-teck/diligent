<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td style="padding: 10px 0 30px 0;"><table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="border: 1px solid #cccccc; border-collapse: collapse;">
        <tr>
          <?php include('include_header.php'); ?>
        </tr>
        <tr>
          <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"><table border="0" cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 20px;"><b>Dear <?php echo $first_name.' '.$last_name ?>,</b></td>
              </tr>
              <tr>
                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"><p>Your payment for gift is received, following are the detail of payment:</p>
                  <table width="400" border="0">
                    <tr>
                      <th align="left">Paid Amount:</th>
                      <td align="left"><?php echo show_price($amount) ?></td>
                    </tr>
                    <tr>
                      <th align="left">Payment Gateway:</th>
                      <td align="left"><?php echo $gateway ?></td>
                    </tr>
                    <tr>
                      <th align="left">Transaction ID</th>
                      <td align="left"><?php echo $trans_id ?></td>
                    </tr>
                  </table>
                  <small>*Please your Transaction ID safe for any payment disputes.</small>
                  </td>
              </tr>
              <tr>
                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> We'd be glad to assist you <br>
                  PeasyGifts Team </td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <?php include('include_footer.php'); ?>
        </tr>
      </table></td>
  </tr>
</table>
