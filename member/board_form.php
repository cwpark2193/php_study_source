<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JaeHoon's Bakery</title>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <link rel="stylesheet" href="./css/normalize.css">
    <script src="./js/slide.js"></script>
    <script src="./js/board.js"></script>
    <link rel="stylesheet" href="./css/slide.css">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/board.css">
  </head>
  <body>
    <header>
      <?php include "header.php";?>
    </header>
    <?php
    if (!$userid) {
      echo "<script>
              alert('로그인 후 이용해주세요!');
              history.go(-1);
              </script>
              ";
      exit;
    }
     ?>
    <section>
      <div class="slideshow">
      <div class="slideshow_slides"> <!-- 슬라이드 안 사진 -->
        <a href="#"><img src="./img/main_img.jpg" alt="slide-1"> </a>
        <a href="#"><img src="./img/slide_first.jpg" alt="slide-2"> </a>
        <a href="#"><img src="./img/slide_second.jpg" alt="slide-3"> </a>
        <a href="#"><img src="./img/slide_third.jpg" alt="slide-4"> </a>
        <a href="#"><img src="./img/slide_fourth.jpg" alt="slide-5"> </a>
      </div>
      <div class="slideshow_nav"> <!-- 사진 넘어가는 버튼 -->
        <a href="#" class="previous">previous</a>
        <a href="#" class="next">next</a>
      </div>
      <div class="slideshow_indicator">
        <a href="#" class="">&nbsp;</a>
        <a href="#" class="">&nbsp;</a>
        <a href="#" class="">&nbsp;</a>
        <a href="#" class="">&nbsp;</a>
        <a href="#" class="">&nbsp;</a>
      </div>
    </div>
    <div id="board_box">
      <h3 id="board_title"> 게시판 > 글 쓰기</h3>
      <form name="board_form" action="board_insert.php" enctype="multipart/form-data" method="post">
        <ul id="board_form">
          <li>
            <span class="col1">이름</span>
            <span class="col2"><?=$username?></span>
          </li>
          <li>
            <span class="col1">제목</span>
            <span class="col2"><input type="text" name="subject" value=""> </span>
          </li>
          <li id="text_area">
            <span class="col1">내용 : </span>
            <span class="col2"><textarea name="content"></textarea> </span>
          </li>
          <li>
            <span class="col1"> 첨부 파일 </span>
            <span class="col2"><input type="file" name="upfile" value=""> </span>
          </li>
        </ul>
        <ul class="buttons">
          <li><button type="button" name="button" onclick="check_input1()">완료</button> </li>
          <li><button type="button" name="button" onclick="location.href='board_list.php'">목록</button> </li>
        </ul>
      </form>
    </div>
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
