<?php
session_start();
$is_logged=$_SESSION['is_logged'];
if($is_logged=='YES'){
  echo $_SESSION['userid'],"님 환영합니다.</br>";
  echo "<a href=process_logout.php>로그아웃</a>";

}
else{
?>
<script>
alert("로그인해야 접근하실 수 있습니다.");
location.replace("./index.php");
</script>
<?php }
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

  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"community.php?id={$row['id']}\">
    {$row['title']}</a></li>";
  }

  $article = array(
    'title'=>'',
    'author'=>'',
    'description'=>''
  );

  $update_link = '';
  $delete_link = '';

  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM community_text WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $article['title'] = $row['title'];
    $article['description'] = $row['description'];
    $article['author'] = $row['author'];
    ?>

    <?php
    if ($_SESSION['userid']==$row['author']){
    $update_link = '<a href="update.php?id='.$_GET['id'].'">글 수정</a>';
    $delete_link = '
      <form action="process_delete.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>';
  }}
?>

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
    <?=$article['author']?><br>
    <?=$article['description']?>
    <ol>
      <?=$list?>
    </ol>


</body>
</html>
