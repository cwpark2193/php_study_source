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
      <h3 class="title">
      <?php
      $mode = $_GET["mode"];
      $num = $_GET["num"];

      $connect = mysqli_connect("localhost", "root", "123456", "myPage");
      $sql = "select * from message where num=$num";
	    $result = mysqli_query($connect, $sql);

      $row = mysqli_fetch_array($result);
      $send_id = $row["send_id"];
      $rv_id = $row["rv_id"];
      $regist_day = $row["regist_day"];
      $subject = $row["subject"];
      $content = $row["content"];

      $content = str_replace(" ","&nbsp;",$content);
      $content = str_replace("\n","<br>",$content);

      if ($mode ==="send") {
        $result2 = mysqli_query($connect, "select name from members where sign_id='$rv_id'");
      }else {
        $result2 = mysqli_query($connect, "select name from members where sign_id='$send_id'");
      }

      $record = mysqli_fetch_array($result2);
      $send_name = $record["name"];

      if ($mode ==="send") {
        echo "송신 쪽지함 > 목록보기";
      }else {
        echo "수신 쪽지함 > 목록보기";
      }
       ?>
       </h3>
       <ul id="view_content">
         <li>
           <span class="col1"><b>제목 : </b> <?=$subject?></span>
           <span class="col2"><?=$msg_name?> | <?=$regist_day?></span>
         </li>
         <li>
           <?=$content?>
         </li>
       </ul>
       <ul class="buttons">
         <li><button type="button" name="button" onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button> </li>
         <li><button type="button" name="button" onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button> </li>
         <li><button type="button" name="button" onclick="location.href='message_response_form.php?num=<?=$num?>'">답변 쪽지</button> </li>
         <li><button type="button" name="button" onclick="location.href='message_delete.php?num=<?=$num?>&mode=<?=$mode?>'">삭제</button> </li>
       </ul>
    </div><!-- end of message box-->
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
