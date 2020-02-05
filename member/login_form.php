<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" href="./css/login.css">
<link rel="stylesheet" href="./css/slide.css">
<script type="text/javascript" src="./js/login.js"></script>
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="./js/signIn.js" charset="utf-8"></script>
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
    <div id="main_content">
  		<div id="login_box">
  		<div id="login_title">
    		<span id="login_head">로그인</span>
  		</div>
  		<div id="login_form">
				<form name="login_form" action="./login.php" method="post">
					<fieldset>
						<label for="">아이디</label>
						<input type="text" name="login_id" id="login_id" value="" placeholder="최소 6자~최대 12자"><br>
					</fieldset>
					<fieldset>
						<label for="">비밀번호</label>
						<input type="password" name="login_password" id="login_password" value="" placeholder="영문, 특수문자, 숫자 혼합 8~12자">
					</fieldset>
					<!-- <input type="submit" id="login_btn" onclick="login_start();" value="로그인"></input><br> -->
					<button type="button" name="button" id="login_btn" onclick="login_start();">로그인</button><br>
					<fieldset class="fieldset_noboder">
						<input type="checkbox" id="id_save_check" value=""><p id="id_save_p">아이디 저장</p>
						<ul id="find_id_pass">
							<li><a href="#">아이디 찾기</a> |</li>
							<li><a href="#">비밀번호 찾기</a> | </li>
							<li><a href="./signIn.html" ><strong> 회원가입</strong></a></li>
						</ul>
					</fieldset>
				</form>
    		</div> <!-- login_form -->
		</div> <!-- login_box -->
    </div> <!-- main_content -->
	</section>
	<footer>
  	<?php include "footer.php";?>
  </footer>
</body>
</html>
