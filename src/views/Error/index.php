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
	<div class="container-sm d-flex flex-column align-items-center justify-content-center vh-100">
		<img class="mb-4" src="<?= BASE_URL . "assets/images/sad-svgrepo-com.svg" ?>" alt="Error icon" width="200" height="200" />
		<h1 class="h4 mb-4 font-weight-normal">Oops!</h1>
		<p class="text-center"><?= $this->message ?></p>
	</div>
	<?php var_dump(BASE_URL) ?>
</body>

</html>