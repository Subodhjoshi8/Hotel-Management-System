<?php
session_start();
if (isset($_SESSION["user"])) {
  header("location:home.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>SUN RISE ADMIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container min-vh-100">
    <div class="card w-50 border-primary mx-auto mt-5">
      <div class="card-body">
        <div class="card-header bg-primary">
          ADMIN LOGIN
        </div>
        <form class="container mt-5" method="post">
          <div class="mb-3">
            <label for="user" class="form-label">UserName</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="Enter UserName" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="pass" placeholder="Enter password" required>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<?php
include('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form 

  $myusername = mysqli_real_escape_string($con, $_POST['user']);
  $mypassword = mysqli_real_escape_string($con, $_POST['pass']);

  $sql = "SELECT id FROM login WHERE usname = '$myusername' and pass = '$mypassword'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $active = $row['active'];

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if ($count == 1) {

    $_SESSION['user'] = $myusername;

    header("location: home.php");
  } else {
    echo '<script>alert("Your Login Name or Password is invalid") </script>';
  }
}
?>