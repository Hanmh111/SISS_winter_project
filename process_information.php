<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'qkrqhrja2',
  'siss_winter');

$filtered = array(
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "
  INSERT INTO community_information
    (title, description, author)
    VALUES(
        '{$filtered['title']}',
        '{$filtered['description']}',
        '{$filtered['id']}'

    )
";
//Anonymous는 나중에 로그인한 id로 바꿔야 합니다.

$result = mysqli_query($conn, $sql);
if($result === false){
  echo "<script>alert('저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.')</script>";
  error_log(mysqli_error($conn));}
header('Location: /community.php');
?>
