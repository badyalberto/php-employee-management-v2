<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management</title>

  <link rel="stylesheet" href="<?= BASE_URL . "/node_modules/bootstrap/dist/css/bootstrap.min.css" ?>">
  <script src="<?= BASE_URL . "/node_modules/bootstrap/dist/js/bootstrap.min.js" ?>"></script>
</head>

<body>
  <?php include BASE_PATH . "/assets/html/header.php"; ?>
  <main class="container-xl mx-auto pb-90">
    <form action="./library/employeeController.php?update=true" method="POST" class="container-md">
      <h3>Employee: </h3>
      <div class="row mb-3">
        <div class="form-group col-4">
          <label for="first_name">Name</label>
          <input name="first_name" type="text" class="form-control" id="first_name" required>
        </div>
        <div class="form-group col-4">
          <label for="last_name">Last Name</label>
          <input name="last_name" type="text" class="form-control" id="last_name" required>
        </div>
        <div class="form-group col-2">
          <label for="age">Age</label>
          <input name="age" type="number" class="form-control" id="age" required>
        </div>
        <div class="form-group col-2">
          <label for="gender">Example select</label>
          <select class="form-control" id="gender" name="gender" required>
            <option value="M" selected>Male</option>
            <option value="F">Female</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="form-group col-6">
          <label for="email">Email address</label>
          <input name="email" type="email" class="form-control" id="email" required>
        </div>
        <div class="form-group col-6">
          <label for="phone_number">Phone Number</label>
          <input name="phone_number" type="number" class="form-control" id="phone_number" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="form-group col-3">
          <label for="street">Street Address</label>
          <input name="street" type="text" class="form-control" id="street" required>
        </div>
        <div class="form-group col-3">
          <label for="city">City</label>
          <input name="city" type="text" class="form-control" id="city" required>
        </div>
        <div class="form-group col-3">
          <label for="postal_code">Postal Code</label>
          <input name="postal_code" type="text" class="form-control" id="postal_code" required>
        </div>
        <div class="form-group col-3">
          <label for="state">State</label>
          <input name="state" type="text" class="form-control" id="state" required>
        </div>
      </div>
      <a type="btn" class="btn btn-secondary" href="dashboard.php">Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>
  <?php include BASE_PATH . "/assets/html/footer.html"; ?>
</body>

</html>