<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <?php
      $id = $_POST['id'];
      define("ID",$id);
      echo ID."님 환영합니다.";
      $password = $_POST['password'];
     ?>
     <ul>
       <li>아 이 디 : <?=$id?></li>
       <li>비밀번호 : <?=$password?></li>
     </ul>
  </body>
</html>
