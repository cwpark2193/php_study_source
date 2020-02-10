<meta charset="utf-8">
<?php
  session_start();

  date_default_timezone_set('Asia/Seoul');
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
  }else {
    $userid = "";
  }
  if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
  }else {
    $username = "";
  }

  $subject = $_POST["subject"];
  $content = $_POST["content"];

  $subject = htmlspecialchars($subject, ENT_QUOTES);
  $content = htmlspecialchars($content, ENT_QUOTES);

  $regist_day = date("Y-m-d (H:i)");
  $upload_dir = './data/';

  $upfile_name = $_FILES["upfile"]["name"];
  $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
  $upfile_type = $_FILES["upfile"]["type"];
  $upfile_size = $_FILES["upfile"]["size"];
  $upfile_error = $_FILES["upfile"]["error"];

  if ($upfile_name && !$upfile_error) {
    $file = explode(".",$upfile_name);
    $file_name = $file[0];
    $file_ext = $file[1];

    $new_file_name = date("Y_m_d_H_i_s");
    $new_file_name = $new_file_name."_".$file_name;
    $copied_file_name = $new_file_name.".".$file_ext;
    $uploaded_file = $upload_dir.$copied_file_name;

    if ($upfile_size > 1000000) {
      echo "<script>
            alert('업로드 파일 크기가 지정된 용량(1mb)을 초과합니다!<br>파일 크기를 체크해주세요!');
            histoy.go(-1)
            </script>";
            exit;

    }
    if (!move_uploaded_file($upfile_tmp_name,$uploaded_file)) {
      echo "<script>
            alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
            histoy.go(-1)
            </script>";
            exit;
    }
  }else {
    $upfile_name = "";
    $upfile_type = "";
    $copied_file_name = "";
  }

  $connect = mysqli_connect("localhost", "root", "123456", "myPage");
  $sql = "insert into board (id,name,subject,content,regist_day,hit,file_name,file_type,file_copied)";
  $sql .= "values('$userid','$username','$subject','$content','$regist_day',0,";
  $sql .= "'$upfile_name','$upfile_type','$copied_file_name')";
  mysqli_query($connect,$sql);

  $point_up = 100;

  $sql = "select point from members where sign_id='$userid'";
  $result = mysqli_query($connect,$sql);
  $row = mysqli_fetch_array($result);
  $new_point = $row["point"] + $point_up;

  $sql = "update members set point=$new_point where sign_id='$userid'";
  mysqli_query($connect,$sql);

  mysqli_close($connect);

  echo "<script>location.href = 'board_list.php';</script>";
 ?>
