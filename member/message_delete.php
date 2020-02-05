<meta charset='utf-8'>
<?php
  $num = $_GET["num"];
  $mode = $_GET["mode"];

  $connect = mysqli_connect("localhost","root","123456","myPage");
  $sql = "delete from message where num = $num";
  mysqli_query($connect,$sql);
  mysqli_close($connect);
  if ($mode ==="send") {
    $url = "message_box.php?mode=send";
  }else {
    $url = "message_box.php?mode=rv";
  }
  echo "<script>location.href = '$url';</script>";
 ?>
