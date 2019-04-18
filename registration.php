<?php

// Calling the configuration file to connect to the database
require_once "config.php";

// Initialise vars
$username = "";
$password = "";
$password_confirmation = "";

// Initialise error vars
$username_err = "";
$password_err = "";
$password_confirmation_err = "";

// Processing the form data before submitting to database
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //  Username processing
    // Check if username has been filled in
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username!";
    } else {
        // Building a select query
        $db = "SELECT id FROM users WHERE username = ?";

        // Prepare statement
        if ($stmt = $mysqli->prepare($db)) {

            // Define parameter
            $username_param = trim($_POST["username"]);

            // Bind parameters to the prepared statement
            $stmt->bind_param("s", $username_param);

            // Execute statement
            if ($stmt->execute()) {
                // Store the result
                $stmt->store_result();

                // Checking if username is alerady taken
                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken. Please choose another.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Something went wrong! Please try again later. username taken";
            }

            // Closing statement
            $stmt->close();
        } else {
            // echo "Username check failed";
        }
    }
    // echo $username_err;

    // Password processing
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Password must be at least 8 characters long.";
    } else {
        $password = trim($_POST["password"]);
        // echo "password accepted";
    }
    // echo $password_err;

    // Password confirmation
    if (empty(trim($_POST["password_confirmation"]))) {
        $password_confirmation_err = "Please confirm password.";
    } elseif ((trim($_POST["password_confirmation"]) != $password) && (empty($password_err))) {
        $password_confirmation_err = "Password did not match.";
    } else {
        $password_confirmation = trim($_POST["password_confirmation"]);
    }
    // echo $password_confirmation_err;



    // Insert into database if there are no errors
    if (empty($username_err) && empty($password_err) && empty($password_confirmation_err)) {

        // Prepare statement for pushing to db
        $db = "INSERT INTO users (username, password) VALUES (?, ?)";

        if ($stmt = $mysqli->prepare($db)) {

            // Define params
            $username_param = $username;
            $password_param = password_hash($password, PASSWORD_DEFAULT); // hashing

            //Bind params
            $stmt->bind_param("ss", $username_param, $password_param);

            // Execute statement
            if ($stmt->execute()) {
                // echo "Registered";
               
            } else {
                echo "Something went wrong! Please try again later.";
            }
            // Closing statement
            $stmt->close();
        }
    }
    else {
        $url_errors = urlencode("usernameerr=".$username_err."&passworderr=".$password_err."&passwordconferr=".$password_confirmation_err);
        $location = "index.php?".$url_errors;
        $mysqli->close(); // close db because errors
        header("location: $location");
    }

    // Close db connection
    $mysqli->close();
    // echo "You posting";
} else {
    echo "You are not posting";
}
