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
