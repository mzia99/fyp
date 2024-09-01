<?php include "includes/parts/header.php"; ?>
	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg"  style="margin-top: 100px;">
      <div class="container">

        <div class="section-title">
          <h2>Reports Management</h2>
        </div>
		<form action="includes/functions.php" method="post" enctype="multipart/form-data" class="php-email-form">
          <div class="row">
            
			
			<div class="col-md-12 form-group">
				<label><b>Report Date</b></label>
				<input type="date" name="report_date" class="form-control" id="report_date" placeholder="Report Date" >
				<input type="hidden" name="appointment_id" class="form-control" id="appointment_id" value="<?php echo $_GET['appointment_id']; ?>" placeholder="Report Date" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
              Upload Documents(Zip File)<input type="file" name="documents" class="form-control" id="documents" >
              <div class="validate"></div>
            </div>
			
			<div class="col-md-12 form-group">
				<label><b>Report Notes</b></label>
				<textarea type="date" name="report_notes" class="form-control" id="report_notes" ></textarea>
              <div class="validate"></div>
            </div>
			
           <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
			<?php
				if(isset($_SESSION['report'])){
					if($_SESSION['report']==1){
			?>
            <div class="sent-message" style="display:block;">Data Added successfully!</div>
					<?php } }
					UNSET($_SESSION['report']);
			?>
			
			<?php
				if(isset($_SESSION['report'])){	

					if($_SESSION['report']==0){				
			?>
            <div class="error-message" style="display:block;">Something Went Wrong.Please Try Again.</div>
					<?php }
							
					}
					UNSET($_SESSION['profile']);
			?>
			
			
          </div>
          <div class="text-center"><button type="submit" name="addreport">Add Report</button></div>
        </form>
			

      </div>
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->


<?php include"includes/parts/footer.php"; ?>