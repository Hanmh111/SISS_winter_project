<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '111111',
  'siss_winter');

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id']),
);

$sql = "
  DELETE
    FROM community_text
    WHERE id = {$filtered['id']}
";

$result = mysqli_query($conn, $sql);
if($result === false){
  echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.')</script>";
  error_log(mysqli_error($conn));}
else{
  echo "<script>alert('삭제되었습니다.');</script>";
  header('Location: /community.php');
}
?>
