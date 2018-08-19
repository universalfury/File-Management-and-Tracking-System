<?php 
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'railway');
session_start();
if(!isset($_SESSION['logged_in'])) 
{ header("Location: blank.html");}
$eid=$_SESSION['eid'];
$s="SELECT empname from employee where empid='$eid' ";
$p="SELECT * from employee where empid='$eid' ";
$result=mysqli_query($con,$p);
$name=mysqli_query($con,$s);
$row1=mysqli_fetch_assoc($name);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <h1> Details of the new Entry</h1>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="cuser.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i><?php echo"{$row1['empname']}" ?></a>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-10"> </div>
      <div class="col-md-12">
        <div class="card text-white p-5 bg-primary w-100 h-100 m-2">
          <div class="card-body">
            <h1 class="mb-4" align="center">Enter the details here</h1>
            <form action="ins.php" method="POST">
              <div class="form-group">
                <p style="font-size:160%;">
                  <b>Type</b>
                </p>
				<select name="type" class="form-control">
					<option value="LETTER">LETTER</option>
					<option value="FILE">FILE</option>
					<option value="RTI">RTI</option>
					<option value="CHANGE CARD">CHANGE CARD</option>
					<option value="MASTER">MASTER</option>	
				</select>			
			  </div>
              <div class="form-group">
                <p style="font-size:160%;">
                  <b>Department</b>
                </p>
                <select name="dept" class="form-control">
					<option value="ACCOUNT">ACCOUNT</option>
					<option value="DITC">DITC</option>
				</select>	
              <div>
                <div>
                  <p style="font-size:160%;">
                    <b> From </b>
                  </p>
                  <input type="text" autocomplete="off" placeholder="Enter from where the file is obtained" name="from" class="form-control"> </div>
                <p style="font-size:160%;">
                  <b> Number </b>
                </p>
                <input type="integer" autocomplete="off" placeholder="Enter the file number" name="no" class="form-control"> </div>
              <b>
                <div>
                  <p style="font-size:160%;">
                    <b> Dated </b>
                  </p>
                  <input type="date" autocomplete="off" placeholder="Enter the department" name="date" class="form-control"> </div>
                <div>
                  <p style="font-size:160%;">
                    <b> Subject </b>
                  </p>
                  <input type="text" autocomplete="off" placeholder="Enter the subject of the file" name="sub" class="form-control"> </div>
                <div>
                  <p style="font-size:160%;">
                    <b> Brief </b>
                  </p>
                  <textarea rows="3" col="2" placeholder="Comments if any" name="brief" class="form-control"> </textarea></div>
              </b>
            
          </div>
          <b>
            <div class="row">
              <div class="col-md-12"> </div>
            </div>
            <button type="Submit" class="btn btn-secondary btn-lg btn-block active">Confirm</button></form>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
          </b>
        </div>
        <b> </b>
      </div>
      <b> </b>
    </div>
    <b> </b>
  </div>
  <b> </b>
</body>

</html>