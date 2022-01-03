<?php 
$id =$_GET['id'];
 $conn = mysqli_connect('localhost','root','','UDB');
mysqli_query($conn,"DELETE FROM data WHERE  Phone_id='$id';");
mysqli_close($conn);
header ("Location:../data.php");
?>