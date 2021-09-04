<?php
require 'functions.php';


// tampung  ke variabel students
$students = query("SELECT * FROM students02");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>
  <a href="tambah.php" class="tambah">SIGNUP</a>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>aksi</th>
    </tr>
    <?php $i = 1;
    foreach ($students as $m) : ?>
      <tr>

        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width="50"></td>
        <td><?= $m['nama']; ?></td>
        <td>
          <a href="details.php?id=<?= $m['id']; ?>">Detail</a>

        </td>


      </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>