<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<style type="text/css">
		#main {
			background-color: #333;
			width: 600px;
			height: 300px;
			border-radius: 30px;
					}

			h1
			{
				color:white;
				background-color: black;
				border-top-right-radius: 30px;
				border-top-left-radius: 30px;
			}

			.text{

				background-color:#333;
				color: white;
				width: 250px;
				font-weight: bold;
				font-size: 20px;
				border:none;
				text-align: center;
			}  
				.text:focus{

					outline: none;
				}


			hr{
				width: 250px;
				margin-top:0px !important;
			}

			#sub{
					width:250px;
					height: 30px;
					background-color: #5f5;
					border:none; 

			}

	</style>









</head>
<body>
		<center>
				<div id="main">
					<h1>LOGIN PAGE</h1>
					<form method ="POST">
					<input type="text" name="username" class="text" autocomplete="off" required placeholder="username" ><br><hr>

					 <input type="password" name="password" class="text" required placeholder="password"><br><hr>
					<input type="Submit" name="submit" id="sub">




					 </form>
				 </div>
		<center>


</body>
</html>

<?php





	

/*
		$username =$_POST['username'];
		$password =$_POST['password'];
		$error ="";
		$success ="";

		if(isset($_POST['submit'])){

			if ($password=="password") {
				$error="";
				$success="welcome";
				header("Location:home.html");
			}
		else
		{
			$error="Invalid";
			$success="";
		}

		}


	*/



	//("mysql:host=$hostname;dbname=removed", $username, $password);
	
	mysql_connect("localhost","root","");
    mysql_selectdb("simplelogin");



	if (isset($_POST['submit'])) {
		$un=$_POST['username'];
		$pw=$_POST['password'];
		$sql=mysql_query("select password from user usarname='$un'");
		if($row=mysql_fetch_array($sql))
		{		setcookie('email',$email,time()+60*5);

						if($pw==$row['password'])
							{   
								header("location:home.html");
								exit();
							     }

							     else
							     	echo "<script>alert('Invalid password')</script>";

									}

									else
										echo "<script>alert('Invalid username')</script>";


	}



?>