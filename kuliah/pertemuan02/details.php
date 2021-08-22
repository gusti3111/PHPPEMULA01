<?php
require 'functions.php';
// get id from URL
$id = $_GET['id'];

// query students by id
$students = query("SELECT * FROM students WHERE id = $id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Students Details</title>
</head>

<body>
  <h3>Students Details</h3>
  <ul>
    <?php foreach ($students as $m) : ?>
      <li><img src="img/<?= $m['gambar']; ?>" width="200"></li>
      <li>NIK: <?= $m['NIK']; ?> </li>
      <li>Nama: <?= $m['nama']; ?></li>
      <li>Email: <?= $m['email']; ?></li>
      <li>Jurusan: <?= $m['jurusan']; ?></li>
      <li><a href="">ubah</a> | <a href="">hapus</a> </li>
      <a href="day02.php">homepage</a>

    <?php endforeach; ?>


  </ul>

</body>

</html>