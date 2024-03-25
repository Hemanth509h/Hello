<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <style type="text/css">
    * {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
  background-image: url("home-img.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}
.header{
  text-align: center;
}
form{
  width:30%;
  margin-top:125px;
align-content: center;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 10px 10px 10px 10px;
  float: right;
  
}
.info{
  font-size: 40px;
  color: white;
  float: left;
  text-align: center;
   margin:20% auto;
}
.color{
  color:#f8b633 ;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #f8b633;
  border: none;
  border-radius: 5px;
}
.parent{
  width: 65%;
margin:80px auto;
height: 70%;
}

.child{
  vertical-align: middle;
}</style>
<section class="parent">
 <section class="child">
 <div class="info" id="info">
    <h1><span class="color">-----</span>Well come<span class="color">-----</span></h1>
    <h2>Submit your info</h2>
  </div ></section>
 <section class="child"> 
  <form method="post" action="login.php">
    <div class="header"><h2>Login</h2></div>
        <?php include('errors.php'); ?>
        <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" >
        </div>
        <div class="input-group">
                <label>Password</label>
                <input type="password" name="password">
        </div>
        <div class="input-group">
                <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p>
                Not yet a member? <a href="register.php">Sign up</a>
        </p>
  </form></section></section>
</body>
</html>