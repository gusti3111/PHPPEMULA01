<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';
// get id from URL
$id = $_GET['id'];

// query students by id
$students = query("SELECT * FROM students02 WHERE id = $id");

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
      <li><img src="img/<?= $m['gambar']; ?>" width="250px"></li>
      <li>NIK: <?= $m['NIK']; ?> </li>
      <li>Nama: <?= $m['nama']; ?></li>
      <li>Email: <?= $m['email']; ?></li>
      <li>Jurusan: <?= $m['jurusan']; ?></li>
      <li><a href="change.php?id= <?= $m['id']; ?>">ubah</a> | <a href="delete.php?id= <?= $m['id']; ?>" onclick="return confirm ('Are you sure ');">delete</a> </li>
      <a href="index.php">homepage</a>

    <?php endforeach; ?>


  </ul>

</body>

</html>