<?php
$con=mysqli_connect('127.0.0.1','root','');
mysqli_select_db($con,'railway');
session_start();
if(!isset($_SESSION['logged_in'])) 
{ header("Location: blank.html");}
$eid=$_SESSION['eid'];
$ename=$_POST['search'];
$s="SELECT empname from employee where empid='$eid' ";
$name=mysqli_query($con,$s);
$row1=mysqli_fetch_assoc($name);
$p="SELECT count(status) as assgn from dak where ename='$ename' and status='new' ";
$p1="SELECT * from dak where ename='$ename' and status='new' ";
$result=mysqli_query($con,$p);
$result1=mysqli_query($con,$p1);
$row2=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css"> </head>
<style>
.accordion {
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
.active, .accordion:hover, .accordion1:hover {
    background-color: #ccc;
}

.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
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
          <i class="fa d-inline fa-lg fa-user-circle-o"></i><?php echo"{$row1['empname']}" ?></a>
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
          <input class="form-control mr-2" name="search" type="text" placeholder="Enter File No." >
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
<h1 class="main">
    <b> Total Files processed by <?php echo $ename?> so far:- </b>
  </h1>
  <form class="form-inline justify-content-center" method="POST" action="erd1.php">
				<input type="hidden" id="search" method="POST" name="search" value="<?php  echo $ename; ?>"></input>
		      <p style="font-size:160%;">
                <b>From:-  </b>
              </p>
            <div class="input-group my-1">
              <input type="date" name="frm" class="form-control mr-5 my-1" placeholder="From Date"> </div>
			  <p style="font-size:160%;">
                <b>To:-  </b>
              </p>
            <div class="input-group my-1">
              <input type="date" name="to" class="form-control" placeholder="To Date" > </div>
			  <button type="Submit" class="main btn btn-secondary" >Search</button>
   </form>
  <button id ="acc" Name="acc" class="main accordion">Files entered so far</button>
  <div class="panel">
   <p><a class="main">
    <div class="container main">
	<div id='printTable2'>
	<p style="font-size:160%;">
	<b>Files entered by the employees so far:-<b>
	<br>
	<p style="text-align:350px;"> Number of files = <?php  echo"{$row2['assgn']}"?> </p>
	</p>
      <div class="row">
        <div class="col-md-10 bg-info border border-dark text-center">
          <table class="table">
            <thead>
              <tr>
                <th>File Number</th>
                <th>File entered by</th>
                <th>Date</th>
                <th>Remark</th>
              </tr>
            </thead>
			<tbody>
            <?php
			while($ro1=mysqli_fetch_assoc($result1))
			{
			?>
			<tr>
				<td><?php  echo"{$ro1['fno']}"?></td>
				<td><?php  echo"{$ro1['ename']}"?></td>
				<td><?php  echo"{$ro1['date']}"?></td>
				<td><?php  echo"{$ro1['remarks']}"?></td>
			</tr>
			<?php 
			}
			?>
			</tbody>
          </table>
        </div>
      </div>
	</div>
	<div class="main">
  <a href="#null" onclick="printContent('printTable2')">Click to print table</a>
  <br>
  <a href="#" onclick="exportTableToExcel('printTable2', 'members-data')">Export Table Data To Excel File</a>
                             
  </div>
  </a></p></div></div>
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>