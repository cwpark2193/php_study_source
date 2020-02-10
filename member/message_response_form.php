<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JaeHoon's Bakery</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/message.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/slide.css">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="./js/slide.js"></script>
    <script src="./js/message.js"></script>
  </head>
  <body>
    <header>
      <?php include "header.php";?>
    </header>
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
    <div id="message_box">
      <h3 id="write_title">쪽지 보내기</h3>
      <?php
      $num = $_GET["num"];

      $connect = mysqli_connect("localhost", "root", "123456", "myPage");
      $sql = "select * from message where num=$num";
	    $result = mysqli_query($connect, $sql);

      $row = mysqli_fetch_array($result);
      $send_id = $row["send_id"];
      $rv_id = $row["rv_id"];
      $subject = $row["subject"];
      $content = $row["content"];

      $subject = "RE : ".$subject;
      $content = "> ".$content;
      $content = str_replace("\n","\n>",$content);
      $content = "\n\n\n-----------------------------------------------\n".$content;

      $result2 = mysqli_query($connect, "select name from members where sign_id='$send_id'");
      $record = mysqli_fetch_array($result2);
      $send_name = $record["name"];
       ?>
      <form name="message_form" action="message_insert.php?send_id=<?=$userid?>" method="post">
        <input type="hidden" name="rv_id" value="<?=$send_id?>">
        <div id="write_msg">
          <ul>
            <li>
              <span class="col1">보내는 사람 : </span>
              <span class="col2"><?=$userid?></span>
            </li>
            <li>
              <span class="col1">수신 아이디 : </span>
              <span class="col2"><?=$send_name?>(<?=$send_id?>)</span>
            </li>
            <li>
              <span class="col1">제목 : </span>
              <span class="col2"><input type="text" name="subject" value="<?=$subject?>"></span>
            </li>
            <li id="text_area">
              <span class="col1">내용 : </span>
              <span class="col2"><textarea name="content"><?=$content?></textarea> </span>
            </li>
          </ul>
          <button type="button" onclick="check_input2()">보내기</button>
        </div>
      </form>
    </div><!-- end of message box-->
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
