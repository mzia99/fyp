<?php include"header.php"; ?>
	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg"  style="margin-top: 100px;">
      <div class="container">

        <div class="section-title">
          <h2>Hi, <?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></h2>
          <p>Please Add Your availability</p>
        </div>

        <form action="../includes/functions.php" method="post" enctype="multipart/form-data" class="php-email-form">
          <div class="row">
            <div class="col-md-7">
			<div class="col-md-12 form-group">
				<label><b>Choose Date</b></label>
					<input type="date" name="user_date" class="form-control" required>
				<div class="validate"></div>
            </div> 
			
			<div class="col-md-12 form-group">
				<label><b>Add Time Slot</b></label>
					<input type="text" name="user_slot" class="form-control" required>
				<div class="validate"></div>
            </div> 
			 <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
			<?php
				if(isset($_SESSION['slot'])){
					if($_SESSION['slot']==1){
			?>
            <div class="sent-message" style="display:block;">Data Added successfully!</div>
					<?php } }
					UNSET($_SESSION['slot']);
			?>
			
			<?php
				if(isset($_SESSION['slot'])){	

					if($_SESSION['slot']==0){				
			?>
            <div class="error-message" style="display:block;">Something Went Wrong.Please Try Again.</div>
					<?php }
							
					}
					UNSET($_SESSION['slot']);
			?>
			
			
          </div>
		  
         
          <div class="text-center"><button type="submit" name="addslot">Add Date/Slot</button></div>
			</div>
			 <div class="col-md-5">
			 <div class="section-title">
          <h2>Date/Slots Management</h2>
        </div>

        <table class="table">
		  <thead>
			<tr>
			  <th scope="col">Date</th>
			  <th scope="col">Slot</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php 
			include('../includes/connect.php');
			$user_id=$_SESSION['user_id'];
			$checksql="select * from availability where user_id='$user_id' order by date_avl DESC";
			$result=mysqli_query($conn,$checksql);
			$rowcount=mysqli_num_rows($result);
			if($rowcount>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			
			?>
			<tr id="slot<?php echo $row['id']; ?>">
			
			  <th scope="row"><?php echo $row['date_avl']; ?></th>
			  <td><?php echo $row['slot_avl']; ?></td>
			 
			  <td><button onclick="deleteslot(<?php echo $row['id']; ?>)">Delete</button></td>
			 
			</tr>
			<?php
			}
			}else{
				?>
				<tr id="user<?php echo $row['user_id']; ?>">
					<td colspan="10" style="color:red; font-weight:bold">Records Not Found.</td>
				</tr>
				<?php
			}
			?>
		  </tbody>
		</table>
			 </div>
		</div>
			
        </form>
		
		
		

      </div>
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->


<?php include"footer.php"; ?>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  
  
  <script>
  function deleteslot(id) {

var txt;
  if (confirm("Are you sure you want to delete?")) {
    txt = "You pressed OK!";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('slot'+id).style.display="none";
          alert('Slot succesfully deleted.');
      }
    };
    xmlhttp.open("GET", "../includes/functions.php?slot="+id, true);
    xmlhttp.send();

  } else {
    //txt = "You pressed Cancel!";
  }
  
  
}

  </script>