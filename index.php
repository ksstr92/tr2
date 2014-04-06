<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
				background-color:#64bbb1;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="css/main.css" />
        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
        <![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src="js/vendor/bootstrap.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
		<div class="container">
		<div class='row '>
		<center>
		<section name=center_logo>
			<div id=logo_bg>
				<div id=log_form>
					<form id=login_form action=val.php method=post>
						<table border=0 id=tbl_fields>
							<tr><td><img src='../imgs/sbs.jpg' /></td><tr>
							<tr><td class=txt>E-mail / I-mail</td></tr>
							<tr><td><input id=input435983 name=em class=log_box type=email value='12037016@imail.sunway.edu.my' required/ ></td></tr>
							<tr><td id=err1 class=error_txt style='display:none;'>Invalid Email</td></tr>
							
							<tr><td class=txt>Password</td></tr>
							<tr><td><input id=input293876 name=pwd class=log_box type=password value='ksstr' required/ ></td></tr>
							<tr><td id=err2 class=error_txt style='display:none;'>Wrong Password</td></tr>
							
							<tr><td><input id=btn_submit type=submit value='L o g i n' /></td></tr>
							<tr><td id=reg_prom>
							<a href='../register'>Not Registered?</a>
							 | 
							<a href='../pwreset'>Forgot Password?</a>
							</td></tr>
						</table>
					</form>
				</div>
			</div>
		</section>
		</center>
		</div>
		</div> <!-- /container -->
		<script>
$('#login_form').submit(function( event ) 
	{
		$.post( "http://localhost/MA/login/val.php", { em: $("#input435983").val(), pwd: $("#input293876").val() }, function (response)
		{
			//alert(response);
			if(response=="eY")
			{
				$("#err1").css('display','block');
				$("#err2").css('display','none');
			}
			else if(response=="eZ")
			{
				$("#err1").css('display','none');
				$("#err2").css('display','block');
			}
			else if(response=="0 ")
			{
				$("#err1").css('display','block');
				$("#err1").html('Incorrect Email/Password');
				$("#err2").css('display','none');
			}
			else if(response=="err1 ")

			{
				$("#err1").css('display','block');
				$("#err1").html('This account was not activated');
				$("#err2").css('display','none');
			}
			else if(response=="err2 ")
			{
				$("#err1").css('display','block');
				$("#err1").html('This account was suspended');
				$("#err2").css('display','none');
			}
			else
			{
				window.location = response;
			}
		});
		event.preventDefault();
	});
		</script>
    </body>
</html>
