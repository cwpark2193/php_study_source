<?php
  $num = $_GET["num"];
  $page = $_GET["page"];
  $mode = "delete";

  $connect = mysqli_connect("localhost","root","123456","myPage");
  function board_delete($connect,$num,$page)
  {
    $sql = "select * from board where num  $num";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result);
    $copied_name = $row["file_copied"];

    if ($copied_name) {
      $file_path = "./data/".$copied_name;
      unlink($file_path);
    }
    $sql = "delete from board where num = $num";
    mysqli_query($connect,$sql);
    mysqli_close($connect);
  }
  function board_insert($connect,$num,$page)
  {
    // code...
  }
  switch ($mode) {
    case 'delete':
      board_delete($connect,$num,$page);
      echo "<script>location.href = 'board_list.php?page=$page';</script>";
      break;

    default:
      // code...
      break;
  }
 ?>
