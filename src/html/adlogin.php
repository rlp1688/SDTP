<?php session_start();
include('./dbcon.php');

if(isset($_POST['login']))
{

$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];

$user = mysqli_real_escape_string($con,$user_unsafe);
$pass1 = mysqli_real_escape_string($con,$pass_unsafe);


$salt="a1Bz20ydqelm8m1wql";
$pass=$pass1;

date_default_timezone_set('Asia/Manila');

$date = date("Y-m-d H:i:s");

$query=mysqli_query($con,"select * from auth where username='$user' and password='$pass' ")or die(mysqli_error($con));
  $row=mysqli_fetch_array($query);
  $counter=mysqli_num_rows($query);

  if ($counter == 0) {
    echo "<script>alert('Invalid Username or Password!');</script>";
    echo "<script>document.location='adminlogin.php'</script>";

} elseif ($counter > 0) {
   
   echo "<script>document.location='./admin.php'</script>";
}

}  
?>

  
