<?php session_start(); ?>
<?php
if (!isset($_SESSION['thanks'])) {
header("Location: register.php");
}else {
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Thank You</title>
     <link rel="shortcut icon" href="assets/logo.png">
   </head>
   <body>
     <link rel="stylesheet" href="assets/master.css">
<div class="form1">
  <h1 class="t1">Thanks <i><?php  echo$_SESSION['thanks']?></i>,<br> Go to your e-mail to be a <strong><b><i><u>WOLF</b></i></u></strong>.</h1>
</div>
<?php } ?>
   </body>
 </html>
