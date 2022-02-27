<?php

 $login_id=$_POST['login_id'];
 $login_pw=($_POST['login_pw']);

 require_once('lib/conn.php');

 $sql = "insert into gamelogin (login_id, login_pw)";
 $sql = $sql. "values('$login_id','$login_pw')";
 if($conn->query($sql)){
  echo 'success inserting <p/>';
  echo "<a href=login.php>로그인 페이지로 이동</a>";
 }
 else{
  echo 'fail to insert sql';
 }
mysqli_close($conn);
?>
