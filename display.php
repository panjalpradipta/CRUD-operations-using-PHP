<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<!--Bootstrap Integration-->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!--Google Font-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">

	<style type="text/css">
		*{
			font-family: 'Mulish', sans-serif;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Phone</th>
					      <th scope="col">Delete</th>
					      <th scope="col">Update</th>
					    </tr>
					</thead>
					<?php
					include 'conn.php';
					$query = "SELECT * FROM user_data";
					$res = mysqli_query($conn,$query);
					while($result = mysqli_fetch_array($res)){
					?>
					<tbody>
					    <tr>
					      <th scope="row"><?php echo $result['id']; ?></th>
					      <td><?php echo $result['name']; ?></td>
					      <td><?php echo $result['email']; ?></td>
					      <td><?php echo $result['phone']; ?></td>
					      <td><a href="delete.php?id=<?php echo $result['id'];?>" class="btn btn-sm btn-danger">Delete</a></td>
					      <td><a href="update.php?id=<?php echo $result['id'];?>" class="btn btn-sm btn-warning">Update</a></td>
					    </tr>
					</tbody>
				<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>