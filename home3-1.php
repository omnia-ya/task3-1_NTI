<?php
	session_start();
	//if(!empty($_SESSION)){
	//	header('Location:task3-1.php');
	//}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  	.container{
  		padding-top:50px; 
  		padding-right: 200px;
  		padding-left: 200px;
  	}
  </style>
</head>
<body>
	<div class="container">
		<h1><span style="color: blue">Welcome</span> 
			<?php
				if(!empty($_SESSION)){
		 		echo ucfirst($_SESSION['user'][0]['name']); 
		 		}
		 		?></h1>
			<div class=" col-xl-5 d-flex justify-content-between" style="margin-top: 30px;">
				<?php
				if(empty($_SESSION)){
				echo '<a href="task3-1.php"><button type="button" class="btn btn-primary">Login</button></a>';	
			}
 
				if(!empty($_SESSION)){
				echo '<a href="profile3-1.php"><button type="button" class="btn btn-outline-primary">Profile</button></a>';
				echo '<a href="logout3-1.php"><button type="button" class="btn btn-outline-primary">Logout</button></a>';

				}
				?>
			</div>
	</div>
</body>
</html>