<?php
session_start(); // Start the PHP session to store user data

// initializing variables
$username = "";
$email    = "";
$errors = array(); // Array to hold validation errors

// connect to the database
$db = mysqli_connect('sql311.infinityfree.com', 'if0_36493447', 'Hemanth509h', 'if0_36493447_users');
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // Receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // Form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // First check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // If user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); // Encrypt the password before saving in the database

        $query = "INSERT INTO user (username, email, password) 
                  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username; // Set session variables
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php'); // Redirect to index page after successful registration
        exit();
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // Attempt login if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password); // Encrypt password before comparing with database

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        // If user is found, set session variables and redirect to home page
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
            exit();
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>
