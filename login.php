<?php include "includes/parts/header.php"; ?>
<main id="main">

  <!-- ======= Appointment Section ======= -->
  <section id="appointment" class="appointment section-bg" style="margin-top: 100px;">
    <div class="container">

      <div class="section-title">
        <h2>Login</h2>
      </div>

      <form action="includes/functions.php" method="post" role="form" class="php-email-form">
        <div class="row">
          <div class="col-md-6 offset-md-3" style="background-color: white; padding: 40px; box-shadow: 0px 0px 15px #888888">
            <div class="col-md-6 offset-md-3">
              <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Your Email" required>
              <div class="validate"></div>
            </div>

            <div class="col-md-6 offset-md-3">
              <input type="password" name="user_password" class="form-control" id="user_password" placeholder="Your Password" required>
              <div class="validate"></div>
            </div>

            <div class="col-md-6 offset-md-3 text-right" style="margin-top: 10px;">
              <a href="forgot_password.php" class="text-danger">Forgot Password?</a>
            </div>

            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <?php
                if (isset($_SESSION['login'])) {
                  if ($_SESSION['login'] == 1) {
              ?>
              <div class="sent-message" style="display: block;">Your account has been login successfully. Thank you!</div>
              <?php } } ?>

              <?php
                if (isset($_SESSION['login'])) {
                  if ($_SESSION['login'] == 0) {
              ?>
              <div class="error-message" style="display: block;">Something went wrong. Please try again. Thank you!</div>
              <?php } }
              ?>
            </div>
            <div class="text-center"><button type="submit" name="login">Login Now</button></div>
          </div>
        </div>
      </form>
      <div style="margin-top: 30px" class="text-center">Want to join us now? <a href="register.php" class="btn btn-danger">Register Now</a></div>
    </div>
  </section><!-- End Appointment Section -->
</main><!-- End #main -->

<?php include "includes/parts/footer.php"; ?>