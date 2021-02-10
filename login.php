<?php
$error=''; //variable to store error messages

if (isset($_POST['submit'])) {
	if (empty($_POST['user']) || empty($_POST['pass'])) {
		$error="Username or password is Invalid";
	}
	else
	{
		//Define $user and $pass
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		include("dbcon.php");
		//sql query to fetch information of registered user and finds user mathc.
		$query=mysqli_query($conn, "Select * from t_user where User_password='$pass' AND User_userName='$user'");

		$row1 = mysqli_fetch_array($query); //Fetching the qurey data into row1 array.
		$rows = mysqli_num_rows($query);
		if ($rows == 1) {

			//Redirect page based on user role N:B: role 1 for Admin and role 2 For student, this is for test
			if ($row1[5]==1) {
				header("Location: markEntry.php"); //Redirecting to Other page.
			}
			elseif ($row1[5]==2) {
				$error="Your are not parmitted for now !!!";
				//header("Location: showMarks.php"); //Redirecting to Other page.
			}
			
		}
		else{
			$error="Username or Password is Invalid";
		}
		mysqli_close($conn);
	}
}

?>

<!doctype html>
<html>
<head>
	<title>Login to Result Processing System</title>

	<style>
		.login{
			width: 360px;
			margin: 50px auto;
			font:Cambria, "Hoefler Text","Liberation Serif",Times,"Times New Roman", Serif;
			border-radius: 10px;
			border: 2px solid #ccc;
			padding: 10px 40px 25px;
			margin-top: 70px
		}
		input[type=text],input[type=password]{
			width: 95%;
			padding: 10px;
			margin-top: 8px;
			border: 1px solid #ccc;
			padding-left: 5px;
			font-size: 16px;
			font-family: Cambria, "Hoefler Text","Liberation Serif",Times,"Times New Roman", Serif;

		}
		input[type=submit]{
			width: 100%;
			<!--background-color: #009; -->
			color: #fff; 
			border: 2px solid black;
			padding:10px;
			font-size:20px;
			cursor: pointer;
			border-radius: 5px;
			margin-bottom: 15px;
		}

	</style>
</head>

<body>
	<div class="login">
		<h1 align="center">Login</h1>

		<form action="" method="post" style="text-align: center;">
		<input type="text" placeholder="Username" id="user" name="user"><br/><br/>
		<input type="password" placeholder="password" id="pass" name="pass">
		<br/><br/>	
		<input type="submit" name="submit" value="Login">
		</form>
		<span>
			<?php
				echo $error;
			?>
		</span>

	</div>
</body>

</html>