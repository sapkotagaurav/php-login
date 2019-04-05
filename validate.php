<?php

function validate($value)
{
  require 'db.php';
$value=mysqli_real_escape_string($con,$value);
$value=htmlspecialchars($value);
$value=stripslashes($value);
return $value;
}
 ?>
