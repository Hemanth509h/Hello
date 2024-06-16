<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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

    .info {
      text-align: center;
      margin-bottom: 10px;
    }

    .info h1,
    .info h2 {
      color: #8affa3;
    }

    .h2 {
      text-align: center;
      padding-top: 10px;
      margin-bottom: 25px;
      color: #8affa3;
      letter-spacing: 2px;
    }

    hr {
      width: 260px;
      margin: 0 auto;
      border-color: #8affa3;
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
    input[type="email"],
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
    <p class="p">Loading....</p>
  </div>
  <section class="container">
    <div class="info">
      <h1>Welcome</h1>
      <h2>Submit your info</h2>
    </div>
    <hr>
    <form method="post" action="register.php" class="form">
      <div class="h2">
        <h2>Register</h2>
      </div>
      <?php include('errors.php'); ?>
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password_1">
      </div>
      <div class="form-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
      </div>
      <div class="form-group">
        <input type="submit" class="btn" name="reg_user" value="Register">
      </div>
      <p class="signup-link">
        Already a member? <a href="index.php">Sign in</a>
      </p>
    </form>
  </section>
  <script>
    window.addEventListener('load', function () {
      var preloader = document.getElementById('preloader');
      preloader.style.display = 'none';
    });
  </script>
</body>

</html>
