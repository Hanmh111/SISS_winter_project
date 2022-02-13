<?php
  $conn = mysqli_connect(
    'localhost',
    'root',
    'qkrqhrja2',
    'siss_winter');
  $sql = "SELECT * FROM community_text";
  $result = mysqli_query($conn, $sql);
  $list = '';

  $article = array(
    'title'=>'',
    'description'=>''
  );

  $update_link = '';

  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM community_text WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = $row['title'];
    $article['description'] = $row['description'];

    $update_link = '<a href="update.php?id='.$_GET['id'].'">글 수정</a>';
  }
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
    <div><a href="index.php">home</a></div>
    <div><a href="community.php"><h1>커뮤니티</h1></a></div>
    <h3>글 수정</h2>
    <form action="process_update.php" method="POST">
      <input type="hidden" name="id" value="<?=$_GET['id']?>">
      <p><input type="text" name="title" placeholder="제목" value="<?=$article['title']?>"></p>
      <p><textarea name="description" rows="8" cols="80"><?=$article['description']?></textarea></p>
      <p><input type="submit"></p>
  </body>
</html>
