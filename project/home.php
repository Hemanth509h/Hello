<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="icon" href="IMG_20240504_184057.jpg" type="image/icon">
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

    .header {
      text-align: center;
      padding-top: 10px;
      margin-bottom: 25px;
      color: #8affa3;
      letter-spacing: 2px;
    }

    .content {
      text-align: center;
    }

    .content p {
      margin: 20px 0;
    }

    .success {
      color: #3c763d;
      background: #dff0d8;
      border: 1px solid #3c763d;
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 5px;
    }

    .error {
      color: #ff6666;
      margin-bottom: 10px;
      text-align: center;
    }

    .logout-link {
      color: red;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .logout-link:hover {
      color: #ff3333;
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
    <img src="Eclipse@1x-0.5s-200px-200px.gif" alt="Loading">
    <p>Loading....</p>
  </div>
  <section class="container">
    <div class="header">
      <h2>Home Page</h2>
    </div>
    <div class="content">
      <!-- notification message -->
      <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
          <h3>
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
          </h3>
        </div>
      <?php endif ?>

      <!-- logged in user information -->
      <?php if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p><a href="index.php?logout='1'" class="logout-link">Logout</a></p>
      <?php endif ?>
    </div>
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
