<?php
  $conn = mysqli_connect(
    'localhost',
    'root',
    '111111',
    'siss_winter');
  $sql = "SELECT * FROM community_text";
  $result = mysqli_query($conn, $sql);
  $list = '';

  while($row = mysqli_fetch_array($result)){
    //<li><a href=\"index.php?id=19\">MySQL</a><li>
    $list = $list."<li><a href=\"community.php?id={$row['id']}\">
    {$row['title']}</a></li>";
  }

  $article = array(
    'title'=>'',
    'description'=>''
  );

  $update_link = '';
  $delete_link = '';

  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM community_text WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = $row['title'];
    $article['description'] = $row['description'];

    $update_link = '<a href="update.php?id='.$_GET['id'].'">글 수정</a>';
    $delete_link = '
      <form action="process_delete.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>';
  }
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
    <div><a href="community.php"><h1>커뮤니티</h1></a></div>
    <a href="create.php">글 작성</a>
    <?=$update_link?>
    <?=$delete_link?>
    <a href="information.php">문제 제보</a>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
    <ol>
      <?=$list?>
    </ol>
  </body>
</html>
