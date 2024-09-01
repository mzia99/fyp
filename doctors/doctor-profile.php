<?php include"header.php"; ?>
	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg"  style="margin-top: 100px;">
      <div class="container">

        <div class="section-title">
          <h2>Hi, <?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></h2>
          <p>Please fill out all the required field. (After Verification Process You Profile will start listing on website. )</p>
        </div>

		<?php 
		include('../includes/connect.php');
		
			$user_id=$_SESSION['user_id'];
			$checksql="select * from user_meta where user_id='$user_id'";
			$result=mysqli_query($conn, $checksql);
			$rowcount=mysqli_num_rows($result);
			if($rowcount>0){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		?>
        <form action="../includes/functions.php" method="post" enctype="multipart/form-data" class="php-email-form">
          <div class="row">
            
			<div class="col-md-12 form-group">
				<label><b>Your Designation</b></label>
              <input type="text" name="user_designation" class="form-control" value="<?php echo $row['user_designation']; ?>" id="user_designation" placeholder="Your Designation"  required>
              <div class="validate"></div>
            </div> 
			<div class="col-md-12 form-group">
				<label><b>Department</b></label>
				<select name="department" id="department" class="form-select" >
			  
                <option value="">Select Department</option>
					<?php 
						$departmentsql="select * from departments Order By department_name ASC";
						$departmentresult=mysqli_query($conn,$departmentsql);
						$departmentrowcount=mysqli_num_rows($departmentresult);
						
						if($departmentrowcount>0){
							while($departmentrow = mysqli_fetch_array($departmentresult, MYSQLI_ASSOC)){
							$selected=0;
							$department=$row['department'];
							$check=$departmentrow['department_id'];
							if($department==$check){
								$selected=1;
							}
							?>
							
								<option value="<?php echo $departmentrow['department_id']; ?>" <?php if($selected==1){echo'selected';} ?>><?php echo $departmentrow['department_name']; ?></option>
							<?php 
							}
						} 
					?>
              </select>
            </div>
			
			
            <div class="col-md-12 form-group mt-3 mt-md-0">
              
			  <label><b>Short Description</b></label>
			  <textarea class="form-control" name="short_description" id="short_description" placeholder="" required><?php echo $row['user_designation']; ?></textarea>
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group mt-3 mt-md-0">
             
			 <label><b>Full Description(Add Info About Experiences,hospitals etc)</b></label>
			 <textarea class="form-control" name="full_description" id="full_description"  placeholder="" required><?php echo $row['full_description']; ?></textarea>
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
			<label><b> Check Up Fees (In Ruppees)</b></label>
              <input type="text" name="checkup_fees" class="form-control" id="checkup_fees"  value="<?php echo $row['checkup_fees']; ?>" placeholder="Your Checkup Fees" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
			<label><b> Your Facebook ID</b></label>
              <input type="text" name="facebook_url" class="form-control" id="facebook_url"  value="<?php echo $row['facebook_url']; ?>" placeholder="Your Facebook ID" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
			<label><b>Your Twitter ID </b></label>
              <input type="text" name="twitter_url" class="form-control" id="twitter_url" value="<?php echo $row['twitter_url']; ?>" placeholder="Your Twitter ID" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
			<label><b>Your Instagram ID </b></label>
              <input type="text" name="instagram_url" class="form-control" id="instagram_url" value="<?php echo $row['instagram_url']; ?>" placeholder="Your Instagram ID" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
			<label><b> Your Linkedin ID</b></label>
              <input type="text" name="linkedin_url" class="form-control" id="linkedin_url" value="<?php echo $row['linkedin_url']; ?>" placeholder="Your Linkedin ID" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
              
			  <label><b> Upload Documents(Zip File)</b></label>
			  <input type="file" name="documents" class="form-control" id="documents" >
				<?php if(isset($row['documents_path'])){
				if($row['documents_path']!=''){
				?>
				Already Added Documents - <a href="../includes/files/<?php echo $row['documents_path']; ?>" target="_blank"> View Documents</a> 
				<?php }}?>
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
              
			  <label><b> Upload Profile Picture</b></label>
			  <input type="file" name="profilepic" class="form-control" id="Profilepic" >
			  
			Already Added  - <img src="../includes/files/<?php echo $row['profilepic_path']; ?>" width="100px"> 
              <div class="validate"></div>
            </div>
			
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
			<?php
				if(isset($_SESSION['profile'])){
					if($_SESSION['profile']==1){
			?>
            <div class="sent-message" style="display:block;">Data Added successfully!</div>
					<?php } }
					UNSET($_SESSION['profile']);
			?>
			
			<?php
				if(isset($_SESSION['profile'])){	

					if($_SESSION['profile']==0){				
			?>
            <div class="error-message" style="display:block;">Something Went Wrong.Please Try Again.</div>
					<?php }
							
					}
					UNSET($_SESSION['profile']);
			?>
			
			
          </div>
          <div class="text-center"><button type="submit" name="updateprofile">Update Profile</button></div>
        </form>
		
		
			<?php } else{
				?>
				 <form action="../includes/functions.php" method="post" enctype="multipart/form-data" class="php-email-form">
			<div class="row">
            
			<div class="col-md-12 form-group">
			<label><b>Your Designation</b></label>
              <input type="text" name="user_designation" class="form-control" id="user_designation" placeholder="Your Designation"  required>
              <div class="validate"></div>
            </div>
			
            <div class="col-md-12 form-group mt-3 mt-md-0">
              Short Description<textarea class="form-control" name="short_description" id="short_description" placeholder="" required></textarea>
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group mt-3 mt-md-0">
             Full Description(Add Info About Experiences,hospitals etc) <textarea class="form-control" name="full_description" id="full_description" placeholder="" required></textarea>
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
			<label><b> Check Up Fees (In Ruppees)</b></label>
              <input type="text" name="checkup_fees" class="form-control" id="checkup_fees"  placeholder="Your Checkup Fees" >
              <div class="validate"></div>
            </div>
			
			
			<div class="col-md-12 form-group">
			<label><b>Your Facebook ID</b></label>
              <input type="text" name="facebook_url" class="form-control" id="facebook_url" placeholder="Your Facebook ID" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
			<label><b>Your Twitter ID</b></label>
              <input type="text" name="twitter_url" class="form-control" id="twitter_url" placeholder="Your Twitter ID" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
			<label><b>Your Instagram ID</b></label>
              <input type="text" name="instagram_url" class="form-control" id="instagram_url" placeholder="Your Instagram ID" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
			<label><b>Your Linkedin ID</b></label>
              <input type="text" name="linkedin_url" class="form-control" id="linkedin_url" placeholder="Your Linkedin ID" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
              Upload Documents(Zip File)<input type="file" name="documents" class="form-control" id="documents" required >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
              Upload Profile Picture<input type="file" name="profilepic" class="form-control" id="Profilepic" required >
              <div class="validate"></div>
            </div>
			
           <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
			<?php
				if(isset($_SESSION['profile'])){
					if($_SESSION['profile']==1){
			?>
            <div class="sent-message" style="display:block;">Data Added successfully!</div>
					<?php } }
					UNSET($_SESSION['profile']);
			?>
			
			<?php
				if(isset($_SESSION['profile'])){	

					if($_SESSION['profile']==0){				
			?>
            <div class="error-message" style="display:block;">Something Went Wrong.Please Try Again.</div>
					<?php }
							
					}
					UNSET($_SESSION['profile']);
			?>
			
			
          </div>
          <div class="text-center"><button type="submit" name="addprofile">Update Profile</button></div>
        </form>
				<?php
			}?>
			
           

      </div>
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->


<?php include"footer.php"; ?>