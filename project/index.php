<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="icon" href="IMG_20240504_184057.jpg" type="image/icon" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Arial", sans-serif;
      }

      body {
        background-color: #121212;
        color: #8affa3;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(270deg, #121212, #272727, #121212);
        background-size: 600% 600%;
        animation: gradientBackground 8s ease infinite;
      }

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

      .container {
        width: 400px;
        padding: 40px;
        background-color: #1f1f1f;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(200px);
        animation: fadeInUp 0.9s ease-out forwards;
      }

      @keyframes fadeInUp {
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .h2 {
        text-align: center;
        padding-top: 10px;
        margin-bottom: 25px;
        color: #8affa3;
        letter-spacing: 2px;
      }

      .info {
        text-align: center;
        margin-bottom: 10px;
        color: #8affa3;
      }

      hr {
        width: 260px;
        margin-left: auto;
        margin-right: auto;
      }

      .form-group {
        margin-bottom: 20px;
      }

      label {
        display: block;
        margin-bottom: 10px;
        color: #8affa3;
        font-size: 18px;
      }

      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: #333;
        color: #8affa3;
        outline: none;
      }

      input[type="submit"] {
        width: 100%;
        padding: 12px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        background-color: #8affa3;
        color: #121212;
        transition: background-color 0.3s ease;
      }

      input[type="submit"]:hover {
        background-color: #5cb85c;
      }

      .error {
        color: #ff6666;
        margin-bottom: 10px;
        text-align: center;
      }

      .signup-link {
        text-align: center;
        margin-top: 20px;
        color: #8affa3;
      }

      .signup-link a {
        color: #8affa3;
        text-decoration: none;
        transition: color 0.3s ease;
      }

      .signup-link a:hover {
        color: #5cb85c;
      }

      @media (max-width: 480px) {
        .container {
          width: 80%;
        }
      }

      h1 {
        padding-top: 0px;
      }

      #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
      }

      .preloader-img {
        width: 200px;
        height: 200px;
      }

      .p {
        color: #8affa3;
        font-size: 45px;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <div id="preloader">
      <img src="Eclipse@1x-0.5s-200px-200px.gif" alt="Loading" />
      <p class="p">Loading....</p>
    </div>
    <section class="container">
      <div class="info">
        <h1 class="h1">Welcome</h1>
        <p>Enter your login details</p>
      </div>
      <hr />
      <form method="post" action="index.php" class="form">
        <h1 class="h2">Login</h1>
        <?php include('errors.php'); ?>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <div class="form-group">
          <input type="submit" name="login_user" value="Login" />
        </div>
        <div class="signup-link">
          <p>Not yet a member? <a href="register.php">Sign up</a></p>
        </div>
      </form>
    </section>
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
