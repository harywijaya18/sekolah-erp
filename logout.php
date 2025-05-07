<?php
  //include "config/conn.php";
  
  // session_start();
  // session_destroy();
  session_start();
  $_SESSION['namauser'] == '';
  unset($_SESSION['namauser']);
  session_destroy();
  //header("location:index.php");
  //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
  echo "<script>  window.location= '../sekolah/index.php' </script> ";
?>
