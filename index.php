<?php 
require_once('dbconfig.php');

define('ERROR', "CANNOT BE LEFT BLANK");
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

if (!$lastname){
  $errorMsg['lastname'] = ERROR;
}

if (!$address) {
  $errorMsg['address'] = ERROR;
}

if (!$email) {
  $errorMsg['email'] = ERROR;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errorMsg['email'] = 'Invalid Email Address';
}
if(empty($errorMsg)){
  //inserting into database
  $sql = $conn->prepare("INSERT INTO employees(firstname, lastname, address, email, created) VALUES(:firstname, :lastname, :address, :email, :created)");
  $sql->bindValue(':firstname', $firtname);
  $sql->bindValue(':lastname', $lastname);
  $sql->bindValue(':address', $address);
  $sql->bindValue(':email', $email);
  $sql->bindValue(':created', date('Y-m-d H:i:s'));
  $sql->execute();
  
  header('Location: view.php');
}
}


?>
<?php require_once('header.php'); ?>
    <title>crud app</title>
  </head>
  <body>
    <?php require_once('nav.php'); ?>
  <div class="container-body">
    <div class="container">
      <form method="post" action="<?php echo ($_SERVER['PHP_SELF']) ?>" novalidate>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" name="firstname" class="form-control <?php echo isset($errorMsg['firstname']) ? 'is-invalid' : '' ?>" placeholder="First Name">
              <small class="invalid-feedback">
                <?php echo $errorMsg['firstname'] ?? '' ?>
              </small>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="lastname" class="form-control <?php echo isset($errorMsg['lastnsme']) ? 'is-invalid' : ''?>" placeholder="Last Name">
              <small class="invalid-feedback">
                <?php echo $errorMsg['lastname'] ?? '' ?>
              </small>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" class="form-control <?php  echo isset($errorMsg['address']) ? 'is-invalid' : ''?>" placeholder="Enter Your House Address">
              <small class="invalid-feedback">
                <?php echo $errorMsg['address'] ?? '' ?>
              </small>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control <?php  echo isset($errorMsg['email']) ? 'is-invalid' : ''?>" placeholder="Email Address">
              <small class="invalid-feedback">
                <?php echo $errorMsg['email'] ?? '' ?>
              </small>
            </div>
          </div>
        </div>
        <button class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  </body>
</html>