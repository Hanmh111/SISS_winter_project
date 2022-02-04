<?php

 $login_id=$_POST['login_id'];
 $login_pw=($_POST['login_pw']);

 $conn = mysqli_connect(
   'localhost',
   'root',
   'qkrqhrja2',
   'siss_winter');

 $sql = "insert into gamelogin (login_id, login_pw)";             // (입력받음)insert into 테이블명 (column-list)
 $sql = $sql. "values('$login_id','$login_pw')";         // calues(column-list에 넣을 value-list)
 if($conn->query($sql)){                                                              //만약 sql로 잘 들어갔으면
  echo 'success inserting <p/>';
  echo "<a href=login.php>로그인 페이지로 이동</a>";                                              //success inserting 으로 표시
 }else{                                                                                //아니면
  echo 'fail to insert sql';                                                            //fail to insert sql로 표시
 }
mysqli_close($conn);
?>
