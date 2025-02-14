<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee dashboard</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/node_modules/jsgrid/css/jsgrid.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/node_modules/jsgrid/css/theme.css">
  <script src="<?= BASE_URL ?>/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?= BASE_URL ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= BASE_URL ?>/node_modules/jsgrid/dist/jsgrid.min.js"></script>
  <script src="<?= BASE_URL ?>/assets/js/grid.js" type="module"></script>
</head>

<body>
  <div id="wrapper">
    <?php include BASE_PATH . "/assets/html/header.php"; ?>
    <?php include BASE_PATH . "/assets/html/notification.php"; ?>
    <main class="container-xl mt-4 vh-100">
      <h1 class="display-6">Dashboard</h1>
      <hr>
      <div id='grid-table'>
      </div>
    </main>
    <?php include  "./assets/html/footer.php"; ?>
</body>

</html>