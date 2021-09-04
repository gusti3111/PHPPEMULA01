<?php

require 'functions.php';

// get data from URL
$id = $_GET["id"];

// query data berdasarkan id
$stu = query("SELECT * FROM students02 WHERE id = $id")[0];


// check if you clicked submit button
if (isset($_POST["submit"])) {


  if (change($_POST) > 0) {
    echo "
      <script>
          alert('data changed successfully');
          document.location.href = 'index.php';
      </script>
      
    ";
  } else {
    echo " <script>
             alert('Data cahnged failure');
             document.location.href = 'index.php';
          </script>";
  }
}
?>

<!DOCTYPE html>

<head>

  <title>New Account</title>

</head>

<body>
  <h1>Create your Account</h1>

  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $stu["id"]; ?>">
    <ul>
      <li>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" required value="<?= $stu["nama"] ?>">
      </li>
      <li>
        <label for="NIK">NIK: </label>
        <input type="text" name="NIK" required value="<?= $stu["NIK"] ?>">
      </li>
      <li>
        <label for="email">Email: </label>
        <input type="text" name="email" required value="<?= $stu["email"] ?>">
      </li>

      <li>
        <label for="jurusan">Jurusan: </label>
        <input type="text" name="jurusan" required value="<?= $stu["jurusan"] ?>">
      </li>
      <li>
        <label for="gambar">Gambar: </label>
        <input type="text" name="gambar" required value="<?= $stu["gambar"] ?>">
      </li>

      <li>
        <button type="submit" name="submit">change</button>
      </li>





    </ul>
  </form>

</body>

</html>