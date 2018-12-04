<?php
session_start();
if (isset($_SESSION['cemail'])) {
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>    
        <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
		    <link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
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
    </head>
    <body>
	<button><a href="logout.php">Logout</a></button>
    <br> <br> <br>
    	<div id="wrap">	
				<div id="top_padding">
					<div id="logo">
						<h1><b>MOBILE MECHANIC</b></h1>
						<h1>ADMINISTRATOR</h2>
					</div>
				<div class="clear"></div>
				</div>
				<div id="prew_img">
				
				   <ul class="round">
			     <li><img src="images/update1.jpg" alt="" /></li>
			     <li><img src="images/update2.jpg" alt="" /></li>
			     <li><img src="images/update3.jpg" alt="" /></li>
			     <li><img src="images/update4.jpg" alt="" /></li>
			     <li><img src="images/update5.jpg" alt="" /></li>
			     <li><img src="images/update6.png" alt="" /></li>
           </ul>
           <script type="text/javascript" src="lib/jquery.js"></script>
           <script type="text/javascript" src="lib/jquery.roundabout.js"></script>
          <script type="text/javascript">
			
			    $(document).ready(function() {
				  $('.round').roundabout();
			    });
		
		      </script>
				</div>
				
				<div id="menu">
					<ul>
						<li><a href="admin.php">Home</a></li>
						<li><a href="Mechanic_details.php"  class="active">Mechanic_Details</a></li>					
						<li style="text-align:right;"><a href="Add_vehicles.php">Add_Vehicles</a></li>
						
					</ul>
				</div>
							
				<div id="content_bg_repeat">
				<p style="font-face:comic sans ms"><img src="images/b1.jpeg" height=300px width=400px style="float:left">
					<h1 style="margin-top:80px;">Our mechanics can perform a wide range of repairs on motorcycles. Motorcycle mechanics can be employed in various 
					types of stores, ranging from large department stores to small local bike shops and provide all type of service like
				    repairing, washing, bike puncher ect.</h1> 
                    
					<img src="images/b3.png" align="right" height=300px width=490px style="margin-top:170px">
					<h1 style="margin-top:280px;">Automotive design is the process of developing the appearance, and to some extent the ergonomics, of motor vehicles, 
					including automobiles, motorcycles, trucks, buses, coaches, and vans. The functional design and development of a modern motor vehicle is typically 
					done by a large team from many different disciplines included within automotive engineering.</h1>
                    
					<img src="images/b2.jpg" height=320px width=450px style="margin-top:160px">
					<h1 style="margin-left:470px; margin-top:-230px; margin-bottom:80px;">An auto mechanic is a mechanic with a variety of automobile makes or either in a specific area or in a 
					specific make of automobile. In repairing cars, their main role is to diagnose the problem accurately and quickly. They often have to 
					quote prices for their customers before commencing work or after partial disassembly for inspection. Their job may involve the repair of 
					a specific part or the replacement of one or more parts as assemblies.</h1>
				</p>	
				</div>
			</div>	
    </body>
</html>
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
