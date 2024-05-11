
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
								<h4 class="card-title">Login</h4>
								<form method="POST" class="my-login-validation" novalidate="">
									<div class="form-group">
										<label for="email">Username</label>
										<input id="email" type="text" class="form-control" name="username" value="" required autofocus>
										<div class="invalid-feedback"> Email is invalid </div>
									</div>
									<div class="form-group">
										<label for="password">Password <a href="forgot-password.php" class="float-right"> Forgot Password? </a>
										</label>
										<input id="password" type="password" class="form-control" name="password" required data-eye>
										<div class="invalid-feedback"> Password is required </div>
									</div>
									<div class="form-group">
										<div class="custom-checkbox custom-control">
											<input type="checkbox" name="remember" id="remember" class="custom-control-input">
											<label for="remember" class="custom-control-label">Remember Me</label>
										</div>
									</div>
									<div class="form-group m-0">
										<button type="submit" name="login" class="btn btn-primary btn-block"> Login </button>
									</div>
									<div class="mt-4 text-center"> Don't have an account? <a href="#">Create One</a>
									</div>
								</form>
							</div>
						</div>
						<div class="footer"> Allrights Reserved Copyright &copy; 2024 &mdash; WST </div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>