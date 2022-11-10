<?php
$showerrors = false;
$login = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require "./_db_conn.php";
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "Select * from `user1` where username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    $login = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    // if ($_SESSION['loggedin'] == true && isset($_SESSION['loggedin']))// check for already loginned or not  {
    //     $alreadylogin = true;
    //   } else {
    //     $alreadylogin = false;
    //   }
    header("location: welcome.php");
  } 
  else 
  {
    $showerrors = true;
  }
}
?>





<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <title>LOGIN</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .container h1 {
      margin-left: 31vw;
    }

    .m {
      margin-left: 25vw;
    }

    #bt {
      margin-left: 50vw;
    }
  </style>
</head>

<body class="p-0 m-0 border-0 bd-example">

  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
     <!-- <nav class="navbar navbar-dark navbar-expand bg-dark"> --> 
    <div class="container-fluid" style width:30vw;>
      <a class="navbar-brand" href="./welcome.php">ISECURE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./login.php">LOGIN</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./index.php">SIGNUP</a>
          </li>
          <?php
          if($alreadylogin){
         echo' <li class="nav-item">
            <a class="nav-link" href="./logout.php">LOGOUT</a>
          </li>';}
          ?>
          <!-- <form class="d-flex" role="search">
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
      </div>
    </div>
  </nav> 
  <?php

  if ($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS!!!</strong> You have signed in successfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
  // echo "<script>alert('Successfully login!!!');</script>";
  ?>

  <?php
  if ($showerrors) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>FAILED!!!</strong> INVALID CREDENTIALS 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>

  <div class="container">
    <h1>LOGIN PAGE</h1>
  </div>

  <form action="./login.php" method="POST">
    <div class="mb-3 col-md-6 my-4 m">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3 col-md-6 m">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    </div>
    <div class="mb-3 form-check m">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button id="bt" type="submit" class="btn btn-primary">Submit</button>
  </form>

  <!-- End Example Code -->
</body>

</html>