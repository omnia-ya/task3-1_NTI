<?php
session_start();
if(!empty($_SESSION)){
		header('Location:profile3-1.php');
	}
 ?>
<?php
$users = [
    [
        'id'=>1,
        'name'=>'ahmed',
        'email'=>'ahmed@gmail.com',
        'password'=>'123456',
        'image'=>'1.png',
        'gender'=>'m'
    ],
    [
        'id'=>2,
        'name'=>'omnia',
        'email'=>'omnia@gmail.com',
        'password'=>'123456',
        'image'=>'2.png',
        'gender'=>'f'
    ],
    [
        'id'=>3,
        'name'=>'amir',
        'email'=>'amir@gmail.com',
        'password'=>'123456',
        'image'=>'3.png',
        'gender'=>'m'
    ]
];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
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
		<h1 style="padding-bottom: 20px;"><span style="color: blue">Login</span> Page</h1>
	<form method="post">
		<div class="form-group">
		    <label for="exampleInputEmail1">Email address:</label>
		    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		 </div>
		 <div class="form-group">
		    <label for="exampleInputPassword1">Password:</label>
		    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
		</div>
  		<button type="submit" class="btn btn-primary">Login</button>
	</form>
	<?php
		if(!empty($_POST)){
			$email = $_POST['email'];
			$password = $_POST['password'];
			function login ($users){
				global $email,$password;
				return $users['email']==$email && $users['password']==$password;
			}
			$users = array_filter($users,'login');
			//print_r($users);
			if(!empty($users)){
				//display 
				header('Location:home3-1.php');
				$_SESSION['user']=array_values($users);
			}
			else{
				echo "<div class ='alert alert-danger' style='margin-top:20px'>Please inter the email and password</div>";
			}
		}
	 ?>
	</div>
</body>
</html>