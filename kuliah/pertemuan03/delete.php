<?php
require 'functions.php';

// ambil id dari url
$id = $_GET['id'];

if (delete($id) > 0) {
  echo "
      <script>
          alert('data deleted successfully');
          document.location.href = 'index.php';
      </script>
      
    ";
} else {
  echo " <script>
             alert('data deleted failure');
             document.location.href = 'index.php';
          </script>";
}
