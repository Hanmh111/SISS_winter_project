<?php
session_start();
$result=session_destroy();

if($result){
  ?>
  <script>
  alert("로그아웃 되었습니다.");
  location.href='index.php';
  </script>
  <?php
}
 ?>
<?php require_once('view/process_black.php'); ?>
