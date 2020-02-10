<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JaeHoon's Bakery</title>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="./js/signIn.js" charset="utf-8"></script>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/slide.css">
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="./js/slide.js"></script>
  </head>
  <body>
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
    <div id="main_content">
    <div id="latest">
      <h4>최근 게시글</h4>
      <ul>
        <?php
          $connect = mysqli_connect("localhost", "root", "123456", "myPage");
          $sql = "select * from board order by num desc limit 5";
          $result = mysqli_query($connect, $sql);
          if (!$result) {
            echo "게시글이 없습니다.";
          } else {
            while ($row = mysqli_fetch_array($result)) {
                $regist_day = substr($row["regist_day"], 0, 10);
                ?>
            <li>
              <span><?= $row["subject"]?></span>
              <span><?= $row["name"]?></span>
              <span><?= $regist_day?></span>
            </li>
        <?php
              }
          }
        ?>
      </ul>
      </div>
      <div id="point_rank">
        <h4>포인트 랭킹</h4>
        <ul>
          <?php
            $rank = 1;
            $sql = "select * from members order by point desc limit 5";
            $result = mysqli_query($connect, $sql);
            mysqli_error();
            if (!$result) {
                echo "회원이 없습니다.";
            } else {
                while ($row = mysqli_fetch_array($result)) {
                    $name = $row[3];
                    $id = $row["sign_id"];
                    $point = $row["point"];
                    // $name = mb_substr($name, 0, 1)." * ".mb_substr($name, 2, 1);
          ?>
           <li>
             <span><?=$rank?></span>
             <span><?=$name?></span>
             <span><?=$id?></span>
             <span><?=$point?></span>
           </li>
          <?php
            $rank++;
                }
            }
            mysqli_close($connect);
            ?>
        </ul>
      </div>
    </div>
  </body>
</html>
