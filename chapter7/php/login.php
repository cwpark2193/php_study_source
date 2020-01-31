<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $id = $_POST['login_id'];
    $password = $_POST['login_password'];
     ?>
     <ul>
       <li>아이디 : <?= $id?></li>
       <li>비밀번호 : <?= $password?></li>
     </ul>
  </body>
</html>
