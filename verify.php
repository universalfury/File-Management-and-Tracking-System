<?php
$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
    echo "Not Connected to server";
}
if(!mysqli_select_db($con,'railway'))
{
    echo 'Not Connected to Database';
} 
$username = $_POST['nm'];
$password = $_POST['pass'];
$sql= "SELECT * FROM employee WHERE empname = '$username' AND empid = '$password' ";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$count=mysqli_num_rows($result);
if($count==1){
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
  $_SESSION['eid']=$password;
  header('location:form.php');
  exit();
  break;
  case 'SE':
  session_start();
  $_SESSION['logged_in']="Active";
  $_SESSION['eid']=$password;
  header('location:SE.php');
  exit();
  break;
  case 'JE':
  session_start();
  $_SESSION['logged_in']="Active";
  $_SESSION['eid']=$password;
  header('location:JE.php');
  exit();
  break;
 }
}else{
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
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="login.html">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Log in</a>
      </div>
	  <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="signup.html">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign up</a>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="contact.html">Contact us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="sidenav" style="overflow: auto; position: absolute; top:178px;right:0;bottom:0;left:0;">
    <a href="about.html">About</a>
    <a href="contact.html">Contact</a>
	<a href="terms.html">Terms and Conditions</a>
  </div>
  <h3 class="main">Login was unsuccessful. Either the Password or the Username was wrong. Please try again with correct login credentials. </h3>
  <br>
  <br>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

</html>
<?php
}
?>