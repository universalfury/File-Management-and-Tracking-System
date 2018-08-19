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
$s1="SELECT * FROM employee WHERE emptype='JE'";
$nm=mysqli_query($con,$s1);
$s2="SELECT * FROM employee WHERE emptype='CLK'";
$nme=mysqli_query($con,$s2);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css"> </head>
<style>
.accordion1 {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 75%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}
.active, .accordion1:hover {
    background-color: #ccc;
}

.accordion1:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}
.active:after {
    content: "\2212";
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0px;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>
 <body>
<script type="text/javascript">
<!--
function printContent(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n<HEAD>\n')
newwin.document.write('<TITLE>Print Page</TITLE>\n')
newwin.document.write('<script>\n')
newwin.document.write('function chkstate(){\n')
newwin.document.write('if(document.readyState=="complete"){\n')
newwin.document.write('window.close()\n')
newwin.document.write('}\n')
newwin.document.write('else{\n')
newwin.document.write('setTimeout("chkstate()",2000)\n')
newwin.document.write('}\n')
newwin.document.write('}\n')
newwin.document.write('function print_win(){\n')
newwin.document.write('window.print();\n')
newwin.document.write('chkstate();\n')
newwin.document.write('}\n')
newwin.document.write('<\/script>\n')
newwin.document.write('</HEAD>\n')
newwin.document.write('<BODY onload="print_win()">\n')
newwin.document.write(str)
newwin.document.write('</BODY>\n')
newwin.document.write('</HTML>\n')
newwin.document.close()
}
//-->
</script>
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
          <i class="fa d-inline fa-lg fa-user-circle-o"></i><?php echo"{$ro['empname']}" ?></a>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-md bg-secondary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="SE.php">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
	  <div class="btn-group" >
            <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"> Report </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="cr.php">Complete Report</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="empcr.php">Employee Report</a>
            </div>
          </div>	
      	  <form class="form-inline m-0" action="search.php" method="POST">
          <input class="form-control mr-2" autocomplete="off" name="search" type="text" placeholder="Enter File No." >
          <button class="btn btn-primary" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="sidenav" style="overflow: auto; position: absolute; top:178px;right:0;bottom:0;left:0;">
    <a href="dashSE.php">New Files</a>
    <a href="dashSEpend.php">Pending Files</a>
    <a href="dashSEret.php">Returned File</a>
    <a href="complete.php">Completed File</a>
  </div>
     <h1 class="main" ><br>
	<b> Employees List</b><br><br>
  </h1>
  <button id ="acc1" Name="acc1" class="main accordion1"><b>Junior Employee List</b></button>
  <div class="panel">
  <p><a class="main">
  <div class="container main">
  <div id='pemp'>
      <div class="row">
        <div class="col-md-10 bg-info border border-dark text-center">
          <table class="table" >
            <thead>
              <tr>
                <th>Employee Name</th>
				<th>Employee Type</th>
              </tr>
            </thead>
			<tbody>
            <?php
			while($r1=mysqli_fetch_assoc($nm))
			{
			?>
			<tr>
				<form id="<?php  echo $r1['empname'];?>" action="linkemp.php" method="POST"><td><a href="javascript:document.getElementById('<?php  echo $r1['empname'];?>').submit();">
				<input type="hidden" id="search" method="POST" name="search" value=<?php  echo $r1['empname']; ?>><?php  echo $r1['empname']?></input></td></a></form>
				<td><?php  echo"{$r1['emptype']}"?></td>	
			</tr>
			<?php 
			}
			?>
			</tbody>
          </table>
		  </div>
		  </div>
        </div>	
      </div><table align="center">
	  <div class="main">
  <th><a href="#null" class="main" onclick="printContent('pemp')">Click to print table</a></th>
  </div></table>
  </a></p></div>
  <button id ="acc1" Name="acc1" class="main accordion1"><b>Clerk List</b></button>
  <div class="panel">
<p><a class="main">
  <div class="container main">
  <div id='pclk'>
      <div class="row">
        <div class="col-md-10 bg-info border border-dark text-center">
          <table class="table" >
            <thead>
              <tr>
                <th>Employee Name</th>
				<th>Employee Type</th>
              </tr>
            </thead>
			<tbody>
            <?php
			while($r2=mysqli_fetch_assoc($nme))
			{
			?>
			<?
				$nameemp = $r2['empname'];
			?>
			<tr>
				<form id="<?php  echo $r2['empname']; ?>" action="linkemp1.php" method="POST"><td><a href="javascript:document.getElementById('<?php  echo $r2['empname']; ?>').submit();">
				<input type="hidden" id="search" method="POST" name="search" value="<?echo $nameemp; ?>"><?php  echo $r2['empname']?></input></td></a></form>
				<td><?php  echo"{$r2['emptype']}"?></td>	
			</tr>
			<?php 
			}
			?>
			</tbody>
          </table>
		  </div>
		  </div>
        </div>
      </div><table align="center">
	  <div class="main">
	  <th> <a href="#null" class="main" onclick="printContent('pclk')">Click to print table</a></th>
  </div></table>
  </a></p></div>    
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
var acc = document.getElementsByName("acc");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
var acc = document.getElementsByClassName("accordion1");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
	  document.getElementById('acc').style.maxHeight=panel.scrollHeight + "px";
    } 
  });
}
</script>

 </body>
</html>