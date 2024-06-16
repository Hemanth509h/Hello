<?php
session_start(); // Start PHP session

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first"; // Set message for non-logged in users
  header('location: login.php'); // Redirect to login page
  exit(); // Stop further execution
}

// Logout functionality
if (isset($_GET['logout'])) {
  session_destroy(); // Destroy session data
  unset($_SESSION['username']); // Unset username session variable
  header("location: login.php"); // Redirect to login page after logout
  exit(); // Stop further execution
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="icon" href="IMG_20240504_184057.jpg" type="image/icon" />

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
      background-color: #121212;
      /* Dark background color */
      color: #8affa3;
      /* Light text color */
      display: flex;
      flex-direction: column;
      align-items: center;
      height: 100vh;
      /* Full viewport height */
      background: linear-gradient(270deg, #121212, #272727, #121212);
      /* Gradient background */
      background-size: 600% 600%;
      animation: gradientBackground 8s ease infinite;
      /* Animated gradient */
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

    /* Navigation bar styling */
    nav {
      width: 95%;
      background-color: #272727;
      /* Dark background color */
      text-align: center;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      border-radius: 20px;
      margin-top: 20px;
    }

    /* Logo styling */
    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      width: 50px;
      height: auto;
      margin-right: 10px;
      border-radius: 50%;
    }

    /* Navigation links styling */
    nav ul {
      list-style: none;
      display: flex;
    }

    nav ul li {
      margin: auto 15px;
    }

    nav ul li a {
      color: #8affa3;
      /* Light text color */
      text-decoration: none;
      font-size: 18px;
      transition: color 0.3s ease;
      /* Smooth color transition */
    }

    nav ul li a:hover {
      color: #6cff9c;
      /* Lighter green on hover */
    }

    /* Profile icon and logout button styling */
    .profile {
      position: relative;
      display: inline-block;
    }

    .profile-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #8affa3;
      /* Light green */
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }

    .profile-icon svg {
      width: 24px;
      height: 24px;
      fill: #272727;
      /* Dark background color */
    }

    .logout-button {
      display: none;
      position: absolute;
      top: 50px;
      right: 0;
      background-color: #1f1f1f;
      /* Dark background color */
      color: #8affa3;
      /* Light text color */
      padding: 10px;
      border-radius: 5px;
      text-align: center;
    }

    .profile:hover .logout-button {
      display: block;
      /* Show logout button on profile hover */
    }

    /* Container for main content */
    .container {
      width: 400px;
      padding: 40px;
      background-color: #1f1f1f;
      /* Dark background color */
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      /* Shadow effect */
      opacity: 0;
      transform: translateY(200px);
      /* Slide in animation */
      animation: fadeInUp 0.9s ease-out forwards;
      margin-top: 13%;
      /* Adjusted top margin */
    }

    /* Keyframes for fadeInUp animation */
    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Header styling */
    .header {
      text-align: center;
      padding-top: 10px;
      margin-bottom: 25px;
      color: #8affa3;
      /* Light text color */
      letter-spacing: 2px;
    }

    /* Content section styling */
    .content {
      text-align: center;
    }

    .content p {
      margin: 20px 0;
    }

    /* Success message styling */
    .success {
      color: #3c763d;
      /* Green text color */
      background: #dff0d8;
      /* Light green background */
      border: 1px solid #3c763d;
      /* Green border */
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 5px;
    }

    /* Error message styling */
    .error {
      color: #ff6666;
      /* Red error message */
      margin-bottom: 10px;
      text-align: center;
    }

    /* Logout link styling */
    .logout-link {
      color: red;
      /* Red logout link */
      text-decoration: none;
      transition: color 0.3s ease;
      /* Smooth color transition */
    }

    .logout-link:hover {
      color: #ff3333;
      /* Lighter red on hover */
    }

    /* Preloader styling */
    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      /* Semi-transparent black background */
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      /* Higher z-index to overlay all content */
    }

    .preloader-img {
      width: 200px;
      height: 200px;
    }

    .p {
      color: #8affa3;
      /* Light text color */
      font-size: 45px;
      margin-top: 10px;
    }

    /* Media query for screens with a maximum width of 480px */
    @media (max-width: 480px) {
      nav {
        align-items: flex-start;
        padding: 10px;
      }

      .logo {
        margin-bottom: 10px;
      }

      nav ul {
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
      }

      nav ul li {
        margin: 10px 0;
      }

      nav ul li a {
        font-size: 16px;
        /* Smaller font size for mobile */
      }

      .profile-icon {
        width: 30px;
        height: 30px;
        margin-top: 10px;
      }

      .profile-icon svg {
        width: 18px;
        height: 18px;
      }

      .container {
        width: 90%;
        /* Adjusted width for smaller screens */
        padding: 20px;
        margin-top: 20%;
        /* Adjusted top margin */
      }

      .header h2 {
        font-size: 24px;
        /* Larger font size for header */
      }

      .content p {
        font-size: 16px;
        /* Smaller font size for content */
      }

      .logout-button {
        right: -10px;
        /* Adjusted right position */
      }

      nav ul {
        display: none;
        /* Hide navigation links by default */
      }

      .show-nav ul {
        display: block;
        /* Show navigation links when show-nav class is applied */
      }

      .show-nav .logout-button {
        display: block !important;
        /* Ensure logout button is visible on mobile */
      }
    }
  </style>
</head>

<body>
  <!-- Preloader element -->
  <div id="preloader">
    <img src="Eclipse@1x-0.5s-200px-200px.gif" alt="Loading" />
    <p>Loading....</p>
  </div>

  <!-- Navigation bar -->
  <nav id="navbar">
    <div class="logo">
      <img src="IMG_20240504_184057.jpg" alt="Portfolio Logo" />
      <h1>P Hemanth Kumar</h1>
    </div>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="">About</a></li> <!-- Placeholder link for About page -->
      <li><a href="projects.php">Projects</a></li> <!-- Link to Projects page -->
      <li><a href="contact.php">Contact</a></li> <!-- Link to Contact page -->
    </ul>

    <!-- Profile icon and logout button -->
    <div class="profile" id="profile">
      <div class="profile-icon" id="profileIcon">
        <!-- Profile icon SVG -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path
            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
        </svg>
      </div>
      <div class="logout-button" id="logoutButton">
        <!-- Logout link -->
        <a href="index.php?logout='1'" class="logout-link">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Main content section -->
  <section class="container">
    <div class="header">
      <h2>Home Page</h2>
    </div>
    <div class="content">
      <!-- Display success message if set in session -->
      <?php if (isset($_SESSION['success'])): ?>
        <div class="success">
          <h3>
            <?php
            echo $_SESSION['success']; // Display success message
            unset($_SESSION['success']); // Unset success message from session
            ?>
          </h3>
        </div>
      <?php endif ?>

      <!-- Display username if logged in -->
      <?php if (isset($_SESSION['username'])): ?>
        <p>Welcome <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
      <?php endif ?>
    </div>
  </section>

  <!-- JavaScript to handle preloader and profile dropdown -->
  <script>
    // Wait for DOM content to be fully loaded
    document.addEventListener("DOMContentLoaded", function () {
      var preloader = document.getElementById("preloader");
      preloader.style.display = "none"; // Hide preloader once content is loaded

      var profileIcon = document.getElementById("profileIcon");
      // Toggle navigation links visibility on profile icon click
      profileIcon.addEventListener("click", function () {
        document.getElementById("navbar").classList.toggle("show-nav");
      });
    });
  </script>
</body>

</html>