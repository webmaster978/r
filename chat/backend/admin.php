<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

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

    <main>
        <h1 class="visually-hidden">Heroes examples</h1>

        <!-- <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Chat Application in PHP using Vanilla JavaScript</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">This is PHP Chat Application project in which we have first time use Vanilla JavaScript in place of jQuery library. In complete System we will use Vanilla JavaScript for all validation and Ajax operation for build real time chat application in PHP & MySQL Database with Vanilla JavaScript.</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="#register" class="btn btn-primary btn-lg px-4 gap-3">Register</a>
                    <a href="#login" class="btn btn-outline-secondary btn-lg px-4">Login</a>
                </div>
            </div>
        </div> -->

        <div class="b-example-divider"></div>

        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row g-lg-5 py-5">
                <!-- <div class="col-md-10 mx-auto col-lg-6">
                    <span id="login_error"></span>
                    <form class="p-4 p-md-5 border rounded-3 bg-light" id="login" method="POST" autocomplete="off">
                        <h1 class="display-6 fw-bold mb-4 text-center">Login</h1>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="user_email" placeholder="name@example.com" name="user_email" autocomplete="off" required>
                            <label for="user_email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="user_password" placeholder="Password" name="user_password" autocomplete="off" required>
                            <label for="user_password">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" id="login_button" type="submit">Login</button>
                    </form>
                </div> -->
                <div class="col-md-10 mx-auto col-lg-6">
                    <span id="register_error"></span>
                    <form class="p-4 p-md-5 border rounded-3 bg-light" id="register" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <h1 class="display-6 fw-bold mb-4 text-center">Inscription</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="user_first_name" placeholder="First Name" name="user_first_name" required autocomplete="off">
                                    <label for="user_first_name">Nom</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="user_last_name" placeholder="Last Name" name="user_last_name" required autocomplete="off">
                                    <label for="user_last_name">Postnom</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="user_email" placeholder="name@example.com" name="user_email" autocomplete="off" required>
                            <label for="user_email">Adresse mail</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="user_password" placeholder="Mot depasse" name="user_password" autocomplete="off" required>
                            <label for="user_password">Password</label>
                        </div>
                        <div class="mb-3">

                            <input type="file" name="user_image" id="user_image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                            
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" id="register_button" type="submit">Inscrire</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="b-example-divider"></div>

    </main>

</body>

</html>

<script>

function _(element)
{
    return document.getElementById(element);
}

// check_login();

// function check_login()
// {
//     fetch('check_login.php').then(function(response){

//         return response.json();

//     }).then(function(responseData){

//         if(responseData.user_name && responseData.image)
//         {
//             window.location.href = 'chat.html';
//         }

//     });
// }

_('register').onsubmit = function(event){
    event.preventDefault();
}

_('register_button').onclick = function(){

    var form_data = new FormData(_('register'));

    _('register_button').disabled = true;

    _('register_button').innerHTML = 'Please Wait...';

    fetch('register.php', {

        method:"POST",

        body:form_data

    }).then(function(response){

        return response.json();

    }).then(function(responseData){

        _('register_button').disabled = false;

        _('register_button').innerHTML = 'Register';

        if(responseData.error != '')
        {
            var error = '<div class="alert alert-danger"><ul>'+responseData.error+'</ul></div>';
            _('register_error').innerHTML = error;
        }
        else
        {
            _('register_error').innerHTML = '<div class="alert alert-success">' + responseData.success + '</div>';

            _('register').reset();
        }

        setTimeout(function(){

            _('register_error').innerHTML = '';

        }, 10000);

    });

}

_('login').onsubmit = function(event){
    event.preventDefault();
}

_('login_button').onclick = function(){

    var form_data = new FormData(_('login'));

    _('login_button').disabled = true;

    _('login_button').innerHTML = 'Please Wait...';

    fetch('login.php', {

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
            window.location.href = 'chat.html';
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