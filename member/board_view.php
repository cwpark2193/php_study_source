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
      <h3 id="board_title"> 노트 내용 보기</h3>
      <?php
      $num = $_GET["num"];
      $page = $_GET["page"];

      $connect = mysqli_connect("localhost","root","123456","myPage");
      $sql = "select * from board where num = $num";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_array($result);

      $id = $row["id"];
      $name = $row["name"];
      $regist_day = $row["regist_day"];
      $subject = $row["subject"];
      $content = $row["content"];
      $file_name = $row["file_name"];
      $file_type = $row["file_type"];
      $file_copied = $row["file_copied"];
      $hit = $row["hit"];

      $content = str_replace(" ","&nbsp;",$content);
      $content = str_replace("\n","<br>",$content);

      $new_hit = $hit+1;
      $sql = "update board set hit = $new_hit where num = $num";
      mysqli_query($connect,$sql);
       ?>
       <ul id="view_content">
         <li>
           <span class="col1"><b>제목 :</b> <?=$subject?></span>
  				 <span class="col2"><?=$name?> | <?=$regist_day?></span>
         </li>
         <li>
           <?php
           if ($file_name) {
             $real_name = $file_copied;
             $file_path = "./data/".$real_name;
             $file_size = filesize($file_path);

             echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
               <a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                 }
            ?>
            <?=$content?>
         </li>
       </ul>
       <ul class="buttons">
         <li><button type="button" name="button" onclick="location.href='board_list.php?page=<?=$page?>'">목록</button> </li>
         <li><button type="button" name="button" onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button> </li>
         <li><button type="button" name="button" onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button> </li>
         <li><button type="button" name="button" onclick="location.href='board_form.php'">글쓰기</button> </li>
       </ul>
    </div>
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
