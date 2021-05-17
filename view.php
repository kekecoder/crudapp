<?php require_once('dbconfig.php');

$sql = $conn->prepare('SELECT * FROM employees ORDER BY created ASC');
$sql->execute();
$crudapp = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
<?php require_once('header.php') ?>
<title>View Page</title>
</head>
<body>
  <?php require_once('nav.php') ?>
  <div class="container-body">
    <div class="container-fluid">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach($crudapp as $i => $app) : ?>
      <th scope="row"><?php echo $i + 1 ?></th>
      <td><?php echo $app['firstname']?></td>
      <td><?php echo $app['lastname']?></td>
      <td><?php echo $app['address']?></td>
      <td><?php echo $app['email']?></td>
      <td><?php echo $app['created']?></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>
    </div>
  </div>
</body>