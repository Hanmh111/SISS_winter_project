<<<<<<< HEAD
<?php require_once('view/top.php');?>
    <div class="centering"><a href="index.php"><img src="banner.jpg" width="150" height="150"></a>
    <h1>추리 게임</a></h1>
    <h2>로그인</h2>
    <div class="centering">
    <form action="process_login.php" method="POST">
      <table>
        <tr>
          <td>ID</td>
          <td>|&ensp;<input type="text" name="id"/></td>
        </tr>
        <tr>
          <td>PW</td>
          <td>|&ensp;<input type="password" name="pw"/></td>
        </tr>
      </table>
      <div><input type="submit" name="login" value="로그인">&ensp;
      <a href=sign_in.php>회원가입</a>
    </form>
  </div>
<?php require_once('view/bottom.php');?>
=======
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SISS Winter Projext</title>
      <link rel="stylesheet" type="text/css" href="#"/>
      <script type="text/javascript" src=""></script>
  </head>
  <body>
    <h1><a href="index.php">추리 게임</a></h1>
    <h2>로그인</h2>
    <form action="process_login.php" method="POST">
      ID : <input type="text" name="id"/></br>
      PW : <input type="password" name="pw"/></br>
      <input type="submit" name="login" value="로그인">
      <a href=sign_in.php>회원가입</a>
    </form>

  </body>
</html>
>>>>>>> main
