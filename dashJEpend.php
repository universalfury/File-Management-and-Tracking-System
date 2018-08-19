<?php 
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'railway');
session_start();
if(!isset($_SESSION['logged_in'])) 
{ header("Location: blank.html");}
$eid=$_SESSION['eid'];
$s="SELECT empname from employee where empid='$eid' ";
$p="SELECT * FROM register where status='pending' and epid='$eid'";
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
  <link rel="stylesheet" href="theme.css" type="text/css"> </head>
  <style>
.main {
  margin-left: 220px; /* Same as the width of the sidenav */
}
</style>
<script type="text/javascript">
function func(opt)
{
    if (opt == 1)
        document.getElementById('txtText').disabled = false;
    else
        document.getElementById('txtText').disabled = true;
}
function pSubmit()
{
	var textData;
	textData=document.getElementById('remark').value;
	var a=textData.trim();
	var c=a.length();
	alert(c);.
	if(c<=0)
	{
		alert("Please Enter Remarks before returning");
	}
	else
	{
		alert("hi i am inside submit");
		//document.getElementById('formJE').submit();
	}
	
}

    </script> 
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
          <i class="fa d-inline fa-lg fa-user-circle-o"></i><?php echo"{$row1['empname']}" ?></a>
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
    <a href="dashJE.php">New File</a>
    <a href="dashJEpend.php">Pending File</a>
    <a href="JEcomplete.php">Completed File</a>
  </div>
  <br>
  <h1 class="main">
    <b>Pending Files </b>
  </h1>
  <div class="py-5">
    <div class="container main">
      <div class="row">
        <div class="col-md-12 bg-info border border-dark text-center">
          <table class="table">
            <thead>
              <tr>
                <th class="border">S.No.</th>
                <th>File Number</th>
                <th>Department</th>
                <th>Type</th>
                <th>From</th>
                <th>Subject</th>
				<th>File ID</th>
                <th>Brief</th>
                <th> </th>
				<th> </th>
              </tr>
            </thead>
            <tbody>
               <?php
			   $i=1;
			while($row=mysqli_fetch_assoc($result))
			{
			?>
			<tr><form action="" method="post">
				<td><?php  echo"".$i++?></td>
				<td><?php  echo"{$row['num']}"?></td>
				<td><?php  echo"{$row['dept']}"?></td>
				<td><?php  echo"{$row['type']}"?></td>
				<td><?php  echo"{$row['frm']}"?></td>
				<td><?php  echo"{$row['sub']}"?></td>
				<td><?php  echo"{$row['fnum']}"?></td>
				<td><?php  echo"{$row['brief']}"?></td>
				<td><textarea id="remark" rows="2" col="3" placeholder="Comments if any" name="brief" class="form-control"> </textarea></td>
               <td>
			   <button formaction="comp.php" class="btn btn-primary" name="sub">Completed</button></td>  
				<input type="hidden" id="fid" name="filenum" value=<?php  echo"{$row['fnum']}"?>></input>
                <td>
                  <button formaction="acceptc.php" class="btn btn-primary" name="sub1">Return</button></td>  
				  <input type="hidden" id="fid1" name="filenum1" value=<?php  echo"{$row['fnum']}"?>></input>
                </td>
              </form></tr>
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