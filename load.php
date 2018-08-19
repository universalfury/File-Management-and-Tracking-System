<?php
$con=mysqli_connect('127.0.0.1','root','');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css"> </head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="blank.html">
        <img src="mainlogo.jpg" alt="Logo of Indian Railways">
        <img src="nrlogo.jpg" alt="Logo of Northern Railways"> </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <a class="btn navbar-btn ml-2 text-white btn-secondary">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Logged in</a>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="Blank.html">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="features.html">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="contact.html">Contact us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="sidenav">
    <a href="dashSE.php">New Files</a>
    <a href="dashSEpend.php">Pending Files</a>
    <a href="dashSEret.php">Returned File</a>
    <a href="complete.php">Completed File</a>
  </div>
  <h1 class="main">
    <b><?php if(!$con){
	    echo "Not Connected to server";
        }
        if(!mysqli_select_db($con,'railway')){
        echo 'Not Connected to Database';} 
		$empname=$_POST['enm'];
		$empid=$_POST['emid'];
		$emptype=$_POST['ety'];
		$sql="INSERT INTO employee (empname, empid, emptype) VALUES ('$empname','$empid','$emptype')";
		if(!mysqli_query($con,$sql)){
		echo 'Please try again';}
		else{
		echo 'You have successfully signed in<br>';}

		$sql="SELECT * FROM employee where empid='$empid'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$_SESSION['user']=array(
   'password'=>$row['empid'],
   'username'=>$row['empname'],
   'role'=>$row['emptype']
   );
   $role=$_SESSION['user']['role'];
   switch($role){
  case 'CLK':
  session_start();
  $_SESSION['logged_in']="Active";
  $_SESSION['eid']=$empid;
  header('location:form.php');
  exit();
  break;
  case 'SE':
  session_start();
  $_SESSION['logged_in']="Active";
  $_SESSION['eid']=$empid;
  header('location:dashSE.php');
  exit();
  break;
  case 'JE':
  session_start();
  $_SESSION['logged_in']="Active";
  $_SESSION['eid']=$empid;
  header('location:dashJE.php');
  exit();
  break;
 }
		?>
	</b>
   </h1>
   <div class="py-5">
    <div class="container main">
      <div class="row">
        <div class="col-md-10 bg-info border border-dark text-center">
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Department</th>
                <th>ID</th>
              </tr>
            </thead>
			<tbody>
            <?php
			while($row=mysqli_fetch_assoc($result))
			{
			?>
			<tr>
				<td><?php  echo"{$row['empname']}"?></td>
				<td><?php  echo"{$row['emptype']}"?></td>
				<td><?php  echo"{$row['empid']}"?></td>
			</tr>
			<?php 
			}
			?>
			</tbody>
          </table>
		  <br>
		  <br>
		 </div>
      </div>
    </div>
  </div>		
 <h2 class="main">You should note down your Name and ID for the purpose of Logging-in in the future</h2>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>