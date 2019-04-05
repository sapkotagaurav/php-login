<?php require 'validate.php'; ?>
<?php require 'db.php';
session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN | TRY</title>
    <link rel="shortcut icon" href="assets/logo.png">
  </head>
  <body>
    <link rel="stylesheet" href="assets/master.css">
    <?php
if (isset($_POST["username"])) {
  $username = validate($_REQUEST['username']);
  $password = validate($_REQUEST['password']);
$query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
$result=mysqli_query($con,$query) or die("MySQL ERROR".mysql_error());
$row = mysqli_num_rows($result);
if ($row==1) {
$_SESSION['username'] = $username;
header("Location: index.php");
}else {
  echo "<div class=\"form1\"><h1>Username or Password Error</h1>";
  echo "GO <a href='login.php'>BACK</a></div>";
}
}else {
     ?>
     <div class="form1">
     <form class="form" action="login.php" method="post">
       <img class="logo" src="assets/logo.png" alt="logo" width="100" height="100"/>
       <br>
       <input type="text" name="username" placeholder="Username" required><br>
       <input type="password" name="password" placeholder="Password" required><br>
       <input type="submit" name="submit" value="LOGIN">

     </form>
      <a href="register.php"><button class="button">REGISTER</button></a>
   </div>
 <?php } ?>
 <div class="footer">
   <p class='t1'>Wolf Team &copy; 2019</p>
 </div>
  </body>
</html>
