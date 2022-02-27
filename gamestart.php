<?php
session_start();
if(isset($_SESSION['is_logged'])){
  $is_logged = $_SESSION['is_logged']; ?>
  <div class="left"><?php echo "USER | ".$_SESSION['userid']; ?></div>
  <div class="right"><?php echo "<a href=process_logout.php>로그아웃</a>";?></div>
<?php }
else {
  ?>
  <script>
    alert("로그인 먼저 해주세요.");
    location.href='index.php';
  </script>
<?php
}
?>

<?php
  require_once('lib/conn.php');

  $sql = "SELECT * FROM gamelogin LEFT JOIN gamelevel ON gamelogin.level = gamelevel.id Where login_id = '{$_SESSION['userid']}'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $sql_game = "SELECT id FROM gamelevel";
  $result_game = mysqli_query($conn, $sql_game);

  $list = '';
  $answer_link = '';
  $i = 1;
  while ($row_game = mysqli_fetch_array($result_game)){
    if ($i <= $row['level']){
      $list = $list."<li><a href=\"gamestart.php?id={$row_game['id']}\">00{$row_game['id']}</a></li>";
    }
    else { $list = $list."<li class='nonlink'>00{$row_game['id']}</li>"; }
    $i++;
  }
  $game = array(
    'title'=>'',
    'description'=>'',
  );

  if(isset($_GET['id'])){

    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);

    if (intval($row['level']) < intval($filtered_id)) {
      header("Location: gamestart.php");
    }

    $sql_id = "SELECT * FROM gamelevel WHERE id={$filtered_id}";
    $result_id = mysqli_query($conn, $sql_id);
    $row = mysqli_fetch_array($result_id);

    $game['title'] = $row['title'];
    $game['description'] = nl2br($row['description']);

    $answer_link = '
      <form action="process_answer.php" method="post">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="text" name="answer" placeholder="정답">
        <input type="submit" class="answer" value="제출">
      </form>';

  }


  settype($_POST['id'], 'integer');
  $filtered = array(
    'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  );

?>


<?php require_once('view/top.php');?>
    <div class="description">
      <div>
        <div class="centering"><a href="index.php"><img src="banner.jpg" width="150" height="150"></a></div>
          <div class="title"><h2><?=$game['title']?></h2></div>
          <div><?=$game['description']?></div>

             <?php
             require_once('lib/conn.php');

             if(isset($_GET['id'])){?>
               <input id="firsthint" type="checkbox" />
               <label for="firsthint">힌트1</label>
               <div class="one">

               <?php
               $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
               $sql_id = "SELECT firsthint FROM gamelevel WHERE id={$filtered_id}";
               $result_id = mysqli_query($conn, $sql_id);
               $row = mysqli_fetch_array($result_id);
               echo $row['firsthint']."<br>";
             }
             ?>
           </div>

             <?php
               require_once('lib/conn.php');

               if(isset($_GET['id'])) {?>

                 <input id="secondhint" type="checkbox" />
                 <label for="secondhint">힌트2</label>
                 <div class="two">

                <?php
                 $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
                 $sql_id = "SELECT secondhint FROM gamelevel WHERE id={$filtered_id}";
                 $result_id = mysqli_query($conn, $sql_id);
                 $row = mysqli_fetch_array($result_id);
                 echo $row['secondhint']. "<br>";
               }
             ?>
          </div>
          <div class="centering"><?=$answer_link?></div>
        </div>
        <div class="description">
          <div><h1>문제</h1></div>
          <div><?=$list?></div>
        </div>
  </div>
<?php require_once('view/bottom.php');?>
