<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/w3.css">
<link rel="stylesheet" href="CSS/font.css">
<style>
body,head,nav,div,h1,h2,h3,h4,h5,h6,footer {font-family: "Karma", sans-serif;}
.w3-bar-block .w3-bar-item {padding:20px}
body {min-height: 800px;}
</style>
<head>
<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  <a href="Registration.php" onclick="w3_close()" class="w3-bar-item w3-button">Registration</a>
  <a href="#Signin.php" onclick="w3_close()" class="w3-bar-item w3-button">Sign-in</a>
  <a href="Home.php" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>
  <a href="#bread" onclick="w3_close()" class="w3-bar-item w3-button">Bread</a>
  <a href="#pastry" onclick="w3_close()" class="w3-bar-item w3-button">Pastry</a>
  <a href="#cakes" onclick="w3_close()" class="w3-bar-item w3-button">Cakes</a>
  <a href="#About" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
</nav>
<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16"><a href="#" style="text-decoration:none;">Mail</a></div>
    <div class="w3-center w3-padding-16">BlueBerry</div>
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
