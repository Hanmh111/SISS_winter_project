<?php

require_once('lib/conn.php');
$sql = "SELECT * FROM gamelogin";
$result = $conn->query($sql);
$total=mysqli_num_rows($result);

session_start();
if(isset($_SESSION['is_logged'])){
  $is_logged = $_SESSION['is_logged']; ?>
  <div class="left"><?php echo $_SESSION['userid'],"님 환영합니다.</br>"; ?></div>
  <div class="right"><?php echo "<a href=process_logout.php>로그아웃</a>";?></div>
<?php }
else{
  ?>
  <div class="left"> <?php echo "로그인 먼저 해주세요"; ?></div>
  <div class="right">
    <a href="login.php">로그인</a> / <a href="sign_in.php">회원가입</a>
  </div> <?php
;}
?>

<?php require_once('view/top.php');?>
  <div class="centering">
    <h1>추리 게임</h1>
    <img src="banner.jpg" width="550" height="500"><p>
    <a href="gamestart.php">게임시작 &emsp;</a>
    <a href="game_description.php">게임설명 &emsp;</a>
  <a href="community.php">커뮤니티 &emsp;</a>
  </div>
<?php require_once('view/bottom.php');?>
