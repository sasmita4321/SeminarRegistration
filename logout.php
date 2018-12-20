<?php
  session_start();
  session_destroy();
  echo "<script>window.location = 'index.php'</script>";
?>

/*alert('Anda telah keluar dari halaman administrator'); */