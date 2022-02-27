<?php
session_start();
$is_logged=$_SESSION['is_logged'];
require_once('lib/conn.php');

$filtered = array(
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description']),
  'author'=>mysqli_real_escape_string($conn, $_SESSION['userid'])
);

$sql = "
  INSERT INTO community_text
    (title, description, author, spoiler)
    VALUES(
      '{$filtered['title']}',
      '{$filtered['description']}',
      '{$filtered['author']}',
      '{$_POST['spoiler']}'
      )
";

$result = mysqli_query($conn, $sql);
if($result === false){
  echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.')</script>";
  error_log(mysqli_error($conn));}
header('Location: /community.php');
?>
