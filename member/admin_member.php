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
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" href="./css/slide.css">
    <script src="./js/slide.js"></script>
  </head>
  <body>
    <header>
        <?php include "header.php";?>
    </header>
    <aside id="admin_aside">
      <ul>
        <li><a href="./admin_member.php">레벨 및 포인트 관리</a></li>
        <li><a href="./admin_board.php">자유게시판 관리</a></li>
        <li><a href="./admin_ask.php">요청게시판 관리</a></li>
      </ul>
    </aside>
    <section>
    <div id="admin_box">
      <h3 id="member_title">관리자 모드 > 회원 관리</h3>
      <ul id="member_list">
        <li>
          <span class="col1">번호</span>
          <span class="col2">아이디</span>
          <span class="col3">이름</span>
          <span class="col4">레벨</span>
          <span class="col5">포인트</span>
          <span class="col6"></span>
          <span class="col7">수정</span>
          <span class="col8">삭제</span>
        </li>
        <?php
          if (isset($_GET["page"])) {
            $page = $_GET["page"];
          }else {
            $page = 1;
          }
          $connect = mysqli_connect("localhost", "root", "123456", "myPage");
          $sql = "select * from members order by num desc";
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
            $sign_id = $row["sign_id"];
            $name = $row["name"];
            $level = $row["level"];
            $point = $row["point"];
            ?>
            <li>
              <form action="admin_member_update.php?num=<?=$num?>" method="post">
                <span class="col1"><?=$num?></span>
                <span class="col2"><?=$sign_id?></span>
                <span class="col3"><?=$name?></span>
                <span class="col4"><input type="text" name="level" value="<?=$level?>"></span>
                <span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
                <span class="col6"></span>
                <span class="col7"><button type="submit" name="button">수정</button> </span>
                <span class="col8"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
              </form>
            </li>
            <?php
            $number --;
            }
            mysqli_close($connect);
           ?>
      </ul>
      <ul id="page_num">
        <?php
        if ($total_page>=2 && $page >=2) {
          $new_page = $page -1;
          echo "<li><a href='ask_list.php?page=$new_page'>◀ 이전</a></li>";
        }else {
          echo "<li>&nbsp;</li>";
        }
        for ($i=1; $i <=$total_page ; $i++) {
          if ($page == $i) {
            echo "<li><b> $i </b></li>";
          }else {
            echo "<li><a href='ask_list.php?page=$i'> $i </a></li>";
          }
        }
        if ($total_page>=2 && $page != $total_page) {
          $new_page = $page+1;
          echo "<li><a href='ask_list.php?page=$new_page'>다음 ▶</a></li>";
        }else {
          echo "<li>&nbsp;</li>";
        }
         ?>
      </ul>
    </section>
    <footer>
        <?php include "footer.php";?>
    </footer>
  </body>
</html>
