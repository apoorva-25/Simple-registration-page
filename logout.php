<?php

session_start();

// Clear the variables
$_SESSION = array();

// Kill session
session_destroy();

// Redirect to sign in page
header("location: index_login.php");
exit;