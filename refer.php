<?php
    $con=mysqli_connect('127.0.0.1','root','');
	$sqlk= "SELECT * FROM employee WHERE empid = 'echo" ( $_GET['empid'])" ' ";
	$result = mysqli_query($con,$sqlk);
	$row = mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	if($count==1)
	{
		$_SESSION['user']=array(
		'password'=>$row['empid'],
		'username'=>$row['empname'],
		'role'=>$row['emptype']
		);
    $role=$_SESSION['user']['role'];
   switch($role){
  case 'CLK':
  header('location:form.php');
  break;
  case 'SE':
  header('location:dashSE.php');
  break;
  case 'JE':
  header('location:dashJE.php');
  break;
 }
	}
?> 