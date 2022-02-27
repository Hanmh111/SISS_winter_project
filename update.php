<?php
session_start();
if(isset($_SESSION['is_logged'])){
  $is_logged = $_SESSION['is_logged'];} ?>

<?php
  require_once('lib/conn.php');
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
    if ($_SESSION['userid']!=$row['author']) {
      header("Location: community.php");
    }
  }
  ?>

<?php require_once('view/top.php');?>
    <div class="centering">
      <div><a href="index.php"><img src="banner.jpg" width="150" height="150"></a></div>
      <div><a href="community.php"><h1>커뮤니티</h1></a></div>
      <div><h3>글 수정</h3></div>
      <form action="process_update.php" method="POST">
        <table class="write">
          <input type="hidden" name="id" value="<?=$_GET['id']?>">
          <tr>
            <td>제목 |&emsp;<input type="text" style="width:85%;" name="title" placeholder="20자 내로 입력해주세요." value="<?=$article['title']?>"></td>
            <td>스포일러<input type="checkbox" name="spoiler" value="spoiler"></td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="description" rows="8" cols="80"><?=$article['description']?></textarea></td>
          </tr>
        </table>
        <div><input type="submit"></div>
      </form>
    </div>
<?php require_once('view/bottom.php');?>
