<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JaeHoon's Bakery</title>
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="./js/slide.js"></script>
    <script src="./js/board.js"></script>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/slide.css">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/board.css">
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
    <div id="board_box">
      <h3 id="board_title"> 노트 목록 보기</h3>
        <ul id="board_list">
          <li>
            <span class="col1">번호</span>
            <span class="col2">제목</span>
            <span class="col3">글쓴이</span>
            <span class="col4">첨부</span>
            <span class="col5">등록일</span>
            <span class="col6">조회</span>
          </li>
          <?php
          if (isset($_GET["page"])) {
            $page = $_GET["page"];
          }else {
            $page = 1;
          }
          $connect = mysqli_connect("localhost","root","123456","myPage");
          $sql = "select * from board order by num desc";
          $result = mysqli_query($connect,$sql);
          $total_record = mysqli_num_rows($result);

          $scale = 10;

          $total_page=($total_record % $scale == 0)?floor($total_record/$scale):(floor($total_record/$scale)+1);
          $start = ($page-1) * $scale;

          $number = $total_record - $start;
          for ($i=$start; $i <$start+$scale && $i < $total_record ; $i++) {
            mysqli_data_seek($result,$i);
            $row = mysqli_fetch_array($result);
            $num = $row["num"];
            $id = $row["id"];
            $name = $row["name"];
            $subject = $row["subject"];
            $regist_day = $row["regist_day"];
            $hit = $row["hit"];
            if ($row["file_name"]) {
              $file_image = "<img src='./img/file.gif'>";
            }else {
              $file_image = " ";
            }
           ?>
           <li>
             <span class="col1"><?=$number?></span>
             <span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a> </span>
             <span class="col3"><?=$name?></span>
             <span class="col4"><?=$file_image?></span>
             <span class="col5"><?=$regist_day?></span>
             <span class="col6"><?=$hit?></span>
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
            $new_page = $page -1;
            echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a></li>";
          }else {
            echo "<li>&nbsp;</li>";
          }
          for ($i=1; $i <=$total_page ; $i++) {
            if ($page == $i) {
              echo "<li><b> $i </b></li>";
            }else {
              echo "<li><a href='board_list.php?page=$i'> $i </a></li>";
            }
          }
          if ($total_page>=2 && $page != $total_page) {
            $new_page = $page+1;
            echo "<li><a href='board_list.php?page=$new_page'>다음 ▶</a></li>";
          }else {
            echo "<li>&nbsp;</li>";
          }
           ?>
        </ul>
        <ul class="buttons">
          <li><button type="button" name="button" onclick="location.href='board_list.php'">목록</button> </li>
          <li>
            <?php
              if ($userid) {
             ?>
              <button type="button" name="button" onclick="location.href='board_form.php'">글쓰기</button>
            <?php
              }else{
            ?>
               <a href="javascript:alert('로그인 후 이용해주세요!')"><button type="button" name="button">글쓰기</button> </a>
            <?php
              }
            ?>
          </li>
        </ul>
      </div>
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
