<?php
$user = 0;
$success = 0;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'conct.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    

    $sql = "Select * from `reg` where username = '$username'";

    $result = mysqli_query($con,$sql);

    if($result){
      $num = mysqli_num_rows($result);
      if($num>0){
        // echo "User already exists";
        $user = 1;
      }
      else{
      $sql = "insert into `reg`(username, password) 
      values('$username', '$password')";

      $result = mysqli_query($con,$sql);

      if($result){
          // echo "Data entry successfull";
          $success = 1;
      }
      else{
          die(mysqli_error($con));
      }
      }
    }
}


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

  <?php
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry</strong> User already exists
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  
  ?>

<?php
  if($success){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Great! </strong> Sign up successfully
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      header('location:login.php');
  }
  
  ?>

    <div class="container mt-5">
        <h1 class="text-center">Sign up</h1>
    <form action="index.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary w-100">Sign up</button>
</form>
    </div>
  </body>
</html>