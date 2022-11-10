<?php
$showalert = false;
$showerrors = false;
$showuserror=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require "./_db_conn.php";
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  if ($cpassword != $password) { // check for password 
    $showerrors = true;
    // $hash=password_hash($password,PASSWORD_DEFAULT);
  }
  $exitsql = "SELECT * FROM `user1` WHERE username ='$username'";
  $result = mysqli_query($conn, $exitsql); // check for if already a data exist inthe database
  $rowsexit = mysqli_num_rows($result); // this return number of rows corresponding the query run
  if ($rowsexit > 0) {
    // $exist = true;
    $showuserror = true;
  } else {
    // $exist = false;
    if (($cpassword == $password)) //&& $exist == false) //condits for insertion in database to take place
    {
      $sql = "INSERT INTO `user1` ( `username`, `password`, `date`) VALUES ( '$username', '$password', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showalert = true;
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <title>LOGIN PAGE</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      overflow-x: hidden;
    }

    .nav {
      color: white;
    }

    .d-flex {
      position: relative;
      left: 56vw;
    }

    /* @media (max-width:992px){
        .d-flex{
    position: relative;
     left: 12vw;
        } */
    /* } */
    .form {
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .container {
      width: 30vw;
      margin: auto;
    }

    #bt {
      margin-left: 25vw;
    }

    .m {
      margin-left: 12vw;
    }
  </style>
</head>

<body class="p-0 m-0 border-0 bd-example">

  <!-- Example Code -->


  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <!-- <nav class="navbar navbar-dark navbar-expand bg-dark"> -->
    <div class="container-fluid">
      <a class="navbar-brand" href="./login.php">ISECURE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./login.php">LOGIN</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="./signup.php">SIGNUP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./logout.php">LOGOUT</a>
          </li>
          <!-- <form class="d-flex" role="search">
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->
      </div>
    </div>
  </nav>
  <?php
  if ($showalert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS!!!</strong> You have signed in successfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  // session_start();
  header("location: login.php");
}

  else if ($showerrors)
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>FAILED!!!</strong> PASSWORD DOESNOT MATCH
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

  else if ($showuserror)
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>SORRY!!!</strong> USER ALREADY EXISTS
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  ?>
  <div class="container">
    <h1>WELCOME TO SIGNUP</h1>
  </div>

  <form class="row g-3 my-6  m" action="./index.php" method="POST">
    <div class="col-md-6 py-20  m">
      <label for="username" class="form-label">USERNAME</label>
      <input type="text" name="username" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-7  m">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4">
    </div>
    <div class="col-md-7 m">
      <label for="cpassword" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="cpassword">
    </div>
    <div class="col-7 m">
      <label for="inputAddress" class="form-label">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>

    <div class="col-md-7 m">
      <label for="inputCity" class="form-label">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="col-md-4 m">
      <label for="inputState" class="form-label">State</label>
      <select id="inputState" class="form-select">
        <option selected>Choose...</option>
        <option>MAHARASHTRA</option>
        <option>DELHI</option>
        <option>GUJRAT</option>
        <option>PUNJAB</option>
      </select>
    </div>
    <div class="col-md-2 m">
      <label for="inputZip" class="form-label">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
    <div class="col-12 m">
      <button id="bt" type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </form>

  <!-- End Example Code -->
</body>

</html>S
