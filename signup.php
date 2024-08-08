<?php 
include $_SERVER['APP'];
include WEB_ROOT.'includes/details.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?=$schoolName?> - Sign Up</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: May 18 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <?php include WEB_ROOT.'includes/header.php';?>

  <main class="main" style="margin-top: 100px;">

    <div class="container">
      <div class="row">
          <div class="col-lg-4 col-md-6 offset-md-3 col-12 offset-lg-4 mt-5">
            <h1 class="text-center mb-3">Sign Up</h1>
            <form action="<?=ROOT_URL?>php/controller/signup.php" method="post" class="mb-5 border p-3" data-aos="fade-up" data-aos-delay="400">
              <div class="row">
                <small class="text-danger mb-2">
                  <?php 
                    if (isset($_SESSION['signup_error'])) {
                      echo $_SESSION['signup_error'];
                      unset($_SESSION['signup_error']);
                    }
                  ?>
                </small>
                <div class="col-12 mb-2">
                  <label for="" class="form-label"> Your fullname</label>
                  <input type="text" name="fullname" class="form-control" required="">
                </div>
                <div class="col-12 mb-2">
                  <label for="" class="form-label"> Your email</label>
                  <input type="email" name="email" class="form-control" required="">
                </div>
                <div class="col-12 mb-2">
                  <label for="" class="form-label"> Your Mat. No</label>
                  <input type="text" name="matNo" class="form-control" required="">
                </div>
                <div class="col-12 mb-2">
                  <label for="" class="form-label"> Select your category</label>
                  <select name="category" id="" class="form-control" required>
                    <option value="">Choose an option</option>
                    <option value="student">Student</option>
                    <option value="staff">Staff</option>
                  </select>
                </div>
                <div class="col-12 mb-2">
                  <label for="" class="form-label">Your password</label>
                  <input type="password" class="form-control" name="password" placeholder="Your password" required="">
                </div>
                <div class="col-12 mb-2">
                  <label for="" class="form-label"> Confirm your password</label> 
                  <input type="password" class="form-control" name="cpassword" required="">
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Signup</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->
      </div>
    </div>


  </main>

  <?php include_once(WEB_ROOT.'includes/footer.php');?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>