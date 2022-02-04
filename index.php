<?php

$conn = mysqli_connect("localhost", "root", "qkrqhrja2", "siss_winter") or die ("connect fail");
$sql = "SELECT * FROM gamelogin";
$result = $conn->query($sql);
$total=mysqli_num_rows($result);

session_start();
if(isset($_SESSION['is_logged'])){
  $is_logged = $_SESSION['is_logged'];
  echo $_SESSION['userid'],"님 환영합니다.</br>";
  echo "<a href=process_logout.php>로그아웃</a>";

}
else{
  echo "로그인 먼저 해주세요";
;}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SISS Winter Projext</title>
      <link rel="stylesheet" type="text/css" href="#"/>
      <script type="text/javascript" src=""></script>
  </head>
  <body>
    <h1>추리 게임</h1>
    <a href="gamestart.php">게임 시작</a>
    <a href="game_description.php">게임 설명</a>
    <a href="community.php">커뮤니티</a>
    <a href="sign_in.php">회원가입</a>
    <a href="login.php">로그인</a>

  </body>
</html>
