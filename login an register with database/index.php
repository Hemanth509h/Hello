<?php include('server.php') ?> <!-- Including server-side script for handling form submissions -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="icon" href="IMG_20240504_184057.jpg" type="image/icon" /> <!-- Favicon for the page -->

  <style>
    /* General reset and styling */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Arial", sans-serif;
    }

    /* Body styling */
    body {
      background-color: #121212; /* Dark background color */
      color: #8affa3; /* Light text color */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Full viewport height */
      background: linear-gradient(270deg, #121212, #272727, #121212); /* Gradient background */
      background-size: 600% 600%;
      animation: gradientBackground 8s ease infinite; /* Animated gradient */
    }

    /* Keyframes for gradient animation */
    @keyframes gradientBackground {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    /* Container for the login form */
    .container {
      width: 400px; /* Fixed width for the form container */
      padding: 40px;
      background-color: #1f1f1f; /* Dark background color */
      border-radius: 10px; /* Rounded corners */
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Box shadow for container */
      opacity: 0; /* Initially hidden */
      transform: translateY(200px); /* Slide in animation */
      animation: fadeInUp 0.9s ease-out forwards; /* Fade in and slide up animation */
    }

    /* Keyframes for fadeInUp animation */
    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Heading 2 styling */
    .h2 {
      text-align: center;
      padding-top: 10px;
      margin-bottom: 25px;
      color: #8affa3; /* Light text color */
      letter-spacing: 2px;
    }

    /* Additional information text styling */
    .info {
      text-align: center;
      margin-bottom: 10px;
      color: #8affa3; /* Light text color */
    }

    /* Horizontal rule styling */
    hr {
      width: 260px;
      margin-left: auto;
      margin-right: auto;
      border-color: #333; /* Darker color for horizontal rule */
    }

    /* Form group styling */
    .form-group {
      margin-bottom: 20px;
    }

    /* Label styling */
    label {
      display: block;
      margin-bottom: 10px;
      color: #8affa3; /* Light text color */
      font-size: 18px;
    }

    /* Input field styling */
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      background-color: #333; /* Dark input background */
      color: #8affa3; /* Light text color */
      outline: none;
    }

    /* Submit button styling */
    input[type="submit"] {
      width: 100%;
      padding: 12px;
      font-size: 18px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background-color: #8affa3; /* Light button background */
      color: #121212; /* Dark text color */
      transition: background-color 0.3s ease; /* Smooth transition for background color */
    }

    /* Hover effect for submit button */
    input[type="submit"]:hover {
      background-color: #5cb85c; /* Darker green on hover */
    }

    /* Error message styling */
    .error {
      color: #ff6666; /* Red error message */
      margin-bottom: 10px;
      text-align: center;
    }

    /* Signup link styling */
    .signup-link {
      text-align: center;
      margin-top: 20px;
      color: #8affa3; /* Light text color */
    }

    /* Anchor tag styling within signup link */
    .signup-link a {
      color: #8affa3; /* Light text color */
      text-decoration: none;
      transition: color 0.3s ease; /* Smooth color transition */
    }

    /* Hover effect for signup link */
    .signup-link a:hover {
      color: #5cb85c; /* Darker green on hover */
    }

    /* Responsive design for smaller screens */
    @media (max-width: 480px) {
      .container {
        width: 80%; /* Adjust width for smaller screens */
      }
    }

    /* Additional heading styling */
    h1 {
      padding-top: 0px;
    }

    /* Preloader styling */
    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black background */
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999; /* Higher z-index to overlay all content */
    }

    /* Preloader image styling */
    .preloader-img {
      width: 200px;
      height: 200px;
    }

    /* Loading text styling */
    .p {
      color: #8affa3; /* Light text color */
      font-size: 45px;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <!-- Preloader element -->
  <div id="preloader">
    <img src="Eclipse@1x-0.5s-200px-200px.gif" alt="Loading" /> <!-- Animated loading GIF -->
    <p class="p">Loading....</p> <!-- Loading text -->
  </div>

  <!-- Main section for the login form -->
  <section class="container">
    <div class="info">
      <h1 class="h1">Welcome</h1>
      <p>Enter your login details</p>
    </div>
    <hr /> <!-- Horizontal rule -->

    <!-- Login form -->
    <form method="post" action="index.php" class="form">
      <h1 class="h2">Login</h1>
      <?php include('errors.php'); ?> <!-- Include script to display form validation errors -->

      <!-- Username input field -->
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required /> <!-- Text input for username -->
      </div>

      <!-- Password input field -->
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required /> <!-- Password input -->
      </div>

      <!-- Submit button -->
      <div class="form-group">
        <input type="submit" name="login_user" value="Login" /> <!-- Submit button for login -->
      </div>

      <!-- Signup link -->
      <div class="signup-link">
        <p>Not yet a member? <a href="register.php">Sign up</a></p> <!-- Link to registration page -->
      </div>
    </form>
  </section>

  <!-- JavaScript to handle preloader -->
  <script>
    // Wait for the page to load
    window.addEventListener("load", function () {
      // Select the preloader element
      var preloader = document.getElementById("preloader");
      // Hide the preloader
      preloader.style.display = "none";
    });
  </script>
</body>
</html>
