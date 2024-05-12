<?php 
	if(isset($_POST['submit'])){
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
			
			$profile = $_FILES["profile"]["name"]; // Access the filename
			$id = $_POST["id"];
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$email = $_POST["email"];
			$username = $_POST["username"];
			$password = $_POST["password"];
			$phone = $_POST["phone"];

			// Accessing uploaded file details
			$profile_name = $_FILES['profile']['name'];
			$profile_tmp_name = $_FILES['profile']['tmp_name'];

			// Move the uploaded file to a permanent location
			$upload_dir = 'assets/'; // Change this to your desired directory
			$profile_path = $upload_dir . $profile_name;
			move_uploaded_file($profile_tmp_name, $profile_path);

			// Load the XML file
			$xml = simplexml_load_file("database/users.xml");

			$idExists = false;
			foreach ($xml->user as $user) {
				if ((int)$user->id === (int)$id) {
					$idExists = true;
					break;
				}
			}

			if ($idExists) {
				echo "<script>alert('Primary key already exists!');</script>";
				
			} else {
				// Add the user to the XML file
				$user = $xml->addChild("user");
				$user->addChild("profile", $profile_name);
				$user->addChild("id", $id);
				$user->addChild("fname", $fname);
				$user->addChild("lname", $lname);
				$user->addChild("email", $email);
				$user->addChild("username", $username);
				$user->addChild("password", $password);
				$user->addChild("phone", $phone);

				// Save changes to the XML file
				$result = $xml->asXML("database/users.xml");
				header("Location: index.php");
				exit();
			}
		} else {
			echo "<script>alert('lalalala lalalala elmo\'s world!')</script>";
		}
	}
?>


<!doctype html>
<html class="no-js" lang="pinoy ako">
    
	<head> 
        <?php include "includes/icon.html"?>
		<title>Login Page</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
		<style>
			html,
			body {
				height: 100%;
			}

			body.my-login-page {
				background-color: #f7f9fb;
				font-size: 14px;
			}

			.my-login-page .brand {
				width: 90px;
				height: 90px;
				overflow: hidden;
				border-radius: 50%;
				margin: 40px auto;
				box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
				position: relative;
				z-index: 1;
			}

			.my-login-page .brand img {
				width: 100%;
			}

			.my-login-page .card-wrapper {
				width: 400px;
			}

			.my-login-page .card {
				border-color: transparent;
				box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
			}

			.my-login-page .card.fat {
				padding: 10px;
			}

			.my-login-page .card .card-title {
				margin-bottom: 30px;
			}

			.my-login-page .form-control {
				border-width: 2.3px;
			}

			.my-login-page .form-group label {
				width: 100%;
			}

			.my-login-page .btn.btn-block {
				padding: 12px 10px;
			}

			.my-login-page .footer {
				margin: 40px 0;
				color: #888;
				text-align: center;
			}

			@media screen and (max-width: 425px) {
				.my-login-page .card-wrapper {
					width: 90%;
					margin: 0 auto;
				}
			}

			@media screen and (max-width: 320px) {
				.my-login-page .card.fat {
					padding: 0;
				}

				.my-login-page .card.fat .card-body {
					padding: 15px;
				}
			}
			.btn{
				background-color: #0d0b29;
				color:white;
			}
		</style>
	</head>
    <body class="my-login-page">
		<section class="h-100">
			<div class="container h-100">
				<div class="row justify-content-md-center h-100">
					<div class="card-wrapper">
						<div class="brand">
							<img src="assets/icon.png" alt="logo">
						</div>
						<div class="card fat">
							<div class="card-body">
							<p>already have an account?
										<a href="index.php" class="float-right">
											click here to login
										</a>
							</p>
								<h4 class="card-title">Register </h4>

	<!--==================FORM================-->
								<form method="POST" class="my-login-validation" enctype="multipart/form-data">
                                    <div class="form-group">
										<label for="image">Profile Picture</label>
										<input id="image" type="file" class="form-control" name="profile">
										<div class="invalid-feedback"> Picture is required </div>
									
									</div>
									<div class="form-group">
										<label for="id">Primary Key </label>
										<input id="id" type="number" class="form-control" name="id" required data-eye>
										<div class="invalid-feedback"> FirstName is required </div>
									</div>
									<div class="form-group">
										<label for="fname">First Name </label>
										<input id="fname" type="text" class="form-control" name="fname" required data-eye>
										<div class="invalid-feedback"> FirstName is required </div>
									</div>
									<div class="form-group">
										<label for="lname">Last Name </label>
										<input id="lname" type="text" class="form-control" name="lname" required data-eye>
										<div class="invalid-feedback"> LastName is required </div>
									</div>
                                    <div class="form-group">
										<label for="email">Email </label>
										<input id="email" type="email" class="form-control" name="email" required data-eye>
										<div class="invalid-feedback"> Email is required </div>
									</div>
									<div class="form-group">
										<label for="username">Username</label>
										<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
										<div class="invalid-feedback"> Username is required </div>
									</div>
									<div class="form-group">
										<label for="password">Password </label>
										<input id="password" type="password" class="form-control" name="password" required data-eye>
										<div class="invalid-feedback"> Password is required </div>
									</div>
                                    
                                    <div class="form-group">
										<label for="phone">Phone Number</label>
										<input id="phone" type="tel" class="form-control" name="phone" required>
										<div class="invalid-feedback"> Phone Number is required </div>
									</div>
					
									<div class="form-group m-0">
										<button type="submit" name="submit" class="btn btn-block"> Register </button>
									</div>
								</form>
	<!--==================FORM================-->

							</div>
						</div>
						<div class="footer"> All rights Reserved Copyright &copy; 2024 &mdash; WST </div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
