<?php
<<<<<<< HEAD
session_start();
$is_logged=$_SESSION['is_logged'];
require_once('lib/conn.php');
=======
$conn = mysqli_connect(
  'localhost',
  'root',
  'qkrqhrja2',
  'siss_winter');
>>>>>>> main

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);


$sql = "
  UPDATE community_text
    SET
      title = '{$filtered['title']}',
      description = '{$filtered['description']}',
      spoiler = '{$_POST['spoiler']}'
    WHERE
      id = {$filtered['id']}
";

$result = mysqli_query($conn, $sql);
if($result === false){
  echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.')</script>";
  error_log(mysqli_error($conn));}
header('Location: /community.php');
?>
