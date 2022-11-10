<?php
session_start();

session_unset();
session_destroy();

header("location: login.php");

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
   
  </head>
  <body class="p-0 m-0 border-0 bd-example">

  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <!-- <nav class="navbar navbar-dark navbar-expand bg-dark"> -->
      <div class="container-fluid"style width:30vw; >
        <a class="navbar-brand" href="/login.php">ISECURE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./login.php">LOGIN</a>
            </li>
       
            <li class="nav-item">
              <a class="nav-link" href="./signup.php">SIGNUP</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="./logout.php">LOGOUT</a>
            </li>
          <form class="d-flex" role="search">
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>


    <!-- <form >
      <div class="mb-3 my-4">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form> -->
    
    <!-- End Example Code -->
  </body>
</html>