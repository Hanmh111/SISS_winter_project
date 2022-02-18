<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SISS Winter Projext</title>
      <link rel="stylesheet" href="style.css">
      <script type="text/javascript" src=""></script>
  </head>
  <body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
    <div class="centering"><a href="index.php"><img src="banner.jpg" width="150" height="150"></a>
    <h1>추리 게임</a></h1>
    <h2>회원 가입</h2>
    <form action="process_sign_up.php" method="post">
      <table>
        <tr>
          <td>ID</td>
          <td>|&ensp;<input type="text" name="login_id" value="" placeholder="Id를 입력해주세요."></td>
        </tr>
        <tr>
          <td>PW</td>
          <td>|&ensp;<input type="password" name="login_pw" placeholder="PW를 입력해주세요."></td>
        </tr>
      </table>
      <input type="submit" name="Sign Up" value="Sign Up">
    </form>
  </body>
</html>
