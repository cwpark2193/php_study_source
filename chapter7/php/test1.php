<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $id = $_POST['id'];
    $password = $_POST['password'];
     ?>
     <ul>
       <li>아 이 디 : <?= $id?></li>
       <li>비밀번호 : <?= $password?></li>
     </ul>
  </body>
</html>
