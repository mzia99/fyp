<?php include"includes/parts/header.php"; ?>
	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment"  style="margin-top: 100px;">
      <div class="container">

        <div class="section-title">
          <h2>Reports Management</h2>
		  
        </div>

        <table class="table">
		   <thead>
			<tr>
			  <th scope="col">Report Id</th>
				<th scope="col">Date</th>
			<th scope="col">Notes</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php 
			include('includes/connect.php');
			$appointment_id=$_GET['appointment_id'];
			 $checksql="select * from reports where appointment_id='$appointment_id' order by id  DESC";
			$result=mysqli_query($conn,$checksql);
			$rowcount=mysqli_num_rows($result);
			if($rowcount>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			
			?>
			<tr id="reportid<?php echo $row['appointment_id']; ?>">
			  <th scope="row">#<?php echo $row['id']; ?></th>
			  <td><?php echo $row['date']; ?></td>
			  <td><?php echo $row['notes']; ?></td>
			  
			  <td><a href="includes/files/<?php echo $row['report_path']; ?>" target="_blank">Download Report</a></td>
			 
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
		  <?php if($_SESSION['user_role']!=0){ ?>
		  <a class="btn btn-success" href="add-report.php?appointment_id=<?php echo $appointment_id;  ?>">Add Report</a>
		  <?php } ?>
		</table>

      </div>
    </section><!-- End Appointment Section -->
  </main><!-- End #main -->


  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  

</body>

</html>