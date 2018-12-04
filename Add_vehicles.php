<?php
session_start();
if (isset($_SESSION['cemail'])) {
    ?>

<!DOCTYPE html>
<html>
    <head>
        <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
        <link href="images/style.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="CSS/jquery-ui.css">
        <link rel="stylesheet" href="CSS/bootstrap.min.css" />
		<script src="JS/jquery.min.js"></script>  
		<script src="JS/jquery-ui.js"></script>
		<style>
  button{
      background-color:#ff9933;
      color: white;
      border-radius:30px;
      text-align:center;
      font-size:17px;
	  width:80px;
	  height:30px;
      margin-left:20px;
      font-family:Comic Sans MS;
  }    
</style>

<!-- Pirobox setup and styles end-->
    </head>
    <body>
	<button><a href="logout.php">Logout</a></button>
    <br> <br> <br>
    <font color="white" face="Comic Sans MS">
    	<div id="wrap">	
		      <div id="top_padding">
					<div id="logo">
						<h1><b>MOBILE MECHANIC</b></h1>
						<h1>Administrator</h2>
                    </div>    
				<div class="clear"></div>
				</div>
				<div id="menu">
					<ul>
						<li><a href="admin.php">Home</a></li>
						<li><a href="Mechanic_details.php"  class="active">Mechanic_Details</a></li>
						<li style="text-align:right;"><a href="Add_vehicles.php">Add_Vehicles</a></li>
					</ul>
				</div>
				
				<div id="content_bg_repeat">
						<div class="container">
								<br />
								
								<h2 align="center">ADD VEHICLE</a></h2><br />
								<br />
								<div align="right" style="margin-bottom:5px;">
								<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
								</div>
								<div class="table-responsive" id="user_data">
								</div>
								<br/>
							</div>
							
							<div id="user_dialog" title="Add Data">
								<form method="post" id="user_form">
									<div class="form-group">
										<label>Enter Vehicle Category</label>
										<input type="text" name="vcat" id="vcat" class="form-control" />
										<span id="error_vcat" class="text-danger"></span>
									</div>
									<div class="form-group">
										<label>Enter Vehicle Type</label>
										<input type="text" name="vtype" id="vtype" class="form-control" />
										<span id="error_vtype" class="text-danger"></span>
									</div>
									<div class="form-group">
										<label>Enter Vehicle Name</label>
										<input type="text" name="vname" id="vname" class="form-control" />
										<span id="error_vname" class="text-danger"></span>
									</div>
									<div class="form-group">
										<label>Enter Mechanic ID</label>
										<input type="text" name="mid" id="mid" class="form-control" />
										<span id="error_mid" class="text-danger"></span>
									</div>
									<div class="form-group">
										<input type="hidden" name="action" id="action" value="insert" />
										<input type="hidden" name="hidden_id" id="hidden_id" />
										<input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
									</div>
								</form>
							</div>
							
							<div id="action_alert" title="Action">
							</div>
							<div id="delete_confirmation" title="Confirmation">
							<p>Are you sure you want to Delete this data?</p>
							</div>
	            </div>		
			</div>
        </div>							
</font> 
    </body>
</html>  
					
					
					
					
					<script>  
					$(document).ready(function(){  
					
						load_data();
						
						function load_data()
						{
							$.ajax({
								url:"fetch.php",
								method:"POST",
								success:function(data)
								{
									$('#user_data').html(data);
								}
							});
						}
						
						$("#user_dialog").dialog({
							autoOpen:false,
							width:400
						});
						
						$('#add').click(function(){
							$('#user_dialog').attr('title', 'Add Data');
							$('#action').val('insert');
							$('#form_action').val('Insert');
							$('#user_form')[0].reset();
							$('#form_action').attr('disabled', false);
							$("#user_dialog").dialog('open');
						});
						
						$('#user_form').on('submit', function(event){
							event.preventDefault();
							var error_vcat = '';
							var error_vtype = '';
							var error_vname = '';
							var error_mid = '';
							if($('#vcat').val() == '')
							{
								error_vcat = 'Vehicle category is required';
								$('#error_vcat').text(error_vcat);
								$('#vcat').css('border-color', '#cc0000');
							}
							else
							{
								error_vcat = '';
								$('#error_vcat').text(error_vcat);
								$('#vcat').css('border-color', '');
							}
							if($('#vtype').val() == '')
							{
								error_vtype = 'Vehicle Type is required';
								$('#error_vtype').text(error_vtype);
								$('#vtype').css('border-color', '#cc0000');
							}
							else
							{
								error_vtype = '';
								$('#error_vtype').text(error_vtype);
								$('#vtype').css('border-color', '');
							}
					
							if($('#vname').val() == '')
							{
								error_vname = 'Vehicle Name is required';
								$('#error_vname').text(error_vname);
								$('#vname').css('border-color', '#cc0000');
							}
							else
							{
								error_vname = '';
								$('#error_vname').text(error_vname);
								$('#vname').css('border-color', '');
							}
					
							if($('#mid').val() == '')
							{
								error_mid = 'Mechanic ID is required';
								$('#error_mid').text(error_mid);
								$('#mid').css('border-color', '#cc0000');
							}
							else
							{
								error_mid = '';
								$('#error_mid').text(error_mid);
								$('#mid').css('border-color', '');
							}
							
							if(error_vcat != '' || error_vtype != '' || error_vname != '' || error_mid != '')
							{
								return false;
							}
							else
							{
								$('#form_action').attr('disabled', 'disabled');
								var form_data = $(this).serialize();
								$.ajax({
									url:"action.php",
									method:"POST",
									data:form_data,
									success:function(data)
									{
										$('#user_dialog').dialog('close');
										$('#action_alert').html(data);
										$('#action_alert').dialog('open');
										load_data();
										$('#form_action').attr('disabled', false);
									}
								});
							}
							
						});
						
						$('#action_alert').dialog({
							autoOpen:false
						});
						
						$(document).on('click', '.edit', function(){
							var id = $(this).attr('id');
							var action = 'fetch_single';
							$.ajax({
								url:"action.php",
								method:"POST",
								data:{id:id, action:action},
								dataType:"json",
								success:function(data)
								{
									$('#vcat').val(data.vcat);
									$('#vtype').val(data.vtype);
									$('#vname').val(data.vname);
									$('#mid').val(data.mid);
									$('#user_dialog').attr('title', 'Edit Data');
									$('#action').val('update');
									$('#hidden_id').val(id);
									$('#form_action').val('Update');
									$('#user_dialog').dialog('open');
								}
							});
						});
						
						$('#delete_confirmation').dialog({
							autoOpen:false,
							modal: true,
							buttons:{
								Ok : function(){
									var id = $(this).data('id');
									var action = 'delete';
									$.ajax({
										url:"action.php",
										method:"POST",
										data:{id:id, action:action},
										success:function(data)
										{
											$('#delete_confirmation').dialog('close');
											$('#action_alert').html(data);
											$('#action_alert').dialog('open');
											load_data();
										}
									});
								},
								Cancel : function(){
									$(this).dialog('close');
								}
							}	
						});
						
						$(document).on('click', '.delete', function(){
							var id = $(this).attr("id");
							$('#delete_confirmation').data('id', id).dialog('open');
						});
						
					});  
					</script>
	<?php 
} else {
    ?>
    <script>
    alert("Please login");
    window.location="index.php";
    </script>
    <?php

}
?>
				