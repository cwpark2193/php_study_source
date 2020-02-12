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
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/slide.css">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/ask.css">
  </head>
  <body>
    <header>
      <?php include "header.php";?>
    </header>
    <?php
    $num = $_GET["num"];
    if(empty($_GET['page'])){
      $page=1;
    }else{
      $page=$_GET['page'];
    }

    $connect = mysqli_connect("localhost","root","123456","myPage");
    if(isset($_GET["num"])&&!empty($_GET["num"])){
      $num = $_GET["num"];
      $hit = $_GET["hit"];
      $q_num = mysqli_real_escape_string($connect, $num);

      $sql="update ask set hit=$hit where num=$q_num;";
      $result = mysqli_query($connect,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($connect));
      }

      $sql="select * from ask where num ='$q_num';";
      $result = mysqli_query($connect,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($connect));
      }
      $row=mysqli_fetch_array($result);
      $id=$row['id'];
      $name = $row["name"];
      $regist_day = $row["regist_day"];
      $hit = $row["hit"];
      $subject= htmlspecialchars($row['subject']);
      $content= htmlspecialchars($row['content']);
      $subject=str_replace("\n", "<br>",$subject);
      $subject=str_replace(" ", "&nbsp;",$subject);
      $content=str_replace("\n", "<br>",$content);
      $content=str_replace(" ", "&nbsp;",$content);

      mysqli_close($connect);
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
    <div id="ask_box">
      <h3 id="ask_title"> 요청 확인 </h3>
       <ul id="view_content">
         <li>
           <span class="col1"><b>제목 :</b> <?=$subject?></span>
  				 <span class="col2"><?=$name?> | <?=$regist_day?></span>
         </li>
         <li>
            <?=$content?>
         </li>
       </ul>
       <ul class="buttons">
         <li><button type="button" name="button" onclick="location.href='ask_list.php?page=<?=$page?>'">목록</button> </li>
         <?php
           if(isset($_SESSION["userid"])){
            if($_SESSION["userid"]==="administ" || $_SESSION["userid"]===$id){
              ?>
                <li><button type="button" name="button" onclick="location.href='ask_form.php?mode=update&num=<?=$num?>&page=<?=$page?>'">수정</button> </li>
                <li><button type="button" name="button" onclick="location.href='ask_board.php?mode=delete&num=<?=$num?>&page=<?=$page?>'">삭제</button> </li>
              <?php
            }
          }
          if (!empty($_SESSION["userid"])) {
            ?>
              <li><button type="button" name="button" onclick="location.href='ask_form.php?mode=response&num=<?=$num?>&page=<?=$page?>'">답변</button> </li>
              <li><button type="button" name="button" onclick="location.href='ask_form.php'">글쓰기</button> </li>
            <?php
          }
          ?>
       </ul>
    </div>
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
