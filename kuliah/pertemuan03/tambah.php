<?php
// import fungsi dari file funcitons.php
require 'functions.php';

// condition
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "
      <script>
          alert('data added successfully');
          document.location.href = 'index.php';
      </script>
      
    ";
  } else {
    echo " <script>
             alert('data add failure');
             document.location.href = 'index.php';
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
  <title>Tambah Data </title>
</head>

<body>
  <h3>SIGN UP </h3>
  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" required autofocus>
      </li>

      <li>
        <label for="NIK">NIK: </label>
        <input type="text" name="NIK" required autofocus>
      </li>
      <li>
        <label for="email">Email: </label>
        <input type="text" name="email" required autofocus>
      </li>
      <li>
        <label for="jurusan">Jurusan: </label>
        <input type="text" name="jurusan" required autofocus>
      </li>
      <li>
        <label for="gambar">Gambar: </label>
        <input type="text" name="gambar" required autofocus>
      </li>
      <li>
        <button type="submit" name="tambah">create</button>
      </li>
    </ul>


</body>

</html>