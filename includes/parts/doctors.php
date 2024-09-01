<!-- ======= Doctors Section ======= -->
<section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Featured Doctors</h2>
  
        </div>

        <div class="row">
			<?php 
			include('includes/connect.php');
			$checkemailsql="select * from users where user_role='0' AND user_status=1 Limit 4";
			$result=mysqli_query($conn, $checkemailsql);
			$rowcount=mysqli_num_rows($result);
			
			if($rowcount>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$user_id=$row['user_id'];
			$usermetasql="select * from user_meta where user_id='$user_id'";
			$usermetasqlresult=mysqli_query($conn, $usermetasql);
			$usermetarow = mysqli_fetch_array($usermetasqlresult, MYSQLI_ASSOC);
			?>
          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="includes/files/<?php echo $usermetarow['profilepic_path']; ?>" class="img-fluid" alt="" width="150px"></div>
              <div class="member-info">
                <h4><a href="doc-profile.php?doctor_id=<?php echo $user_id; ?>&user_name=<?php echo $row['user_name']; ?>"><?php echo $row['user_name']; ?></a></h4>
                <span><?php echo $usermetarow['user_designation']; ?></span>
                <p><?php echo $usermetarow['short_description']; ?></p>
                <div class="social">
                  <a href="<?php echo $usermetarow['twitter_url']; ?>"><i class="ri-twitter-fill"></i></a>
                  <a href="<?php echo $usermetarow['facebook_url']; ?>"><i class="ri-facebook-fill"></i></a>
                  <a href="<?php echo $usermetarow['instagram_url']; ?>"><i class="ri-instagram-fill"></i></a>
                  <a href="<?php echo $usermetarow['linkedin_url']; ?>"> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
			<?php }
			}else{
				echo'Doctors Not Found';
			}?>

        </div>

      </div>
		<div class="text-center"><a href="doctors.php" class="appointment-btn marginTop50">See More Doctors</a></div>
    </section><!-- End Doctors Section -->
