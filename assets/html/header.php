<header class="bg-light">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand">
				<img class="mr-2" src="<?= BASE_URL . "node_modules/bootstrap-icons/icons/file-earmark-person.svg" ?>" alt="logo" width="20" height="20" />
				<span>Employees Management</span>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item"><a class="nav-link" href="<?= BASE_URL . "employee" ?>" id="dashboard">Dashboard</a></li>
					<li class="nav-item"><a class="nav-link" href="<?= BASE_URL . "employee/new" ?>" id="employee">Employee</a></li>
				</ul>
				<div class="d-flex">
					<a href="<?= BASE_URL . "user/logout" ?>" class="ml-auto text-muted justify-self-end">Logout</a>
				</div>
			</div>
		</div>
	</nav>
</header>

<script>
	let completePath = window.location.pathname;
	let currentPath = completePath.split("/");
	currentPath = currentPath[currentPath.length - 1];
	if (currentPath === "dashboard.php") {
		$("#dashboard").addClass("text-primary");
		$("#employee").addClass("text-muted");
	} else if (currentPath === "employee.php") {
		$("#dashboard").addClass("text-muted");
		$("#employee").addClass("text-primary");
	}
</script>