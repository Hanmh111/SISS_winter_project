<?php
session_start();
$result=session_destroy();

if($result){
  ?>
  <script>
  alert("로그아웃 되었습니다.");
<<<<<<< HEAD
  location.href='index.php';
=======
  history.back();
>>>>>>> main
  </script>
  <?php
}
 ?>
