<?php
include "config.php";
if(isset($_GET['d'])):
     $stmt = $mysqli->prepare("DELETE FROM galeria WHERE id_galeria=?");
     $stmt->bind_param('s', $id);

     $id = $_GET['d'];

     if($stmt->execute()):
          echo "<script>location.href='galeria.php'</script>";
     else:
          echo "<script>alert('".$stmt->error."')</script>";
     endif;
endif;
?>
