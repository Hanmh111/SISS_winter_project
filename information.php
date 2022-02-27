<?php require_once('view/top.php');?>
    <div class="centering">
      <div><a href="index.php"><img src="banner.jpg" width="150" height="150"></a></div>
      <div><a href="community.php"><h1>커뮤니티</h1></a></div>
      <div><h3>문제 제보</h3></div>
      <form action="process_information.php" method="POST">
        <table class="write">
          <tr>
            <td>제목 |&emsp;<input type="text" style="width:85%;" name="title" placeholder="20자 내로 입력해주세요."></td>
          </tr>
          <tr>
            <td><textarea name="description" rows="8" cols="80" placeholder="문제를 제보해주셔서 감사합니다."></textarea></td>
          </tr>
        </table>
        <div><input type="submit"></div>
      </form>
    </div>
<?php require_once('view/bottom.php');?>
