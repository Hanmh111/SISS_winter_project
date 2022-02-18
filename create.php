<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SISS Winter Projext</title>
      <link rel="stylesheet" href="style.css">
      <script type="text/javascript" src=""></script>
  </head>
  <body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
    <div class="centering">
      <div><a href="index.php"><img src="banner.jpg" width="150" height="150"></a></div>
      <div><a href="community.php"><h1>커뮤니티</h1></a></div>
      <div><h3>글 작성</h3></div>
      <form action="process_create.php" method="POST">
        <table class="write">
          <tr>
            <td>제목 |&emsp;<input type="text" style="width:85%;" name="title" placeholder="20자 내로 입력해주세요."></td>
            <td>스포일러<input type="checkbox" name="spoiler" value="spoiler"></td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="description" rows="8" cols="80"></textarea></td>
          </tr>
        </table>
        <div><input type="submit"></div>
      </form>
  </div>
  </body>
</html>
