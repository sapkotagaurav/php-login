<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verify</title>
    <link rel="shortcut icon" href="assets/login.php">
  </head>
  <body>
    <link rel="stylesheet" href="assets/master.css">
    <div class="form1">
<?php
if (isset($_GET['vkey'])) {
$vkey=$_GET['vkey'];
$result= $con->query("SELECT verified,vkey FROM users WHERE verified 0 and vkey='$vkey'");
if ($result->num_rows ==1) {
$update = $con->query("UPDATE users SET verified=1 WHERE vkey ='$vkey' LIMIT 1");
if ($update) {
echo "<h1 class='t1>Account is Verified<br>You may <a href='login.php'>Login</a> now.</h1>";
}
}else{
  echo "Already Verified";
}
}else{
  echo "Something Went Wrong";
}
 ?>
</div>
   </body>
 </html>
