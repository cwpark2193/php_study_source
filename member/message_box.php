<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/message.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/slide.css">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="./js/slide.js"></script>
  </head>
  <body>
    <header>
      <?php include "header.php";?>
    </header>
    <section>
      <div class="slideshow">
      <div class="slideshow_slides"> <!-- 슬라이드 안 사진 -->
        <a href="#"><img src="./img/main_img.png" alt="slide-1"> </a>
        <a href="#"><img src="./img/slide_first.jpg" alt="slide-2"> </a>
        <a href="#"><img src="./img/slide_second.jpg" alt="slide-3"> </a>
      </div>
      <div class="slideshow_nav"> <!-- 사진 넘어가는 버튼 -->
        <a href="#" class="previous">previous</a>
        <a href="#" class="next">next</a>
      </div>
      <div class="slideshow_indicator">
        <a href="#" class="">&nbsp;</a>
        <a href="#" class="">&nbsp;</a>
        <a href="#" class="">&nbsp;</a>
      </div>
    </div>
    <div id="message_box">
      <h3>
        <?php
        if (isset($_GET["page"])) {
          $page = $_GET["page"];
        }else {
          $page = 1;
        }
        $mode = $_GET["mode"];
        if ($mode ==="send") {
          echo "송신 쪽지함 > 목록보기";
        }else {
          echo "수신 쪽지함 > 목록보기";
        }
         ?>
      </h3>
      <div id="message">
        <ul>
          <li>
            <span class="col1">번호</span>
            <span class="col2">제목</span>
            <span class="col3">
              <?php
              if ($mode ==="send") {
                echo "받은 이";
              }else {
                echo "보낸 이";
              }
               ?>
            </span>
            <span class="col4">등록일</span>
          </li>
          <?php
          $connect = mysqli_connect("localhost", "root", "123456", "myPage");
          if ($mode === "send") {
            $sql = "select * from message where send_id='$userid' order by num desc";
          }else {
            $sql = "select * from message where rv_id='$userid' order by num desc";
          }
          $result = mysqli_query($connect,$sql);
          $total_record = mysqli_num_rows($result);
          $scale = 10;
          if ($total_record % $scale === 0) {
            $total_page = floor($total_record/$scale);
          }else {
            $total_page = floor($total_record/$scale)+1;
          }
          $start = ($page-1) * $scale;
          $number = $total_record - $start;

          for ($i=$start; $i <$start+$scale && $i <$total_record; $i++) {
            mysqli_data_seek($result,$i);
            $row = mysqli_fetch_array($result);
            $num = $row["num"];
            $subject = $row["subject"];
            $regist_day = $row["regist_day"];
            if ($mode ==="send") {
              $msg_id = $row["rv_id"];
            }else {
              $msg_id = $row["send_id"];
            }
            $result2 = mysqli_query($connect, "select name from members where sign_id = '$msg_id'");
            $record = mysqli_fetch_array($result2);
            $msg_name = $record["name"];

           ?>
           <li>
             <span class="col1"><?=$number?></span>
             <span class="col2"><a href="message_view.php?mode=<?=$mode?>&num=<?=$num?>"><?=$subject?></a> </span>
             <span class="col3"><?=$msg_name?>(<?=$msg_id?>)</span>
             <span class="col4"><?=$regist_day?></span>
           </li>
           <?php
           $number--;
           }
           mysqli_close($connect);
            ?>
        </ul>
        <ul id="page_num">
          <?php
          if ($total_page>=2 && $page >=2) {
            $new_page = $page-1;
            echo "<li><a href='message_box.php?mode=$mode&page=$new_page'>◀ 이전</a><li>";
          }else {
            echo "<li>&nbsp;</li>";
          }
          for ($i=1; $i <= $total_page; $i++) {
            if ($page == $i) {
              echo "<li><b> $i </b></li>";
            }else {
              echo "<li><a href='message_box.php?mode=$mode&page=$i'> $i </a><li>";
            }
          }
          if ($total_page>=2 && $page != $total_page) {
            $new_page = $page+1;
            echo "<li><a href='message_box.php?mode=$mode&page=$new_page'>다음 ▶</a><li>";
          }else {
            echo "<li>&nbsp;</li>";
          }
           ?>
        </ul><!-- page-->
        <ul class="buttons">
          <li><button type="button" name="button" onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button> </li>
          <li><button type="button" name="button" onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button> </li>
          <li><button type="button" name="button" onclick="location.href='message_form.php'">쪽지 보내기</button> </li>
        </ul>
      </div>
    </div>
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
