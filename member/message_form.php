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
   <div id="message_box">
     <h3 id="write_title">쪽지 보내기</h3>
     <ul class="top_buttons">
       <li><span><a href="message_box.php?mode=rv">수신 쪽지함</a></span></li>
       <li><span><a href="message_box.php?mode=send">송신 쪽지함</a></span></li>
     </ul>
     <form name="message_form" action="message_insert.php?send_id=<?=$userid?>" method="post">
       <div id="write_msg">
         <ul>
           <li>
             <span class="col1">보내는 사람 : </span>
             <span class="col2"><?=$userid?></span>
           </li>
           <li>
             <span class="col1">수신 아이디 : </span>
             <span class="col2"><input type="text" name="rv_id" value=""></span>
           </li>
           <li>
             <span class="col1">제목 : </span>
             <span class="col2"><input type="text" name="subject" value=""></span>
           </li>
           <li id="text_area">
             <span class="col1">내용 : </span>
             <span class="col2"><textarea name="content"></textarea> </span>
           </li>
         </ul>
         <button type="button" onclick="check_input1()">보내기</button>
       </div>
     </form>
   </div><!-- end of message box-->
   </section>
   <footer>
     <?php include "footer.php";?>
   </footer>
  </body>
</html>
