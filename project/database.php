<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User list</title>
       <style>
        /* CSS styles */
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url(https://wallpapersmug.com/download/3840x2160/72a2b5/clouds-fantasy-space-planets.jpg);
            max-width: 100%;
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .all {
            max-width: 80%;
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Box shadow for depth */
            animation: fadeIn 1s ease-in-out forwards; /* Apply fade-in animation */
            opacity: 0; /* Initially set opacity to 0 */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Text shadow for depth */
            font-size: 24px; /* Increased font size */
            padding-bottom: 10px; /* Added padding below heading */
            border-bottom: 1px solid #ccc; /* Border below heading */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden; /* Hide overflow */
            transition: all 0.3s ease; /* Smooth transition */
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s, color 0.3s; /* Smooth transitions */
        }

        th {
            background-color: #f8b633; /* Yellow background for header */
            color: #333;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Alternate row background */
        }

        tr:hover {
            background-color: #ddd; /* Hover background color */
            color: #333; /* Change text color on hover */
        }

        a {
            text-decoration: none;
            color: blue;
            transition: color 0.3s; /* Smooth color transition */
        }

        a:hover {
            color: darkblue; /* Hover color */
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @media only screen and (min-width: 767px) and (max-width: 1023px) {
            .all {
                max-width: 90%; /* Adjusted maximum width */
            }
        }
    </style>
</head>
<body>
<div id="preloader">
        <img src= alt="Loading">
        <p class="p">Loading..</p>
    </div>
    <div class="all">
    <?php
    // Connect to the database
    $db = mysqli_connect('sql311.infinityfree.com', 'if0_36493447', 'Hemanth509h', 'if0_36493447_users');

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Function to sanitize user input
    function sanitize($data, $db) {
        return mysqli_real_escape_string($db, $data);
    }
    // Delete user
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_user'])) {
        $id = sanitize($_GET['id'], $db);

        $query = "DELETE FROM user WHERE id='$id'";
        if (mysqli_query($db, $query)) {
            echo "User deleted successfully!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db);
        }
    }

    // Fetch all users
    $query = "SELECT * FROM user";
    $result = mysqli_query($db, $query);
    ?>
    <h2>User List</h2>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>password</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td><a href='?delete_user&id=" . $row['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found.</td></tr>";
        }
        ?>
    </table>
</div>
<script>
    // Wait for the page to load
    window.addEventListener('load', function () {
        // Select the preloader element
        var preloader = document.getElementById('preloader');
        // Hide the preloader
        preloader.style.display = 'none';
    });
</body>
</html>
