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
        <img src="mainlogo.jpg" alt="Logo of Indian Railways">
        <img src="nrlogo.jpg" alt="Logo of Northern Railways"> </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent"> </div>
    </div>
  </nav>
  <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
            <div class="card-body">
			<h1 class="mb-4" >Sign-up form</h1>
			  <form method="POST" action="load.php" onsubmit="return validate(this);">
			  <div class="form-group">
              <p style="font-size:160%;">
                <b>Name</b>
              </p>
              <input type="text" autocomplete="off" placeholder="Enter Your Name" name="enm" class="form-control" required="required">
			  <p style="font-size:160%;">
              <b>ID</b>
			  <input type="text" autocomplete="off" placeholder="Enter Your ID" name="emid" class="form-control" required="required">
			  </p>
			  <p style="font-size:160%;">
                <b>Type</b>
              </p>
			  <select name="ety" class="form-control">
					<option value="SE">Senior</option>
					<option value="JE">Junior</option>
					<option value="CLK">Clerk</option>
			  </select>
			  </div>
			  </div>
			   <div class="row">
              <div class="col-md-12"> </div>
            </div>
            <button type="Submit" class="btn btn-secondary btn-lg btn-block active">Confirm</button></form>
			</div>
          </div>
        </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </script>
<script type="text/javascript">
function validate(form) {
  var re = /^[a-z,A-Z, ]+$/i;

  if (!re.test(form.enm.value)) {
    alert('Please enter only letters from a to z in the username');
    return false;
  }
}
</script>
    </div>
  </div>
</body>

</html>