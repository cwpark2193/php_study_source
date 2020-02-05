<meta charset='utf-8'>
<?php
  date_default_timezone_set('Asia/Seoul');
  $send_id = $_GET["send_id"];

  $rv_id = $_POST["rv_id"];
  $subject = $_POST["subject"];
  $content = $_POST["content"];
  $subject = htmlspecialchars($subject, ENT_QUOTES);
  $content = htmlspecialchars($content, ENT_QUOTES);
  $regist_day = date("Y-m-d (H:i)");
  if (!$send_id) {
    echo "<script>
            alert('로그인 후 이용해주세요!');
            history.go(-1);
            </script>
            ";
    exit;
  }
  $connect = mysqli_connect("localhost", "root", "123456", "myPage");
  $sql = "select * from members where sign_id='$rv_id'";
  $result = mysqli_query($connect, $sql);
  $num_record = mysqli_num_rows($result);

  if ($num_record) {
    $sql = "insert into message (send_id, rv_id, subject, content, regist_day)";
    $sql .= "values('$send_id','$rv_id','$subject','$content','$regist_day')";
    mysqli_query($connect,$sql);
  }else {
    echo "<script>
            alert('수신 아이디가 잘못 되었습니다.');
            history.go(-1);
            </script>
            ";
    exit;
  }
  echo "<script>location.href = 'message_box.php?mode=send'</script>";
 ?>
