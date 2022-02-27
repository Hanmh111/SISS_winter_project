<?php
session_start();
$is_logged=$_SESSION['is_logged'];
<<<<<<< HEAD
require_once('conn.php');
=======
$conn = mysqli_connect(
  'localhost',
  'root',
  'qkrqhrja2',
  'siss_winter');
>>>>>>> main

$filtered = array(
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description']),
<<<<<<< HEAD
  'author'=>mysqli_real_escape_string($conn, $_SESSION['userid'])
  'spoiler'=>mysqli_real_escape_string($conn, $_POST['spoiler'])
=======
  'author'=>mysqli_real_escape_string($conn, $_POST['is_logged'])
>>>>>>> main
);

$sql = "
  INSERT INTO community_text
    (title, description, author, spoiler)
    VALUES(
<<<<<<< HEAD
      '{$filtered['title']}',
      '{$filtered['description']}',
      '{$filtered['author']}',
      '{$filtered['spoiler']}'
=======
      '{$_POST['title']}',
      '{$_POST['description']}',
      '{$_POST['author']}'
>>>>>>> main
      )
";

$result = mysqli_query($conn, $sql);
if($result === false){
  echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.')</script>";
  error_log(mysqli_error($conn));}
header('Location: /community.php');
?>
