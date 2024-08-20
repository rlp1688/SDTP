<?php session_start();
include('./dbcon.php');

if(isset($_POST['login']))
{

$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];
//$branch_id=$_POST['$branch'];

//echo $user_unsafe;
$user = mysqli_real_escape_string($con,$user_unsafe);
$pass1 = mysqli_real_escape_string($con,$pass_unsafe);


$salt="a1Bz20ydqelm8m1wql";
$pass=$pass1;

date_default_timezone_set('Asia/Manila');

$date = date("Y-m-d H:i:s");
//$ll="select * from view_users_employee_location where username='$user' and password='$pass'" ;
 //  echo $ll;
//SELECT * ,(SELECT branch_name FROM branch WHERE branch_id=users_master.branch_id) AS bname FROM  users_master 
$query=mysqli_query($con,"select * from view_employee_master where uname='$user' and password='$pass' ")or die(mysqli_error($con));
  $row=mysqli_fetch_array($query);
  $counter=mysqli_num_rows($query);

  if ($counter == 0) {
    echo "<script>alert('Invalid Username or Password!');</script>";
    echo "<script>document.location='index.php'</script>";

} elseif ($counter > 0) {
    //$vms_id = $row['id'];
    //$_SESSION['vms_id'] = $vms_id;
    // $officesync_name=$row['username'];
           //$officesync_al=$row['al'];   
          // $officesync_Authority_Des=$row['Authority_Des']; 
          // $officesync_amid=$row['area_manager_id'];  
           //$officesync_dpid=$row['dept_manager_id'];
           //$officesync_st1=$row['staff1_id'];
           //$officesync_st2=$row['staff2_id']; 
           //$officesync_emp_id=$row['emp_id']; 
           //$officesync_loc_id=$row['loc_id'];

          // $auth_id=$row['auth_id'];
   echo "<script>document.location='./home.php'</script>";
}

}  
?>

  
