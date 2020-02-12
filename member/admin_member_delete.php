<?php
  session_start();
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

  $connect = mysqli_connect("localhost", "root", "123456", "myPage");
  $sql = "delete from members  where num=$num";
  mysqli_query($connect,$sql);
  mysqli_close($con);
  // header('Location : admin.php');
  echo "
	     <script>
	         location.href = 'admin_member.php';
	     </script>
	   ";
 ?>
