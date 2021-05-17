<?php 

define('ERROR', "CANNOT BE LEFT BLANK")
$errorMsg = [];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
$firtname = htmlspecialchars(stripcslashes($_POST['firstname']));
$lastname = htmlspecialchars(stripcslashes($_POST['lastname']));
$address = htmlspecialchars(stripcslashes($_POST['address']));
$email = htmlspecialchars(stripcslashes($_POST['email']));
# VALIDATION
if (!$firtname) {
  $errorMsg['firstname'] = ERROR;
}

if(!$lastname){
  $errorMsg['lastname'] = ERROR;
}

if (!$address) {
  $errorMsg['address'] = ERROR;
}

if (!$email) {
  $errorMsg['email'] = ERROR;
} elseif (filter_var($email, FILTER_VALIDATE_EMAI)) {
  $errorMsg['email'] = 'Invalid Email Address';
}
if(empty($errorMsg)){
  
}
}


?>

<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="crudapp.css">
    <title>crud app</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
  <div class="container-body">
    <div class="container">
      <form method="post">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" name="firstname" class="form-control" placeholder="First Name">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="lastnsme" class="form-control" placeholder="Last Name">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control" placeholder="Enter Your House Address">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="emaik" class="form-control" placeholder="Email Address">
            </div>
          </div>
        </div>
        <button class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  </body>
</html>