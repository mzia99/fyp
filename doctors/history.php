<?php include"header.php"; ?>
	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg"  style="margin-top: 100px;">
      <div class="container">

		<?php 
		include('../includes/connect.php');
			$count=0;
			$appointmentid=$_GET['appointmentid'];
			$checksql="select * from  history where history_appointmentid='$appointmentid' order by history_date_time asc";
			$result=mysqli_query($conn, $checksql);
			$rowcount=mysqli_num_rows($result);
			if($rowcount>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$count++; 
			if($count==1){
		?>
		
        <form action="../includes/functions.php" method="post" enctype="multipart/form-data" class="php-email-form">
          <div class="row">
            
			
			
            <div class="col-md-12 form-group mt-3 mt-md-0">
              
			  <label><b>Add Detailed History</b></label>
			  <textarea class="form-control" name="history" id="history" placeholder="" required></textarea>
			  <input type="hidden" name="appointmentid" value="<?php echo $appointmentid; ?>">
              <div class="validate"></div>
            </div>
			
			
			
		
			
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
			<?php
				if(isset($_SESSION['history'])){
					if($_SESSION['history']==1){
			?>
            <div class="sent-message" style="display:block;">Data Added successfully!</div>
					<?php } }
					UNSET($_SESSION['history']);
			?>
			
			<?php
				if(isset($_SESSION['history'])){	

					if($_SESSION['history']==0){				
			?>
            <div class="error-message" style="display:block;">Something Went Wrong.Please Try Again.</div>
					<?php }
							
					}
					UNSET($_SESSION['history']);
			?>
			
			
          </div>
          <div class="text-center"><button type="submit" name="addhistory">Add History</button></div>
        </form>
			<?php } ?>
		
		<p><strong><?php echo $row['history_date_time']; ?> </strong> - <?php echo $row['history_desc']; ?></p>
		<br>
			<?php }} else{
				?>
				 <form action="../includes/functions.php" method="post" enctype="multipart/form-data" class="php-email-form">
			<div class="row">
            
			
			
            <div class="col-md-12 form-group mt-3 mt-md-0">
              History<textarea class="form-control" name="history" id="history" placeholder="" required></textarea>
              <div class="validate"></div>
            </div>
			<input type="hidden" name="appointmentid" value="<?php echo $appointmentid; ?>">
			
			
           <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
			<?php
				if(isset($_SESSION['history'])){
					if($_SESSION['history']==1){
			?>
            <div class="sent-message" style="display:block;">Data Added successfully!</div>
					<?php } }
					UNSET($_SESSION['history']);
			?>
			
			<?php
				if(isset($_SESSION['history'])){	

					if($_SESSION['history']==0){				
			?>
            <div class="error-message" style="display:block;">Something Went Wrong.Please Try Again.</div>
					<?php }
							
					}
					UNSET($_SESSION['history']);
			?>
			
			
          </div>
          <div class="text-center"><button type="submit" name="addhistory">Add History</button></div>
        </form>
				<?php
			}?>
			
           

      </div>
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->


<?php include"footer.php"; ?>

