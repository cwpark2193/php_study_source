<?php
  $sign_id = $_POST["sign_id"];

  $connect = mysqli_connect("localhost", "root", "123456", "myPage");
  $sql = "select * from members where sign_id = '$sign_id'";

  $result = mysqli_query($connect, $sql);
  $result_record = mysqli_num_rows($result);

  if($result_record){
    echo "1";
  }else{
    echo "0";
  }

  mysqli_close($con);

 ?>
