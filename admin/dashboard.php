<?php include"header.php"; ?>
	<main id="main">


     <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment"  style="margin-top: 100px;">
      <div class="container">

        <div class="section-title">
          <h2>Doctors Management</h2>
        </div>

        <table class="table">
		  <thead>
			<tr>
			  <th scope="col">Doctor ID</th>
			  <th scope="col">Doctor Name</th>
			  <th scope="col">Doctor Email</th>
			  <th scope="col">Doctor Phone</th>
			  <th scope="col">Doctor Password</th>
			  <th scope="col">Doctor Documents</th>
			  <th scope="col">Doctor Profile</th>
			  <th scope="col">Enable Status</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php 
			include('../includes/connect.php');
			$checkemailsql="select * from users where user_role='0'";
			$result=mysqli_query($conn, $checkemailsql);
			$rowcount=mysqli_num_rows($result);
			if($rowcount>0){
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$user_id=$row['user_id'];
			$checksql="select * from user_meta where user_id='$user_id'";
			$checksqlresult=mysqli_query($conn, $checksql);
			$checksqlresultrowcountrow = mysqli_fetch_array($checksqlresult, MYSQLI_ASSOC);
			
			?>
			<tr id="user<?php echo $row['user_id']; ?>">
			  <th scope="row"><?php echo $row['user_id']; ?></th>
			  <td><?php echo $row['user_name']; ?></td>
			  <td><?php echo $row['user_email']; ?></td>
			  <td><?php echo $row['user_phone']; ?></td>
			  <td><?php echo $row['user_password']; ?></td>
			  <td><a target="_blank" href="../includes/files/<?php echo $checksqlresultrowcountrow['documents_path']; ?>">View</a></td>
			  <td><a target="_blank" href="../doc-profile.php?doctor_id=<?php echo $row['user_id']; ?>&user_name=<?php echo $row['user_name']; ?> ">View</a></td>
			  <td>
			  <?php $status= $row['user_status']; 
				if($status==0){
					?>
					<input type="checkbox" name="user_status" id="user_status<?php echo $row['user_id']; ?>" value='1' onclick="updatestatus(<?php echo $row['user_id']; ?>)" >
					
					<?php 
				}else{
					?>
					<input type="checkbox" name="user_status" id="user_status<?php echo $row['user_id']; ?>" value='0' onclick="updatestatus(<?php echo $row['user_id']; ?>)" checked>
					
					<?php 
				}
			  ?>
			  </td>
			  <td><button onclick="deleteuser(<?php echo $row['user_id']; ?>)">Delete</button></td>
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
  function deleteuser(id) {

var txt;
  if (confirm("Are you sure you want to delete?")) {
    txt = "You pressed OK!";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById('user'+id).style.display="none";
          alert('User succesfully deleted.');
      }
    };
    xmlhttp.open("GET", "../includes/functions.php?user_id="+id, true);
    xmlhttp.send();

  } else {
    //txt = "You pressed Cancel!";
  }
  
  
}

  function updatestatus(id) {
var status=document.getElementById('user_status'+id).value;

var txt;
  if (confirm("Are you sure you want to update?")) {
    txt = "You pressed OK!";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
		 
			location.reload();
          alert('User Status succesfully Updated.');
		  
      }
    };
    xmlhttp.open("GET", "../includes/functions.php?update_user_id="+id+"&user_status="+status, true);
    xmlhttp.send();

  } else {
    //txt = "You pressed Cancel!";
  }
  
  
}
  </script>
</body>

</html>