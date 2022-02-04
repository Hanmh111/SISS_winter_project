<?php
session_start();
$is_logged=$_SESSION['is_logged'];
$conn = mysqli_connect(
  'localhost',
  'root',
  'qkrqhrja2',
  'siss_winter');

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  'answer'=>mysqli_real_escape_string($conn, $_POST['answer'])
);

$sql_game = "SELECT * FROM gamelevel";
$result= mysqli_query($conn, $sql_game);
$row_game = mysqli_fetch_array($result);

$sql_login = "SELECT * FROM gamelogin";
$result = mysqli_query($conn, $sql_login);
$row_login = mysqli_fetch_array($result);
$num = $filtered['id'] + 1;


if ($filtered['answer'] == $row_game['answer']) {
  if ($num > $row_login['level']){
    $sql = "
      UPDATE gamelogin
        SET
          level = '{$num}',
        WHERE
          id = {$row_login['id']}
    ";
    }
    ?>
    <script>
    alert('정답입니다!');
    location.replace("./gamestart.php");
    </script>
    <?php
  }
  else {
  ?><script>
  alert("틀렸습니다. 다시 입력해주세요.");
  history.back();
  </script>
<?php
    }
?>
