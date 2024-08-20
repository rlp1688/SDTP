<?php


$con = mysqli_connect("localhost","root","","attendance");


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  date_default_timezone_set("Asia/Colombo"); 
?>