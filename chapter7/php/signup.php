<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $name = $_POST["name1"];
    $birth_year = $_POST["birth_year"];
    $birth_month = $_POST["birth_month"];
    $birth_day = $_POST["birth_day"];
    $year = $_POST["year"];
    $sign_id = $_POST["sign_id"];
    $sign_password = $_POST["sign_password"];
    $email = $_POST["email1"];
    $notice_mail_check = $_POST["notice_mail_check"];
    $call_number = $_POST["call_number"];
    $call_number_one = $_POST["call_number_one"];
    $call_number_two = $_POST["call_number_two"];
    $phone_number = $_POST["phone_number"];
    $phone_number_one = $_POST["phone_number_one"];
    $phone_number_two = $_POST["phone_number_two"];
    $call_mms_check = $_POST["call_mms_check"];
    $home_number_one = $_POST["home_number_one"];
    $home_number_two = $_POST["home_number_two"];
    $address = $_POST["address"];
    $address_detail = $_POST["address_detail"];
    $status = $_POST["status"];
    $root = $_POST["root"];
    $etc_reason = $_POST["etc_reason"];
    if ($root ==="etc") {
      $root = $etc_reason;
    }
    if ($year ==="soal") {
      $cal_year = "양력";
    }elseif ($year ==="luna") {
      $cal_year = "음력";

    }
     ?>
     <ul>
       <li>이름 : <?= $name?></li>
       <li>생일 : <?= $birth_year."년".$birth_month."월".$birth_day."일 ".$cal_year?></li>
       <li>아이디 : <?= $sign_id?></li>
       <li>비밀번호 : <?= $sign_password?></li>
       <li>이메일 : <?= $email?></li>
       <li>전화번호 : <?= $call_number."-".$call_number_one."-".$call_number_two?></li>
       <li>우편번호 : <?= $home_number_one."-".$home_number_two?></li>
       <li>주소 : <?= $address?></li>
       <li>상세주소 : <?= $address_detail?></li>
       <li>직업 : <?= $status?></li>
       <li>경로 : <?= $root?></li>
     </ul>
  </body>
</html>
