<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Unigom community</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

    <style>

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    @media (min-width: 992px) {
        .rounded-lg-3 { border-radius: .3rem; }
    }

    </style>

</head>

<body>


<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/L.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" id="login" method="POST" autocomplete="off">
					<span class="login100-form-title text-primary">
						Unigom_community
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<!-- <input class="input100" type="text" name="email" placeholder="Email"> -->
                        <input type="email" class="form-control input100" id="user_email" placeholder="ex:unigom.ac.cd" name="user_email" autocomplete="off" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input type="password" class="form-control input100" id="user_password" placeholder="Password" name="user_password" autocomplete="off" required>
						<!-- <input class="input100" type="password" name="pass" placeholder="Password"> -->
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
                    <button class="w-100 btn btn-lg btn-primary" id="login_button" type="submit">Se connecter</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>





    
<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>

</html>

<script>

function _(element)
{
    return document.getElementById(element);
}

check_login();

function check_login()
{
    fetch('backend/check_login.php').then(function(response){

        return response.json();

    }).then(function(responseData){

        if(responseData.user_name && responseData.image)
        {
            window.location.href = 'chat';
        }

    });
}

// _('register').onsubmit = function(event){
//     event.preventDefault();
// }

// _('register_button').onclick = function(){

//     var form_data = new FormData(_('register'));

//     _('register_button').disabled = true;

//     _('register_button').innerHTML = 'Please Wait...';

//     fetch('backend/register.php', {

//         method:"POST",

//         body:form_data

//     }).then(function(response){

//         return response.json();

//     }).then(function(responseData){

//         _('register_button').disabled = false;

//         _('register_button').innerHTML = 'Register';

//         if(responseData.error != '')
//         {
//             var error = '<div class="alert alert-danger"><ul>'+responseData.error+'</ul></div>';
//             _('register_error').innerHTML = error;
//         }
//         else
//         {
//             _('register_error').innerHTML = '<div class="alert alert-success">' + responseData.success + '</div>';

//             _('register').reset();
//         }

//         setTimeout(function(){

//             _('register_error').innerHTML = '';

//         }, 10000);

//     });

// }

_('login').onsubmit = function(event){
    event.preventDefault();
}

_('login_button').onclick = function(){

    var form_data = new FormData(_('login'));

    _('login_button').disabled = true;

    _('login_button').innerHTML = 'Please Wait...';

    fetch('backend/login.php', {

        method:"POST",

        body:form_data

    }).then(function(response){

        return response.json();

    }).then(function(responseData){

        _('login_button').disabled = false;

        _('login_button').innerHTML = 'Login';

        if(responseData.error != '')
        {
            var error = '<div class="alert alert-danger"><ul>'+responseData.error+'</ul></div>';
            _('login_error').innerHTML = error;
        }
        else
        {
            window.location.href = 'chat';
        }

        setTimeout(function(){

            _('login_error').innerHTML = '';

        }, 10000);

    });

}

let url = window.location.href;

let params = (new URL(url)).searchParams;

if(params.get('msg'))
{
    let param_val = params.get('msg');
    if(param_val == 'success')
    {
        _('login_error').innerHTML = '<div class="alert alert-success">Your Email Successfully Verified, now you can login</div>';
    }
    else
    {
        _('login_error').innerHTML = '<div class="alert alert-info">Wrong URL</div>';
    }

    setTimeout(function(){
        window.location.href = 'index.php';
    }, 5000);
}




</script>