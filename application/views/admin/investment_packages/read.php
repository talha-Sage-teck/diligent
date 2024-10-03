<!doctype html>
<html>
    <head>
        <title>codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Investment_packages Read</h2>
        <table class="table">
	    <tr><td>title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>total_percentage_earnings</td><td><?php echo $total_percentage_earnings; ?></td></tr>
	    <tr><td>maturity_duration</td><td><?php echo $maturity_duration; ?></td></tr>
	    <tr><td>referral_comission_type</td><td><?php echo $referral_comission_type; ?></td></tr>
	    <tr><td>referral_comission</td><td><?php echo $referral_comission; ?></td></tr>
	    <tr><td>contract_duration</td><td><?php echo $contract_duration; ?></td></tr>
	    <tr><td>created_date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>withdraw_deduction</td><td><?php echo $withdraw_deduction; ?></td></tr>
	    <tr><td>min_deposit</td><td><?php echo $min_deposit; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('investment_packages') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>