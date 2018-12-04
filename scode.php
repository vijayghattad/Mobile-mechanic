<script type="text/javascript">
function scode(id){
  $.ajax({
      url: 'scode.php',
      type: 'POST',
      data: 'scode='+scode,
   });
}
</script>
<?php
include "connection.php";
$scode=$_GET['scode'];
$sid=$_GET['sid'];
$result=mysqli_query($conn,"select * from servicerequest where servicecode=$scode") or die(mysqli_error($conn));
$count=mysqli_num_rows($result);
$data=mysqli_fetch_array($result);
if($count>0)
{
  $sql="UPDATE servicerequest SET status='Completed' AND servicecode=$scode WHERE sid=$sid";
$status=mysql_query($conn,$sql);
if($status>0)
{
  ?>

<script type="text/javascript">
  
  window.location="mprofile.php";
  alert("Service Code Matched");

</script>
?>
<?php
}
}
else
{
    ?>
    <script type="text/javascript">
      window.location="mprofile.php";
 alert("Service Code Didn't Matched");
</script>
<?php
}
?>