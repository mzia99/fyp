<?php include"header.php"; ?>
	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment"  style="margin-top: 100px;">
      <div class="container">
	  
        <div class="section-title">
          <h2>Departments Management</h2>
        </div>

		<div class="row">
			<div class="col-md-7">
			
			 <form action="../includes/functions.php" method="post" role="form" class="php-email-form">
          <div class="row">
            
           <div class="col-md-12 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="department_name" id="department_name" placeholder="Department Name" required>
              <div class="validate"></div>
            </div>
						
           
            <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
			<?php
				if(isset($_SESSION['department'])){
					if($_SESSION['department']==1){
			?>
            <div class="sent-message" style="display:block;">Department successfully Added. Thank you!</div>
					<?php } }
			?>
			
			<?php
				if(isset($_SESSION['department'])){	

					if($_SESSION['department']==0){				
			?>
            <div class="error-message" style="display:block;">Something Went Wrong.Please Try Again. Thank you!</div>
					<?php }
				}
			?>
			
			
          </div>
          <div class="text-center"><button type="submit" name="adddepartment">Add Department</button></div>
        </form>
		</div>
		</div>
		
			<div class="col-md-5">
				<table class="table">
					  <thead>
						<tr>
						  <th scope="col">Department ID</th>
						  <th scope="col">Department Name</th>
						  <th scope="col">Action</th>
						</tr>
					  </thead>
					  <tbody>
						<?php 
						include('../includes/connect.php');
						$sql="select * from departments Order By department_name ASC";
						$result=mysqli_query($conn,$sql);
						$rowcount=mysqli_num_rows($result);
						if($rowcount>0){
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						
						?>
						<tr id="department<?php echo $row['department_id']; ?>">
						  <th scope="row"><?php echo $row['department_id']; ?></th>
						  <td><?php echo $row['department_name']; ?></td>
						  
						  <td><button onclick="deletedepartment(<?php echo $row['department_id']; ?>)">Delete</button></td>
						</tr>
						<?php
						}
						}else{
							?>
							<tr id="user<?php echo $row['user_id']; ?>">
								<td colspan="7" style="color:red; font-weight:bold">Records Not Found.</td>
							</tr>
							<?php
						}
						?>
					  </tbody>
					</table>
			</div>
		</div>
 
      </div>
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  
  
  <script>
  function deletedepartment(id) {

var txt;
  if (confirm("Are you sure you want to delete?")) {
    txt = "You pressed OK!";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('department'+id).style.display="none";
          alert('Department succesfully deleted.');
      }
    };
    xmlhttp.open("GET", "../includes/functions.php?department_id="+id, true);
    xmlhttp.send();

  } else {
    //txt = "You pressed Cancel!";
  }
  
  
}

 
  </script>
</body>

</html>