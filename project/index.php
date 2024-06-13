<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="IMG_20240504_184057.jpg" type="image/icon">
    <style>
        * {
            margin: 0px;
            padding: 0px;
            color: aliceblue;
            box-sizing: border-box;
        }

        body {
            background-image: url(https://wallpapersmug.com/download/3840x2160/72a2b5/clouds-fantasy-space-planets.jpg);
            max-width: 100%;
            height: auto;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .parent {
            margin: 205px auto;
            width: 68%;
            display: flex;
            gap: 170px;
        }

        .info {
            text-align: center;
            margin: auto;
            font-size: 40px;
        }

        .color {
            color: #f8b633;
        }

        .header {
            text-align: center;
            font-size: 25px;
        }

        .form {
            width: 30%;
            border: 2px solid #B0C4DE;
            border-radius: 10px;
            padding: 10px;
            margin: auto;
            opacity: 0; 
            animation: fadeIn 0.5s ease-in-out forwards; 
        }

        .form:hover {
            backdrop-filter: blur(4px);
            transition: all 0.5s;
        }

        .input-group {
            margin: 10px 0px;
        }

        .input-group label {
            text-align: left;
            margin: 3px;
            font-size: 18px;
        }

        .input-group input {
            height: 30px;
            width: 93%;
            margin: auto;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
            background-color: transparent;
        }

        .btn {
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #f8b633;
            border: none;
            border-radius: 5px;
        }

        a {
            text-decoration: none;
            color: #f8b633;
            transition: all 0.5s;
        }

        a:hover {
            color: blue;
        }

        p {
            font-size: 16px;
        }

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

        .info {
            opacity: 0;
            animation: fadeInInfo 1s ease-in-out forwards;
        }

        @keyframes fadeInInfo {
            from {
                opacity: 0;
                transform: translateX(-40px); 
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media only screen and (max-width: 767px) {
            * {
                font-size: 8vw;
            }

            body {
                background-image: url(https://wallpaperaccess.com/full/16504.jpg);
            }

            .parent {
                margin: 140px auto;
                width: 80%;
                display: block;
                gap: 800px;
            }

            .info {
                margin: auto;
                margin-bottom: 50px;
            }

            .form {
                width: auto;
            }

            a {
                color: #404bef;
            }
        }

        @media only screen and (min-width: 767px) and (max-width: 1023px) {
            * {
                font-size: 3vw;
            }

            body {
                background-image: url(https://getwallpapers.com/wallpaper/full/5/1/2/299626.jpg);
            }

            .parent {
                margin: 100px auto;
                width: 90%;
                display: flex;
                gap: 120px;
            }
        }

        #preloader {
            background: rgba(0, 0, 0, 0.8);
            height: 100vh;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #preloader img {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <div id="preloader">
        <img src="Eclipse@1x-0.5s-200px-200px.gif" alt="Loading">
        <p class="p">Loading..</p>
    </div>
    <section class="parent">
        <div class="info" id="info">
            <h1><span class="color">-----</span>Welcome<span class="color">-----</span><br>Submit your info</h1>
        </div>
        <form method="post" action="index.php" class="form">
            <div class="header">
                <h2>Login</h2>
            </div>
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username">
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div class="input-group">
                <button type="submit" class="btn" name="login_user">Login</button>
            </div>
            <p>
                Not yet a member? <a href="register.php" class="a">Sign up</a>
            </p>
        </form>
    </section>
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
