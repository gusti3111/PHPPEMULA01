<?php
require 'functions.php';

// mengambil id menggunakan $_GET
$id = $_GET['id'];

// query data
$m =  query("SELECT * FROM students02 WHERE id = $id")[0];



// condition
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
             alert('data changed failure');
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

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $m["id"]; ?>">
    <ul>
      <li>
        <label for="nama">Nama: </label>
        <input type="text" name="nama" required value="<?= $m['nama']; ?>">
      </li>
      <li>
        <label for="NIK">NIK: </label>
        <input type="text" name="NIK" required value="<?= $m['NIK']; ?>">
      </li>
      <li>
        <label for="email">Email: </label>
        <input type="text" name="email" required value="<?= $m['email']; ?>">
      </li>

      <li>
        <label for="jurusan">Jurusan:
          <input type="text" name="jurusan" required value="<?= $m['jurusan']; ?>">
        </label>
      </li>
      <li>
        <input type="hidden" name="gambar_lama" value="<?= $m['gambar']; ?>">
        <label for="gambar">Gambar:
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <img src="img/<?= $m['gambar']; ?>" width="120" style="display: block;" class="img-preview">
      </li>

      <li>
        <button type="submit" name="submit">change</button>
      </li>





    </ul>
  </form>
  <script src="js/script.js"></script>

</body>

</html>