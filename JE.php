<?php
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'railway');
session_start();
if(!isset($_SESSION['logged_in'])) 
{ header("Location: blank.html");}
$eid=$_SESSION['eid'];
$s="SELECT empname from employee where empid='$eid' ";
$name=mysqli_query($con,$s);
$ro=mysqli_fetch_assoc($name);
$s="SELECT count(status) as newc from register where status='assigned'";
$sql="SELECT count(status) as pendc from register where status='pending'";
$k="SELECT count(status) as retc from register where status='completed' ";
$result=mysqli_query($con,$s);
$res=mysqli_query($con,$sql);
$re=mysqli_query($con,$k);
$row=mysqli_fetch_assoc($result);
$row1=mysqli_fetch_assoc($res);
$row2=mysqli_fetch_assoc($re);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css"> </head>
<style>
.main {
  margin-left: 220px; /* Same as the width of the sidenav */
}
</style>
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
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="user.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i><?php echo"{$ro['empname']}" ?></a>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="JE.php">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      </div>
  </nav>
  <div class="sidenav">
    <a href="dashJE.php">New Files<span class="badge badge-success"></a>
    <a href="dashJEpend.php">Pending Files</a>
    <a href="JEcomplete.php">Completed File</a>
  </div>
  <h1 class="main">
    <b> Activity since your last login:- </b>
  </h1>
  <div class="py-5">
    <div class="container main">
      <div class="row">
        <div class="col-md-10 bg-info border border-dark text-center">
          <table class="table">
            <thead>
              <tr>
			    <th><a href="dashJE.php">New Files</a></th>
				<th><a href="dashJEpend.php">Pending Files</a></th>
				<th><a href="JEcomplete.php">Completed Files</a></th>
			  </tr>
            </thead>
			<tbody>
            <tr>
				<td><?php  echo"{$row['newc']}"?></td>
				<td><?php  echo"{$row1['pendc']}"?></td>
				<td><?php  echo"{$row2['retc']}"?></td>
				
			</tr>
			</form>
			</tbody>
          </table>
        </div>
      </div>
    </div>
  </div>			
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>