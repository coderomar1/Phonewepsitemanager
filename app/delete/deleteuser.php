<?php 
$id =$_GET['id'];
 $conn = mysqli_connect('localhost','root','','UDB');
mysqli_query($conn,"DELETE FROM users WHERE  id ='$id';");
mysqli_close($conn);
header ("Location:../main.php");
?>