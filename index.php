<?php include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Trying</title>
  </head>
  <body>
Welcome <?php echo $_SESSION['username'] ?><br>
<a href="logout.php">Logout</a>
  </body>
</html>
