<?php session_start(); 

if(isset($_SESSION['user_id'])){?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TeleMedicine - FYP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">telemedicine@gmail.com</a>
        <i class="bi bi-phone"></i> +92 000 0000000
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="../index.php">TeleMedicine</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
		<?php
		if(isset($_SESSION['user_role'])){
			$role=$_SESSION['user_role'];
			?>
          <?php 
			if($role==2){
				
				?>
				
          <li><a class="nav-link scrollto active" href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto " href="dashboard.php">Manage Doctors</a></li>
          <li><a class="nav-link scrollto" href="all-patients.php">Manage Patients</a></li>
          <li><a class="nav-link scrollto" href="departments.php">Manage Departments</a></li>
          <li><a class="nav-link scrollto" href="all-appointments.php">Manage Appointments</a></li>
		  
			<?php }else{ ?>
          <li><a class="nav-link scrollto active" href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto " href="../about-us.php">About</a></li>
          <li><a class="nav-link scrollto" href="../services.php">Services</a></li>
          <li><a class="nav-link scrollto" href="../departments.php">Departments</a></li>
          <li><a class="nav-link scrollto" href="../doctors.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="../contact-us.php">Contact</a></li>
		<?php }}  ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
	<?php
		if(isset($_SESSION['user_role'])){
			$role=$_SESSION['user_role'];
			?>
			
			<?php 
			if($role==0){
				?>
					<a style="background-color:chocolate;" href="../doctors/doctor-profile.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Dashboard</span> </a>
				<?php
			}
			?>
			
			<?php 
			if($role==1){
				?>
				
				<a href="appointment.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>
					<a style="background-color:chocolate;" href="../appointment.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Dashboard</span> </a>
				<?php
			}
			?>
			
			<?php 
			if($role==2){
				?>
					<a style="background-color:chocolate;" href="../admin/dashboard.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Dashboard</span> </a>
				<?php
			}
			?>
			
			<a style="background-color:red;" href="../logout.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Logout</span> </a>
			
			<?php
		}else{
	?>
			<a href="../login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login / Signup</span> </a>
	  
		<?php } ?>
    </div>
  </header><!-- End Header -->
  <?php } else{
	header('location:../index.php');
} ?>