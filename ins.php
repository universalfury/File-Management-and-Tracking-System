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
$a=$row1['empname'] ;
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
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="cuser.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i><?php echo"{$row1['empname']}" ?></a>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="form.html">New Entry</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
	<form class="form-inline m-0" action="csearch.php" method="POST">
          <input class="form-control mr-2" autocomplete="off" name="search" type="text" placeholder="Enter File No." >
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
		
    </div>
  </nav>
  <h1 class="main">
    <b><?php if(!$con){
	    echo "Not Connected to server";
        }
        if(!mysqli_select_db($con,'railway')){
        echo 'Not Connected to Database';} 
		$type=$_POST['type'];
		$dept=$_POST['dept'];
		$froms=$_POST['from'];
		$fnum=$_POST['no'];
		$dated=$_POST['date'];
		$sub=$_POST['sub'];
		$brief=$_POST['brief'];
		$sql="INSERT INTO register(type,dept,frm,fnum,dated,sub,brief,inby) VALUES ('$type','$dept','$froms','$fnum','$dated','$sub','$brief','$eid')";
		$k="INSERT INTO dak(fno,ename,date) VALUES ('$fnum','$a',CURRENT_DATE())";
		mysqli_query($con,$k);
		if(!mysqli_query($con,$sql)){
		echo 'Please try again';}
		else{
		echo 'You have successfully submitted the file. The details of the file are:-<br>';}
		$sql="SELECT * FROM register where fnum='$fnum'";
		$result=mysqli_query($con,$sql);
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
                <th>File Number</th>
                <th>Department</th>
                <th>File From</th>
                <th>File Type</th>
                <th>Dated</th>
                <th>Subject</th>
                <th>Brief</th>
				<th>File ID</th>
              </tr>
            </thead>
			<tbody>
            <?php
			while($row=mysqli_fetch_assoc($result))
			{
			?>
			<tr>
				<td><?php  echo"{$row['num']}"?></td>
				<td><?php  echo"{$row['dept']}"?></td>
				<td><?php  echo"{$row['frm']}"?></td>
				<td><?php  echo"{$row['type']}"?></td>
				<td><?php  echo"{$row['dated']}"?></td>
				<td><?php  echo"{$row['sub']}"?></td>
				<td><?php  echo"{$row['brief']}"?></td>
				<td><?php  echo"{$row['fnum']}"?></td>
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