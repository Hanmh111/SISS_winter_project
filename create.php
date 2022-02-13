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
    <div class="centering"><a href="index.php"><img src="banner.jpg" width="150" height="150"></a>
    <a href="community.php"><h1>커뮤니티</h1></a>
    <h3>글 작성</h3>
    <form action="process_create.php" method="POST">
      <p><input type="text" name="title" placeholder="제목"> 스포일러<input type="checkbox" name="state" value="spoiler"> </p>
      <p><textarea name="description" rows="8" cols="80"></textarea></p>
      <p><input type="submit"></p>
    </form>
  </div>
  </body>
</html>
