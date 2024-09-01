<?php include"includes/parts/header.php"; ?>
	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="doctors" class="doctors" style="margin-top: 100px;">
           <div class="container">
		<?php 
			include('includes/connect.php');
			$user_id=$_GET['doctor_id'];
			$usermetasql="select * from user_meta where user_id='$user_id'";
			$usermetasqlresult=mysqli_query($conn, $usermetasql);
			$usermetarow = mysqli_fetch_array($usermetasqlresult, MYSQLI_ASSOC);
			
			$department_id=$usermetarow['department'];
			$departmentnamesql="select * from departments where department_id='$department_id' ";
			$departmentnamesqlresult=mysqli_query($conn,$departmentnamesql);
			$departmentnamesqlresultrow = mysqli_fetch_array($departmentnamesqlresult);
		?>
        <div class="section-title">
          <h2><?php echo $_GET['user_name'] ?> - <?php echo $usermetarow['user_designation'] ?></h2>
          <p><?php echo $departmentnamesqlresultrow['department_name'] ?></p>
        </div>

        <div class="row">

          <div class="col-lg-12">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="includes/files/<?php echo $usermetarow['profilepic_path']; ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <span><?php echo $usermetarow['user_designation'] ?></span>
                <p><?php echo $usermetarow['short_description'] ?></p>
				<p>Checkup Fees - <?php echo $usermetarow['checkup_fees'] ?></p>
                <div class="social">
                  <a href="<?php echo $usermetarow['twitter_url'] ?>"><i class="ri-twitter-fill"></i></a>
                  <a href="<?php echo $usermetarow['facebook_url'] ?>"><i class="ri-facebook-fill"></i></a>
                  <a href="<?php echo $usermetarow['instagram_url'] ?>"><i class="ri-instagram-fill"></i></a>
                  <a href="<?php echo $usermetarow['linkedin_url'] ?>"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
			<br>
			<?php echo $usermetarow['full_description'] ?>
			</div>

          

        </div>

      </div>
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->

  
<?php include"includes/parts/footer.php"; ?>