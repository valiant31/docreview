<?php
if (isset($_SESSION["user"])) {
  include("db.php");
  $email = $_SESSION["user"];
  $loginDetailsStmt = $conn->query("SELECT * FROM accounts WHERE email=$email");
  $loginDetailsResult = $loginDetailsStmt->get_result();
  $loginDetailsRow = $loginDetailsResult->fetch_assoc();
  if ($loginDetailsRow["role"] == "Admin") {
    header("Location: admin-home.php");
  }
  if ($loginDetailsRow["role"] == "Requester") {
    header("Location: requester-home.php");
  }
  if ($loginDetailsRow["role"] == "Reviewer") {
    header("Location: reviewer-home.php");
  }
} else {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>SLU Document Review Tracker</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="SLU Document Review Tracker">

  <link rel="icon" type="image/png" href="assets/slu_logo.png">

  <!-- MAIN CSS -->
  <link href="resources/css/styles.css" rel="stylesheet">
</head>

<body>
  <?php
  include("header.html");
  ?>
  <div class="wrapper">
    <span class="icon-close"><ion-icon name="close"></ion-icon></span>
    <div class="form-box login">
      <h2>Login</h2>
      <form action="includes/login.php" method="post">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">Remember me</label>
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="btn" name="login">Login</button>
        <div class="login-register">
          <p>Don't have an account?<a href="#" class="register-link"> Register</a></p>
        </div>
      </form>
    </div>
    <div class="form-box register">
      <h2>Register</h2>
      <form action="#">
        <div class="input-box">
          <span class="icon"><ion-icon name="person"></ion-icon></span>
          <input type="text" required>
          <label>Name</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" required>
          <label>Password</label>
        </div>
        <button type="submit" class="btn">Register</button>
        <div class="login-register">
          <p>Have an account?<a href="#" class="login-link"> Login</a></p>
        </div>
      </form>
    </div>
  </div>

  <!-- HERO SECTION -->
  <section class="hero" id="home">
    <h2>Get your Documents<br>Reviewed for Approval!</h2>
    <p>Document review approval services for<br>Saint Louis University.</p>
    <a href="#request" class="ctas-button">GET STARTED</a>
  </section>

  <!-- REQUEST SECTION -->
  <section class="request" id="request">
    <div class="row">
      <h1>Request</h1>
    </div>
    <div class="row">
      <!-- COLUMN ONE -->
      <div class="column">
        <div class="card">
          <div class="icon-req">
            <ion-icon name="document-attach-outline"></ion-icon>
          </div>
          <h3>Upload Document</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique, est vel tristique dignissim, eros
            dolor pharetra ipsum, id volutpat mauris velit et lorem. Morbi non efficitur libero.</p>
        </div>
      </div>
      <!-- COLUMN TWO -->
      <div class="column">
        <div class="card">
          <div class="icon-req">
            <ion-icon name="add-circle-outline"></ion-icon>
          </div>
          <h3>Select Department</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique, est vel tristique dignissim, eros
            dolor pharetra ipsum, id volutpat mauris velit et lorem. Morbi non efficitur libero.</p>
        </div>
      </div>
      <!-- COLUMN THREE -->
      <div class="column">
        <div class="card">
          <div class="icon-req">
            <ion-icon name="checkmark-done-circle-outline"></ion-icon>
          </div>
          <h3>Approval Review</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tristique, est vel tristique dignissim, eros
            dolor pharetra ipsum, id volutpat mauris velit et lorem. Morbi non efficitur libero.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TRACKER SECTION -->
  <section class="tracker" id="tracker">
    <h2>Tracker</h2>
    <div class="steps">
      <div class="container left-container">
        <div class="icon-track">
          <ion-icon name="people-circle"></ion-icon>
        </div>
        <div class="text-box">
          <h1>Approval of Request</h1>
          <small>1st step</small>
          <p>Your request was sent to the reviewers.</p>
          <span class="left-container-arrow"></span>
        </div>
      </div>
      <div class="container right-container">
        <div class="icon-track">
          <ion-icon name="people-circle"></ion-icon>
        </div>
        <div class="text-box">
          <h1>Reviewed by Departments</h1>
          <small>2nd step</small>
          <p>Your request is still under review.</p>
          <span class="right-container-arrow"></span>
        </div>
      </div>
      <div class="container left-container">
        <div class="icon-track">
          <ion-icon name="people-circle"></ion-icon>
        </div>
        <div class="text-box">
          <h1>Notified of Approval</h1>
          <small>3rd step</small>
          <p>Your request was successfully reviewed.</p>
          <span class="left-container-arrow"></span>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT US SECTION -->
  <section class="about-us" id="about-us">
    <h2>About Us</h2>
    <img src="assets/school.png">
    </div>
  </section>

  <?php
  include("footer.html");
  ?>

  <!-- CUSTOM JS -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="resources/js/script.js"></script>
</body>

</html>