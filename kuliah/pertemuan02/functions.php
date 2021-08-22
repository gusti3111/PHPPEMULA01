<?php
// koneksikan database
function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'pw_123456');
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // if (mysqli_num_rows($result) == 1) {
  //   return mysqli_fetch_assoc($result);
  // }
  $rows = [];
  // ambil data dari object result
  // mysqli_fetch_row() mengembalikan array numeric 

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
