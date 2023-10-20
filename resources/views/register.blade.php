<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Register - {{env("APP_NAME")}}</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">


    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/login/util.css">
    <link rel="stylesheet" type="text/css" href="css/login/main.css">

    <!-- Icons FontAwesome 4.7.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  type="text/css" />




</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <form class="login100-form validate-form">
                    <span class="login100-form-title">
                        Member Register
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid user is required">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button id="regbtn" type="button" class="login100-form-btn">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="/login">
                            Login Now
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-pic js-tilt" data-tilt>
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>



    <script src="js/jquery/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })

        $('#regbtn').click(function() {
            $.ajax({
                type: 'POST',
                url: '/api/register',
                data: {
                    name: $('input[name=username]').val(),
                    email: $('input[name=email]').val(),
                    password: $('input[name=pass]').val()
                },
                success: function(data) {
                    document.cookie = "token=" + data.data.access_token.token;
                    window.location.href = '/';
                },
                error: function(data) {
                    alert('Error');
                }
            });
        });
    </script>



</body>
</html>