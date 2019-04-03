<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Registration Page</title>
</head>

<body>
    <h2>Sign Up</h2>

    <form action="registration.php" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <span><?php echo $username_err; ?></span>
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <span><?php echo $password_err; ?></span>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
            <span><?php echo $password_confirmation_err; ?></span>
        </div>
        <div>
            <input type="submit" class="btn" value="Submit">
        </div>

    </form>

</body>

</html> 