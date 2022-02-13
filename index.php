<?php

$conn = mysqli_connect("localhost", "root", "qkrqhrja2", "siss_winter") or die ("connect fail");
$sql = "SELECT * FROM gamelogin";
$result = $conn->query($sql);
$total=mysqli_num_rows($result);

session_start();
if(isset($_SESSION['is_logged'])){
  $is_logged = $_SESSION['is_logged']; ?>
  <div style="color: white;"><?php
  echo $_SESSION['userid'],"님 환영합니다.</br>"; ?></div><?php
  echo "<a href=process_logout.php>로그아웃</a>";
}
else{
  ?>
  <div style="color: white;"><?php
  echo "로그인 먼저 해주세요"; ?></div>
  <div class="right">
    <a href="sign_in.php">회원가입</a>
    <a href="login.php">로그인</a>
  </div>  <?php
;}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>SISS Winter Projext</title>
      <link rel="stylesheet" type="text/css" href="#"/>
      <script type="text/javascript" src=""></script>
  </head>
  <body>
  <div class="centering">
    <h1>추리 게임</h1>
    <img src="banner.jpg" width="550" height="500"><p>
    <a href="gamestart.php">게임시작 &emsp;</a>
    <a href="game_description.php">게임설명 &emsp;</a>
  <a href="community.php">커뮤니티 &emsp;</a>
  </div>
  </body>
</html>
