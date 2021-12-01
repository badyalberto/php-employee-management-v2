<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management</title>

  <link rel="stylesheet" href=<?= BASE_URL . "/node_modules/bootstrap/dist/css/bootstrap.min.css" ?>>
  <script src=<?= BASE_URL . "/node_modules/bootstrap/dist/js/bootstrap.min.js" ?>></script>
</head>

<body>
  <?php include BASE_PATH . "/assets/html/header.php"; ?>
  <main class="container-xl mx-auto pb-90">
    <div class="d-flex justify-content-between align-items-end">
      <h1 class="display-6">Employee</h1>
      <span class="fw-light"><?= $params["first_name"] . " " . $params["last_name"] ?></span>
    </div>
    <hr>
    <form action="/employee/update?reload" method="POST" class="container-md">
      <input name="employee_id" type="hidden" required value="<?= $params["employee_id"] ?>">
      <div class="row mb-3">
        <div class="form-group col-4">
          <label class="mb-3" for="first_name">First name</label>
          <input name="first_name" type="text" class="form-control" id="first_name" required value="<?= $params["first_name"] ?>">
        </div>
        <div class="form-group col-4">
          <label class="mb-3" for="last_name">Last name</label>
          <input name="last_name" type="text" class="form-control" id="last_name" required value="<?= $params["last_name"] ?>">
        </div>
        <div class="form-group col-2">
          <label class="mb-3" for="age">Age</label>
          <input name="age" type="number" class="form-control" id="age" required value="<?= $params["age"] ?>">
        </div>
        <div class="form-group col-2">
          <label class="mb-3" for="gender">Gender</label>
          <select class="form-control" id="gender" name="gender" required>
            <?php $gender = ["M" => "Male", "F" => "Female"]; ?>
            <?php foreach ($gender as $value => $name) : ?>
              <option value="<?= $value ?>" <?= $value === $params["gender"] ? "selected" : null; ?>><?= $name ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="form-group col-6">
          <label class="mb-3" for="email">Email address</label>
          <input name="email" type="email" class="form-control" id="email" required value="<?= $params["email"] ?>">
        </div>
        <div class="form-group col-6">
          <label class="mb-3" for="phone_number">Phone number</label>
          <input name="phone_number" type="number" class="form-control" id="phone_number" required value="<?= $params["phone_number"] ?>">
        </div>
      </div>
      <div class="row mb-3">
        <div class="form-group col-3">
          <label class="mb-3" for="street">Street</label>
          <input name="street" type="text" class="form-control" id="street" required value="<?= $params["street"] ?>">
        </div>
        <div class="form-group col-3">
          <label class="mb-3" for="city">City</label>
          <input name="city" type="text" class="form-control" id="city" required value="<?= $params["city"] ?>">
        </div>
        <div class="form-group col-3">
          <label class="mb-3" for="postal_code">Postal code</label>
          <input name="postal_code" type="text" class="form-control" id="postal_code" required value="<?= $params["postal_code"] ?>">
        </div>
        <div class="form-group col-3">
          <label class="mb-3" for="state">State</label>
          <input name="state" type="text" class="form-control" id="state" required value="<?= $params["state"] ?>">
        </div>
      </div>
      <a type="btn" class="btn btn-secondary" href="/employee">Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>
  <?php include BASE_PATH . "/assets/html/footer.html"; ?>
</body>

</html>