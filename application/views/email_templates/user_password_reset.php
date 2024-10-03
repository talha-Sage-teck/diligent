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
                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                    You told us you forgot your password. If you really did, click here to choose a new one:
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;"><a href="<?php echo site_url('login/reset_password/'.$forgotten_password_code) ?>" style="border:1px solid #F60; color:#FFF; background-color:#F60; padding:5px 8px; margin:0 auto; text-align: center; display:block; text-decoration:none">Reset your password</a><br />
<br />

                                </td>
                            </tr>
                            <tr>
                            <td>If you didn't mean to change your password, then you can just ignore this email; your password will not change.</td>
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