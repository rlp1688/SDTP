<?php 
session_start();
include('./dbcon.php');


$name = mysqli_real_escape_string($con, trim($_POST['name']));
$l_no = mysqli_real_escape_string($con, trim($_POST['l_no']));
$mobile = mysqli_real_escape_string($con, trim($_POST['mobile']));
$v_no = mysqli_real_escape_string($con, trim($_POST['v_no']));
$date = mysqli_real_escape_string($con, trim($_POST['date']));
$des = mysqli_real_escape_string($con, trim($_POST['des']));
$loc = mysqli_real_escape_string($con, trim($_POST['loc']));

$edate = date("Y-m-d");
$userid = $_SESSION['vms_id'];


$query = "INSERT INTO accident (name, license_number, mobile, vehicle_number, accident_date, description,location)
    VALUES ('$name', '$l_no', '$mobile', '$v_no', '$date', '$des', '$loc')";

if (mysqli_query($con, $query)) {

    echo "<script type='text/javascript'>alert('Record inserted successfully');</script>";
    echo "<script>document.location='home.php'</script>"; 
} else {

    echo "<script type='text/javascript'>alert('error');</script>";
    echo "<script>document.location='register.php'</script>"; 
}


mysqli_close($con);
?>
