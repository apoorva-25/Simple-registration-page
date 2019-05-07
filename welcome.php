<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>My Welcome Page</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <h1 style="text-align: center;">
                Welcome
                <strong><?php echo $_SESSION["username"]; ?></strong>, you are logged in!</h1>
        </div>
        <div class="row justify-content-center"><a href="logout.php" class="btn btn-danger">Sign Out</a></div>
    </div>

</body>