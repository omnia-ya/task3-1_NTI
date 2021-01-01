<?php
	session_start();
	if(empty($_SESSION)){
		header('Location:task3-1.php');
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile Page</title>
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
 		<h1 style="padding-bottom: 20px;"><span style="color: blue">Profile</span> Page</h1>
		<div class="card text-left">
			<?php
		if(!empty($_POST)){
			if(isset($_POST['email']) && $_POST['email']){
				$email = $_POST['email'];
				$_SESSION['user'][0]['email'] = $email;	
			}
			else{
				$emailError = "<div class='alert alert-danger' style='margin-top:10px'>Email is requird</div>";
			}
			if (isset($_POST['name']) && $_POST['name']){
				$name = $_POST['name'];
				$_SESSION['user'][0]['name'] = $name;
			}
			else{
				$nameError = "<div class='alert alert-danger' style='margin-top:10px'>Name is requird</div>";
			}
			if (isset($_POST['gender']) && $_POST['gender']){
				$gender = $_POST['gender'];
				$_SESSION['user'][0]['gender'] = $gender;
			}
			else{
				$genderError = "<div class='alert alert-danger' style='margin-top:10px'>Gender is requird</div>";
			}
			if($_FILES['image']['name']){
				$flag = 0;
				if($_FILES['image']['size'] > 100000){
					$msg = "You must upload a small size picture";
					$flag = 1;
				}
				$ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
				$extArray = ['png','jpg','jpeg'];
				if(!in_array($ext, $extArray)){
					$msg = "You must change the type into png, jpg or jpeg";
					$flag = 1;
				}
				if($flag == 0){
					$photopath = 'image/';
					$photoName = time().'.'.$ext;
					$fullPath = $photopath.$photoName;
					move_uploaded_file($_FILES['image']['tmp_name'], $fullPath);
					$_SESSION['user'][0]['image'] = $photoName; 
				}
				
			}
			//header('Refresh:0');
		}
	 ?>
			<div class="card-body">
		      <form method="post" enctype="multipart/form-data">
		      		<div class="form-group">
		                <label class="col-12" for="exampleInputEmail1" style="padding-left: 0px">Profile picture:</label>
		                <img class="card-img-top" style="width: 30%; height: 30% ; margin-bottom: 20px" src="image/<?php echo $_SESSION['user'][0]['image'] ?>" >
		                <input type="file" name="image" class="form-control" style=" height: 45px">
		                <?php echo (isset($msg) ? '<div class="alert alert-danger" style="margin-top:10px">'.$msg.'</div>' : ''); ?>
		            </div>
		            <div class="form-group">
		                <label for="exampleInputEmail1">Email address:</label>
		                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION['user'][0]['email'] ?>">
		                <?php echo (isset($emailError) ? $emailError : ''); ?>
		            </div>
		            <div class="form-group">
		                <label for="exampleInputPassword1">Name:</label>
		                <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="<?php echo $_SESSION['user'][0]['name'] ?>">
		                <?php echo (isset($nameError) ? $nameError : ''); ?>
		            </div>
		            <div class="form-group">
		                <select name="gender" id="" class="form-control">
		                    <option <?php  echo ($_SESSION['user'][0]['gender'] == 'm' ? 'selected' : '') ?>  value="m">Male</option>
		                    <option <?php echo ($_SESSION['user'][0]['gender'] == 'f' ? 'selected'  : '' ) ?> value="f" >Female</option>
		                </select>
		                <?php echo (isset($genderError) ? $genderError : ''); ?>
		            </div>
		            <button type="submit" class="btn btn-primary">Submit</button>
		            <a href="logout3-1.php"><button type="button" class="btn btn-outline-danger">Logout</button></a>
		        </form>
		    </div>
		</div>
	</div>
	</div>
 </body>
 </html>