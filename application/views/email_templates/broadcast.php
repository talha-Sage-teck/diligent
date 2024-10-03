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
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 14px;">
                                    <b>Dear <?php echo $member_name ?>,</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                   <?php echo $messagebody ?>
                                   
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