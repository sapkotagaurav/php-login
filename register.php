<?php require 'db.php'; ?>
<?php require 'validate.php'; ?>
<?php $error=NULL; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>REGISTER | GAURAV SAPKOTA</title>
    <link rel="shortcut icon" href="assets/logo.png">
  </head>
  <body>
    <link rel="stylesheet" href="assets/master.css">
<?php if (isset($_POST['submit'])) {
$username=validate($_REQUEST['username']);
$password=validate($_REQUEST['password']);
$password2=validate($_REQUEST['password2']);
$email=validate($_REQUEST['email']);
$vkey = md5(time().$username);
if (strlen($username)<5) {
$error="<p class='t1'>Username must be at least 5 Character long</p>";
}elseif ($password!=$password2) {
$error .= "<p class='t1'>Passwords didn't match</p>";
}else{
$date=date("Y-m-d H:i:s");
$query = "INSERT INTO `users` (username,password,email,date,vkey) VALUES ('$username','".md5($password)."','$email','$date','$vkey')";
$result=mysqli_query($con,$query);
if ($result) {
  $subject="Email Verification | WOLF";
  $message="<a href='https://localhost/Try/verify.php?vkey=$vkey'>Verify</a> To become a wolf.<br>Username=$username<br>E-mail=$email";
  $headers ="From: gauravsapkota906@gmail.com \r\n";
  $headers .="MIME-Version: 1.0" . "\r\n";
  $headers .="Content-type:text/html;charset=UTF-8" . "\r\n";
  mail($email,$subject,$message,$headers);
$_SESSION['thanks']=$username;
header("Location: thanks.php");
}
}
}
   ?>
   <div class="form1">
     <?php echo $error; ?>
     <form class="form" action="register.php" method="post">
       <img class="logo" src="assets/logo.png" alt="logo" width="100" height="100"/>
       <br>
       <input type="text" name="username" placeholder="USERNAME" required><br>
       <table class="table">
         <td>       <input type="password" name="password" placeholder="PASSWORD" required>
</td>
         <td><input type="password" name="password2" placeholder="REPEAT PASSWORD" required></td>
       </table>
       <br>
       <input type="email" name="email" placeholder="EMAIL" required ><br>
       <input type="submit" name="submit" value="SUBMIT">
       <p class='t1'>Already have an account?&nbsp;<button type="button" class="button" onclick="location.href='login.php'">Login</button></p>
     </form>

   </div>

 <div class="footer">
   <p class='t1'>Wolf Team &copy; 2019</p>
 </div>
  </body>
</html>
