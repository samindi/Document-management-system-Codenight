<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function deleteNow(inventory_id){
		$.ajax({
			type : "POST",
			url : "inventory_del_modal.php",
			data : {inventory_id:inventory_id},
			success : function(result){
				$("#delete_modal_body").html(result);
			}
		});
	}
	function editNow(edit_item){
		$.ajax({
			type : "POST",
			url : "inventory_edit_modal.php",
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
	$sql1 = "SELECT * FROM medical_details WHERE medical_batch='$batch_no'";
	$sql1_results = mysqli_query($conn,$sql1);

	?>
	<table class="table table-bordered table-sm" id="check-table">
		<thead class="thead-dark">
			<tr>
				<th>Index No</th>
				<th>Name</th>
				<th>Batch</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql1_results)) {
	?>
			<tr id="row<?php echo $row['id']; ?>">
				<td><?php echo $row["medical_reg_no"]; ?></td>
				<td><?php echo $row["medical_name"]; ?></td>
				<td><?php echo $row["medical_batch"]; ?></td>
				<td class="del-btn edit-btn">
					<div id="main_loc_action_td">
						<form id="item_delete_form" style="padding-right: 10px;">
							<button type="button" class="btn btn-danger btn-sm item_del_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm_del_modal" onclick="deleteNow(<?php echo $row['id']; ?>)"><i class="far fa-trash-alt delete_icon"></i>&nbsp Delete</button>
						</form>
						<form id="item_edit_form" style="padding-right: 10px;">
							<button type="button" class="btn btn-info btn-sm item_edit_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#manager_edit_modal" onclick="editNow(<?php echo $row['id']; ?>)"><i class="fas fa-pen-alt edit_icon"></i>&nbsp Edit</button>
						</form>
						<form id="item_edit_form">
							<button type="button" class="btn btn-success btn-sm item_edit_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#manager_edit_modal" onclick="viewNow(<?php echo $row['id']; ?>)"><i class="fas fa-external-link-alt edit_icon"></i>&nbsp View</button>
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

}else if(!empty($reg_no)){
	$sql1 = "SELECT * FROM medical_details WHERE medical_reg_no='$reg_no'";
	$sql1_results = mysqli_query($conn,$sql1);

?>
	<table class="table table-bordered table-sm" id="check-table">
		<thead class="thead-dark">
			<tr>
				<th>Index No</th>
				<th>Name</th>
				<th>Batch</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody class="table-hover">
	<?php
		while ($row = mysqli_fetch_array($sql1_results)) {
	?>
			<tr id="row<?php echo $row['id']; ?>">
				<td><?php echo $row["medical_reg_no"]; ?></td>
				<td><?php echo $row["medical_name"]; ?></td>
				<td><?php echo $row["medical_batch"]; ?></td>
				<td class="del-btn edit-btn">
					<div id="main_loc_action_td">
						<form id="item_delete_form" style="padding-right: 10px;">
							<button type="button" class="btn btn-danger btn-sm item_del_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm_del_modal" onclick="deleteNow(<?php echo $row['id']; ?>)"><i class="far fa-trash-alt delete_icon"></i>&nbsp Delete</button>
						</form>
						<form id="item_edit_form" style="padding-right: 10px;">
							<button type="button" class="btn btn-info btn-sm item_edit_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#manager_edit_modal" onclick="editNow(<?php echo $row['id']; ?>)"><i class="fas fa-pen-alt edit_icon"></i>&nbsp Edit</button>
						</form>
						<form id="item_edit_form">
							<button type="button" class="btn btn-success btn-sm item_edit_btn" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#manager_edit_modal" onclick="viewNow(<?php echo $row['id']; ?>)"><i class="fas fa-external-link-alt edit_icon"></i>&nbsp View</button>
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
}

?>