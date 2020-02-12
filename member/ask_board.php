<meta charset="utf-8">
<?php
  session_start();
    if(!isset($_SESSION['userid'])){
      echo "
            <script>
            alert('권한없음!');
            history.go(-1);
            </script>";
      exit;
    }
    function input_check($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    $content= $q_content = $sql= $result = $userid="";
    $group_num = 0;

    $userid = $_SESSION['userid'];
    $username = $_SESSION['username'];
    $connect = mysqli_connect("localhost", "root", "123456", "myPage");
    // 삽입하는경우
    if(isset($_GET["mode"])&&$_GET["mode"]==="insert"){
        $content = trim($_POST["content"]);
        $subject = trim($_POST["subject"]);
        if(empty($content)||empty($subject)){
          echo "<script>alert('내용이나 제목을 작성하세요.');history.go(-1);</script>";
          exit;
        }
        $subject = input_check($_POST["subject"]);
        $content = input_check($_POST["content"]);
        $userid = input_check($userid);
        $hit = 0;
        $is_html=(!isset($_POST["is_html"]))?('n'):('y');
        $q_subject = mysqli_real_escape_string($connect, $subject);
        $q_content = mysqli_real_escape_string($connect, $content);
        $q_userid = mysqli_real_escape_string($connect, $userid);
        $regist_day=date("Y-m-d (H:i)");

        $group_num = 0;
        $depth = 0;
        $ord = 0;

        $sql = "insert into ask values (null, $group_num,$depth,$ord,'$q_userid','$username','$q_subject','$q_content','$regist_day',$hit)";
        $result = mysqli_query($connect,$sql);
        if (!$result) {
          die('Error: ' . mysqli_error($connect));
        }

        $sql = "select max(num) from ask";
        $result = mysqli_query($connect,$sql);
        if (!$result) {
          die('Error: ' . mysqli_error($connect));
        }
        $row=mysqli_fetch_array($result);
        $max_num=$row['max(num)'];
        $sql = "update ask set group_num = $max_num where num = $max_num";
        $result = mysqli_query($connect,$sql);
        if (!$result) {
          die('Error: ' . mysqli_error($connect));
        }
        $point_up = 100;

        $sql = "select point from members where sign_id='$userid'";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);
        $new_point = $row["point"] + $point_up;

        $sql = "update members set point=$new_point where sign_id='$userid'";
        mysqli_query($connect,$sql);

        mysqli_close($connect);
        echo "<script>location.href='./ask_view.php?num=$max_num&hit=$hit';</script>";
    }else if(isset($_GET["mode"])&&$_GET["mode"]==="delete"){
        $num = input_check($_GET["num"]);
        $q_num = mysqli_real_escape_string($connect, $num);

        $sql ="delete from ask where num=$q_num";
        $result = mysqli_query($connect,$sql);
        if (!$result) {
          die('Error: ' . mysqli_error($connect));
        }

        mysqli_close($connect);
        echo "<script>location.href='./ask_list.php?page=1';</script>";

    }else if(isset($_GET["mode"])&&$_GET["mode"]=="update"){
      $content = trim($_POST["content"]);
      $subject = trim($_POST["subject"]);
      if(empty($content)||empty($subject)){
        echo "<script>alert('내용이나제목입력요망!');history.go(-1);</script>";
        exit;
      }
      $subject = input_check($_POST["subject"]);
      $content = input_check($_POST["content"]);
      $userid = input_check($userid);
      $num = input_check($_POST["num"]);
      $hit = input_check($_POST["hit"]);
      $q_subject = mysqli_real_escape_string($connect, $subject);
      $q_content = mysqli_real_escape_string($connect, $content);
      $q_userid = mysqli_real_escape_string($connect, $userid);
      $q_num = mysqli_real_escape_string($connect, $num);
      $regist_day=date("Y-m-d (H:i)");

      $sql="update ask set subject='$q_subject',content='$q_content',regist_day='$regist_day' where num = $q_num;";
      $result = mysqli_query($connect,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($connect));
      }
      echo "<script>location.href='./ask_view.php?num=$num&hit=$hit';</script>";
    }else if(isset($_GET["mode"])&&$_GET["mode"]==="response"){
      $content = trim($_POST["content"]);
      $subject = trim($_POST["subject"]);
      if(empty($content)||empty($subject)){
        echo "<script>alert('내용이나 제목을 작성하세요.');history.go(-1);</script>";
        exit;
      }
      $subject = input_check($_POST["subject"]);
      $content = input_check($_POST["content"]);
      $userid = input_check($userid);
      $num = input_check($_POST["num"]);
      // $hit = test_input($_POST["hit"]);
      $hit =0;
      $q_subject = mysqli_real_escape_string($connect, $subject);
      $q_content = mysqli_real_escape_string($connect, $content);
      $q_userid = mysqli_real_escape_string($connect, $userid);
      $q_num = mysqli_real_escape_string($connect, $num);
      $regist_day=date("Y-m-d (H:i)");

      $sql="select * from ask where num =$q_num;";
      $result = mysqli_query($connect,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($connect));
      }
      $row=mysqli_fetch_array($result);

      $group_num=(int)$row['group_num'];
      $depth=(int)$row['depth'] + 1;
      $ord=(int)$row['ord'] + 1;

      $sql="update ask set ord=ord+1 where group_num = $group_num and ord >= $ord";
      $result = mysqli_query($connect,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($connect));
      }

      $sql="insert into ask values (null,$group_num,$depth,$ord,'$q_userid','$username',
      '$q_subject','$q_content','$regist_day',$hit);";
      $result = mysqli_query($connect,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($connect));
      }

      $sql="select max(num) from ask;";
      $result = mysqli_query($connect,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($connect));
      }
      $row=mysqli_fetch_array($result);
      $max_num=$row['max(num)'];

      echo "<script>location.href='ask_view.php?num=$max_num&hit=$hit';</script>";

    }
?>
