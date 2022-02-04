<?php
session_start();
$is_logged=$_SESSION['is_logged'];
if($is_logged=='YES'){
  echo $_SESSION['userid'];
  echo "<a href=process_logout.php>로그아웃</a>";
}

else{
?>
<script>
alert("로그인해야 접근하실 수 있습니다.");
location.replace("./index.php");
</script>
<?php } ?>
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
    <meta charset="utf-8">
    <title>SISS Winter Projext</title>
      <link rel="stylesheet" type="text/css" href="#"/>
      <script type="text/javascript" src=""></script>
  </head>
  <body>
    <div><a href="index.php">home</a></div>
    <h1>문제</h1>
    <?=$list?>
    <h2><?=$game['title']?></h2>
    <p><?=$game['description']?></p>
    <p><?=$answer_link?></p>
  </body>
</html>
