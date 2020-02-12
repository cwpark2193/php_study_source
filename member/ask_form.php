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
    <link rel="stylesheet" type="text/css" href="./css/ask.css">
    <script type="text/javascript">
      function check_input1(){
        if (!document.ask_form.subject.value) {
          alert("제목을 입력하세요.");
          document.ask_form.subject.focus();
          return;
        }
        if (!document.ask_form.content.value) {
          alert("내용을 입력하세요.");
          document.ask_form.content.focus();
          return;
        }
        document.ask_form.submit();
      }
    </script>
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
    $num=$id=$subject=$content=$day=$hit="";
    $mode="insert";
    $connect = mysqli_connect("localhost", "root", "123456", "myPage");

    if((isset($_GET["mode"])&&$_GET["mode"]=="update")||(isset($_GET["mode"])&&$_GET["mode"]=="response") ){
        $mode=$_GET["mode"];
        $num = $_GET["num"];
        $q_num = mysqli_real_escape_string($connect, $num);

        $sql="select * from ask where num ='$q_num';";
        $result = mysqli_query($connect,$sql);
        if (!$result) {
          die('Error: ' . mysqli_error($connect));
        }
        $row=mysqli_fetch_array($result);

        $id=$row['id'];
        $subject= htmlspecialchars($row['subject']);
        $content= htmlspecialchars($row['content']);
        $subject=str_replace("\n", "<br>",$subject);
        $subject=str_replace(" ", "&nbsp;",$subject);
        $content=str_replace("\n", "<br>",$content);
        $content=str_replace(" ", "&nbsp;",$content);
        $day=$row['regist_day'];
        $hit=$row['hit'];
        if($mode === "response"){
          $subject="[re]".$subject;
          $content="re]".$content;
          $content=str_replace("<br>", "<br>▶",$content);
        }
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
      <h3 id="ask_title"> 요청하기 </h3>
      <form name="ask_form" action="ask_board.php?mode=<?=$mode?>" method="post">
        <input type="hidden" name="num" value="<?=$num?>">
        <input type="hidden" name="hit" value="<?=$hit?>">
        <ul id="ask_form">
          <li>
            <span class="col1">이름</span>
            <span class="col2"><?=$username?></span>
          </li>
          <li>
            <span class="col1">제목</span>
            <span class="col2"><input type="text" name="subject" value="<?=$subject?>"> </span>
          </li>
          <li id="text_area">
            <span class="col1">내용 : </span>
            <span class="col2"><textarea name="content"><?=$content?></textarea> </span>
          </li>
        </ul>
        <ul class="buttons">
          <li><button type="button" name="button" onclick="check_input1()">완료</button> </li>
          <li><button type="button" name="button" onclick="location.href='ask_list.php'">목록</button> </li>
        </ul>
      </form>
    </div>
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
