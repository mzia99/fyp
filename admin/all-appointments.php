<?php include"header.php"; ?>
	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment"  style="margin-top: 100px;">
      <div class="container">

        <div class="section-title">
          <h2>Appointments Management</h2>
        </div>

        <table class="table">
		  <thead>
			<tr>
			  <th scope="col">Appointment ID</th>
			  <th scope="col">Patient Name</th>
			  <th scope="col">Patient Phone</th>
			  <th scope="col">Patient Date</th>
			  
			  <th scope="col">Slot</th>
			  <th scope="col">Department</th>
			  <th scope="col">Doctor</th>
			  <th scope="col">Type</th>
			  <th scope="col">Message</th>
			  
			  <th scope="col">Payment Method</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php 
			include('../includes/connect.php');
			$checksql="select * from appointments order by appointment_id DESC";
			$result=mysqli_query($conn,$checksql);
			$rowcount=mysqli_num_rows($result);
			if($rowcount>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$doctor=$row['doctor'];
			 $namesql="select * from users where user_id='$doctor' ";
			$nameresult=mysqli_query($conn,$namesql);
			$nameresultrow = mysqli_fetch_array($nameresult);
			
			$department_id=$row['department_id'];
			$departmentnamesql="select * from departments where department_id='$department_id' ";
			$departmentnamesqlresult=mysqli_query($conn,$departmentnamesql);
			$departmentnamesqlresultrow = mysqli_fetch_array($departmentnamesqlresult);
			?>
			<tr id="appointment<?php echo $row['appointment_id']; ?>">
			  <th scope="row"><?php echo $row['appointment_id']; ?></th>
			  <td><?php echo $row['patient_name']; ?></td>
			  <td><?php echo $row['patient_phone']; ?></td>
			  <td><?php echo $row['patient_date']; ?></td>
			  
			  <td><?php echo $row['appointment_slot']; ?></td>
			  <td><?php echo $departmentnamesqlresultrow['department_name']; ?></td>
			  
			 <td>Dr.<?php echo $nameresultrow['user_name']; ?></td>
			  
			  <td><?php echo $row['appoitnment_type']; ?></td>
			  
			  <td><?php echo $row['message']; ?></td>
			  
			   <td><?php echo $row['appointment_payment']; ?></td>
			  <td><button onclick="deleteappointment(<?php echo $row['appointment_id']; ?>)">Delete</button></td>
			 
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
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  
  
  <script>
  function deleteappointment(id) {

var txt;
  if (confirm("Are you sure you want to delete?")) {
    txt = "You pressed OK!";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('appointment'+id).style.display="none";
          alert('Appointment succesfully deleted.');
      }
    };
    xmlhttp.open("GET", "../includes/functions.php?appointment_id="+id, true);
    xmlhttp.send();

  } else {
    //txt = "You pressed Cancel!";
  }
  
  
}

  </script>
</body>

</html>