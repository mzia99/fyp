<?php
if(isset($_POST["department_id"])){
		
		$department_id=$_POST["department_id"];
	 
		include('../connect.php');
		$sql="select * from user_meta  where department='$department_id'";
		$result=mysqli_query($conn,$sql);
		$rowcount = mysqli_num_rows($result);
		if($rowcount>0){
		echo '<option value="">Choose Doctor</option>';
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$user_id =$row['user_id'];
	echo	$doc_sql="select * from users  where user_id='$user_id' Order By user_name ASC";
		$doc_result=mysqli_query($conn,$doc_sql);
		$doc_row = mysqli_fetch_array($doc_result, MYSQLI_ASSOC);
		$user_id=$doc_row['user_id'];
		$docsql="select * from user_meta  where user_id='$user_id'";
		$docresult=mysqli_query($conn,$docsql);
		$docfees_row = mysqli_fetch_array($docresult, MYSQLI_ASSOC);
					?>
				<option value="<?php echo $doc_row['user_id']; ?> ">
					<?php echo $doc_row['user_name']; ?> - Checkup Fee - Rs <?php echo $docfees_row['checkup_fees']; ?>
				</option>
				<?php 
				}
		}else{
				echo '<option value="">Doctors Not Found.</option>';
		}
}

if(isset($_POST["doctor_id"])){
		
		$doctor_id=$_POST["doctor_id"];
	 
		include('../connect.php');
		
	echo	$docsql="select * from availability  where user_id='$doctor_id' Group by date_avl";
		$docresult=mysqli_query($conn,$docsql);
		$rowcount = mysqli_num_rows($docresult);
		if($rowcount>0){
		echo '<option value="">Choose Date</option>';
		while($docfees_row = mysqli_fetch_array($docresult, MYSQLI_ASSOC)){
					?>
				<option value="<?php echo $docfees_row['date_avl']; ?>">
					<?php echo $docfees_row['date_avl']; ?> 
				</option>
				<?php 
				}
		}else{
				echo '<option value="">Dates Not Found.</option>';
		}
}


if(isset($_POST["doc_id"]) && isset($_POST["date"])){
		
		$doctor_id=$_POST["doc_id"];
		$date=$_POST["date"];
	 
		include('../connect.php');
		
	echo 	$docsql="select * from availability  where user_id='$doctor_id' && date_avl='$date'";
		$docresult=mysqli_query($conn,$docsql);
		$rowcount = mysqli_num_rows($docresult);
		if($rowcount>0){
		echo '<option value="">Choose Slot</option>';
		while($docfees_row = mysqli_fetch_array($docresult, MYSQLI_ASSOC)){
					?>
				<option value="<?php echo $docfees_row['slot_avl']; ?>">
					<?php echo $docfees_row['slot_avl']; ?> 
				</option>
				<?php 
				}
		}else{
				echo '<option value="">Dates Not Found.</option>';
		}
}
?>