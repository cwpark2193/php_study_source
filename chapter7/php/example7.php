<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $table = $_GET['table'];
    $type = $_GET['type'];

    if ($table ==="free") {
      $board_title = "자유게시판";
    }elseif ($table ==="qna") {
      $board_title = "질의응답 게시판";
    }

    if ($type ==="list") {
      $type_title = "목록보기";
    }elseif ($type ==="write") {
      $type_title = "글쓰기";
    }
     ?>
     <h3>
       <?php
       echo ">>".$board_title." | ".$type_title;
        ?>
     </h3>
  </body>
</html>
