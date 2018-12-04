<?php
session_start();
if (isset($_SESSION['cemail'])) {
    ?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="CSS/jquery-ui.css">
        <link rel="stylesheet" href="CSS/bootstrap.min.css" />
		<script src="JS/jquery.min.js"></script>  
		<script src="JS/jquery-ui.js"></script>
        <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
		<style>
  button{
      background-color:#ff9933;
      color: white;
      border-radius:20px;
      text-align:center;
      font-size:17px;
	  width:80px;
	  height:30px;
      margin-left:20px;
      font-family:Comic Sans MS;
  }    
</style>
    </head>
    <body>
	<button><a href="logout.php">Logout</a></button>
    <br> <br> <br>
    <font color="white" face="Comic Sans MS">
    	<div id="wrap">		        
				<div id="top_padding">
				
					<div id="logo">
						<h1><b>MOBILE MECHANIC</b></h1>
						<h1>ADMINISTRATOR</h1>
					</div>
				<div class="clear"></div>
                </div>	
               
				<div id="menu">
					<ul>
						<li><a href="admin.php">Home</a></li>
						<li><a href="Mechanic_details.php"  class="active">Mechanic_Details</a></li>
						<li style="text-align:right;"><a href="Add_vehicles.php">Add_Vehicles</a></li>	
				</div>
				
				<div id="content_bg_repeat">
                <div class="container">
			<br />
			
			<h2 align="center">MECHANIC DETAILS</a></h2><br />
			<br />
			
			<div class="table-responsive" id="user_data">
				
			</div>
			<br />
		</div>
		
		<div id="user_dialog" title="Add Data">
			<form method="post" id="user_form">
				<div class="form-group">
					<label>Enter the Name</label>
					<input type="text" name="mname" id="mname" class="form-control" />
					<span id="error_mname" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Phone Number</label>
					<input type="text" name="mphone" id="mphone" class="form-control" />
					<span id="error_mphone" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Shop Address</label>
					<input type="text" name="shopaddress" id="shopaddress" class="form-control" />
					<span id="error_shopaddress" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Aadhar Number</label>
					<input type="text" name="maadhar" id="maadhar" class="form-control" />
					<span id="error_maadhar" class="text-danger"></span>
				</div>
				<div class="form-group">
					<label>Enter Driving Licence Number</label>
					<input type="text" name="dlnum" id="dlnum" class="form-control" />
					<span id="error_dlnum" class="text-danger"></span>
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
</font>
    </body>
</html>





<script>  
$(document).ready(function(){  

	load_data();
    
	function load_data()
	{
		$.ajax({
			url:"mfetch.php",
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
		var error_mname = '';
		var error_mphone = '';
		var error_shopaddress = '';
		var error_maadhar = '';
		var error_dlnum = '';
		if($('#mname').val() == '')
		{
			error_mname = 'Name is required';
			$('#error_mname').text(error_mname);
			$('#mname').css('border-color', '#cc0000');
		}
		else
		{
			error_mname = '';
			$('#error_mname').text(error_mname);
			$('#mname').css('border-color', '');
		}

		if($('#mphone').val() == '')
		{
			error_mphone = 'Phone Number is required';
			$('#error_mphone').text(error_mphone);
			$('#mphone').css('border-color', '#cc0000');
		}
		else
		{
			error_mphone = '';
			$('#error_mphone').text(error_mphone);
			$('#mphone').css('border-color', '');
		}

		if($('#shopaddress').val() == '')
		{
			error_shopaddress = 'Shop Address is required';
			$('#error_shopaddress').text(error_shopaddress);
			$('#shopaddress').css('border-color', '#cc0000');
		}
		else
		{
			error_shopaddress = '';
			$('#error_shopaddress').text(error_shopaddress);
			$('#shopaddress').css('border-color', '');
		}

		if($('#maadhar').val() == '')
		{
			error_maadhar = 'Aadhar Number is required';
			$('#error_maadhar').text(error_maadhar);
			$('#maadhar').css('border-color', '#cc0000');
		}
		else
		{
			error_maadhar = '';
			$('#error_maadhar').text(error_mid);
			$('#maadhar').css('border-color', '');
		}
		
		
		if($('#dlnum').val() == '')
		{
			error_dlnum = 'Driving Licence Number is required';
			$('#error_dlnum').text(error_dlnum);
			$('#dlnum').css('border-color', '#cc0000');
		}
		else
		{
			error_dlnum = '';
			$('#error_dlnum').text(error_dlnum);
			$('#dlnum').css('border-color', '');
		}
		if(error_mname != '' || error_mphone != '' || error_shopaddress != '' || error_maadhar != '' || error_dlnum != '')
		{
			return false;
		}
		else
		{
			$('#form_action').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"maction.php",
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
	
	
	
	$('#delete_confirmation').dialog({
		autoOpen:false,
		modal: true,
		buttons:{
			Ok : function(){
				var id = $(this).data('id');
				var action = 'delete';
				$.ajax({
					url:"maction.php",
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