<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $email1 = $_POST['email1'];
    $email2 = $_POST['email2'];
     ?>
     <ul>
       <li>이메일 : <?php echo $email1."@".$email2; ?></li>
     </ul>
  </body>
</html>
