<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JaeHoon's Bakery</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/signIn.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/slide.css">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="./js/member_modify.js" charset="utf-8"></script>
    <script src="./js/slide.js"></script>
  </head>
  <body>
    <header>
      <?php include "header.php";?>
    </header>
    <?php
     	$connect = mysqli_connect("localhost", "root", "123456", "myPage");
      $sql    = "select * from members where sign_id='$userid'";
      $result = mysqli_query($connect, $sql);
      $row    = mysqli_fetch_array($result);

      $sign_id = $row["sign_id"];
      $sign_password = $row["sign_password"];
      $name = $row["name"];

      $birth_date = explode("-", $row["birth_date"]);
      $birth_year = $birth_date[1];
      $birth_month = $birth_date[2];
      $birth_day = $birth_date[3];
      $cal_year = $birth_date[0];
      if ($cal_year ==="양력") {
        $year = "solar";
      }elseif ($cal_year ==="음력") {
        $year = "luna";
      }
      $email = $row["email"];
      $call_numbers = explode("-", $row["call_number"]);
      $call_number_one = $call_numbers[1];
      $call_number_two = $call_numbers[2];
      $call_number = $call_numbers[0];
      $phone_numbers = explode("-", $row["phone_number"]);
      $phone_number_one = $phone_numbers[1];
      $phone_number_two = $phone_numbers[2];
      $phone_number = $phone_numbers[0];
      $home_number = explode("-", $row["home_number"]);
      $home_number_one = $home_number[0];
      $home_number_two = $home_number[1];
      $address_call = explode("/", $row["address"]);
      $address = $address_call[0];
      $address_detail = $address_call[1];
      $status = $row["status"];
      $root = $row["root"];
      if ($root ==="etc") {
        $etc_reason = $_POST["etc_reason"];
      }

      mysqli_close($connect);
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
      <div id="main_content">
        <div id="sing_in_div">
          <h3>회원가입</h3>
          <p>다음의 회원정보를 입력하여 주시면 가입절차가 완료됩니다.</p>
          <p>허위로 작성된 가입정보일 경우 임의로 삭제처리될 수 있으니 주의해주세요.</p>
          <form name="signup_form" action="./member_modify.php?sign_id=<?=$userid?>" method="post">
            <fieldset>
              <label for="">이름(실명)</label>
              <input type="text" class="middle" name="name1" id="name" value="<?=$name?>">
            </fieldset>
            <fieldset>
              <label for="">생년월일</label>
              <input type="text" class="small" name="birth_year" id="birth_year" value="<?=$birth_year?>">
              <input type="text" class="verry_small" name="birth_month" id="birth_month" value="<?=$birth_month?>">
              <input type="text" class="verry_small" name="birth_day" id="birth_day" value="<?=$birth_day?>">
              <input type="radio" name="year" value="solar">양력
              <input type="radio" name="year" value="luna">음력
            </fieldset>
            <fieldset>
              <div class="">
                <label style="height:70px;">회원 ID</label>
              </div>
              <input type="text" name="sign_id" id="sign_id" value="<?=$userid?>"readonly>
              <p>회원ID는 가입후 변경이 불가능합니다.</p>
              <p>회원ID와 비밀번호는 영문자로 시작하는 4~18자의 영문,숫자를 조합하셔서</p>
              <p>공백없이 기입해주세요.</p>
            </fieldset>
            <fieldset>
              <label for="">비밀번호</label>
              <input type="password" name="sign_password" id="sign_password" value="<?=$sign_password?>">재입력
              <input type="password" name="sign_password_check" id="sign_password_check" value="<?=$sign_password?>">
            </fieldset>
            <fieldset>
              <label for="">이메일</label>
              <input type="email" class="big" name="email1" id="email" value="<?=$email?>">
              <input type="checkbox" name="notice_mail_check" id="notice_mail_check" value="">공지메일을 받음
            </fieldset>
            <fieldset>
              <label for="">자택전화</label>
              <select name="call_number">
                <option value="02">02</option>
                <option value="031">031</option>
                <option value="032">032</option>
                <option value="070">070</option>
                <option value="051">051</option>
              </select>
              <input type="text" class="small" name="call_number_one" value="<?=$call_number_one?>">
              <input type="text" class="small" name="call_number_two" value="<?=$call_number_two?>">
            </fieldset>
            <fieldset>
              <label for="">휴대폰</label>
              <select name="phone_number">
                <option value="010">010</option>
                <option value="011">011</option>
                <option value="016">016</option>
                <option value="017">017</option>
              </select>
              <input type="text" class="small" name="phone_number_one" value="<?=$phone_number_one?>">
              <input type="text" class="small" name="phone_number_two" value="<?=$phone_number_two?>">
              <input type="checkbox" name="call_mms_check" id="call_mms_check" value="">상담전화와 문자메세지를 받음
            </fieldset>
            <fieldset>
              <div class="">
                <label for="" style="height:60px;">자택주소</label>
              </div>
              <input type="text" class="small" name="home_number_one" value="<?=$home_number_one?>"> -
              <input type="text" class="small" name="home_number_two" value="<?=$home_number_two?>">&nbsp;
              <button type="button" name="button">우편번호 검색</button><br>
              <input type="text" class="verry_big" name="address" id="address" value="<?=$address?>"><br>
              <input type="text" class="big" name="address_detail" id="address_detail" value="<?=$address_detail?>">
            </fieldset>
            <fieldset>
              <label for="">직업</label>
              <select name="status">
                <option value="work_ready">취준생</option>
                <option value="student">학생</option>
                <option value="worker">회사원</option>
                <option value="alone">백수</option>
              </select>
            </fieldset>
            <fieldset>
              <div class="">
                <label style="height:140px;">가입경로</label>
              </div>
              <p>구인구직사이트</p>
              <input type="radio" name="root" value="albamon">알바몬
              <input type="radio" name="root" value="albachonguk">알바천국
              <input type="radio" name="root" value="incurte">인쿠르트
              <input type="radio" name="root" value="jobkorea">잡코리아
              <p>-------------------------------------------</p>
              <p>포탈사이트</p>
              <input type="radio" name="root" value="naver">네이버검색
              <input type="radio" name="root" value="daum">다음검색
              <input type="radio" name="root" value="cafe">카페
              <input type="radio" name="root" value="blog">블로그
              <p>-------------------------------------------</p>
              <input type="radio" name="root" value="etc">기타
              <input type="text" name="etc_reason" id="etc_reason" value="" disabled="true" >
            </fieldset>
          </form>
          <input type="button" name="button" id="modify_button" value="정보수정"></button>
          <button type="button" name="button" id="back_to_login">취소-이전</button>
        </div>
      </div><!--main content-->
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
