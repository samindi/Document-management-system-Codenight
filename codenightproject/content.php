<?php

require_once 'db.php';

session_start();

if ((isset($_SESSION["username"])) && (isset($_SESSION["user_type"]))) {
	if (($_SESSION["username"] == '')&&($_SESSION["user_type"] == '')) {
		
		header("location: index.php");

	}else{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/content-style.css">
	<link rel="stylesheet" type="text/css" href="css/dark-style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="js/content_functions.js"></script>

	<script src="js/printThis.js"></script>

	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="js/jquery.table2excel.js"></script>
	<script src="js/xlsx.core.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.2/jspdf.plugin.autotable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.15/jspdf.plugin.autotable.src.js"></script>
    <script src="js/html2canvas.js"></script>
	<script src="js/tableHTMLExport.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>

	<!-- Import chart.js via CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css"/>
	<script src="js/chartjs-plugin-labels.js"></script>

	<!-- Import D3 Scale Chromatic via CDN -->
  	<script src="https://d3js.org/d3-color.v1.min.js"></script>
  	<script src="https://d3js.org/d3-interpolate.v1.min.js"></script>
  	<script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>

	<!-- <script src="js/canvasjs.min.js"></script> -->

	<link rel="stylesheet" href="css/dcalendar.picker.css">
	<script src="js/dcalendar.picker.js"></script>

	<script src="js/script.js"></script>
	<link rel="stylesheet" href="css/style.css">
	
	<title>DMS | Home</title>

	<link rel="icon" href="images/susl.png">
</head>
<body>
	<!-- Beginning of the scripts -->
	<script type="text/javascript">

		$(window).on("load", function() {
			$(".se-pre-con").fadeOut("slow");
		});

		////////////////////////////////////////document ready functions//////////////////////////////////////////
		$(document).ready(function(){

			function loadGraphs(){
				var load = "websiteloading";

				$.ajax({
					type: "POST",
					url: "graphs.php",
					data: {load:load},
					success: function(graphs){
						$("#graphs-section").html(graphs);
					}
				});
			}

			loadGraphs();

			$.fn.digits = function(){ 
			    return this.each(function(){ 
			        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
			    })
			}
			$(".numbers").digits();

			function settingsLoad(){
				var side_panel = localStorage.getItem('side-panel');
				var user_profile = localStorage.getItem('user_profile');
				var profile_image = localStorage.getItem('profile_image');
				var side_panel_icons = localStorage.getItem('side-panel-icons');
				var logout_div = localStorage.getItem('logout-div');
				var side_panel_divider = localStorage.getItem('side-panel-divider');
				var side_panel_divider1 = localStorage.getItem('side-panel-divider1');
				var page_header = localStorage.getItem('page-header');
				var toggle_btn = localStorage.getItem('toggle-btn');
				var toggle_en_btn = JSON.parse(localStorage.getItem('toggle-en-btn'));
				var page_header_title = localStorage.getItem('header_text');
				var title_hide_btn = JSON.parse(localStorage.getItem('title-hide-btn'));
				if (localStorage.getItem('side_panel_class') === 'true') {
					$("#side-panel").addClass('side-panel0');
				}
				if (localStorage.getItem('main_content_class') === 'true') {
					$("#main-content-panel").addClass('main-content-panel100');
				}
				if (localStorage.getItem('toggle_btn_left') === 'true') {
					$("#side_panel_toggler").addClass('side_panel_t0');
				}

				$("#side-panel").css("background-color",side_panel);
				$("#user_profile").css({'background-color':user_profile,'border-color':user_profile});
				$("#user_profile .profile_image").css("background-color",profile_image);
				$(".side-panel-icons div").css("border-color",side_panel_icons);
				$("#logout-div p").css("color",logout_div);
				$(".side-panel-divider").css("border-color",side_panel_divider);
				$(".side-panel-divider1").css("border-color",side_panel_divider1);
				$("#page-header h3").css("background-color",page_header);
				$("#side_panel_toggler").css('display',toggle_btn);
				$("#toggle-en-btn").attr('checked',toggle_en_btn);
				$("#page-header h3").css('display',page_header_title);
				$("#title-hide-btn").attr('checked',title_hide_btn);
			}

			settingsLoad();

			$(".item_del_btn").click(function(){
				$('#confirm_del_modal').modal('show');
			});
			
			$(".check-condition-div-1").hide();
			$(".check-condition-div-2").hide();
			$(".main_loc_table_view").hide();
			$(".sub_loc_table_view").hide();

			$("#item_status_check").click(function(){
				if ($(this).prop("checked")) {
					$(".check-condition-div-1").show(100);
				}else {
					$(".check-condition-div-1").hide(100);
				}
			});
			$("#toggle-en-btn").click(function(){
				if ($(this).prop("checked")) {
					$("#side_panel_toggler").css('display','block');
					localStorage.setItem('toggle-btn','block');
					localStorage.setItem('toggle-en-btn','true');
				}else{
					$("#side_panel_toggler").css('display','none');
					localStorage.setItem('toggle-btn','none');
					localStorage.setItem('toggle-en-btn','false');
				}
			});
			$("#title-hide-btn").click(function(){
				if ($(this).prop("checked")) {
					$("#page-header h3").css('display','none');
					localStorage.setItem('header_text','none');
					localStorage.setItem('title-hide-btn','true');
				}else{
					$("#page-header h3").css('display','block');
					localStorage.setItem('header_text','block');
					localStorage.setItem('title-hide-btn','false');
				}
			});
			$("#side_panel_toggler").click(function(){
				loadGraphs();
				$("#side-panel").toggleClass('side-panel0');
				$("#main-content-panel").toggleClass('main-content-panel100');
				$("#side_panel_toggler").toggleClass('side_panel_t0');
				localStorage.setItem('side_panel_class',$("#side-panel").hasClass('side-panel0'));
				localStorage.setItem('main_content_class',$("#main-content-panel").hasClass('main-content-panel100'));
				localStorage.setItem('toggle_btn_left',$("#side_panel_toggler").hasClass('side_panel_t0'));
			});

			$("#add_new_doc_alert").hide();

			$("#calendar-div").dcalendar();
			$("#download-pdf-btn").hide();
			$("#download-excel-btn").hide();
			$("#print-table-btn").hide();
			$("#refresh-btn").hide();
			$("#users-tbl-show-div").hide();

			$("#user-reg-alert").hide();

			$("#form1-div").hide();
			$("#form1-1-div").hide();

			$("#form-loc-div2").hide();

			$("#form3, #form5").hide();

			

		});

		//Dashboard download function----------------------------
		$(function(){ 	
			$("#dashboard_report_btn").click(function () {
				const filename  = 'Document Summery Report.pdf';
				var d = new Date();
				html2canvas(document.querySelector('#dashboard_content')).then(canvas => {
					let pdf = new jsPDF('p', 'mm', 'a4');
					pdf.setFontSize(14.5);
	    			pdf.text('Department of Computing & Information Systems', 52, 10);
	    			pdf.setFontSize(10.5);
	    			pdf.text('Documents Details summery Report', 77, 16);
	    			pdf.setFontSize(9);
	    			pdf.text('Date : '+d, 57, 21);
					pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 10, 28, 190, 260);
					pdf.save(filename);
				});
			});
		});

		function showDetails(re_invent_id){
			$.ajax({
				type : "POST",
				url : "view_recover_invent.php",
				data : {re_invent_id:re_invent_id},
				success: function(result1){
					$("#re_invent_modal_content").html(result1);
				}
			});
		}

		$(function(){
			$("#form-type-select").click(function(){
				var formVal = $(this).val();
				if (formVal == "student") {
					$("#form2").show();
					$("#form3, #form5").hide();
				}else if (formVal == "medical") {
					$("#form3").show();
					$("#form2, #form5").hide();
				}else if (formVal == "attendance") {
					$("#form5").show();
					$("#form2, #form3").hide();
				}
			});
		});

		/////////////////////////////////////check inventory functions///////////////////////////////////////////

		//check form div visibility controls--------------------------- 
		$(function(){
			$("#search-type").click(function(){
				var searchVal = $("#search-type").val();
				if (searchVal == "val1") {
					$("#form1-div").show();
					$("#form1-1")[0].reset();
					$("#form1-1-1")[0].reset();
					$("#form1-1-div").hide();
					$("#form1-1-1-div").hide();
				}else if(searchVal == "val2"){
					$("#form1-1-div").show();
					$("#form1")[0].reset();
					$("#form1-1-1")[0].reset();
					$("#form1-div").hide();
					$("#form1-1-1-div").hide();
				}else if(searchVal == "val3"){
					$("#form1-1-1-div").show();
					$("#form1")[0].reset();
					$("#form1-1")[0].reset();
					$("#form1-div").hide();
					$("#form1-1-div").hide();
				}
			});
		});
		//students check----------------------------
		$(function(){
			$("#form1-1-1").on('submit', function(e2){
				e2.preventDefault();

				var batchNo = $("#std_batch_no").val();
				var regNo = $("#std_reg_no").val();
				$.ajax({
					type: 'POST',
					url: 'check_student.php',
					data: {batchNo:batchNo,regNo:regNo},
					success: function(data9){
						$("#table-content").html(data9);
						$("#download-pdf-btn").show();
						$("#download-excel-btn").show();
						$("#print-table-btn").show();
						$("#refresh-btn").show();

						$.fn.digits = function(){ 
						    return this.each(function(){ 
						        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
						    })
						}
						$("#check-table .numbers").digits();
						$("#total-view-div .numbers").digits();
					}
				});
			});
		});
		//medical check-----------------------------
		$(function(){
			$("#form1").on('submit', function(e2){
				e2.preventDefault();

				var batchNo = $("#med_batch_no").val();
				var regNo = $("#med_reg_no").val();
				$.ajax({
					type: 'POST',
					url: 'check_medical.php',
					data: {batchNo:batchNo,regNo:regNo},
					success: function(data1){
						$("#table-content").html(data1);
						$("#download-pdf-btn").show();
						$("#download-excel-btn").show();
						$("#print-table-btn").show();
						$("#refresh-btn").show();

						$.fn.digits = function(){ 
						    return this.each(function(){ 
						        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
						    })
						}
						$("#check-table .numbers").digits();
						$("#total-view-div .numbers").digits();
					}
				});
			});
		});
		//attendance check--------------------------------
		$(function(){
			$("#form1-1").on('submit', function(e5){
				e5.preventDefault();

				var batchNo = $("#att_batch_no").val();
				var regNo = $("#att_reg_no").val();
				$.ajax({
					type: 'POST',
					url: 'check_attendance.php',
					data: {batchNo:batchNo,regNo:regNo},
					success: function(data5){
						$("#table-content").html(data5);
						$("#download-pdf-btn").show();
						$("#download-excel-btn").show();
						$("#print-table-btn").show();
						$("#refresh-btn").show();

						$.fn.digits = function(){ 
						    return this.each(function(){ 
						        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
						    })
						}
						$("#check-table .numbers").digits();
						$("#total-view-div .numbers").digits();
					}
				});
			});
		});
		//pdf download function----------------------------
		$(function(){ 		
			$("#download-pdf-btn").click(function () {
				var oc = $("#sub_locations option:selected").text();
				var oc1 = $("#sub_locations option:selected").val();
				var ac = $("#check_inventory_item").val();
				var sum = $("#table-content #total-view-div #full-total-value").text();

				var d = new Date();
				
				var doc = new jsPDF('l', 'pt', 'a4');
				var elem = $("#table-content table").clone();
				elem.find('tr th:nth-child(10), tr td:nth-child(10)').remove();
    			var res = doc.autoTableHtmlToJson(elem.get(0));
    			doc.setFontSize(19);
    			doc.text('Deaprtment of Computing & Information Systems', 300, 40);
    			doc.setFontSize(14);
    			doc.text('Documents Details Report', 345, 60);

    			if (oc1 !== '') {
    				doc.setFontSize(12);
    				doc.text('Location : '+oc, 25, 90);
    			}
    			else if(ac !== '') {
    				doc.setFontSize(12);
    				doc.text('Inventory Name : '+ac, 25, 90);
    			}

    			doc.setFontSize(10);
    			doc.text(sum, 25, 110);
    			doc.setFontSize(10);
    			doc.text('Date : '+d, 518, 110);
    			
				doc.autoTable(res.columns, res.data,{
					theme: 'grid',
					margin: {top: 130, right: 25, bottom: 30, left: 25},
					bodyStyles: {rowHeight: 20, halign: 'left'},
					styles:{
						tableWidth: 'auto',
						cellWidth: 'wrap',
						font: 'helvetica',
						fontSize: 9.5,
						overflow: 'linebreak',
						halign: 'center',
						valign: 'middle'
					},
					columnStyles: {
						5: {halign: 'right'},
						6: {halign: 'right'},
						7: {halign: 'right'}
					}
				});
				doc.save('Inventory Report.pdf');
			    
			});
		});

		//add new document part---------------------------------------------
		$(function(){
			$("#form2").on('submit', function(e3){
				e3.preventDefault();
				var addStudent = new FormData(this);
				$.ajax({
					type: 'POST',
					url: 'add_new_student.php',
					data: addStudent,
					success: function(data3){
						$("#form2")[0].reset();
						$("#add_new_doc_alert").html(data3).show();
					},
					cache: false,
					contentType: false,
					processData: false
				});
			});
		});
		$(function(){
			$("#form3").on('submit', function(e3_1){
				e3_1.preventDefault();
				var addMedical = new FormData(this);
				$.ajax({
					type: 'POST',
					url: 'add_new_medical.php',
					data: addMedical,
					success: function(data3_1){
						$("#form3")[0].reset();
						$("#add_new_doc_alert").html(data3_1).show();
					},
					cache: false,
					contentType: false,
					processData: false
				});
			});
		});
		$(function(){
			$("#form5").on('submit', function(e3_2){
				e3_2.preventDefault();
				var addAttendance = new FormData(this);
				$.ajax({
					type: 'POST',
					url: 'add_new_att.php',
					data: addAttendance,
					success: function(data3_2){
						$("#form5")[0].reset();
						$("#add_new_doc_alert").html(data3_2).show();
					},
					cache: false,
					contentType: false,
					processData: false
				});
			});
		});

		//user manage part----------------------------------------------
		$(function(){
			$("#form4").on('submit', function(e4){
				e4.preventDefault();

				var title = $("#title").val();
				var first_name = $("#first_name").val();
				var second_name = $("#second_name").val();
				var email = $("#email").val();
				var userrole = $("#userrole").val();				
				var username = $("#username").val();
				var password = $("#password").val();
				var re_password = $("#re_password").val();
				$.ajax({
					type: 'POST',
					url: 'add_user.php',
					data: {title:title, first_name:first_name, second_name:second_name, email:email, userrole:userrole, username:username, password:password, re_password:re_password},
					success: function(data4){
						$("#users-tbl-show-div").hide();
						$("#user-reg-alert").html(data4).show();
						$("#form4")[0].reset();
						$("#show_user_button i").addClass("fa-eye");
						$("#show_user_button i").removeClass("fa-eye-slash");
					}
				});
			});
		});
		//users table show function-------------------------------------
		$(function(){
			$("#show_user_button").click(function(){
				var show_tbl_val = $(this).val();
				$("i", this).toggleClass("fa-eye-slash fa-eye");
				$("#users-tbl-show-div").toggle(100, function(){
					$.ajax({
						type : "POST",
						url : "user_details.php",
						data : {show_tbl_val:show_tbl_val},
						success : function(show){
							$("#users-tbl-show-div").html(show);
						}
					});
				});
			});
		});

	</script>
	<!-- End of scripts -->
	
	<div class="content-div">
		<span id="side_panel_toggler" title="Collapse Side Panel"><i class="fas fa-bars fa-lg"></i></span>
		<div id="side-panel">
			<div id="logout-div">
				<div id="user_profile">
					<div class="profile_image">
					<?php
					$id_img = $_SESSION["id"];
					$sql_img = "SELECT * FROM users WHERE id='$id_img'";
					$sql_rslt = mysqli_query($conn,$sql_img);
					$row = mysqli_fetch_array($sql_rslt);
					echo '<img src="images/users/'.$row["user_image"].'">';
					?>
					</div>
					<div class="profile_name">
						<h5><?php echo " ".$row["title"].". ".$row["first_name"]; ?></h5>
					</div>
					<h6 id="email-para">
						<?php
						if (isset($_SESSION['email'])) {
							echo $_SESSION['email'];
						}
						?>
					</h6>
				</div>
				<!-- <div class="side-panel-divider1"></div> -->
				<p>
					<?php
					if (isset($_SESSION["user_type"])) {
						if ($_SESSION["user_type"] == "admin") {
							echo "You logged as an <b>Admin</b>";
						}elseif ($_SESSION["user_type"] == "super_admin") {
							echo "You logged as a <b>Super Admin</b>";
						}
					}
					?>
				</p>
				<!-- <a href="log_out.php" class="btn btn-danger btn-sm"><b>LOG OUT<i id="log_out_icon" class="fas fa-sign-out-alt fa-lg"></i></b></a> -->
			</div>
			<div class="side-panel-divider"></div>
			<div id="calendar-div"></div>
			<div class="side-panel-divider1"></div>
			<div class="side-panel-icons">
				<div id="settings-icon" data-toggle="modal" data-target="#setting_modal" title="Settings"><i class="fas fa-cog fa-lg"></i></div>
				<div id="logout-icon" ><a href="log_out.php" title="Log Out"><i class="fas fa-power-off fa-lg"></i></a></div>
				<div id="profile-icon" data-toggle="modal" data-target="#exampleModalCenter" title="View User Profile"><i class="fas fa-user-circle fa-lg"></i></div>
			</div>
		</div>
		<div id="main-content-panel">

			<div id="page-header">
				<h3>Document Management System</h3>
			</div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="side-panel-troggler">
			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			  	</button>
			  	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			  		<ul class="nav nav-tabs flex-column" id="mobile-navi">
			  			<?php 
							if (isset($_SESSION["user_type"])) {
								if ($_SESSION["user_type"] == "super_admin") {
									echo '<li class="nav-item" id="check-tab"><a class="nav-link active" id="nav-dash-tab" data-toggle="tab" href="#nav-dash" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-chart-line"></i><span class="verticle-line"></span>Dashboard</a></li>';
									echo '<li class="nav-item" id="check-tab"><a class="nav-link" id="nav-check-tab" data-toggle="tab" href="#nav-check" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-search"></i><span class="verticle-line"></span>Search</a></li>';
									echo '<li class="nav-item" id="add-tab"><a class="nav-link" id="nav-submit-tab" data-toggle="tab" href="#nav-submit" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-plus"></i><span class="verticle-line"></span>Add</a></li>';
									echo '<li class="nav-item" id="user-tab"><a class="nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-users"></i><span class="verticle-line"></span>Users</a></li>';
								}elseif ($_SESSION["user_type"] == "admin") {
									echo '<li class="nav-item" id="check-tab"><a class="nav-link active" id="nav-dash-tab" data-toggle="tab" href="#nav-dash" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-chart-line"></i><span class="verticle-line"></span>Dashboard</a></li>';
									echo '<li class="nav-item" id="check-tab"><a class="nav-link" id="nav-check-tab" data-toggle="tab" href="#nav-check" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-search"></i><span class="verticle-line"></span>Search</a></li>';
									echo '<li class="nav-item" id="user-tab"><a class="nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-users"></i><span class="verticle-line"></span>Users</a></li>';
								}
							}
						?>	
			  		</ul>
			  		<div id="logout-div">
						<div class="row" id="user_profile" data-toggle="modal" data-target="#exampleModalCenter">
							<div class="profile_image col-sm-4 col-md-4 col-lg-4">
							<?php
							$id_img = $_SESSION["id"];
							$sql_img = "SELECT * FROM users WHERE id='$id_img'";
							$sql_rslt = mysqli_query($conn,$sql_img);
							$row = mysqli_fetch_array($sql_rslt);
							echo '<img src="images/users/'.$row["user_image"].'">';
							?>
							</div>
							<div class="profile_name col-sm-8 col-md-8 col-lg-8">
							<?php if(isset($_SESSION["username"])){ ?>
								<i>Welcome!</i><h5><?php echo " ".$_SESSION["title"].". ".$_SESSION["first_name"]; ?></h5>
							<?php 
							}
							?>
							</div>
						</div>
						<div class="side-panel-divider1"></div>
						<p>
							<?php
							if (isset($_SESSION["user_type"])) {
								if ($_SESSION["user_type"] == "admin") {
									echo "You logged as an <b>Admin</b>";
								}elseif ($_SESSION["user_type"] == "super_admin") {
									echo "You logged as a <b>Super Admin</b>";
								}
							}
							?>
						</p>
						<a href="log_out.php" class="btn btn-danger btn-sm"><b>Log out<i id="log_out_icon" class="fas fa-sign-out-alt fa-lg"></i></b></a>
					</div>
			  	</div>
			</nav>
			<ul class="nav nav-tabs" id="nav-tab" role="tablist">
				<?php 
					if (isset($_SESSION["user_type"])) {
						if ($_SESSION["user_type"] == "super_admin") {
							echo '<li class="nav-item" id="check-tab"><a class="nav-link active" id="nav-dash-tab" data-toggle="tab" href="#nav-dash" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-chart-line"></i><span class="verticle-line"></span>Dashboard</a></li>';
							echo '<li class="nav-item" id="check-tab"><a class="nav-link" id="nav-check-tab" data-toggle="tab" href="#nav-check" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-search"></i><span class="verticle-line"></span>Search</a></li>';
							echo '<li class="nav-item" id="add-tab"><a class="nav-link" id="nav-submit-tab" data-toggle="tab" href="#nav-submit" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-plus"></i><span class="verticle-line"></span>Add</a></li>';
							echo '<li class="nav-item" id="user-tab"><a class="nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-users"></i><span class="verticle-line"></span>Users</a></li>';
						}elseif ($_SESSION["user_type"] == "admin") {
							echo '<li class="nav-item" id="check-tab"><a class="nav-link active" id="nav-dash-tab" data-toggle="tab" href="#nav-dash" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-chart-line"></i><span class="verticle-line"></span>Dashboard</a></li>';
							echo '<li class="nav-item" id="check-tab"><a class="nav-link" id="nav-check-tab" data-toggle="tab" href="#nav-check" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-search"></i><span class="verticle-line"></span>Search</a></li>';
							echo '<li class="nav-item" id="user-tab"><a class="nav-link" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-users"></i><span class="verticle-line"></span>Users</a></li>';
						}
					}
				?>
			</ul>

			<div class="tab-content" id="nav-tabContent">

			<!-- Dashboard tab --->
				<div class="tab-pane fade show active " id="nav-dash" role="tabpanel" aria-labelledby="nav-dash-tab">
			  		<div class="row">
			  			<div class="col-sm-9 col-md-9 col-lg-9">
			  				<div class="tab-title" id="dashboard-title"><h4>Dashboard</h4></div>
			  			</div>
			  			<div class="col-sm-3 col-md-3 col-lg-3" style="text-align: right; margin-top: 8px;">
			  				<button id="dashboard_report_btn" class="btn btn-info btn-sm"><i class="fas fa-cloud-download-alt"></i>Generate a Report</button>
			  			</div>
			  		</div>
			  		<div id="dashboard_content">
			  			<div class="row" id="content_1">
				  			<div class="col-sm-12 col-md-4 col-lg-4">
				  				<div id="external_row1">
	  								<div class="main_dash_img_div">
	  									<img src="images/text-documents.png">
	  								</div>
	  								<div class="main_dash_txt_div">
	  									<div class="main_dash_div_title">
			  								Total Documents
			  							</div>
			  							<div class="main_dash_div_vals numbers">
		  								<?php
										  	$totalItems = 11249;
											echo number_format($totalItems);
		  								?>
			  							</div>
	  								</div>
				  				</div>
				  			</div>
				  			<div class="col-sm-12 col-md-4 col-lg-4">
				  				<div id="external_row2">
	  								<div class="main_dash_img_div">
	  									<img src="images/add-file.png">
	  								</div>
	  								<div class="main_dash_txt_div">
	  									<div class="main_dash_div_title">
			  								Newly Created
			  							</div>
			  							<div class="main_dash_div_vals numbers">
		  								<?php
											$completeTotal = 174;
											echo number_format($completeTotal);
		  								?>
			  							</div>
	  								</div>
				  				</div>
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4">
				  				<div id="external_row2">
	  								<div class="main_dash_img_div">
	  									<img src="images/document.png">
	  								</div>
	  								<div class="main_dash_txt_div">
	  									<div class="main_dash_div_title">
			  								Downloads
			  							</div>
			  							<div class="main_dash_div_vals numbers">
		  								<?php
										  	$totalDownloads = 13;
											echo number_format($totalDownloads);
		  								?>
			  							</div>
	  								</div>
				  				</div>
				  			</div>
				  		</div>
			  			<br><br>
						<div id="graphs-section"></div>
			  		</div>
				</div>


			<!-- Search documents tab -->
			  	<div class="tab-pane fade show " id="nav-check" role="tabpanel" aria-labelledby="nav-check-tab">
			  		<div class="tab-title">
			  			<h4>Search documents</h4>
			  		</div>
			  		
			  		<div class="check-condition-div">
			  			<div class="row">
			  				<div class="col-md-4">
			  					<label for="inputState">Select Document Type</label>
			  					<select class="form-control form-control-sm" name="search-type" id="search-type">
			  						<option value="val3" selected>Student Details</option>
			  						<option value="val1">Medical Submissions</option>
			  						<option value="val2">80% Attendance Reports</option>
			  					</select>
			  				</div>
			  				<div class="col-md-1">
			  					<div class="verticle-line-check"></div>
			  				</div>
			  				<div class="col-md-7" id="form1-1-1-div">
			  					<form id="form1-1-1">
									<div>
										<div>
											<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link btn-sm active" id="pills-home-tab" data-toggle="pill" href="#std_batch" role="tab" aria-controls="pills-home" aria-selected="true">Batch-wise</a>
												</li>
												<li class="nav-item">
													<a class="nav-link btn-sm" id="pills-profile-tab" data-toggle="pill" href="#std_reg" role="tab" aria-controls="pills-profile" aria-selected="false">Student-wise</a>
												</li>
											</ul>
										</div>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade show active" id="std_batch" role="tabpanel" aria-labelledby="pills-home-tab">
												<select class="form-control form-control-sm" name="std_batch_no" id="std_batch_no">
													<option value="" selected>Select the batch</option>
													<option value="1">1st year</option>
													<option value="2">2nd year</option>
													<option value="3">3rd year</option>
													<option value="4">4th year</option>
												</select>
											</div>
											<div class="tab-pane fade" id="std_reg" role="tabpanel" aria-labelledby="pills-profile-tab">
												<input type="text" class="form-control form-control-sm" name="std_reg_no" id="std_reg_no" placeholder="Registration Number">
											</div>
										</div>									
									</div>
									<div class="button-div" id="check-button-div">
								    	<button type="submit" class="btn btn-success btn-sm form-button" id="check_button2"><i class="fas fa-search"></i>Find Document</button>
								    </div>
								</form>
							    <div class="col-md-7">
							    	<div id="check-alert-div"></div>
							    </div>
			  				</div>
			  				<div class="col-md-7" id="form1-div">
			  					<form id="form1">
									<div>
										<div>
											<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link btn-sm active" id="pills-home-tab" data-toggle="pill" href="#med_batch" role="tab" aria-controls="pills-home" aria-selected="true">Batch-wise</a>
												</li>
												<li class="nav-item">
													<a class="nav-link btn-sm" id="pills-profile-tab" data-toggle="pill" href="#med_reg" role="tab" aria-controls="pills-profile" aria-selected="false">Student-wise</a>
												</li>
											</ul>
										</div>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade show active" id="med_batch" role="tabpanel" aria-labelledby="pills-home-tab">
												<select class="form-control form-control-sm" name="med_batch_no" id="med_batch_no">
													<option value="" selected>Select the batch</option>
													<option value="1">1st year</option>
													<option value="2">2nd year</option>
													<option value="3">3rd year</option>
													<option value="4">4th year</option>
												</select>
											</div>
											<div class="tab-pane fade" id="med_reg" role="tabpanel" aria-labelledby="pills-profile-tab">
												<input type="text" class="form-control form-control-sm" name="med_reg_no" id="med_reg_no" placeholder="Registration Number">
											</div>
										</div>									
									</div>
									<div class="button-div" id="check-button-div">
								    	<button type="submit" class="btn btn-success btn-sm form-button" id="check_button"><i class="fas fa-search"></i>Find Document</button>
								    </div>
								</form>
							    <div class="col-md-7">
							    	<div id="check-alert-div"></div>
							    </div>
			  				</div>
			  				<div class="col-md-7" id="form1-1-div">
			  					<form id="form1-1">
									<div>
										<div>
											<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link btn-sm active" id="pills-home-tab" data-toggle="pill" href="#att_batch" role="tab" aria-controls="pills-home" aria-selected="true">Batch-wise</a>
												</li>
												<li class="nav-item">
													<a class="nav-link btn-sm" id="pills-profile-tab" data-toggle="pill" href="#att_reg" role="tab" aria-controls="pills-profile" aria-selected="false">Student-wise</a>
												</li>
											</ul>
										</div>
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade show active" id="att_batch" role="tabpanel" aria-labelledby="pills-home-tab">
												<select class="form-control form-control-sm" name="att_batch_no" id="att_batch_no">
													<option value="" selected>Select the batch</option>
													<option value="1">1st year</option>
													<option value="2">2nd year</option>
													<option value="3">3rd year</option>
													<option value="4">4th year</option>
												</select>
											</div>
											<div class="tab-pane fade" id="att_reg" role="tabpanel" aria-labelledby="pills-profile-tab">
												<input type="text" class="form-control form-control-sm" name="att_reg_no" id="att_reg_no" placeholder="Registration Number">
											</div>
										</div>									
									</div>
									<div class="button-div" id="check-button-div">
								    	<button type="submit" class="btn btn-success btn-sm form-button" id="check_button1"><i class="fas fa-search"></i>Find Document</button>
								    </div>
								</form>
							    <div class="col-md-7">
							    	<div id="check-alert-div1"></div>
							    </div>
			  				</div>
			  			</div>
			  		</div>
					<div class="table-responsive-sm table-responsive-md" id="table-content"></div>
					<hr>
					<div class="row">
						<div class="col-md-4" id="button_div1">
							<button class="btn btn-primary btn-sm" id="download-pdf-btn"><i class="fas fa-file-pdf fa-lg"></i><b>PDF</b></button>
							<button class="btn btn-success btn-sm" id="download-excel-btn" onclick="exportTableToExcel()"><i class="fas fa-file-excel fa-lg"></i><b>EXCEL</b></button>
						</div>
					</div>
			  	</div>

			<!-- Add documents tab -->
			  	<div class="tab-pane fade" id="nav-submit" role="tabpanel" aria-labelledby="nav-submit-tab">
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-9">
							<div class="tab-title">
								<h4>Add a new document</h4>
							</div>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-3 mt-2 text-right">
							<select id="form-type-select" class="form-control form-control-sm">
								<option value="student">Student Details</option>
								<option value="medical">Medical submission</option>
								<option value="attendance">80% attendance submission</option>
							</select>
						</div>
					</div>
			  		<div class="check-condition-div">
			  			<form id="form2"> <!-- student details form -->
							<div class="row">
							    <div class="form-group col-md-12">
							      	<label for="inputZip">Student's Name</label>
							      	<input type="text" class="form-control form-control-sm" id="student_name" name="student_name" placeholder="Full name here">
							    </div>
							</div>
			  				<div class="row" >
								<div class="form-group col-md-4">
							      	<label for="inputZip">Registration No:</label>
							      	<input type="text" class="form-control form-control-sm" id="reg_no" name="reg_no" placeholder="Registration number">
							    </div>
							    <div class="form-group col-md-4">
							      	<label for="inputCity">Batch</label>
							      	<select id="batch" class="form-control form-control-sm" name="batch">
							        	<option selected>Choose...</option>
										<option value="1">1st year</option>
										<option value="2">2nd year</option>
										<option value="3">3rd year</option>
										<option value="4">4th year</option>
							      	</select>
								</div>
								<div class="form-group col-md-4">
							      	<label for="inputZip">Acedamic Year</label>
							      	<input type="text" class="form-control form-control-sm" id="acedamic" name="acedamic" placeholder="Academic year">
							    </div>
							</div>
							<div class="row" >
								<div class="form-group col-md-3">
							      	<label for="inputZip">Contact No:</label>
							      	<input type="text" class="form-control form-control-sm" id="contact_no" name="contact_no" placeholder="Available contact number">
							    </div>
								<div class="form-group col-md-6">
							      	<label for="inputZip">Email</label>
							      	<input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Valid email">
								</div>
								<div class="form-group col-md-3">
							      	<label for="inputZip">Date of Birth</label>
							      	<input type="text" class="form-control form-control-sm" id="bof" name="bof" placeholder="DD/MM/YYYY">
							    </div>
							</div>
							<div class="row" >
								<div class="form-group col-md-8">
							      	<label for="inputZip">Permanent Address</label>
							      	<input type="text" class="form-control form-control-sm" id="address" name="address" placeholder="Current Permenent Address">
							    </div>
								<div class="form-group col-md-4">
							      	<label for="inputZip">Profile Photo</label><br>
							      	<input type="file" class="form-control form-control-sm" id="profile_photo" name="profile_photo">
							    </div>
							</div>
						    <div class="button-div">
						    	<button type="submit" class="btn btn-success btn-sm form-button" id="new_item_add_btn"><i class="fas fa-plus"></i>Add Document</button>
						    </div>
						</form>
						<form id="form3"> <!-- Medical submit form -->
							<div class="row">
							    <div class="form-group col-md-8">
							      	<label for="inputZip">Student's Name</label>
							      	<input type="text" class="form-control form-control-sm" id="medical_name" name="medical_name" placeholder="Full name here">
							    </div>
								<div class="form-group col-md-4">
							      	<label for="inputZip">Registration No:</label>
							      	<input type="text" class="form-control form-control-sm" id="medical_reg_no" name="medical_reg_no" placeholder="Registration number">
							    </div>
							</div>
			  				<div class="row" >
								<div class="form-group col-md-4">
							      	<label for="inputCity">Batch</label>
							      	<select id="batch" class="form-control form-control-sm" name="medical_batch">
							        	<option selected>Choose...</option>
										<option value="1">1st year</option>
										<option value="2">2nd year</option>
										<option value="3">3rd year</option>
										<option value="4">4th year</option>
							      	</select>
								</div>
								<div class="form-group col-md-5">
							      	<label for="inputZip">Medical Submit Form</label><br>
							      	<input type="file" class="form-control form-control-sm" id="medical_photo" name="medical_photo">
							    </div>
							</div>
							<div class="row" >
							</div>
						    <div class="button-div">
						    	<button type="submit" class="btn btn-success btn-sm form-button" id="new_item_add_btn"><i class="fas fa-plus"></i>Add Document</button>
						    </div>
						</form>
						<form id="form5"> <!-- 80% attendance form -->
							<div class="row">
							    <div class="form-group col-md-8">
							      	<label for="inputZip">Student's Name</label>
							      	<input type="text" class="form-control form-control-sm" id="att_name" name="att_name" placeholder="Full name here">
							    </div>
								<div class="form-group col-md-4">
							      	<label for="inputZip">Registration No:</label>
							      	<input type="text" class="form-control form-control-sm" id="att_reg_no" name="att_reg_no" placeholder="Registration number">
							    </div>
							</div>
			  				<div class="row" >
								<div class="form-group col-md-4">
							      	<label for="inputCity">Batch</label>
							      	<select id="batch" class="form-control form-control-sm" name="att_batch">
							        	<option selected>Choose...</option>
										<option value="1">1st year</option>
										<option value="2">2nd year</option>
										<option value="3">3rd year</option>
										<option value="4">4th year</option>
							      	</select>
								</div>
								<div class="form-group col-md-5">
							      	<label for="inputZip">80% Attendance Sheet</label><br>
							      	<input type="file" class="form-control form-control-sm" id="att_photo" name="att_photo">
							    </div>
							</div>
							<div class="row" >
							</div>
						    <div class="button-div">
						    	<button type="submit" class="btn btn-success btn-sm form-button" id="new_item_add_btn"><i class="fas fa-plus"></i>Add Document</button>
						    </div>
			  			</form>
			  		</div>
					<br>
			  		<div id="add_new_doc_alert"></div>
			  	</div>
			  	
			<!-- User manage tab -->
			  	<div class="tab-pane fade" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
			  		<div class="tab-title">
			  			<h4>Add / Manage Users</h4>
			  		</div>
			  		<div class="check-condition-div">
			  			<form id="form4">
			  				<div class="row">
			  					<div class="form-group col-md-2">
							      	<label for="inputState">Title</label>
							      	<select id="title" class="form-control form-control-sm" name="title">
							        	<option value="" selected>Choose...</option>
							        	<option value="Mr">Mr</option>
							        	<option value="Mrs">Mrs</option>
							        	<option value="Miss">Miss</option>
							      	</select>
							    </div>
							    <div class="form-group col-md-5">
							      	<label for="inputState">First Name</label>
							      	<input type="text" class="form-control form-control-sm" id="first_name" name="first_name" placeholder="First name here...">
							    </div>
							    <div class="form-group col-md-5">
							      	<label for="inputZip">Last Name</label>
							      	<input type="text" class="form-control form-control-sm" id="second_name" name="second_name" placeholder="Second name here...">
							    </div>
							</div>
							<div class="row">
							    <div class="form-group col-md-6">
							      	<label for="inputCity">E-mail</label>
							      	<input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="E-mail address here...">
							    </div>
							    <div class="form-group col-md-3">
							      	<label for="inputState">User Role</label>
							      	<select id="userrole" class="form-control form-control-sm" name="userrole">
							        	<option value="" selected>Choose...</option>
							        	<option value="admin">Admin</option>
							        	<option value="manager">Manager</option>
							        	<option value="user">User</option>
							      	</select>
							    </div>
							</div>
							<div class="row">
							    <div class="form-group col-md-4">
							      	<label for="inputCity">Username</label>
							      	<input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Username here...">
							    </div>
							    <div class="form-group col-md-4">
							      	<label for="inputCity">Password</label>
							      	<input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password here...">
							    </div>
							    <div class="form-group col-md-4">
							      	<label for="inputCity">Confirm Password</label>
							      	<input type="password" class="form-control form-control-sm" id="re_password" name="re_password" placeholder="Re-enteer password here...">
							    </div>
							</div>
						    <div class="button-div">
						    	<button type="submit" class="btn btn-success btn-sm form-button" id="user_submit_btn"><i class="fas fa-user-plus"></i>Add User</button>
						    </div>
			  			</form>
			  		</div>
			  		<div id="user-reg-alert"></div>
			  		<hr>
				<!-- User details table -->
			  		<div id="user-details">
			  			<div class="form-group col-md-3 custom_btn">
  							<button class="btn" type="submit" id="show_user_button"><i class="fas fa-eye fa-lg"></i><b>Users</b></button>
			    		</div>
			  			<div class="col-md-10 table-responsive-sm table-responsive-md" id="users-tbl-show-div"></div>
			  		</div>
			  	</div>
			</div>
		</div>
	</div>

	<?php include 'profile_modal.php'; ?>

	<script>
		function exportTableToExcel(tableID, filename = ''){
		    var downloadLink;
		    var dataType = 'application/vnd.ms-excel';
		    var tableSelect = document.getElementById('check-table');
		    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
		    
		    filename = filename?filename+'.xls':'ims.xls';
		    
		    downloadLink = document.createElement("a");
		    
		    document.body.appendChild(downloadLink);
		    
		    if(navigator.msSaveOrOpenBlob){
		        var blob = new Blob(['\ufeff', tableHTML], {type: dataType});
		        navigator.msSaveOrOpenBlob(blob, filename);
		    }else{
		        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
		        downloadLink.download = filename;
		        downloadLink.click();
		    }
		}
	</script>
</body>
<div class="se-pre-con"></div>
</html>

<?php		
	}
}else{
	header("location: index.php");
}
?>