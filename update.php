<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<!--Bootstrap Integration-->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="registration.css">
	<!--Google Font-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">

	<!--JavaScript Validation-->
        <script type="text/javascript">
        	function emailValid(){
                var em = document.getElementById('email').value; //Fetching value from EMAIL input field.
                var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(regex.test(em)){
                    document.getElementById('errorEmail').innerHTML='';
                    document.getElementById('update').disabled= false;
                }
                else{
                    document.getElementById('errorEmail').innerHTML='Invalid Email Address';
                    document.getElementById('update').disabled= true;
                }
            }

            function phoneCheck()
		    {
		        var phone = document.getElementById('phone').value;
		        if (phone.substr(0,1)=='9' || phone.substr(0,1)=='8' || phone.substr(0,1)=='7' || phone.substr(0,1)=='6')
		            {
		                if(phone.length == 10)
		                    {
		                        document.getElementById('errorContact').innerHTML = '';
		                        document.getElementById('update').disabled=false;
		                    }
		                else
		                    {
		                        document.getElementById('errorContact').innerHTML = 'Phone Number must contain 10 digits';
		                        document.getElementById('update').disabled=true;
		                    }
		            }
		        else
		            {
		                document.getElementById('errorContact').innerHTML = 'Phone Number should starts with 9/8/7/6/5';
		                document.getElementById('update').disabled=true; 
		            }
		    }
        </script>
     
</head>
<body>
	<?php 
		

		include 'conn.php';
		if(isset($_POST['update']))
		{
			$name 	=		$_POST['name'];
			$email 	=		$_POST['email'];
			$phone 	=		$_POST['phone'];

			$id = $_GET['id'];

			$query = "UPDATE user_data SET name='$name', email='$email', phone='$phone' where id='$id'";
			$res = mysqli_query($conn,$query);
			if($res==1)
			{
				header("location:display.php?noError=true");
			}
			else
			{
				header("location:display.php?error=true");
			}
		}
?>
	<div class="header">
		<h3>Update Yourself</h3>
	</div>
	<?php 
	include 'conn.php';
	$query = "SELECT * FROM user_data";
	$res = mysqli_query($conn,$query);
	$result = mysqli_fetch_array($res);
	?>
	<div class="container">
		<form action="" method="POST">
			<div class="form-group">
			    <label for="pwd">Name:</label>
			    <input type="text" class="form-control" value="<?php echo $result['name']; ?>" id="name" name="name">
		  	</div>

		  	<div class="form-group">
			    <label for="email">Email address:</label>
				<input type="email" class="form-control" value="<?php echo $result['email']; ?>"  id="email" name="email" required onkeyup="emailValid()">
			     <span id="errorEmail" style="color:white;"><!--Error Show--></span>
		  	</div>
		  
		  	<div class="form-group">
			    <label for="pwd">Phone</label>
			    <input type="number" class="form-control" value="<?php echo $result['phone']; ?>" id="phone" name="phone" required onkeyup="phoneCheck()">
			    <span id="errorContact" style="color:white;"></span>
		  	</div>
		 	<button type="submit" class="btn btn-primary btn-block" name="update" id="update">Update</button>
		 	<input type="hidden" name="hid" value="">
		</form>
		<!--If there are no error-->
		<?php 
		if(isset($_GET['noError']))
		{?>
			<div class="alert alert-success">
				<?php echo "Update Successfull !"; ?>
			</div>
		<?php
		}
		?>
		<!--End-->

		<!--If any error occurs-->
		<?php 
		if(isset($_GET['error']))
		{ ?>
			<div class='alert alert-danger'>
				<?php echo "Update Failed"; ?>
			</div>
		<?php
		}
		?>
		<!--End-->
		<div>
			<a href="display.php" class="btn btn-sm btn-info" style="margin-top:3vh;">View User</a>
		</div>
	</div>

	
</body>
</html>