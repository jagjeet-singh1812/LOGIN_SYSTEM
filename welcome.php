<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location : login.php");
  exit;
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <title>WELCOME</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    #x {
      text-decoration: none;
    }

    #x:hover {
      color: red;
    }
  </style>
</head>

<body class="p-0 m-0 border-0 bd-example">

  <?php
  // session_start();
  if ($_SESSION['loggedin'] == true && isset($_SESSION['loggedin'])) {
    $alreadylogin = true;
  } else {
    $alreadylogin = false;
  }
  echo '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <!-- <nav class="navbar navbar-dark navbar-expand bg-dark"> -->
      <div class="container-fluid"style width:30vw; >
        <a class="navbar-brand" href="./welcome.php">ISECURE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">';


  if ($alreadylogin == false) {
    echo '
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./login.php">LOGIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./index.php">SIGNUP</a>
            </li>';
  }

  if ($alreadylogin == true) {
    echo '<li class="nav-item">
              <a class="nav-link" href="./logout.php">LOGOUT</a>
            </li>';
  }
  echo '</div>
      </div>
    </nav>';
  ?>
  <div class="alert alert-success py-20 my-10" role="alert">
    <h4 class="alert-heading">Welcome
      <?php echo $_SESSION['username'] ?>!!!
    </h4>
    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so
      that you can see how spacing within an alert works with this kind of content.</p>
    <hr>
    <p class="mb-0">Whenever you need to, be sure to logout <a id="x" href="./logout.php">LOGOUT using this links</a>
    </p>
  </div>

</body>

</html>