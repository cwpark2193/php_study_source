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
  if (isset($_POST["item"])) {
    $num_item = count($_POST["item"]);
  }else {
    echo "
          <script>
          alert('삭제할 게시글을 선택해주세요!');
          history.go(-1)
          </script>
         ";
  }
  $connect = mysqli_connect("localhost", "root", "123456", "myPage");
  for ($i=0; $i <$num_item ; $i++) {
    $num = $_POST["item"][$i];
    $sql = "selete * from board  where num=$num";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);

    if ($copied_name) {
      $file_path = "./data/".$copied_name;
      unlink($file_path);
    }
    $sql = "delete from board where num = $num";
    mysqli_query($connect,$sql);
  }
  mysqli_close($con);
  header('Location : admin_board.php');
 ?>
