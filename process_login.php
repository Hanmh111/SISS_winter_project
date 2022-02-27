<?php
session_start();
require_once('lib/conn.php');

$input_id=$_POST['id'];
$input_pw=$_POST['pw'];

$query="select * from gamelogin where login_id='$input_id'";
$result= $conn ->query($query);

if (mysqli_num_rows($result)==1){
  $row=mysqli_fetch_assoc($result);

  if($row['login_pw']==$input_pw){
    $_SESSION['is_logged']='YES';
    $_SESSION['userid']=$input_id;
    if(isset($_SESSION['userid'])){
      ?><script>
      alert("로그인 되었습니다.");
      location.replace("./index.php");
      </script>
      <?php
      }
      else{
        echo "session fail";
      }
    }
    else {
      ?>      <script>
      alert("아이디 혹은 비밀번호가 잘못되었습니다.");
      history.back();
    </script>
    <?php
  }
}
else{
?>     <script>
alert("아이디 혹은 비밀번호가 잘못되었습니다.");
history.back();
</script>
<?php
        }
?>
<?php require_once('view/process_black.php'); ?>
