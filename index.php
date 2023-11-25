<?php
  //TODO Session Handling
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>SLU Document Review Tracker</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="SLU Document Review Tracker">

  <!-- Main css -->
  <link href="styles.css" rel="stylesheet">
</head>

<body>

  <!-- Navigation Bar -->
  <header>
    <img class="logo" src="assets/slu_logo.png" alt="logo">
    <nav>
      <a href="#home">Home</a>
      <a href="#request">Request</a>
      <a href="#track">Tracker</a>
      <a href="#about-us">About Us</a>
      <a href="#contact">Contact</a>
      <div class="animation start-home"></div>
    </nav>
    <button class="cta-button">Login</button>
  </header>

  <!-- Login/Register -->
  <div class="wrapper">
    <span class="icon-close"><ion-icon name="close"></ion-icon></span>
    <div class="form-box login">
      <h2>Login</h2>
      <form action="include/login.php" method="post">
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
    <a href="#document_review" class="cta-button">GET STARTED</a>
  </section>

  </section>

  <footer>
    <p><b>Transerv - 9488AB - IT312/312L - 1st Semester AY 2023 - 2024</b>
      <br>
      IT Department
      <br>
      School of Accountancy, Management, Computing and Information Studies
      <br>
      Saint Louis University
    <p>
  </footer>

  <!-- Custom JS -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="script.js"></script>
</body>

</html>