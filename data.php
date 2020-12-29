<?php 

include 'conn.php';

if(isset($_POST['register']))
{
	$name 	=		$_POST['name'];
	$email 	=		$_POST['email'];
	$phone 	=		$_POST['phone'];

	$query = "INSERT INTO user_data (name, email, phone) values ('$name', '$email', '$phone')";
	$res = mysqli_query($conn,$query);
	if($res==1)
	{
		header("location:index.php?noError=true");
	}
	else
	{
		header("location:index.php?error=true");
	}
}



















?>