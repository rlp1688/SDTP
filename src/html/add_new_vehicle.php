<?php 
session_start();
include('./dbcon.php');

$str=" ";
$email_edit=" ";

$name = mysqli_real_escape_string($con, trim($_POST['name']));
$v_no = mysqli_real_escape_string($con, trim($_POST['v_no']));
$address = mysqli_real_escape_string($con, trim($_POST['address']));
$mobile_no = mysqli_real_escape_string($con, trim($_POST['mobile']));
$l_no = mysqli_real_escape_string($con, trim($_POST['l_no']));
$typ = mysqli_real_escape_string($con, trim($_POST['type']));
$uname = mysqli_real_escape_string($con, trim($_POST['uname']));
$password = mysqli_real_escape_string($con, trim($_POST['password']));


if (strlen($password) < 10 || 
    !preg_match("/[a-z]/", $password) || 
    !preg_match("/[A-Z]/", $password) || 
    !preg_match("/[0-9]/", $password)) {
    echo "<script>alert('Password must be at least 10 characters long, contain at least one lowercase letter, one uppercase letter, and one number.');</script>";
    echo "<script>document.location='./reg.php'</script>";
    exit(); 
}

$encrypted_password = password_hash($password, PASSWORD_BCRYPT);


$query = mysqli_query($con, "SELECT * FROM view_employee_master WHERE emp_no='$v_no'") or die(mysqli_error($con));

if (mysqli_num_rows($query) > 0) {
  
    echo "<script>alert('Vehicle number already exists. Please use a different number.');</script>";
    echo "<script>document.location='./reg.php'</script>";
} else {
    
    if (mysqli_query($con, "INSERT INTO view_employee_master (emp_name, rep, emp_no, epf_no, mobile, emp_type, uname, password)
    VALUES ('$name', '$l_no', '$v_no', '$address', '$mobile_no', '$typ','$uname', '$encrypted_password')") or die(mysqli_error($con))) {
        echo "<script>document.location='./home.php'</script>";
    } else {
        echo "<script>alert('There was an error while saving the record.');</script>";
    }
}
?>
