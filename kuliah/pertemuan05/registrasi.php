<?php
require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
             alert('username sucessfully added');
             document.location.href = 'login.php';
          </script>";
  } else {
    echo "<script>
             alert('username failed to added');

          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>registrasi</title>
</head>

<body>
  <h3>Form registrasi</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Username:
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <label>
          Password:
          <input type="password" name="password1" required>
        </label>
      </li>
      <li>
        <label>
          Konfirmasi password:
          <input type="password" name="password2" required>
        </label>
      </li>
      <li>
        <button type="submit" name="registrasi">Register</button>
      </li>
    </ul>
  </form>
</body>

</html>