<?php
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'railway');
session_start();
if(!isset($_SESSION['logged_in'])) 
{ header("Location: blank.html");}
$eid=$_SESSION['eid'];
$s="SELECT empname from employee where empid='$eid' ";
$name=mysqli_query($con,$s);
$row1=mysqli_fetch_assoc($name);
$sql="SELECT * FROM register where status='pending' or status='assigned' ";
$result=mysqli_query($con,$sql);

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
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="suser.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i><?php echo"{$row1['empname']}" ?></a>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="SE.php">Home</a>
	  <div class="btn-group" >
            <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"> Report </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="cr.php">Complete Report</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="empcr.php">Employee Report</a>
            </div>
          </div>	
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      	  <form class="form-inline m-0" action="search.php" method="POST">
          <input class="form-control mr-2" autocomplete="off" name="search" type="text" placeholder="Enter File No." >
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="sidenav">
    <a href="dashSE.php">New Files</a>
    <a href="dashSEpend.php">Pending Files</a>
    <a href="dashSEret.php">Returned File</a>
    <a href="complete.php">Completed File</a>
  </div>
  <br>
  <br>
  <div class="carousel-item">
    <img class="d-block img-fluid" src="https://pingendo.github.io/templates/sections/assets/gallery_architecture_2.jpg" data-holder-rendered="true"> </div>
  <div class="carousel-item">
    <img class="d-block img-fluid" src="https://pingendo.github.io/templates/sections/assets/gallery_architecture_3.jpg" data-holder-rendered="true"> </div>
  <h1 class="main">
    <b>Pending Files are:- </b>
  </h1>
  <div class="py-5">
    <div class="container main">
      <div class="row">
        <div class="col-md-12 bg-info border border-dark text-center">
          <table class="table">
            <thead>
              <tr>
			    <th>S.No.</th>
                <th>File Type</th>
                <th>Department</th>
                <th>File From</th>
                <th>File Number</th>
                <th>Dated</th>
                <th>Subject</th>
				<th>File ID</th>
                <th>Brief</th>
                <th>Assigned To</th>
              </tr>
            </thead>
            <tbody>
              <?php
			  $i=1;
			while($row=mysqli_fetch_assoc($result))
			{
			?>
			<tr>
				<td><?php  echo"".$i++?></td>
				<td><?php  echo"{$row['type']}"?></td>
				<td><?php  echo"{$row['dept']}"?></td>
				<td><?php  echo"{$row['frm']}"?></td>
				<td><?php  echo"{$row['num']}"?></td>
				<td><?php  echo"{$row['dated']}"?></td>
				<td><?php  echo"{$row['sub']}"?></td>
				<form id="<?php  echo $row['fnum']; ?>" action="esearch.php" method="POST"><td><a href="javascript:document.getElementById('<?php  echo $row['fnum']; ?>').submit();">
				<input type="hidden" id="search" method="POST" name="search" value=<?php  echo $row['fnum']; ?>><?php  echo $row['fnum']?></input></td></a></form>
				<td><?php  echo"{$row['brief']}"?></td>
				<td><?php  echo"{$row['epid']}"?></td>
			</tr>
			<?php 
			}
			?>
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