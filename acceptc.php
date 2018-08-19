<?php
$no1=$_POST['filenum1'];
$no2=$_POST['brief'];
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
$sql="UPDATE register SET status='returned' WHERE fnum = '$no1'";
$sq="UPDATE register SET comment='$no2' WHERE fnum = '$no1'";
$k="INSERT INTO dak(fno,ename,date,status,remarks) VALUES ('$no1','$a',CURRENT_DATE(),'returned','$no2')";
$m=mysqli_query($con,$sq);
mysqli_query($con,$k);
if(!mysqli_query($con,$sql)){
	echo "Failure";
}
else
{
	header('location:dashJE.php');
}
?>