<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";

    $connect = mysqli_connect("localhost", "root", "123456", "myPage");
    $sql = "select * from members where sign_id='$userid'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    mysqli_close($connect);
    $userid = $row["sign_id"];
    $username = $row["name"];
    $userlevel = $row["level"];
    $userpoint = $row["point"];
?>
        <div id="top">
            <h3>
                <a href="index.php">JaeHoon's Bakery</a>
            </h3>
            <ul id="top_menu">
<?php
    if(!$userid) {
?>
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
?>
                <li><?=$logged?> </li>
                <li> | </li>
                <li><a href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a href="member_modify_form.php">정보 수정</a></li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li>
                <li><a href="admin_member.php">관리자 모드(15장)</a></li>
<?php
    }
?>
            </ul>
        </div>
        <div id="menu_bar">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="message_form.php">MESSAGE</a></li>
                <li><a href="board_form.php">FREE NOTE</a></li>
                <li><a href="ask_list.php">ASK BOARD</a></li>
            </ul>
        </div>
