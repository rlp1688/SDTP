<?php 
session_start();
include('./dbcon.php');

$str=" ";
$email_edit=" ";


$emp_id= mysqli_real_escape_string($con,trim($_POST['id']));
$name= mysqli_real_escape_string($con,trim($_POST['name']));
$e_no= mysqli_real_escape_string($con,trim($_POST['e_no']));
$rep_no= mysqli_real_escape_string($con,trim($_POST['rep_no']));
$epf_no= mysqli_real_escape_string($con,trim($_POST['epf_no']));
$mobile_no= mysqli_real_escape_string($con,trim($_POST['mobile_no']));
$loc= mysqli_real_escape_string($con,trim($_POST['loc']));
$typ= mysqli_real_escape_string($con,trim($_POST['typ']));

//echo $emp_id;
	
		
	if ( mysqli_query($con,"UPDATE view_employee_master 
          SET emp_name = '$name',
              emp_no = '$e_no',
              rep = '$rep_no',
              epf_no = '$epf_no',
              mobile = '$mobile_no',
              loc_id= '$loc',
              emp_type = '$typ'
          WHERE emp_id = '$emp_id'")or die(mysqli_error($con)))
		{
			echo "<script>document.location='employee.php'</script>"; 
		}		



?>