<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function deleteNow(inventory_id){
		$.ajax({
			type : "POST",
			url : "doc_del_modal.php",
			data : {inventory_id:inventory_id},
			success : function(result){
				$("#delete_modal_body").html(result);
        		$("#table-content").load();
			}
		});
	}
	function editNow(edit_item){
		$.ajax({
			type : "POST",
			url : "doc_edit_modal.php",
			data : {edit_item:edit_item},
			success : function(item_result){
				$("#item_edit_modal_body").html(item_result);
        		$("#table-content").load();
			}
		});
	}
</script>

<?php

require_once 'db.php';

session_start();

$batch_no = $_POST["batchNo"];
$reg_no = $_POST["regNo"];

if (!empty($batch_no)) {
	$sql1 = "SELECT * FROM student_details WHERE batch='$batch_no'";
	$sql1_results = mysqli_query($conn,$sql1);

	?>
	<table class="table table-bordered table-sm" id="check-table">
		<thead class="thead-dark">
			<tr class="text-center">
				<th>Index No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact No</th>
				<th>Batch</th>
				<th>Academic Year</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql1_results)) {
	?>
			<tr id="row<?php echo $row['id']; ?>">
				<td><?php echo $row["reg_no"]; ?></td>
				<td><?php echo $row["std_name"]; ?></td>
				<th><?php echo $row["email"]; ?></th>
				<td><?php echo $row["contact_no"]; ?></td>
				<td><?php echo $row["batch"]; ?></td>
				<td><?php echo $row["academic_year"] ?></td>
				<td class="del-btn edit-btn">
					<div id="main_loc_action_td">
						<form id="item_delete_form" style="padding-right: 5px;">
							<button type="button" class="btn btn-danger btn-sm item_del_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm_del_modal" onclick="deleteNow(<?php echo $row['id']; ?>)"><i class="far fa-trash-alt delete_icon"></i></button>
						</form>
						<form id="item_edit_form" style="padding-right: 5px;">
							<button type="button" class="btn btn-info btn-sm item_edit_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#manager_edit_modal" onclick="editNow(<?php echo $row['id']; ?>)"><i class="fas fa-pen-alt edit_icon"></i></button>
						</form>
						<form id="item_edit_form" style="padding-right: 5px;">
							<button type="button" class="btn btn-success btn-sm item_edit_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#manager_edit_modal" onclick="viewNow(<?php echo $row['id']; ?>)"><i class="fas fa-external-link-alt edit_icon"></i></button>
						</form>
					</div>
				</td>
			</tr>
		<?php		
			}
		?>
				
			</tbody>
		</table>

		<div class="modal fade" id="confirm_del_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content" id="delete_modal_body">

			</div>
			</div>
		</div>

		<div class="modal fade bd-example-modal-lg" id="manager_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content" id="item_edit_modal_body">

			</div>
			</div>
		</div>
	<?php
}else if (!empty($reg_no)){
	$sql1 = "SELECT * FROM student_details WHERE reg_no='$reg_no'";
	$sql1_results = mysqli_query($conn,$sql1);

	?>
	<table class="table table-bordered table-sm" id="check-table">
		<thead class="thead-dark">
			<tr class="text-center">
				<th>Index No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact No</th>
				<th>Batch</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql1_results)) {
	?>
			<tr id="row<?php echo $row['id']; ?>">
				<td><?php echo $row["reg_no"]; ?></td>
				<td><?php echo $row["std_name"]; ?></td>
				<th><?php echo $row["email"]; ?></th>
				<td><?php echo $row["contact_no"]; ?></td>
				<td><?php echo $row["batch"]; ?></td>
				<td><?php echo $row["academic_year"] ?></td>
				<td class="del-btn edit-btn">
					<div id="main_loc_action_td">
						<form id="item_delete_form" style="padding-right: 5px;">
							<button type="button" class="btn btn-danger btn-sm item_del_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm_del_modal" onclick="deleteNow(<?php echo $row['id']; ?>)"><i class="far fa-trash-alt delete_icon"></i></button>
						</form>
						<form id="item_edit_form" style="padding-right: 5px;">
							<button type="button" class="btn btn-info btn-sm item_edit_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#manager_edit_modal" onclick="editNow(<?php echo $row['id']; ?>)"><i class="fas fa-pen-alt edit_icon"></i></button>
						</form>
						<form id="item_edit_form" style="padding-right: 5px;">
							<button type="button" class="btn btn-success btn-sm item_edit_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#manager_edit_modal" onclick="viewNow(<?php echo $row['id']; ?>)"><i class="fas fa-external-link-alt edit_icon"></i></button>
						</form>
					</div>
				</td>
			</tr>
	<?php		
		}
	?>
			
		</tbody>
	</table>

	<div class="modal fade" id="confirm_del_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" id="delete_modal_body">

		</div>
		</div>
	</div>

	<div class="modal fade bd-example-modal-lg" id="manager_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content" id="item_edit_modal_body">

		</div>
		</div>
	</div>

	<div class="modal fade bd-example-modal-lg" id="form_view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content" id="view_modal_body">

		</div>
		</div>
	</div>
<?php
}
?>