<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Employee Management</title>
	<link rel="stylesheet" href="<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<script src="<?= BASE_URL ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include BASE_PATH . "/assets/html/notification.php"; ?>
	<div class="container-sm d-flex flex-column align-items-center justify-content-center vh-100">
		<img class="mb-4 me-4" src="./node_modules/bootstrap-icons/icons/box-arrow-in-right.svg" alt="login icon" width="80" height="80" />
		<h1 class="h4 mb-4 font-weight-normal">Sign in</h1>
		<form class="form-signin align-items-center mb-5" action="<?= BASE_URL ?>user/login" method="POST">
			<input class="form-control mb-3" type="text" id="username" name="username" placeholder="Username" required autofocus />
			<input class="form-control mb-3" type="password" id="password" name="password" placeholder="Password" required />
			<button class="btn btn-lg btn-primary btn-block w-100" type="submit" name="login">
				Sign in
			</button>
		</form>
		<p class="text-muted">PHP Employee Management</p>
	</div>
</body>

</html>