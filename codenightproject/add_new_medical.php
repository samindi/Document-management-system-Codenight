<?php

require_once 'db.php';

session_start();

$medical_name = $_POST["medical_name"];
$medical_reg_no = $_POST["medical_reg_no"];
$medical_batch = $_POST["medical_batch"];
$image = $_FILES["medical_photo"]["name"];
 
if (($medical_name !== "")&&($medical_reg_no !== "")&&($medical_batch !== "")) {
	$md_img_ext = substr($image, strripos($image, '.'));
	$new_image = $medical_reg_no.$md_img_ext;
	$query_item = "INSERT INTO medical_details(medical_name,medical_reg_no,medical_batch,medical_form) VALUES('$medical_name','$medical_reg_no','$medical_batch','$new_image')";

	if ($conn->query($query_item)) {
		move_uploaded_file($_FILES['medical_photo']['tmp_name'], 'images/medicals/'.$new_image);

		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fas fa-check-circle fa-lg"></i>
		<b>Medical submitted successfully.</b></div>';
	}else{
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>Student adding failed! Check your internet connection.</b></div>';
	}
}else{
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>All fields are required!</b></div>';
}

?>