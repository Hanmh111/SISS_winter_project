<?php
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
<?php
  $conn = mysqli_connect(
    'localhost',
    'root',
    'qkrqhrja2',
    'siss_winter');

  $sql = "SELECT * FROM gamelogin LEFT JOIN gamelevel ON gamelogin.level = gamelevel.id Where login_id = '{$_SESSION['userid']}'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $sql_game = "SELECT id FROM gamelevel";
  $result_game = mysqli_query($conn, $sql_game);

  $list = '';
  $answer_link = '';
  $i = 1;
  while ($row_game = mysqli_fetch_array($result_game)){
    if ($i <= $row['level']){
      $list = $list."<li><a href=\"gamestart.php?id={$row_game['id']}\">{$row_game['id']}</a></li>";
    }
    else { $list = $list."<li>{$row_game['id']}</li>"; }
    $i++;
  }
  $game = array(
    'title'=>'',
    'description'=>'',
  );

  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql_id = "SELECT * FROM gamelevel WHERE id={$filtered_id}";
    $result_id = mysqli_query($conn, $sql_id);
    $row = mysqli_fetch_array($result_id);

    $game['title'] = $row['title'];
    $game['description'] = $row['description'];

    $answer_link = '
      <form action="process_answer.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="text" name="answer" placeholder="정답">
        <input type="submit" value="제출">
      </form>';
  }
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  );

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
    <div class="centering"><a href="index.php"><img src="banner.jpg" width="100" height="100"></a>
    <p>
    <h1>문제</h1>
    <?=$list?>
    <h2><?=$game['title']?></h2>
    <p><?=$game['description']?></p>
    <input id="firsthint" type="checkbox" />
 <label for="firsthint">힌트1</label>
   <div class="one">
     <?php
     $conn = mysqli_connect(
       'localhost',
       'root',
       'qkrqhrja2',
       'siss_winter');

     if(isset($_GET['id'])){
       $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
       $sql_id = "SELECT firsthint FROM gamelevel WHERE id={$filtered_id}";
       $result_id = mysqli_query($conn, $sql_id);
       $row = mysqli_fetch_array($result_id);
       echo $row['firsthint']. "<br>";

     }else{
       echo "문제를 선택해주세요.";
     }
     mysqli_close($conn);
  ?>

   </div>
   <input id="secondhint" type="checkbox" />
   <label for="secondhint">힌트2</label>
     <div class="two">
       <?php
       $conn = mysqli_connect(
         'localhost',
         'root',
         'qkrqhrja2',
         'siss_winter');

       if(isset($_GET['id'])){
         $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
         $sql_id = "SELECT secondhint FROM gamelevel WHERE id={$filtered_id}";
         $result_id = mysqli_query($conn, $sql_id);
         $row = mysqli_fetch_array($result_id);
         echo $row['secondhint']. "<br>";

       }else{
       echo "문제를 선택해주세요.";
       }
       mysqli_close($conn);
     ?>
     </div>
    <p><?=$answer_link?></p>

  </body>
</html>
