<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="icon" href="IMG_20240504_184057.jpg" type="image/icon">
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Arial", sans-serif;
        }

        /* Body styles */
        body {
            background-color: #121212;
            color: #8affa3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Background gradient animation */
            background: linear-gradient(270deg, #121212, #272727, #121212);
            background-size: 600% 600%;
            animation: gradientBackground 8s ease infinite;
        }

        /* Gradient animation */
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

        /* Container styles */
        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: #1f1f1f;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            opacity: 0;
            transform: translateY(200px);
            animation: fadeInUp 0.9s ease-out forwards;
        }

        /* Fade in animation */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header styles */
        h2 {
            text-align: center;
            padding-top: 10px;
            margin-bottom: 25px;
            color: #8affa3;
            letter-spacing: 2px;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #333;
            color: #8affa3;
            border-radius: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #8affa3;
        }

        th {
            background-color: #1f1f1f;
            color: #8affa3;
            font-weight: bold;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #1f1f1f;
        }

        tr:hover {
            background-color: #555;
        }

        /* Link styles */
        a {
            text-decoration: none;
            color: #8affa3;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #5cb85c;
        }

        /* Preloader styles */
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
<!-- Preloader element -->
<div id="preloader">
    <img src="Eclipse@1x-0.5s-200px-200px.gif" alt="Loading">
    <p class="p">Loading....</p>
</div>

<!-- Main content section -->
<section class="container">
    <div class="info">
        <h1>Welcome</h1>
        <h2>User List</h2>
    </div>

    <!-- Table to display user data -->
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php
        // Database connection parameters
        $db_host = 'sql311.infinityfree.com';
        $db_user = 'if0_36493447';
        $db_pass = 'Hemanth509h';
        $db_name = 'if0_36493447_users';

        // Connect to the database
        $db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        // Check if connection is successful
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Function to sanitize user input
        function sanitize($data, $db) {
            return mysqli_real_escape_string($db, $data);
        }

        // Delete user if delete action is requested via GET method
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_user'])) {
            $username = sanitize($_GET['username'], $db); // Sanitize username from GET parameter

            // Construct DELETE query
            $query = "DELETE FROM user WHERE username='$username'";

            // Execute query and handle success or failure
            if (mysqli_query($db, $query)) {
                echo "User deleted successfully!";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($db);
            }
        }

        // Fetch all users from the database
        $query = "SELECT * FROM user";
        $result = mysqli_query($db, $query);

        // Check if there are users found
        if (mysqli_num_rows($result) > 0) {
            // Loop through each user and display in table rows
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='?delete_user&username=" . $row['username'] . "'>Delete</a></td>"; // Delete link with username as GET parameter
                echo "</tr>";
            }
        } else {
            // Display message if no users found
            echo "<tr><td colspan='3'>No users found.</td></tr>";
        }

        // Close database connection
        mysqli_close($db);
        ?>
    </table>
</section>

<!-- JavaScript to handle preloader -->
<script>
    // Wait for the page to load
    window.addEventListener('load', function () {
        // Select the preloader element
        var preloader = document.getElementById('preloader');
        // Hide the preloader
        preloader.style.display = 'none';
    });
</script>
</body>
</html>
