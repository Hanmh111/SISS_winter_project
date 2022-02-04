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
    <h3>글 작성</h3>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="제목"> 스포일러<input type="checkbox" name="state" value="spoiler"> </p>
      <p><textarea name="description" rows="8" cols="80"></textarea></p>
      <p><input type="submit"></p>
    </form>
  </body>
</html>
