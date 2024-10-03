<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php assets("vendor/bootstrap/css/bootstrap.min.css")?>">
    <link href="<?php assets("vendor/fonts/circular-std/style.css")?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php assets("libs/css/style.css")?>">
    <link rel="stylesheet" href="<?php assets("vendor/fonts/fontawesome/css/fontawesome-all.css")?>">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="https://quotes.diligentgroups.com/login"><img class="logo-img" src="<?php assets("images/logo-main.png")?>" alt="logo" style="
    height: 100%;
    width: 100%;
"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form id="login-frm" action="<?php echo site_url('login/ajax_login')?>" method="POST" novalidate>
					<div class="modal__error alert alert-danger" style="display: none">
					
					</div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username"  name="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
<!--
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
-->
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php assets("vendor/jquery/jquery-3.3.1.min.js") ?>"></script>
    <script src="<?php assets("vendor/bootstrap/js/bootstrap.bundle.js") ?>"></script>
	
	<script>
		$(document).ready(function(){
		$('#login-frm').submit(
		function(e){
			
        e.preventDefault();

        var $form = $(e.target);

        $('input, textarea', $form).removeClass('invalid-feedback');
        $('.invalid-feedback', $form).remove();

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
			dataType: 'json',
            success: function(data) {
				$form.find("input, select, textarea").val("");
                
//                if (data.link) {
//                    location.replace(data.link);
//                } else
				if(data.status == false){
					var errors = data.message;
					$form.addClass('was-validated');
					$.each(errors, function (key, value) {
						var field =  $('input[name="'+ key +'"]');
						if (field.length ) {
							field.addClass('is-invalid')
								.parent()
								.append('<div class="invalid-feedback">'+ value +'</div>');
						} else {
							$('.modal__error', $form).show().html(value);
						}
					});
				}else {
                    window.location.href="<?=site_url()?>"
                }
            },
        });
    
		}
		);
		
	});
	
	</script>
</body>
 
</html>