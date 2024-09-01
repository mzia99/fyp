<?php include"includes/parts/header.php"; ?>

	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg"  style="margin-top: 100px;">
      <div class="container">

        <div class="section-title">
          <h2>Register</h2>
        </div>

        <form action="includes/functions.php" method="post" class="php-email-form">
          <div class="row">
            <div class="col-md-6 offset-md-3" style="background-color:White ;  padding:30px ; box-shadow: 0px 0px 15px #888888">
			<div class="col-md-6 offset-md-3">
              <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Your Name"  required>
              <div class="validate"></div>
            </div>
			
            <div class="col-md-6 offset-md-3">
              <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Your Email" required>
              <div class="validate"></div>
            </div>
			
			<div class="col-md-6 offset-md-3">
              <input type="text" name="user_phone" class="form-control" id="user_phone" placeholder="Your Phone Number" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-6 offset-md-3">
              <input type="text" name="user_password" class="form-control" id="user_password" placeholder="Your Password" >
              <div class="validate"></div>
            </div>
			
			<br>
			<div class="col-md-6 offset-md-3">
              <div class="form-check">
				  <input class="form-check-input" type="radio" name="user_type" value='0' id="doctor" checked>
				  <label class="form-check-label" for="doctor">
					Doctor
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="user_type" value='1' id="patient" >
				  <label class="form-check-label" for="patient">
					Patient
				  </label>
				</div>
            </div>
           </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
			<?php
				if(isset($_SESSION['register'])){
					if($_SESSION['register']==1){
			?>
            <div class="sent-message" style="display:block;">Your account has been sent successfully. Please <a href="/login.php">Login</a> Now Thank you!</div>
					<?php } }
			?>
			
			<?php
				if(isset($_SESSION['register'])){	

					if($_SESSION['register']==0){				
			?>
            <div class="error-message" style="display:block;">Something Went Wrong.Please Try Again. Thank you!</div>
					<?php }
				
				if($_SESSION['register']==2){				
			?>
            <div class="error-message" style="display:block;">Email Already Exist.Please Try Another Email. Thank you!</div>
					<?php }
					
					}
			?>
			
			
          </div>
          <div class="text-center"><button type="submit" name="register">Create Your Free Account Now</button></div>
        </form>

		<br><br><br><br>
		<div class="text-center">Want to Login Now?  <a href="login.php" class="btn btn-danger">Login Now</a></div>

      </div>
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->


<?php include"includes/parts/footer.php"; ?>