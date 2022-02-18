<?php
session_start();
if(isset($_SESSION['is_logged'])){
  $is_logged = $_SESSION['is_logged']; ?>
  <div class="left"><?php echo "USER | ".$_SESSION['userid']; ?></div>
  <div class="right"><?php echo "<a href=process_logout.php>로그아웃</a>";?></div>

<?php }
else {
  ?>
  <script>
    alert("로그인 먼저 해주세요.");
    location.href='index.php';
  </script>
  <?php
  }
  ?>

<?php

  $conn = mysqli_connect(
    'localhost',
    'root',
    'qkrqhrja2',
    'siss_winter');

  $sql = "SELECT * FROM community_text";
  $result = mysqli_query($conn, $sql);
  $list = '';
  $sql_spoiler = "SELECT * FROM community_text";
  $result_spoiler = mysqli_query($conn, $sql_spoiler);

  while($row = mysqli_fetch_array($result_spoiler)){
    if ($row['spoiler'] == 'spoiler'){
      $list = $list."<li><a href=\"community.php?id={$row['id']}\">[스포주의] {$row['title']}</a></li>";
    }
    else {
      $list = $list."<li><a href=\"community.php?id={$row['id']}\">{$row['title']}</a></li>";
    }
  }

  $article = array(
    'title'=>'',
    'author'=>'',
    'description'=>'',
    'spoiler'=>''
  );

  $update_link = '';
  $delete_link = '';

  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql_id = "SELECT * FROM community_text WHERE id={$filtered_id}";
    $result_id = mysqli_query($conn, $sql_id);
    $row = mysqli_fetch_array($result_id);


    $article['title'] = $row['title'];
    $article['author'] = '작성자: '.$row['author'];
    $article['description'] = nl2br($row['description']);
    $article['spoiler'] = $row['spoiler'];

    if ($article['spoiler'] == 'spoiler'){
      $article['title'] = '[스포주의] '.$row['title'];
    }

    if ($_SESSION['userid']==$row['author']){
    $update_link = '<a href="update.php?id='.$_GET['id'].'">글 수정</a>';
    $delete_link = '
      <form action="process_delete.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>';
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SISS Winter Projext</title>
      <link rel="stylesheet" href="style.css">
      <script type="text/javascript" src=""></script>
  </head>
  <body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
    <div class="description">
      <div class="centering">
      <a href="index.php"><img src="banner.jpg" width="150" height="150"></a>
      <a href="community.php"><h1>커뮤니티</h1></a>
      <table class="community">
        <tr>
          <td><a href="create.php">글 작성</a></td>
          <td><?=$update_link?></td>
          <td><?=$delete_link?></td>
          <td><a href="information.php">문제 제보</a></td>
        </tr>
      </table>
      <table class="community">
        <tr>
          <td>
            <h2><?=$article['title']?></h2>
            <h3><?=$article['author']?></h3>
            <h4><?=$article['description']?></h4>
          </td>
        </tr>
      </table>
      </div>
        <ol>
          <?=$list?>
        </ol>
    </div>

</body>
</html>
