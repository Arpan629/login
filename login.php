<?php
$login = 0;
$invalid=0;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'index.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    

    $sql = "Select * from `reg` where username = '$username' and password = '$password'";

    $result = mysqli_query($con,$sql);

    if($result){
      $num = mysqli_num_rows($result);
      if($num>0){
        $login = 1;
        session_start();
        $_SESSION['username']=$username;
        header('location:home.php');
      }
      else{
        $invalid = 1;
      }
      
    }
}


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <?php
  if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Sorry </strong> Invalid credintials
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  
  ?>

<?php
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Great! </strong> Login successfully
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  
  ?>

    <div class="container mt-5">
        <h1 class="text-center">Login</h1>
    <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary w-100">Login</button>
</form>
    </div>
  </body>
</html>