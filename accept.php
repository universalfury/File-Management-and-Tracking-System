<?php
$no=$_POST['filenum'];
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'railway');
session_start();
if(!isset($_SESSION['logged_in'])) 
{ header("Location: blank.html");}
$eid=$_SESSION['eid'];
$s="SELECT empname from employee where empid='$eid' ";
$name=mysqli_query($con,$s);
$row1=mysqli_fetch_assoc($name);
$a=$row1['empname'] ;
$sql="UPDATE register SET status='pending' WHERE fnum = '$no'";
$k="INSERT INTO dak(fno,ename,date,status) VALUES ('$no','$a',CURRENT_DATE(),'pending')";

mysqli_query($con,$k);
if(!mysqli_query($con,$sql)){
	echo "Failure";
}
else
{
	header('location:dashJE.php');
}

// while($row=mysqli_fetch_assoc(mysqli_query($con,$sql)))
			// { 
			// echo "{$row['num']}";}

?>