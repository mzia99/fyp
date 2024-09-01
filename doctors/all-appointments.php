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
			  <th scope="col">Type</th>
			  <th scope="col">Slot</th>
			  <th scope="col">Message</th>
			  <th scope="col">Status</th>
			  <th scope="col">Update</th>
			  <th scope="col">Action</th>
			  <th scope="col">Reports</th>
			  <th scope="col">History</th>
			</tr>
		  </thead>
		  <tbody>
			<?php 
			include('../includes/connect.php');
			$user_id=$_SESSION['user_id'];
			$checksql="select * from appointments where doctor='$user_id' order by appointment_id DESC";
			$result=mysqli_query($conn,$checksql);
			$rowcount=mysqli_num_rows($result);
			if($rowcount>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			
			?>
			<tr id="appointment<?php echo $row['appointment_id']; ?>">
			  <th scope="row"><?php echo $row['appointment_id']; ?></th>
			  <td><?php echo $row['patient_name']; ?></td>
			  <td><?php echo $row['patient_phone']; ?></td>
			  <td><?php echo $row['patient_date']; ?></td>
			  <td><?php echo $row['appoitnment_type']; ?></td>
			  
			  <td><?php echo $row['appointment_slot']; ?></td>
			  <td><?php echo $row['message']; ?></td>
			  <td><b><?php echo $row['appointment_status']; ?></b></td>
			  <td>
			  <select onchange="updateStatus(this.value,<?php echo $row['appointment_id']; ?>)">
			  <option >Select Status</option>
			  <option value="Pending">Pending</option>
			  <option value="Report Awaiting">Report Awaiting</option>
			  <option value="Approved">Approved</option>
			  <option value="Canceled">Canceled</option>
			  </select>
			  </td>
			  
			  <td><button class="btn btn-sm btn-danger" onclick="deleteappointment(<?php echo $row['appointment_id']; ?>)">Delete</button></td>
			  <td><a  class="btn btn-sm btn-info" href="../manage-reports.php?appointment_id=<?php echo $row['appointment_id']; ?>">Manage</a></td>
			  <td><a  class="btn btn-sm btn-primary" href="history.php?appointmentid=<?php echo $row['appointment_id']; ?>">Add History</a></td>
			  
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

  function updateStatus(val,id) {

var txt;
  if (confirm("Are you sure ?")) {
    txt = "You pressed OK!";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         location.reload();
      }
    };
    xmlhttp.open("GET", "../includes/functions.php?appointment_id_status="+id+'&val='+val, true);
    xmlhttp.send();

  } else {
    //txt = "You pressed Cancel!";
  }
  
  
}

  </script>
</body>

</html>