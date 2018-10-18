<!DOCTYPE html>
<?php
include ('connection.php');
session_start();
if(isset($_POST['btnLogin'])){
  $username = $_POST['Username'];
  $password = md5($_POST['Password']);
  $query = "SELECT * from user WHERE user_name ='$username'
            AND user_pwd = '$password'";
  $query_run = mysqli_query($con, $query);
    if(mysqli_num_rows($query_run)>0){
      echo '<script type="text/javascript">alert("Login Successful")</script>';
      $_SESSION['Username'] = $username;
    }
    else{
      echo '<script type="text/javascript">alert("Wrong Username or Password")</script>';
    }
}
if(isset($_POST['btnSignOut'])){
  session_unset();
  session_destroy();

}
?>
<html>
<title>Blueberry</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/w3.css">
<link rel="stylesheet" href="CSS/font.css">
<style>
body,head,nav,div,h1,h2,h3,h4,h5,h6,footer {font-family: "Karma", sans-serif;}
.w3-bar-block .w3-bar-item {padding:20px}
body {min-height: 800px;}
a{text-decoration:none;}
</style>
<head>
<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right w3-animate-left" style="display:none; z-index:5;width:25% " id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <?php
  if(isset($_SESSION['Username']) && !empty($_SESSION['Username'])){
  echo<<<HTML
  <span class="w3-bar-item w3-button">{$_SESSION['Username']}</span>
HTML;
    }
  else{
    echo<<<HTML
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button">Register</button>
HTML;
    }
   ?>

    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
          <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          </div>
          <form name="signupform" class="w3-container" action="Home.php" method="POST" onsubmit="return signup(this);">
            <div class="w3-section">
              <label><b><sup style="color:red;">*</sup>Username:</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="Username" id="Username" required>
              <label><b><sup style="color:red;">*</sup>Password:</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="Password" id="Password" required>
              <label><b><sup style="color:red;">*</sup>Re-Confirm Password:</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Re-enter Password" name="RePassword" id="RePassword" required>
              <label><b><sup style="color:red;">*</sup>Email:</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Email" name="Email" id="Email" required>
              <input type="submit" name="btnSignup" id="btnSignup" value="Register" class="w3-button w3-block w3-green w3-section w3-padding"></input>
            </div>
          </form>
          <?php
          if(isset($_POST['btnSignup']))
          {
            $username = $_POST['Username'];
            $password = md5($_POST['Password']);
            $email = $_POST['Email'];
            $query = "SELECT * from user WHERE user_name='$username '";
            $query_run = mysqli_query($con, $query);
              if(mysqli_num_rows($query_run)>0){
                echo '<script type="text/javascript">alert("User already exists. Try another user name") </script>';
              }
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo '<script type="text/javascript">alert("Write a valid email address.")</script>';
              }

              else{
                $query = "INSERT INTO user(user_name, user_pwd, user_email) VALUES('$username','$password','$email')";
                $query_run = mysqli_query($con,$query);
                echo '<script type="text/javascript">alert("Sign-Up Completed") </script>';
              }
          }
          ?>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>
    </div>
  </div>
  <?php
    if(isset($_SESSION['Username']) && !empty($_SESSION['Username'])) {
      echo<<<HERE
      <form method="POST" action="Home.php">
        <button type="submit" name="btnSignOut" id="btnSignOut" class="w3-bar-item w3-button">Sign-out</button>
      </form>
HERE;
    } else {
      echo<<<HERE
      <button onclick="document.getElementById('id02').style.display='block'" class="w3-bar-item w3-button">Sign-in</a></button>
HERE;
    }
  ?>
  <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;
        </span>
      </div>
      <form name="loginform" class="w3-container" action="Home.php" method="POST">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="Username" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="Password" required>
          <input type="submit" class="w3-button w3-block w3-green w3-section w3-padding" name="btnLogin" id="btnLogin" value="Login"></input>
        </div>
      </form>
      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
        <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
      </div>

    </div>
  </div>

  <a href="Home.php" class="w3-bar-item w3-button">Home</a>
  <a href="Food.php?id=1" class="w3-bar-item w3-button">Bread</a>
  <a href="Food.php?id=3" class="w3-bar-item w3-button">Pastry</a>
  <a href="Food.php?id=2" class="w3-bar-item w3-button">Cakes</a>
<?php
  if(isset($_SESSION['Username']) && !empty($_SESSION['Username'])){
    if($_SESSION['Username']=="Admin"){
      echo<<<html
      <a href="upload_image.php" class="w3-bar-item w3-button">Upload</a>
html;
    }
  }
?>
  <a href="#About" class="w3-bar-item w3-button">About</a>
</div>
<!-- Page Content -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay">
</div>
<div class="w3-sand">
  <button class="w3-button w3-sand w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <div class="w3-right w3-padding-16"><a href="#" style="text-decoration:none;"></a></div>
    <div class="w3-center we-padding-16 w3-xlarge"><a href="Home.php">Blueberry</a></div>
  </div>
</div>
<!--Top Menu-->
<div class="w3-top">
 <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">

 </div>
</div>
</head>
<body>

  <script>
  // Script to open and close sidebar
  function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
  }

  function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
  }

  function signup(){
    var password = document.getElementById("Password");
    var repassword = document.getElementById("RePassword");
    if(repassword.value != password.value){
      alert ("Password must be the same");
      return false;
    }
    else{
      return true;
      }
  }
  </script>
</body>
