<?php
  @session_start();
  if (isset($_SESSION["userlevel"])) {
    $userlevel = $_SESSION["userlevel"];
  }else {
    $userlevel = "";
  }
  if ($userlevel !== "1") {
    echo "
          <script>
          alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
          history.go(-1)
          </script>
         ";
    exit;
  }
  $num = $_GET["num"];
  $level = $_POST["level"];
  $point = $_POST["point"];

  $connect = mysqli_connect("localhost", "root", "123456", "myPage");
  $sql = "update members set level={$level},point={$point} where num={$num}";
  mysqli_query($connect,$sql);
  mysqli_close($connect);
  echo "<script>location.href='admin_member.php';</script>";
 ?>
