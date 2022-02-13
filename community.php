<?php
session_start();
if(isset($_SESSION['is_logged'])){
  $is_logged = $_SESSION['is_logged']; ?>
  <div style="color: white;"><?php
  echo $_SESSION['userid'],"님 환영합니다.</br>"; ?></div><?php
  echo "<a href=process_logout.php>로그아웃</a>";
}
else{
  ?>
  <div style="color: white;"><?php
  echo "로그인 먼저 해주세요"; ?></div>
  <div class="right">
    <a href="sign_in.php">회원가입</a>
    <a href="login.php">로그인</a>
  </div>  <?php
;}
?>

<?php
  $conn = mysqli_connect(
    'localhost',
    'root',
    'qkrqhrja2',
    'siss_winter');

  $sql = "SELECT * FROM community_text";
  $result = mysqli_query($conn, $sql);
  $list = '';
  $sql_spoiler = "SELECT * FROM community_text";
  $result_spoiler = mysqli_query($conn, $sql_spoiler);

  while($row = mysqli_fetch_array($result_spoiler)){
    if ($row['spoiler'] == 'spoiler'){
      $list = $list."<li><a href=\"community.php?id={$row['id']}\">[스포주의] {$row['title']}</a></li>";
    }
    else {
      $list = $list."<li><a href=\"community.php?id={$row['id']}\">{$row['title']}</a></li>";
    }
  }

  $article = array(
    'title'=>'',
    'author'=>'',
    'description'=>'',
    'spoiler'=>''
  );

  $update_link = '';
  $delete_link = '';

  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql_id = "SELECT * FROM community_text WHERE id={$filtered_id}";
    $result_id = mysqli_query($conn, $sql_id);
    $row = mysqli_fetch_array($result_id);


    $article['title'] = $row['title'];
    $article['author'] = '작성자: '.$row['author'];
    $article['description'] = $row['description'];
    $article['spoiler'] = $row['spoiler'];

    if ($article['spoiler'] == 'spoiler'){
      $article['title'] = '[스포주의] '.$row['title'];
    }

    if ($_SESSION['userid']==$row['author']){
    $update_link = '<a href="update.php?id='.$_GET['id'].'">글 수정</a>';
    $delete_link = '
      <form action="process_delete.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>';
  }
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
    <div class="centering"><a href="index.php"><img src="banner.jpg" width="150" height="150"></a>
    <a href="community.php"><h1>커뮤니티</h1></a></div>



    <?php
    if(empty($_REQUEST["keyword"])){
      $keyword="";
    }
    else{
      $keyword=$_REQUEST["keyword"];
    }
    ?>

    <form class="navbar-form pull-left" method="get" action="">
    <input type="text" name="keyword" class="form-control" placeholder="검색어를 입력 후 enter를 누르세요" autofocus>
    </form>


    <?
      $conn = mysqli_connect(
        'localhost',
        'root',
        'qkrqhrja2',
        'siss_winter');

      $sql="SELECT * FROM community_text
      WHERE description like '%$keyword%'";

      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($result);
      print_r($row);
      ?>

    <a href="create.php">글 작성</a>
    <?=$update_link?>
    <?=$delete_link?>
    <a href="information.php">문제 제보</a>

    <h2><?=$article['title']?></h2>
    <h3><?=$article['author']?></h3><p>
    <h4><?=$article['description']?></h4>

    <ol>
      <?=$list?>
    </ol>

</body>
</html>
