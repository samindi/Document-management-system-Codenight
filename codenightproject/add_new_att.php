<?php

require_once 'db.php';

session_start();

$att_name = $_POST["att_name"];
$att_reg_no = $_POST["att_reg_no"];
$att_batch = $_POST["att_batch"];
$image = $_FILES["att_photo"]["name"];
 
if (($att_name !== "")&&($att_reg_no !== "")&&($att_reg_no !== "")) {
	$att_img_ext = substr($image, strripos($image, '.'));
	$new_image = $att_reg_no.$att_img_ext;
	$query_item = "INSERT INTO attendance_details(att_name,att_reg_no,att_batch,att_form) VALUES('$att_name','$att_reg_no','$att_batch','$new_image')";

	if ($conn->query($query_item)) {
		move_uploaded_file($_FILES['att_photo']['tmp_name'], 'images/attendance/'.$new_image);

		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fas fa-check-circle fa-lg"></i>
		<b>Attendance form updated successfully.</b></div>';
	}else{
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>Student adding failed! Check your internet connection.</b></div>';
	}
}else{
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><b>All fields are required!</b></div>';
}

?>