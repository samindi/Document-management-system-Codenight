<?php

require_once 'db.php';

session_start();

$student_name = $_POST["student_name"];
$reg_no = $_POST["reg_no"];
$batch = $_POST["batch"];
$acedamic = $_POST["acedamic"];
$contact_no = $_POST["contact_no"];
$email = $_POST["email"];
$bof = $_POST["bof"];
$address = $_POST["address"];
$image = $_FILES["profile_photo"]["name"];
 
if (($student_name !== "")&&($reg_no !== "")&&($batch !== "")&&($acedamic !== "")&&($contact_no !== "")&&($email !== "")&&($bof !== "")&&($address !== "")) {
	$std_img_ext = substr($image, strripos($image, '.'));
	$new_image = $reg_no.$std_img_ext;
	$query_item = "INSERT INTO student_details(std_name,reg_no,batch,academic_year,contact_no,email,std_address,birthday,profile_image) VALUES('$student_name','$reg_no','$batch','$acedamic','$contact_no','$email','$address','$bof','$new_image')";

	if ($conn->query($query_item)) {
		move_uploaded_file($_FILES['profile_photo']['tmp_name'], 'images/students/'.$new_image);

		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fas fa-check-circle fa-lg"></i>
		<b>Student added successfully.</b></div>';
	}else{
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>Student adding failed! Check your internet connection.</b></div>';
	}
}else{
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>All fields are required!</b></div>';
}

?>