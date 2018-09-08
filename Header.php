<!DOCTYPE html>
<html>
<title>head</title>
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
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="#Registration.php" class="w3-bar-item w3-button">Registration</a>
  <a href="#Signin.php" class="w3-bar-item w3-button">Sign-in</a>
  <a href="#Home.php" class="w3-bar-item w3-button">Home</a>
  <a href="#bread" class="w3-bar-item w3-button">Bread</a>
  <a href="#pastry" class="w3-bar-item w3-button">Pastry</a>
  <a href="#cakes" class="w3-bar-item w3-button">Cakes</a>
  <a href="#About" class="w3-bar-item w3-button">About</a>
</div>
<!-- Page Content -->
<div class="w3-sand">
  <button class="w3-button w3-sand w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
    <div class="w3-right w3-padding-16"><a href="#" style="text-decoration:none;">Mail</a></div>
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
  }

  function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
  }
  </script>
