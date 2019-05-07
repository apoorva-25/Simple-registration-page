<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>My Sign In Page</title>
    <style>
        .form-text {
            color: red;
        }
    </style>
</head>

<?php
$username_err = "";
$password_err = "";

$url_errors = $_SERVER["QUERY_STRING"];
parse_str(urldecode($url_errors), $get_errors);
if (!empty($get_errors)) {
    $username_err = htmlspecialchars($get_errors["usernameerr"]);
    $password_err = htmlspecialchars($get_errors["passworderr"]);
}
?>

<body>
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-12">
            </div>

            <div class="col-md-6 col-sm-12">
                <h2>Sign In</h2>
                <!-- novalidate disables browser default tooltips. we'll build custom validation with JS -->
                <form class="needs-validation" action="login.php" method="post" novalidate>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username"
                            required>
                        <span class="form-text"><?php echo $username_err; ?></span>
                        <div class="invalid-feedback">
                            Please type in your username.
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                            required>
                        <span class="form-text"><?php echo $password_err; ?></span>
                        <div class="invalid-feedback">
                            Please type in your password.
                        </div>

                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Sign In">
                    </div>

                    <p>Don't have an account? <a href="index.php">Register</a>.</p>

                </form>
            </div>
            <div class="col-md-3 col-sm-12">
            </div>

        </div>

    </div>



    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- <script src="form-validation.js"></script> -->

    <script>
        // Front end form validation
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                        var pwd = document.getElementById('password').value;
                        var pwd_conf = document.getElementById('password_confirmation')
                            .value;
                        if (pwd === pwd_conf) {
                            console.log("matched");
                        } else {
                            console.log("not matched");
                        }

                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>