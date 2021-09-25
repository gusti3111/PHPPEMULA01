<?php
require '../functions.php';
$students = cari($_GET["keyword"]);

?>
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