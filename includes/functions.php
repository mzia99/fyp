<?php 

include('connect.php');

session_start();

// register function
if(isset($_POST['register'])){
	
$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_phone= mysqli_real_escape_string($conn, $_POST['user_phone']);
$user_password= mysqli_real_escape_string($conn, $_POST['user_password']);
$user_type= mysqli_real_escape_string($conn, $_POST['user_type']);

$checkemailsql="select * from users where user_email='$user_email'";
$result=mysqli_query($conn, $checkemailsql);
$rowcount=mysqli_num_rows($result);
 
if ($rowcount>0) {
		
	$_SESSION['register']=2;
	header('location:../register.php');
	
}
else{
	
	$sql="INSERT INTO users (user_name, user_email, user_phone,user_password,user_role) VALUES ('$user_name', '$user_email', '$user_phone','$user_password','$user_type')";

		if (mysqli_query($conn, $sql)) {

			$_SESSION['register']=1;
			header('location:../register.php');
		  
		} else {
			
			$_SESSION['register']=0;
			header('location:../register.php');
		}
}

}

// login function
if(isset($_POST['login'])){
	
$user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
$user_password= mysqli_real_escape_string($conn, $_POST['user_password']);

$checkemailsql="select * from users where user_email='$user_email' AND user_password='$user_password'";
$result=mysqli_query($conn, $checkemailsql);
$rowcount=mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if ($rowcount>0) {
		
	$_SESSION['login']=1;
	$_SESSION['user_role']=$row['user_role'];
	$_SESSION['user_id']=$row['user_id'];
	$_SESSION['user_name']=$row['user_name'];
	$role=$row['user_role'];
	if($role==2){
		
		header('location:../admin/dashboard.php');
	
	}
	else if ($role==0){
		
	header('location:../doctors/doctor-profile.php');
	}
	else{
		header('location:../all-appointments.php');
	}
	
}
else {
	$_SESSION['login']=0;
	header('location:../login.php');
	}
}



// delete function
if(isset($_GET['user_id'])){
	
$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

$checksql="delete from users where user_id='$user_id'";
$result=mysqli_query($conn, $checksql);
return 0;
}


// delete function
if(isset($_GET['department_id'])){
	
$department_id = mysqli_real_escape_string($conn, $_GET['department_id']);

$checksql="delete from departments where department_id='$department_id'";
$result=mysqli_query($conn, $checksql);
return 0;
}

// delete function
if(isset($_GET['update_user_id'])){
	
$user_id = mysqli_real_escape_string($conn, $_GET['update_user_id']);
$user_status = mysqli_real_escape_string($conn, $_GET['user_status']);

echo $checksql="update users SET user_status='$user_status' where user_id='$user_id'";
$result=mysqli_query($conn, $checksql);
return 0;
}

// delete function
if(isset($_GET['appointment_id'])){
	
$appointment_id = mysqli_real_escape_string($conn, $_GET['appointment_id']);

$checksql="delete from appointments where appointment_id='$appointment_id'";
$result=mysqli_query($conn, $checksql);
return 0;
}

// delete function
if(isset($_GET['slot'])){
	
$slot_id = mysqli_real_escape_string($conn, $_GET['slot']);

$checksql="delete from availability where id='$slot_id'";
$result=mysqli_query($conn, $checksql);
return 0;
}

// delete function
if(isset($_GET['appointment_id_status'])){
	
	$appointment_id_status= $_GET['appointment_id_status'];
	$val= $_GET['val'];

$checksql="update appointments Set appointment_status='$val' where appointment_id ='$appointment_id_status'";
$result=mysqli_query($conn, $checksql);
return 0;
}



// register function
if(isset($_POST['adddepartment'])){
	
$department_name = mysqli_real_escape_string($conn, $_POST['department_name']);

$checksql="select * from departments where department_name='$department_name'";
$result=mysqli_query($conn, $checksql);
$rowcount=mysqli_num_rows($result);
 
if ($rowcount>0) {
		
	$_SESSION['register']=2;
	header('location:../admin/departments.php');
	
}
else{
	
	$sql="INSERT INTO departments (department_name) VALUES ('$department_name')";

		if (mysqli_query($conn, $sql)) {

			$_SESSION['register']=1;
			header('location:../admin/departments.php');
		  
		} else {
			
			$_SESSION['register']=0;
			header('location:../admin/departments.php');
		}
}

}


// register function
if(isset($_POST['addhistory'])){
	
	 
	$user_id=$_SESSION['user_id'];
	$appointmentid=$_REQUEST['appointmentid'];
	echo $inssql = " insert into  history set 
                              history_desc = '".mysqli_real_escape_string($conn,$_REQUEST['history'])."',
							  history_appointmentid = '".mysqli_real_escape_string($conn,$_REQUEST['appointmentid'])."',
							  
							  history_addby =  '".mysqli_real_escape_string($conn,$user_id)."'
							  ";//exit;

	if(mysqli_query($conn,$inssql)){
	 	//echo("Profile successfully added.");
		
		$_SESSION['history']=1;
		header('location:../doctors/history.php?appointmentid='.$appointmentid);
		
	 }else{
	 	//echo("Profile upload failed.  Please re-attempt upload.");
		$_SESSION['history']=1;
		header('location:../doctors/history.php?appointmentid='.$appointmentid);
	 }
}

// register function
if(isset($_POST['addprofile'])){
	
	 $filename=$_FILES["profilepic"]["name"];
	 $withoutsign= str_replace("&","-",$filename);
	$target_file = time(). basename($withoutsign);
	
	$documentfilename=$_FILES["documents"]["name"];
	$documentfilenamewithoutsign= str_replace("&","-",$documentfilename);
	$documenttarget_file = time(). basename($documentfilenamewithoutsign);
	
	
	$user_id=$_SESSION['user_id'];
	echo $inssql = " insert into  user_meta set 
                              user_designation = '".mysqli_real_escape_string($conn,$_REQUEST['user_designation'])."',
							  short_description = '".mysqli_real_escape_string($conn,$_REQUEST['short_description'])."',
							  checkup_fees = '".mysqli_real_escape_string($conn,$_REQUEST['checkup_fees'])."',
							  department = '".mysqli_real_escape_string($conn,$_REQUEST['department'])."',
							  full_description = '".mysqli_real_escape_string($conn,$_REQUEST['full_description'])."',
							  profilepic_path = '".$target_file."',
							  documents_path = '".$documenttarget_file."',
							  facebook_url =  '".mysqli_real_escape_string($conn,$_REQUEST['facebook_url'])."',
							  twitter_url =  '".mysqli_real_escape_string($conn,$_REQUEST['twitter_url'])."',
							  instagram_url =  '".mysqli_real_escape_string($conn,$_REQUEST['instagram_url'])."',
							  linkedin_url =  '".mysqli_real_escape_string($conn,$_REQUEST['linkedin_url'])."',
							  user_id =  '".mysqli_real_escape_string($conn,$user_id)."'
							  ";//exit;
	move_uploaded_file($_FILES['profilepic']['tmp_name'], 'files/' . $target_file);
	move_uploaded_file($_FILES['documents']['tmp_name'], 'files/' . $documenttarget_file);
					
	if(mysqli_query($conn,$inssql)){
	 	//echo("Profile successfully added.");
		
		$_SESSION['profile']=1;
		header('location:../doctors/doctor-profile.php');
		
	 }else{
	 	//echo("Profile upload failed.  Please re-attempt upload.");
		$_SESSION['profile']=1;
		header('location:../doctors/doctor-profile.php');
	 }
}


// register function
if(isset($_POST['addreport'])){
	$appointment_id=$_REQUEST['appointment_id'];
	 $filename=$_FILES["documents"]["name"];
	 $withoutsign= str_replace("&","-",$filename);
	$target_file = time(). basename($withoutsign);
	$user_id=$_SESSION['user_id'];
	echo $inssql = " insert into  reports set 
                              date = '".mysqli_real_escape_string($conn,$_REQUEST['report_date'])."',
							  report_path = '".$target_file."',
							  appointment_id =  '".mysqli_real_escape_string($conn,$_REQUEST['appointment_id'])."',
							  notes =  '".mysqli_real_escape_string($conn,$_REQUEST['report_notes'])."'
							  ";//exit;
	move_uploaded_file($_FILES['documents']['tmp_name'], 'files/' . $target_file);
					
	if(mysqli_query($conn,$inssql)){
	 	//echo("Profile successfully added.");
		
		$_SESSION['profile']=1;
		header('location:../manage-reports.php?appointment_id='.$appointment_id);
		
	 }else{
	 	//echo("Profile upload failed.  Please re-attempt upload.");
		$_SESSION['profile']=1;
		header('location:../manage-reports.php.php'.$appointment_id);
	 }
}

// register function
if(isset($_POST['addslot'])){
	
	$user_id=$_SESSION['user_id'];
	echo $inssql = " insert into   availability set 
                              date_avl = '".mysqli_real_escape_string($conn,$_REQUEST['user_date'])."',
							  slot_avl = '".mysqli_real_escape_string($conn,$_REQUEST['user_slot'])."',
							  user_id =  '".mysqli_real_escape_string($conn,$user_id)."'
							  ";//exit;
					
	if(mysqli_query($conn,$inssql)){
	 	//echo("Profile successfully added.");
		
		$_SESSION['slot']=1;
		header('location:../doctors/availability.php');
		
	 }else{
	 	//echo("Profile upload failed.  Please re-attempt upload.");
		$_SESSION['slot']=0;
		header('location:../doctors/availability.php');
	 }
}


// register function
if(isset($_POST['updateprofile'])){
	if(file_exists($_FILES['profilepic']['tmp_name']) && !file_exists($_FILES['documents']['tmp_name']) ){
	 $filename=$_FILES["profilepic"]["name"];
	 $withoutsign= str_replace("&","-",$filename);
	$target_file = time(). basename($withoutsign);
	$user_id=$_SESSION['user_id'];
	echo $inssql = " update user_meta set 
                              user_designation = '".mysqli_real_escape_string($conn,$_REQUEST['user_designation'])."',
							  short_description = '".mysqli_real_escape_string($conn,$_REQUEST['short_description'])."',
							  full_description = '".mysqli_real_escape_string($conn,$_REQUEST['full_description'])."',
							  checkup_fees = '".mysqli_real_escape_string($conn,$_REQUEST['checkup_fees'])."',
							  department = '".mysqli_real_escape_string($conn,$_REQUEST['department'])."',
							  profilepic_path = '".$target_file."',
							  facebook_url =  '".mysqli_real_escape_string($conn,$_REQUEST['facebook_url'])."',
							  twitter_url =  '".mysqli_real_escape_string($conn,$_REQUEST['twitter_url'])."',
							  instagram_url =  '".mysqli_real_escape_string($conn,$_REQUEST['instagram_url'])."',
							  linkedin_url =  '".mysqli_real_escape_string($conn,$_REQUEST['linkedin_url'])."' where
							  user_id =  '".mysqli_real_escape_string($conn,$user_id)."'
							  ";//exit;
	move_uploaded_file($_FILES['profilepic']['tmp_name'], 'files/' . $target_file);
					
	if(mysqli_query($conn,$inssql)){
	 	//echo("Profile successfully added.");
		
		$_SESSION['profile']=1;
		header('location:../doctors/doctor-profile.php');
	 }else{
	 	//echo("Profile upload failed.  Please re-attempt upload.");
		
		$_SESSION['profile']=0;
		header('location:../doctors/doctor-profile.php');
	 }
	}else if(!file_exists($_FILES['profilepic']['tmp_name']) && file_exists($_FILES['documents']['tmp_name']) ){
	 $filename=$_FILES["documents"]["name"];
	 $withoutsign= str_replace("&","-",$filename);
	$target_file = time(). basename($withoutsign);
	$user_id=$_SESSION['user_id'];
	echo $inssql = " update user_meta set 
                              user_designation = '".mysqli_real_escape_string($conn,$_REQUEST['user_designation'])."',
							  short_description = '".mysqli_real_escape_string($conn,$_REQUEST['short_description'])."',
							  full_description = '".mysqli_real_escape_string($conn,$_REQUEST['full_description'])."',
							  checkup_fees = '".mysqli_real_escape_string($conn,$_REQUEST['checkup_fees'])."',
							  department = '".mysqli_real_escape_string($conn,$_REQUEST['department'])."',
							  documents_path = '".$target_file."',
							  facebook_url =  '".mysqli_real_escape_string($conn,$_REQUEST['facebook_url'])."',
							  twitter_url =  '".mysqli_real_escape_string($conn,$_REQUEST['twitter_url'])."',
							  instagram_url =  '".mysqli_real_escape_string($conn,$_REQUEST['instagram_url'])."',
							  linkedin_url =  '".mysqli_real_escape_string($conn,$_REQUEST['linkedin_url'])."' where
							  user_id =  '".mysqli_real_escape_string($conn,$user_id)."'
							  ";//exit;
	move_uploaded_file($_FILES['documents']['tmp_name'], 'files/' . $target_file);
					
	if(mysqli_query($conn,$inssql)){
	 	//echo("Profile successfully added.");
		
		$_SESSION['profile']=1;
		header('location:../doctors/doctor-profile.php');
	 }else{
	 	//echo("Profile upload failed.  Please re-attempt upload.");
		
		$_SESSION['profile']=0;
		header('location:../doctors/doctor-profile.php');
	 }
	}else if(file_exists($_FILES['profilepic']['tmp_name']) && file_exists($_FILES['documents']['tmp_name']) ){
		
		
	 $filename=$_FILES["profilepic"]["name"];
	 $withoutsign= str_replace("&","-",$filename);
	$target_file = time(). basename($withoutsign);
	
	$documentsfilename=$_FILES["documents"]["name"];
	 $documentswithoutsign= str_replace("&","-",$documentsfilename);
	$documentstarget_file = time(). basename($documentswithoutsign);
	
	
	$user_id=$_SESSION['user_id'];
	echo $inssql = " update user_meta set 
                              user_designation = '".mysqli_real_escape_string($conn,$_REQUEST['user_designation'])."',
							  short_description = '".mysqli_real_escape_string($conn,$_REQUEST['short_description'])."',
							  full_description = '".mysqli_real_escape_string($conn,$_REQUEST['full_description'])."',
							  checkup_fees = '".mysqli_real_escape_string($conn,$_REQUEST['checkup_fees'])."',
							  department = '".mysqli_real_escape_string($conn,$_REQUEST['department'])."',
							  documents_path = '".$documentstarget_file."',
							  profilepic_path = '".$target_file."',
							  facebook_url =  '".mysqli_real_escape_string($conn,$_REQUEST['facebook_url'])."',
							  twitter_url =  '".mysqli_real_escape_string($conn,$_REQUEST['twitter_url'])."',
							  instagram_url =  '".mysqli_real_escape_string($conn,$_REQUEST['instagram_url'])."',
							  linkedin_url =  '".mysqli_real_escape_string($conn,$_REQUEST['linkedin_url'])."' where
							  user_id =  '".mysqli_real_escape_string($conn,$user_id)."'
							  ";//exit;
	move_uploaded_file($_FILES['documents']['tmp_name'], 'files/' . $documentstarget_file);
	move_uploaded_file($_FILES['profilepic']['tmp_name'], 'files/' . $target_file);
					
	if(mysqli_query($conn,$inssql)){
	 	//echo("Profile successfully added.");
		
		$_SESSION['profile']=1;
		header('location:../doctors/doctor-profile.php');
	 }else{
	 	//echo("Profile upload failed.  Please re-attempt upload.");
		
		$_SESSION['profile']=0;
		header('location:../doctors/doctor-profile.php');
	 }
	}
	else{
		$user_id=$_SESSION['user_id'];
		echo $inssql = " update user_meta set 
                              user_designation = '".mysqli_real_escape_string($conn,$_REQUEST['user_designation'])."',
							  short_description = '".mysqli_real_escape_string($conn,$_REQUEST['short_description'])."',
							  full_description = '".mysqli_real_escape_string($conn,$_REQUEST['full_description'])."',
							  checkup_fees = '".mysqli_real_escape_string($conn,$_REQUEST['checkup_fees'])."',
							  
							  department = '".mysqli_real_escape_string($conn,$_REQUEST['department'])."',
							  facebook_url =  '".mysqli_real_escape_string($conn,$_REQUEST['facebook_url'])."',
							  twitter_url =  '".mysqli_real_escape_string($conn,$_REQUEST['twitter_url'])."',
							  instagram_url =  '".mysqli_real_escape_string($conn,$_REQUEST['instagram_url'])."',
							  linkedin_url =  '".mysqli_real_escape_string($conn,$_REQUEST['linkedin_url'])."' where
							  user_id =  '".mysqli_real_escape_string($conn,$user_id)."'
							  ";//exit;
					
	if(mysqli_query($conn,$inssql)){
	 	//echo("Profile successfully added.");
		
		$_SESSION['profile']=1;
		header('location:../doctors/doctor-profile.php');
	 }else{
	 	//echo("Profile upload failed.  Please re-attempt upload.");
		
		$_SESSION['profile']=0;
		header('location:../doctors/doctor-profile.php');
	 }
	}
}


// register function
if(isset($_POST['addappointment'])){
	echo"haseeb";
	$user_id=$_SESSION['user_id'];
	echo $inssql = " insert into  appointments set 
                              patient_name = '".mysqli_real_escape_string($conn,$_REQUEST['patient_name'])."',
							  patient_email = '".mysqli_real_escape_string($conn,$_REQUEST['patient_email'])."',
							  patient_phone = '".mysqli_real_escape_string($conn,$_REQUEST['patient_phone'])."',
							  patient_date =  '".mysqli_real_escape_string($conn,$_REQUEST['patient_date'])."',
							  department_id =  '".mysqli_real_escape_string($conn,$_REQUEST['department'])."',
							  doctor =  '".mysqli_real_escape_string($conn,$_REQUEST['doctor'])."',
							  appoitnment_type =  '".mysqli_real_escape_string($conn,$_REQUEST['appoitnment_type'])."',
							  appointment_payment =  '".mysqli_real_escape_string($conn,$_REQUEST['appointment_payment'])."',
							  appointment_slot =  '".mysqli_real_escape_string($conn,$_REQUEST['appointment_slot'])."',
							  message =  '".mysqli_real_escape_string($conn,$_REQUEST['message'])."',
							  appointment_by =  '".mysqli_real_escape_string($conn,$user_id)."'
							  ";//exit;
					
	if(mysqli_query($conn,$inssql)){
	 	echo("Appointment successfully added.");
		$_SESSION['appointment']=1;
		header('location:../all-appointments.php');
	 }else{
	 	echo("Appointment upload failed.  Please re-attempt upload.");
		$_SESSION['appointment']=0;
		header('location:../all-appointments.php');
	 }
}


?>