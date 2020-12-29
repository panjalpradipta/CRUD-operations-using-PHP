<?php 
 include 'conn.php';
 $id = $_GET['id'];
 $query = "DELETE from user_data where id='$id'";
 $res = mysqli_query($conn,$query);

if($res)
{
	header("location:display.php");
}
else
{
	echo "Unable to delete";
}
?>