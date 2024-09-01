<!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Make an Appointment</h2>
        </div>

        <form action="includes/functions.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-4 form-group">
			<small class="small" style="font-weight:bold; font-size:12px">Full Name</small>
              <input type="text" name="patient_name" class="form-control" id="patient_name" placeholder="Your Name" >
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
			<small class="small" style="font-weight:bold; font-size:12px">Email</small>
              <input type="email" class="form-control" name="patient_email" id="patient_email" placeholder="Your Email">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
			<small class="small" style="font-weight:bold; font-size:12px">Phone Number</small>
              <input type="tel" class="form-control" name="patient_phone" id="patient_phone" placeholder="Your Phone">
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            
            <div class="col-md-4 form-group mt-3">
			
				<small class="small" style="font-weight:bold; font-size:12px">Choose Department</small>
              <select name="department" id="department" class="form-select" onchange="showDoctors(this.value);">
			  
                <option value="">Select Department</option>
					<?php 
						include('includes/connect.php');
						$sql="select * from departments Order By department_name ASC";
						$result=mysqli_query($conn,$sql);
						$rowcount=mysqli_num_rows($result);
						if($rowcount>0){
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
							
							?>
								<option value="<?php echo $row['department_id']; ?> "><?php echo $row['department_name']; ?></option>
							<?php 
							}
						} 
					?>
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
			<small class="small" style="font-weight:bold; font-size:12px">Choose Doctor</small>
              <select name="doctor" id="doctor" class="form-select">
                <option value="">Select Department First</option>
               
              </select>
              <div class="validate"></div>
            </div>
			
			<div class="col-md-4 form-group mt-3">
			<small class="small" style="font-weight:bold; font-size:12px" >Choose Appointment Type</small>
              <select name="appoitnment_type" id="appoitnment_type" class="form-select" onchange="showDates(this.value);">
                <option value="">Select Type Of Appointment</option>
                <option value="Physical">Physical</option>
                <option value="Online(Google Meet / Zoom)">Online(Google Meet / Zoom)</option>
              </select>
              <div class="validate"></div>
            </div>
			
          </div>
		  
		    <div class="row">
            
            <div class="col-md-4 form-group mt-3">
			  <small class="small" style="font-weight:bold; font-size:12px">Appointment Date</small>
          		   
			   <select name="patient_date" id="patient_date" class="form-select" onchange="showslots(this.value);">
                
				<option value="">Select Type First</option>
               
              </select>
              <div class="validate"></div>
            </div>
					
            <div class="col-md-4 form-group mt-3">
			<small class="small" style="font-weight:bold; font-size:12px">Choose From Available Slot</small>
              <select name="appointment_slot" id="appointment_slot" class="form-select">
                <option value="">Select Date First</option>
              </select>
              <div class="validate"></div>
            </div>
			
			<div class="col-md-4 form-group mt-3">
			<small class="small" style="font-weight:bold; font-size:12px">Payment Method</small>
              <select name="appointment_payment" id="appointment_payment" class="form-select">
                <option value="">Select Payment Mode</option>
                <option value="Cash">Cash</option>
                <option value="Bank Transfer">Bank Transfer</option>
              </select>
              <div class="validate"></div>
            </div>
          </div>

          <div class="form-group mt-3">
		  <small class="small" style="font-weight:bold; font-size:12px">Any Additional Information</small>
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit" name="addappointment">Make an Appointment</button></div>
		   <br>
       <br>
		  <p>Note : For Online Payment Please Transfer Your Payment on this Account.</p>
		  <p>Bank Name : HBL</p>
		  <p>Account Holder Name : Tele Medicine Pvt Ltd.</p>
		  <p>Account Number : XXXXXXXXXXXXX	</p>
        </form>

      </div>
    </section><!-- End Appointment Section -->
	