<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $table1 = "free";
    $table2 = "qna";
     ?>
     <h3>자유게시판</h3>
     <a href="example7.php?table=<?= $table1?>&type=list">목록보기</a><br>
     <a href="example7.php?table=<?= $table1?>&type=write">글쓰기</a><br>
     <h3>질의응답 게시판</h3>
     <a href="example7.php?table=<?= $table2?>&type=list">목록보기</a><br>
     <a href="example7.php?table=<?= $table2?>&type=write">글쓰기</a><br>
  </body>
</html>
