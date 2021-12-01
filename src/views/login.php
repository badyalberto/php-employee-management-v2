<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Employee Management</title>
	<link rel="stylesheet" href="<?=BASE_URL . "/node_modules/bootstrap/dist/css/bootstrap.min.css"?>" />
	<link rel="stylesheet" href="<?=BASE_URL . "/assets/css/layout.css"?>" />
	<script src="<?=BASE_URL . "/node_modules/bootstrap/dist/js/bootstrap.min.js"?>"></script>
</head>

<body class="text-center">
 <?php if (isset($this->message)): ?>
	<div aria-live="polite" aria-atomic="true" class="position-relative">
		<div class="toast-container position-absolute top-0 end-0 p-3">
			<div class="toast align-items-center text-white bg-danger border-0 fade show" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body">
						<?=$this->message?>
					</div>
					<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		</div>
	</div>
<?php endif?>
	<form class="form-signin align-items-center" action="<?=BASE_URL?>/user/login" method="POST">
		<img class="mb-4" src="<?=BASE_URL . "/node_modules/bootstrap-icons/icons/box-arrow-in-right.svg"?>" alt="icon" width="80" height="80" />
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		<label for="inputName" class="sr-only">User Name</label>
		<input type="text" id="inputName" name="username" class="form-control mb-2" placeholder="Enter your full name" required autofocus="" />
		<label for="inputPass" class="sr-only">Password</label>
		<input type="password" id="inputPass" name="pass" class="form-control" placeholder="Enter your Password." required />
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
			Sign in
		</button>
	</form>
	<p class="mt-5 mb-3 text-muted">PHP Employee Management</p>
</body>

</html>

